<?php


$GLOBALS['TL_DCA']['tl_smbar'] = array
(

    // Config
    'config' => array
    (
        'dataContainer' => 'Table',
        'ctable' => array('tl_smbar_configuration'),
        'switchToEdit' => true,
        'enableVersioning' => true,
        'sql' => array
        (
            'keys' => array
            (
                'id' => 'primary'
            )
        )
    ),

    // List
    'list' => array
    (
        'sorting' => array
        (
            'mode'                    => 1,
            'fields'                  => array('title'),
            'flag'                    => 1,
            'panelLayout'             => 'search,limit'
        ),
        'label' => array
        (
            'fields'                  => array('title'),
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
                'label'               => &$GLOBALS['TL_LANG']['tl_smbar']['edit'],
                'href'                => 'table=tl_smbar_configuration',
                'icon'                => 'edit.gif',
            ),
            'editheader' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_smbar']['editmeta'],
                'href'                => 'act=edit',
                'icon'                => 'header.svg'
            ),
            'copy' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_smbar']['copy'],
                'href'                => 'act=copy',
                'icon'                => 'copy.gif',
            ),
            'delete' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_smbar']['delete'],
                'href'                => 'act=delete',
                'icon'                => 'delete.gif',
                'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"',
            ),
            'show' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_smbar']['show'],
                'href'                => 'act=show',
                'icon'                => 'show.gif'
            )
        )
    ), // end of list array

    // Palettes
    'palettes' => array
    (
        'default'                     => '{social media bar},title,visibility;{expert_legend:hide},cssID'
    ),

    // Fields
    'fields' => array
    (
        'id' => array
        (
            'sql'                     => "int(10) unsigned NOT NULL auto_increment"
        ),
        'tstamp' => array
        (
            'sql'                     => "int(10) unsigned NOT NULL default '0'"
        ),
        'title' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_smbar']['title'],
            'inputType'               => 'text',
            'search'                  => true,
            'eval'                    => array('mandatory'=>true, 'maxlength'=>64),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'visibility' => [
            'label'                   => &$GLOBALS['TL_LANG']['tl_smbar']['visibility'],
            'exclude'                 => true,
            'inputType'               => 'pageTree',
            'eval'                    => ['fieldType'=>'checkbox', 'tl_class'=>'clr', 'multiple'=>true],
            'sql'                     => "varchar(255) NOT NULL default ''"
        ]
    )
);