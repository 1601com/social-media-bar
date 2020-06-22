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

            $template->wildcard = '### '.utf8_strtoupper($GLOBALS['TL_LANG']['FMD']['social_media_bar'][0]).' ###';
            $template->title = $this->headline;
            $template->id = $this->id;
            $template->link = $this->name;
            $template->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id='.$this->id;

            return $template->parse();
        }

        return parent::generate();
    }

    /**
     * Generates the module.
     */
    protected function compile()
    {
        $elemSM = [];
        $result = $this->Database->prepare("SELECT * FROM tl_smbar_configuration WHERE pid=?")->execute($this->sm_bar);

        while ($result->next())
        {
            if ($result->smtypeselect == "Sonstige") {
                $elemSM[$result->id] = [
                    "smType" => $result->mscsmtype,
                    "smURL" => $result->smurl,
                    "smTarget" => $result->smtarget,
                    "smIcon" => $this->addSmImage($result, $result->smcustomicon)
                ];
            } else {
                $elemSM[$result->id] = [
                    "smType" => $result->smtypeselect,
                    "smURL" => $result->smurl,
                    "smTarget" => $result->smtarget,
                    "smIcon" => $this->addSmImage($result, $result->smcustomicon),
                    "smShare" => $result->smshare,
                    "smShareIcon" => $result->smshareicon
                ];
            }
        }

        $this->Template->smElements = $elemSM;
    }


    /**
     * Add sm Icon to smElement.
     */
    protected function addSmImage($smElement, $iconDCA) {
        $smElement->smicon = \FilesModel::findByUuid($iconDCA);
        $strPath = $smElement->smicon->path;

        return $strPath;
    }
}
