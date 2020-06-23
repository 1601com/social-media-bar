<?php

$GLOBALS['TL_DCA']['tl_smbar_configuration'] = array
(
    // Config
    'config' => array
    (
        'dataContainer'               => 'Table',
        'ptable'                      => 'tl_smbar',
        'sql' => array
        (
            'keys' => array
            (
                'id' => 'primary',
            )
        )
    ),

    // List
    'list' => array
    (
        'label' => array
        (
            'label_callback'          => array('tl_smbar_configuration', 'smElementTitle'),
            'fields'                  => array('smtypeselect'),
            'format'                  => '%s'
        ),
        'global_operations' => array
        (
            'all' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
                'href'                => 'act=select',
                'class'               => 'header_edit_all',
                'attributes'          => 'onclick="Backend.getScrollOffset();"'
            )
        ),
        'operations' => array
        (
            'edit' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_smbar_configuration']['edit'],
                'href'                => 'act=edit',
                'icon'                => 'edit.gif'
            ),
            'copy' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_smbar_configuration']['copy'],
                'href'                => 'act=copy',
                'icon'                => 'copy.gif'
            ),
            'delete' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_smbar_configuration']['delete'],
                'href'                => 'act=delete',
                'icon'                => 'delete.gif',
                'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
            ),
            'toggle' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_smbar_configuration']['toggle'],
				'icon'                => 'visible.svg',
				'attributes'          => 'onclick="Backend.getScrollOffset();return AjaxRequest.toggleVisibility(this,%s)"',
				'button_callback'     => array('tl_smbar_configuration', 'toggleIcon')
			),
            'show' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_smbar_configuration']['show'],
                'href'                => 'act=show',
                'icon'                => 'show.gif'
            )
        )
    ), // end of list array

    // Palettes
    'palettes' => array
    (
        '__selector__' => ['smtypeselect'],
        'default'                     => '{title_legend},smtypeselect,smurl,smtarget,smcustomicon'
    ),
    'subpalettes' => [
        'smtypeselect_Sonstige' => 'mscsmtype',
        'smtypeselect_facebook' => 'smshare',
        'smtypeselect_twitter' => 'smshare'

    ],

    // Fields
    'fields' => array
    (
        'id' => array
        (
            'sql'                     => "int(10) unsigned NOT NULL auto_increment"
        ),
        'pid' => array
        (
            'foreignKey'              => 'tl_smbar.title',
            'sql'                     => "int(10) unsigned NOT NULL default 0",
            'relation'                => array('type'=>'belongsTo', 'load'=>'lazy')
        ),
        'tstamp' => array
        (
            'sql'                     => "int(10) unsigned NOT NULL default '0'"
        ),
        /*'title' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_smbar_configuration']['title'],
            'inputType'               => 'text',
            'search'                  => true,
            'eval'                    => array('mandatory'=>true, 'maxlength'=>64, 'tl_class'=>'w50')
        ),*/
        'smtypeselect' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_smbar_configuration']['smType'],
            'exclude'                 => true,
            'inputType'               => 'select',
            'options'                 => ['facebook', 'twitter', 'instagram', 'youtube', 'linkedin', 'xing', 'pinterest', 'googlemaps', 'Sonstige'],
            //'foreignKey'              => 'tl_user.name',
            'eval'                    => ['submitOnChange'=>true, 'mandatory'=>true, 'includeBlankOption'=>true, 'tl_class'=>'w50'],
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'smurl' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_smbar_configuration']['smURL'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval'                    => ['mandatory'=>true, 'rgxp'=>'url', 'decodeEntities'=>true, 'maxlength'=>255, 'tl_class'=>'w50 wizard'],
            //'wizard'                  => [['tl_content', 'pagePicker']],
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        /*'cssClass' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_smbar_configuration']['cssClass'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        )*/
        'mscsmtype' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_smbar_configuration']['mscsmtype'],
            'inputType'               => 'text',
            'search'                  => true,
            'eval'                    => array('mandatory'=>true, 'maxlength'=>64, 'tl_class'=>'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'smcustomicon' => [
            'label'                   => &$GLOBALS['TL_LANG']['tl_smbar_configuration']['smcustomicon'],
            'exclude'                 => true,
            'inputType'               => 'fileTree',
            'eval'                    => ['fieldType' => 'radio', 'files' => true, 'filesOnly' => true, 'tl_class' => 'clr', 'extensions' => 'svg,png'],
            'sql'                     => "binary(16) NULL"
        ],
        'smtarget' => [
            'label'                   => &$GLOBALS['TL_LANG']['tl_smbar_configuration']['smtarget'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'default'                 => 1,
            'eval'                    => ['tl_class' => 'w50'],
            'sql'                     => "char(1) NOT NULL default ''"
        ],
        'smshare' => [
            'label'                   => &$GLOBALS['TL_LANG']['tl_smbar_configuration']['smshare'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'default'                 => 1,
            'eval'                    => ['tl_class' => 'w50'],
            'sql'                     => "char(1) NOT NULL default ''"
        ],
        'smshareicon' => [
            'label'                   => &$GLOBALS['TL_LANG']['tl_smbar_configuration']['smshareicon'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'default'                 => 1,
            'eval'                    => ['tl_class' => 'w50'],
            'sql'                     => "char(1) NOT NULL default ''"
        ]
    )
);

class tl_smbar_configuration extends Backend {

    public function smElementTitle($row, $label)
    {
        if($label == 'Sonstige')
        {
            // Wenn Label ist Sonstige, wähle Value von mscsmtype und setze es zu einem neuen Wert zusammen
            $newLabel = $row['mscsmtype'] . ' (' . $label .')';

            return $newLabel;
        }

        // Ansonsten verwende das Label
        else return $label;
    }

    /**
     * Return the "toggle visibility" button
     *
     * @param array  $row
     * @param string $href
     * @param string $label
     * @param string $title
     * @param string $icon
     * @param string $attributes
     *
     * @return string
     */
    public function toggleIcon($row, $href, $label, $title, $icon, $attributes)
    {
        if (\strlen(Input::get('tid')))
        {
            $this->toggleVisibility(Input::get('tid'), (Input::get('state') == 1), (@func_get_arg(12) ?: null));
            $this->redirect($this->getReferer());
        }

        // Check permissions AFTER checking the tid, so hacking attempts are logged
        /*if (!$this->User->hasAccess('tl_smbar_configuration::published', 'alexf'))
        {
            return '';
        }*/

        $href .= '&amp;tid='.$row['id'].'&amp;state='.($row['published'] ? '' : 1);

        if (!$row['published'])
        {
            $icon = 'invisible.svg';
        }

        return '<a href="'.$this->addToUrl($href).'" title="'.StringUtil::specialchars($title).'"'.$attributes.'>'.Image::getHtml($icon, $label, 'data-state="' . ($row['published'] ? 1 : 0) . '"').'</a> ';
    }
}
