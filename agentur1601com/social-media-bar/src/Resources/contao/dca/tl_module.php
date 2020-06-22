<?php



$GLOBALS['TL_DCA']['tl_module']['palettes']['social_media_bar'] = '{title_legend},name,type;{template_legend:hide},sm_bar,sm_template;{expert_legend:hide},cssID';



$GLOBALS['TL_DCA']['tl_module']['fields']['sm_template'] = [
    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['sm_template'],
    'default'                 => 'mod_sm_bar',
    'exclude'                 => true,
    'inputType'               => 'select',
    'options_callback'        => ['tl_fe_module', 'getSmTemplates'],
    'eval'                    => ['includeBlankOption'=>true, 'tl_class'=>'w50'],
    'sql'                     => "varchar(64) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_module']['fields']['sm_bar'] = [
    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['sm_bar'],
    'exclude'                 => true,
    'inputType'               => 'select',
    'options_callback'        => ['tl_fe_module', 'getSmBar'],
    'eval'                    => ['mandatory'=>true, 'includeBlankOption'=>true, 'tl_class'=>'w50'],
    'sql'                     => "varchar(64) NOT NULL default ''"
];


class tl_fe_module
{
    /**
     * Gibt die Templates für das Formular zurück.
     * @param $dc
     * @return array
     */
    public function getSmTemplates($dc)
    {
        return \Contao\Controller::getTemplateGroup('mod_sm_');
    }


    public function getSmBar()
    {
        $arrSmBars = array();
        $objSmBars = Database::getInstance()->execute("SELECT id, title FROM tl_smbar ORDER BY title");

        while ($objSmBars->next())
        {
            /*if ($this->User->hasAccess($objSmBars->id, 'smBar'))
            {

            }*/
            $arrSmBars[$objSmBars->id] = $objSmBars->title;
        }

        return $arrSmBars;
    }
}
