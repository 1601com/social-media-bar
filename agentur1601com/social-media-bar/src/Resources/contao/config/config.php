<?php


// Back end module
$GLOBALS['TL_LANG']['MOD']['social_media'] = array("social media", "Verwalten Sie hier ihre social media Inhalte");


$GLOBALS['BE_MOD']['social_media']['social_media_bar'] = [
    'tables' => ['tl_smbar', 'tl_smbar_configuration'],
];

$GLOBALS['FE_MOD']['social_media'] = [
    'social_media_bar' => 'Agentur1601com\\SocialMediaBar\\Module\\SocialMediaBarModule',
];



?>