<?php


// Back end module
$GLOBALS['TL_LANG']['MOD']['social_media'] = ["Social Media", "Verwalten Sie hier ihre social media Inhalte."];
$GLOBALS['TL_LANG']['MOD']['social_media_bar'] = ["Social Media Bar", "Legen Sie hier Ihre Social Media Bars an."];
$GLOBALS['TL_LANG']['FMD']['social_media'] = ["Social Media"];
$GLOBALS['TL_LANG']['FMD']['social_media_bar'] = ["Social Media Bar"];


$GLOBALS['BE_MOD']['social_media']['social_media_bar'] = [
    'tables' => ['tl_smbar', 'tl_smbar_configuration'],
];

$GLOBALS['FE_MOD']['social_media'] = [
    'social_media_bar' => 'Agentur1601com\\SocialMediaBar\\Module\\SocialMediaBarModule',
];



?>