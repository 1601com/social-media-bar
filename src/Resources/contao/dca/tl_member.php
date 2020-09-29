<?php

use Contao\CoreBundle\DataContainer\PaletteManipulator;


$GLOBALS['TL_DCA']['tl_member']['fields']['contactpages'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_member']['contactpages'],
    'exclude' => true,
    'inputType' => 'pageTree',
    'eval' => ['fieldType' => 'checkbox', 'tl_class' => 'w50', 'multiple' => true],
    'sql' => 'blob NULL'
];

$GLOBALS['TL_DCA']['tl_member']['fields']['contactimage'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_member']['contactimage'],
    'exclude' => true,
    'inputType' => 'fileTree',
    'eval' => ['fieldType' => 'radio', 'files' => true, 'filesOnly' => true, 'tl_class' => 'w50', 'extensions' => \Contao\Config::get('validImageTypes')],
    'sql' => "binary(16) NULL"
];

$GLOBALS['TL_DCA']['tl_member']['fields']['contactdescription'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_member']['contactdescription'],
    'exclude' => true,
    'search' => true,
    'inputType' => 'textarea',
    'eval' => ['rte' => 'tinyMCE', 'tl_class' => 'clr'],
    'sql' => 'text NOT NULL'
];


PaletteManipulator::create()
    ->addLegend('contactperson_legend', 'homedir_legend', PaletteManipulator::POSITION_BEFORE)
    ->addField('contactpages', 'contactperson_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('contactimage', 'contactperson_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('contactdescription', 'contactperson_legend', PaletteManipulator::POSITION_APPEND)
    ->applyToPalette('default', 'tl_member');