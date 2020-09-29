<?php

$GLOBALS['TL_DCA']['tl_smbar_configuration'] = [
    // Config
    'config' => [
        'dataContainer' => 'Table',
        'ptable' => 'tl_smbar',
        'sql' => [
            'keys' => [
                'id' => 'primary',
                'pid,invisible,sorting' => 'index'
            ]
        ]
    ],

    // List
    'list' => [
        'sorting' => [
            'mode' => 4,
            'fields' => ['sorting', 'id'],
            'headerFields' => ['title'],
            'child_record_callback' => ['tl_smbar_configuration', 'addCteType']
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
                'label' => &$GLOBALS['TL_LANG']['tl_smbar_configuration']['edit'],
                'href' => 'act=edit',
                'icon' => 'edit.gif'
            ],
            'copy' => [
                'label' => &$GLOBALS['TL_LANG']['tl_smbar_configuration']['copy'],
                'href' => 'act=copy',
                'icon' => 'copy.gif'
            ],
            'delete' => [
                'label' => &$GLOBALS['TL_LANG']['tl_smbar_configuration']['delete'],
                'href' => 'act=delete',
                'icon' => 'delete.gif',
                'attributes' => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
            ],
            'toggle' => [
                'label' => &$GLOBALS['TL_LANG']['tl_smbar_configuration']['toggle'],
                'icon' => 'visible.svg',
                'attributes' => 'onclick="Backend.getScrollOffset();return AjaxRequest.toggleVisibility(this,%s)"',
                'button_callback' => ['tl_smbar_configuration', 'toggleIcon']
            ],
            'show' => [
                'label' => &$GLOBALS['TL_LANG']['tl_smbar_configuration']['show'],
                'href' => 'act=show',
                'icon' => 'show.gif'
            ]
        ]
    ], // end of list array

    // Palettes
    'palettes' => [
        '__selector__' => ['smtypeselect'],
        'default' => '{title_legend},smtypeselect,smurl,smtarget;{icon_legend:hide},smcustomicon;{sm_visibility:hide},invisible;'
    ],
    'subpalettes' => [
        'smtypeselect_Sonstige' => 'mscsmtype',
        'smtypeselect_facebook' => 'smshare,smshareicon',
        'smtypeselect_twitter' => 'smshare,smshareicon'

    ],

    // Fields
    'fields' => [
        'id' => [
            'sql' => "int(10) unsigned NOT NULL auto_increment"
        ],
        'pid' => [
            'foreignKey' => 'tl_smbar.title',
            'sql' => "int(10) unsigned NOT NULL default 0",
            'relation' => ['type' => 'belongsTo', 'load' => 'lazy']
        ],
        'tstamp' => [
            'sql' => "int(10) unsigned NOT NULL default '0'"
        ],
        'sorting' => [
            'sql' => "int(10) unsigned NOT NULL default '0'"
        ],
        'smtypeselect' => [
            'label' => &$GLOBALS['TL_LANG']['tl_smbar_configuration']['smtypeselect'],
            'exclude' => true,
            'inputType' => 'select',
            'options' => ['facebook', 'twitter', 'instagram', 'youtube', 'linkedin', 'xing', 'pinterest', 'googlemaps', 'Sonstige'],
            //'foreignKey'              => 'tl_user.name',
            'eval' => ['submitOnChange' => true, 'mandatory' => true, 'includeBlankOption' => true, 'tl_class' => ''],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'smurl' => [
            'label' => &$GLOBALS['TL_LANG']['tl_smbar_configuration']['smURL'],
            'exclude' => true,
            'inputType' => 'text',
            'eval' => ['mandatory' => true, 'dcaPicker' => true, 'rgxp' => 'url', 'decodeEntities' => true, 'maxlength' => 255],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'mscsmtype' => [
            'label' => &$GLOBALS['TL_LANG']['tl_smbar_configuration']['mscsmtype'],
            'inputType' => 'text',
            'search' => true,
            'eval' => ['mandatory' => true, 'maxlength' => 64, 'tl_class' => ''],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'smcustomicon' => [
            'label' => &$GLOBALS['TL_LANG']['tl_smbar_configuration']['smcustomicon'],
            'exclude' => true,
            'inputType' => 'fileTree',
            'eval' => ['fieldType' => 'radio', 'files' => true, 'filesOnly' => true, 'tl_class' => 'clr', 'extensions' => 'svg,png'],
            'sql' => "binary(16) NULL"
        ],
        'smtarget' => [
            'label' => &$GLOBALS['TL_LANG']['tl_smbar_configuration']['smtarget'],
            'exclude' => true,
            'inputType' => 'checkbox',
            'default' => 1,
            'eval' => ['tl_class' => 'w50 m12'],
            'sql' => "char(1) NOT NULL default ''"
        ],
        'smshare' => [
            'label' => &$GLOBALS['TL_LANG']['tl_smbar_configuration']['smshare'],
            'exclude' => true,
            'inputType' => 'checkbox',
            'default' => 1,
            'eval' => ['tl_class' => 'w50 m12'],
            'sql' => "char(1) NOT NULL default ''"
        ],
        'smshareicon' => [
            'label' => &$GLOBALS['TL_LANG']['tl_smbar_configuration']['smshareicon'],
            'exclude' => true,
            'inputType' => 'checkbox',
            'default' => 1,
            'eval' => ['tl_class' => 'w50 m12'],
            'sql' => "char(1) NOT NULL default ''"
        ],
        'invisible' => [
            'label' => &$GLOBALS['TL_LANG']['tl_smbar_configuration']['invisible'],
            'exclude' => true,
            'filter' => true,
            'inputType' => 'checkbox',
            'sql' => "char(1) NOT NULL default ''"
        ]
    ]
];

class tl_smbar_configuration extends Backend
{
    /**
     * Return the "toggle visibility" button
     *
     * @param array $row
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
        if (strlen(Input::get('tid'))) {
            $this->toggleVisibility(Input::get('tid'), (Input::get('state') == 1), (@func_get_arg(12) ?: null));
            $this->redirect($this->getReferer());
        }

        $href .= '&amp;id=' . Input::get('id') . '&amp;tid=' . $row['id'] . '&amp;state=' . $row['invisible'];

        if ($row['invisible']) {
            $icon = 'invisible.svg';
        }

        return '<a href="' . $this->addToUrl($href) . '" title="' . StringUtil::specialchars($title) . '"' . $attributes . '>' . Image::getHtml($icon, $label, 'data-state="' . ($row['invisible'] ? 0 : 1) . '"') . '</a> ';
    }

    /**
     * Toggle the visibility of an element
     *
     * @param integer $intId
     * @param boolean $blnVisible
     * @param DataContainer $dc
     *
     * @throws Contao\CoreBundle\Exception\AccessDeniedException
     */
    public function toggleVisibility($intId, $blnVisible, DataContainer $dc = null)
    {
        // Set the ID and action
        Input::setGet('id', $intId);
        Input::setGet('act', 'toggle');

        if ($dc) {
            $dc->id = $intId; // see #8043
        }

        // Trigger the onload_callback
        if (is_array($GLOBALS['TL_DCA']['tl_smbar_configuration']['config']['onload_callback'])) {
            foreach ($GLOBALS['TL_DCA']['tl_smbar_configuration']['config']['onload_callback'] as $callback) {
                if (is_array($callback)) {
                    $this->import($callback[0]);
                    $this->{$callback[0]}->{$callback[1]}($dc);
                } elseif (is_callable($callback)) {
                    $callback($dc);
                }
            }
        }

        // Set the current record
        if ($dc) {
            $objRow = $this->Database->prepare("SELECT * FROM tl_smbar_configuration WHERE id=?")
                ->limit(1)
                ->execute($intId);

            if ($objRow->numRows) {
                $dc->activeRecord = $objRow;
            }
        }

        $objVersions = new Versions('tl_smbar_configuration', $intId);
        $objVersions->initialize();

        // Reverse the logic (elements have invisible=1)
        $blnVisible = !$blnVisible;

        // Trigger the save_callback
        if (is_array($GLOBALS['TL_DCA']['tl_smbar_configuration']['fields']['invisible']['save_callback'])) {
            foreach ($GLOBALS['TL_DCA']['tl_smbar_configuration']['fields']['invisible']['save_callback'] as $callback) {
                if (is_array($callback)) {
                    $this->import($callback[0]);
                    $blnVisible = $this->{$callback[0]}->{$callback[1]}($blnVisible, $dc);
                } elseif (is_callable($callback)) {
                    $blnVisible = $callback($blnVisible, $dc);
                }
            }
        }

        $time = time();

        // Update the database
        $this->Database->prepare("UPDATE tl_smbar_configuration SET tstamp=$time, invisible='" . ($blnVisible ? '1' : '') . "' WHERE id=?")
            ->execute($intId);

        if ($dc) {
            $dc->activeRecord->tstamp = $time;
            $dc->activeRecord->invisible = '1';
            if (!$blnVisible) {
                $dc->activeRecord->invisible = '';
            }
        }

        // Trigger the onsubmit_callback
        if (is_array($GLOBALS['TL_DCA']['tl_smbar_configuration']['config']['onsubmit_callback'])) {
            foreach ($GLOBALS['TL_DCA']['tl_smbar_configuration']['config']['onsubmit_callback'] as $callback) {
                if (is_array($callback)) {
                    $this->import($callback[0]);
                    $this->{$callback[0]}->{$callback[1]}($dc);
                } elseif (is_callable($callback)) {
                    $callback($dc);
                }
            }
        }

        $objVersions->create();
    }

    /**
     *
     * drag & drop operation callback
     *
     */

    public function addCteType($arrRow)
    {
        $key = $arrRow['invisible'] ? 'unpublished' : 'published';

        return '
<div class="' . $key . '">' . (($arrRow["smtypeselect"] === "Sonstige") ? $arrRow["mscsmtype"] : $arrRow["smtypeselect"]) . '</div>';
    }
}
