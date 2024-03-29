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
        '__selector__' => ['usecss'],
        'default' => 'title;{theme_legend:hide},usecss,usejs;{contact_legend},contactperson,contactcustomicon'
    ],
    'subpalettes' => [
        'usecss' => 'themeselect'
    ],

    // Fields
    'fields' => [
        'id' => [
            'sql' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'notnull' => true, 'autoincrement' => true],
        ],
        'tstamp' => [
            'sql' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'notnull' => true, 'default' => 0],
        ],
        'title' => [
            'label' => &$GLOBALS['TL_LANG']['tl_smbar']['title'],
            'inputType' => 'text',
            'search' => true,
            'eval' => ['mandatory' => true, 'maxlength' => 64],
            'sql' => ['type' => 'string', 'length' => 255, 'notnull' => true, 'default' => ''],
        ],
        'contactperson' => [
            'label' => &$GLOBALS['TL_LANG']['tl_smbar']['contactperson'],
            'exclude' => true,
            'inputType' => 'checkbox',
            'default' => 1,
            'eval' => ['tl_class' => 'w50 m12'],
            'sql' => ['type' => 'string', 'length' => 1, 'fixed' => true, 'notnull' => true, 'default' => ''],
        ],
        'contactcustomicon' => [
            'label' => &$GLOBALS['TL_LANG']['tl_smbar']['contactcustomicon'],
            'exclude' => true,
            'inputType' => 'fileTree',
            'eval' => ['fieldType' => 'radio', 'files' => true, 'filesOnly' => true, 'tl_class' => 'w50', 'extensions' => 'svg,png'],
            'sql' => ['type' => 'binary', 'length' => 16, 'fixed' => true, 'notnull' => false]
        ],
        'usecss' => [
            'label' => &$GLOBALS['TL_LANG']['tl_smbar']['usecss'],
            'exclude' => true,
            'inputType' => 'checkbox',
            'default' => 1,
            'eval' => ['submitOnChange' => true,    'tl_class' => 'm12'],
            'sql' => ['type' => 'string', 'length' => 1, 'fixed' => true, 'notnull' => true, 'default' => ''],
        ],
        'usejs' => [
            'label' => &$GLOBALS['TL_LANG']['tl_smbar']['usejs'],
            'exclude' => true,
            'inputType' => 'checkbox',
            'default' => 1,
            'eval' => ['tl_class' => 'm12'],
            'sql' => ['type' => 'string', 'length' => 1, 'fixed' => true, 'notnull' => true, 'default' => ''],
        ],
        'themeselect' => [
            'label' => &$GLOBALS['TL_LANG']['tl_smbar']['themeselect'],
            'exclude' => true,
            'inputType' => 'select',
            'options' => ['light', 'dark'],
            'default' => 'light',
            'eval' => ['tl_class' => 'w50'],
            'sql' => ['type' => 'string', 'length' => 255, 'notnull' => true, 'default' => ''],
        ],
    ]
];
