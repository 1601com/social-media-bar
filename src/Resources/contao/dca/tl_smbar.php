<?php


$GLOBALS['TL_DCA']['tl_smbar'] = [

    // Config
    'config' => [
        'dataContainer' => 'Table',
        'ctable' => ['tl_smbar_configuration'],
        'switchToEdit' => true,
        'enableVersioning' => true,
        'sql' => [
            'keys' => [
                'id' => 'primary'
            ]
        ]
    ],

    // List
    'list' => [
        'sorting' => [
            'mode' => 1,
            'fields' => ['title'],
            'flag' => 1,
            'panelLayout' => 'search,limit'
        ],
        'label' => [
            'fields' => ['title'],
            'format' => '%s'
        ],
        'global_operations' => [
            'all' => [
                'label' => &$GLOBALS['TL_LANG']['MSC']['all'],
                'href' => 'act=select',
                'class' => 'header_edit_all',
                'attributes' => 'onclick="Backend.getScrollOffset();"'
            ]
        ],
        'operations' => [
            'edit' => [
                'label' => &$GLOBALS['TL_LANG']['tl_smbar']['edit'],
                'href' => 'table=tl_smbar_configuration',
                'icon' => 'edit.gif',
            ],
            'editheader' => [
                'label' => &$GLOBALS['TL_LANG']['tl_smbar']['editmeta'],
                'href' => 'act=edit',
                'icon' => 'header.svg'
            ],
            'copy' => [
                'label' => &$GLOBALS['TL_LANG']['tl_smbar']['copy'],
                'href' => 'act=copy',
                'icon' => 'copy.gif',
            ],
            'delete' => [
                'label' => &$GLOBALS['TL_LANG']['tl_smbar']['delete'],
                'href' => 'act=delete',
                'icon' => 'delete.gif',
                'attributes' => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"',
            ],
            'show' => [
                'label' => &$GLOBALS['TL_LANG']['tl_smbar']['show'],
                'href' => 'act=show',
                'icon' => 'show.gif'
            ]
        ]
    ], // end of list array

    // Palettes
    'palettes' => [
        'default' => 'title;{theme_legend:hide},themeselect;{contact_legend},contactperson,contactcustomicon'
    ],

    // Fields
    'fields' => [
        'id' => [
            'sql' => "int(10) unsigned NOT NULL auto_increment"
        ],
        'tstamp' => [
            'sql' => "int(10) unsigned NOT NULL default '0'"
        ],
        'title' => [
            'label' => &$GLOBALS['TL_LANG']['tl_smbar']['title'],
            'inputType' => 'text',
            'search' => true,
            'eval' => ['mandatory' => true, 'maxlength' => 64],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'contactperson' => [
            'label' => &$GLOBALS['TL_LANG']['tl_smbar']['contactperson'],
            'exclude' => true,
            'inputType' => 'checkbox',
            'default' => 1,
            'eval' => ['tl_class' => 'w50 m12'],
            'sql' => "char(1) NOT NULL default ''"
        ],
        'contactcustomicon' => [
            'label' => &$GLOBALS['TL_LANG']['tl_smbar']['contactcustomicon'],
            'exclude' => true,
            'inputType' => 'fileTree',
            'eval' => ['fieldType' => 'radio', 'files' => true, 'filesOnly' => true, 'tl_class' => 'w50', 'extensions' => 'svg,png'],
            'sql' => "binary(16) NULL"
        ],
        'themeselect' => [
            'label' => &$GLOBALS['TL_LANG']['tl_smbar']['themeselect'],
            'exclude' => true,
            'inputType' => 'select',
            'options' => ['light', 'dark'],
            'default' => 'light',
            'eval' => ['tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
    ]
];