<?php

use Contao\CoreBundle\DataContainer\PaletteManipulator;
use Doctrine\DBAL\Platforms\MySqlPlatform;


$GLOBALS['TL_DCA']['tl_member']['fields']['contactpages'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_member']['contactpages'],
    'exclude' => true,
    'inputType' => 'pageTree',
    'eval' => ['fieldType' => 'checkbox', 'tl_class' => 'w50', 'multiple' => true],
    'sql' => ['type' => 'blob', 'length' => MySqlPlatform::LENGTH_LIMIT_BLOB, 'notnull' => false]
];

$GLOBALS['TL_DCA']['tl_member']['fields']['contactimage'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_member']['contactimage'],
    'exclude' => true,
    'inputType' => 'fileTree',
    'eval' => ['fieldType' => 'radio', 'files' => true, 'filesOnly' => true, 'tl_class' => 'w50', 'extensions' => \Contao\Config::get('validImageTypes')],
    'sql' => "binary(16) NULL",
    'sql' => ['type' => 'binary', 'length' => 16, 'fixed' => true, 'notnull' => false]
];

$GLOBALS['TL_DCA']['tl_member']['fields']['contactdescription'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_member']['contactdescription'],
    'exclude' => true,
    'search' => true,
    'inputType' => 'textarea',
    'eval' => ['rte' => 'tinyMCE', 'tl_class' => 'clr'],
    'sql' => ['type' => 'text', 'length' => MySqlPlatform::LENGTH_LIMIT_TEXT, 'notnull' => true]
];


PaletteManipulator::create()
    ->addLegend('contactperson_legend', 'homedir_legend', PaletteManipulator::POSITION_BEFORE)
    ->addField('contactpages', 'contactperson_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('contactimage', 'contactperson_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('contactdescription', 'contactperson_legend', PaletteManipulator::POSITION_APPEND)
    ->applyToPalette('default', 'tl_member');
