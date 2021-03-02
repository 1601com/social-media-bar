<?php

namespace Agentur1601com\SocialMediaBar\Module;

class SocialMediaBarModule extends \Module
{
    /**
     * @var string
     */
    protected $strTemplate = 'mod_sm_bar';

    /**
     * Displays a wildcard in the back end.
     *
     * @return string
     */
    public function generate()
    {
        if (TL_MODE == 'BE') {
            $template = new \BackendTemplate('be_wildcard');

            $template->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['FMD']['social_media_bar'][0]) . ' ###';
            $template->title = $this->headline;
            $template->id = $this->id;
            $template->link = $this->name;
            $template->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

            return $template->parse();
        }

        return parent::generate();
    }

    /**
     * Generates the module.
     */
    protected function compile()
    {
        // selected Theme & pop-up
        $this->_getLoadingFiles();

        // social media elements
        if (!$this->_assignTempVarsSMElement()) {
            trigger_error("Social media elements can’t be fully loaded!", E_USER_WARNING);
            return;
        }
        $this->_assignTempVarsSMElement();

        // contact person
        $this->_assignTempVarsContactPerson();
    }

    /**
     * get social media bar theme
     * @return bool
     */
    private function _getLoadingFiles(): bool
    {
        $checkUseCSS = $this->Database->prepare("SELECT usecss FROM tl_smbar WHERE id=?")->execute($this->sm_bar);
        $checkUseJS = $this->Database->prepare("SELECT usejs FROM tl_smbar WHERE id=?")->execute($this->sm_bar);

        if ($checkUseCSS->usecss) {
            $GLOBALS['TL_HEAD'][] = \Contao\Template::generateStyleTag('bundles/socialmediabar/socialmediabar.css', null, null);

            $this->Template->selectedTheme = $this->_getTheme();
        }

        if ($checkUseJS->usejs) {
            $GLOBALS['TL_BODY'][] = \Contao\Template::generateScriptTag('bundles/socialmediabar/popup.js', true, null);
        }

        return true;
    }

    /**
     * get social media bar theme
     * @return string
     */
    private function _getTheme(): string
    {
        $checkThemeSelection = $this->Database->prepare("SELECT themeselect FROM tl_smbar WHERE id=?")->execute($this->sm_bar);

        return $checkThemeSelection->themeselect;
    }

    /**
     * creates social media element
     * @return bool
     */
    private function _assignTempVarsSMElement(): bool
    {
        $elemSM = [];
        $result = $this->Database->prepare("SELECT * FROM tl_smbar_configuration WHERE pid=? ORDER BY sorting ASC")->execute($this->sm_bar);

        while ($result->next()) {
            if ($result->invisible != false) {
                continue;
            }

            $smType = $result->smtypeselect;
            $smURL = $result->smurl;
            $smTarget = $result->smtarget;
            $smCustomIcon = $this->_addImage($result, $result->smcustomicon);
            $smShare = null;
            $smShareIcon = null;

            if ($result->smtypeselect == "Sonstige") {
                $smType = $result->mscsmtype;
            }

            if ($result->smtypeselect == "facebook" || $result->smtypeselect == "twitter") {
                $smShare = $result->smshare;
                $smShareIcon = $result->smshareicon;
            }

            $smEntry = [
                "smType" => $smType,
                "smURL" => $smURL,
                "smTarget" => $smTarget,
                "smCustomIcon" => $smCustomIcon,
                "smShare" => $smShare,
                "smShareIcon" => $smShareIcon
            ];

            $elemSM[] = $smEntry;
        }

        $this->Template->smElements = $elemSM;
        $this->Template->iconPath = 'bundles/socialmediabar/smBarIcons/';
        $this->Template->shareIcon = sprintf('bundles/socialmediabar/smBarIcons/share_%s.svg', $this->_getTheme());

        return true;
    }

    /**
     * creates contact Person
     * @return bool
     */
    private function _assignTempVarsContactPerson(): bool
    {
        $checkContactPerson = $this->Database->prepare("SELECT contactperson FROM tl_smbar WHERE id=?")->execute($this->sm_bar);
        $this->Template->checkContactPerson = $checkContactPerson->contactperson;


        if (!$checkContactPerson->contactperson) {
            return false;
        }

        $backendMember = $this->Database->prepare("SELECT * FROM tl_member WHERE contactpages IS NOT NULL")->execute();

        $memberInformation = [];

        while ($backendMember->next()) {
            $memberInformation[] = [
                "contactpages" => unserialize($backendMember->contactpages),
                "firstname" => $backendMember->firstname,
                "lastname" => $backendMember->lastname,
                "phone" => $backendMember->phone,
                "email" => $backendMember->email,
                "profileImage" => $this->_addImage($backendMember, $backendMember->contactimage),
                "description" => $backendMember->contactdescription
            ];
        }

        $this->Template->contactPerson = $memberInformation;


        $checkContactIcon = $this->Database->prepare("SELECT * FROM tl_smbar WHERE id=?")->execute($this->sm_bar);

        if ($checkContactIcon->contactcustomicon) {
            $contacticon = $this->_addImage($checkContactIcon, $checkContactIcon->contactcustomicon);
            $this->Template->contactIcon = $contacticon;
        }

        $this->Template->contactIcon = sprintf('bundles/socialmediabar/smBarIcons/contact_%s.svg', $this->_getTheme());

        return true;
    }


    /**
     * @param $Element
     * @param $Image
     * @return string|null
     */
    private function _addImage($Element, $Image): ?string
    {
        $Element->image = \FilesModel::findByUuid($Image);
        return $Element->image->path;
    }
}
