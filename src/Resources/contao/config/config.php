<?php

if (TL_MODE == "BE") {
    $GLOBALS['TL_CSS'][] = '/bundles/socialmediabar/style/be_mod_style.css';
}

if (TL_MODE == "FE") {
    $GLOBALS['TL_CSS'][] = 'bundles/socialmediabar/style.css';
    $GLOBALS['TL_JAVASCRIPT'][] = 'bundles/socialmediabar/popup.js';
}

$GLOBALS['BE_MOD']['social_media']['social_media_bar'] = [
    'tables' => ['tl_smbar', 'tl_smbar_configuration'],
    'icon' => 'bundles/socialmediabar/sm_fe_mod_icon.svg'
];

$GLOBALS['FE_MOD']['social_media'] = [
    'social_media_bar' => 'Agentur1601com\\SocialMediaBar\\Module\\SocialMediaBarModule',
];
