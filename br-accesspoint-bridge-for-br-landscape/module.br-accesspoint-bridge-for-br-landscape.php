<?php

/**
 * @copyright   Copyright (C) 2024 Björn Rudner
 * @license     https://www.gnu.org/licenses/gpl-3.0.en.html
 * @version     2024-09-12
 *
 * iTop module definition file
 */

SetupWebPage::AddModule(
    __FILE__, // Path to the current file, all other file names are relative to the directory containing this file
    'br-accesspoint-bridge-for-br-landscape/2.7.3',
    array(
        // Identification
        'label' => 'Bridge - Access Point + System Landscape',
        'category' => 'business',

        // Setup
        'dependencies' => array(
            'br-accesspoint/2.7.3||br-landscape/1.1.0',
            'br-accesspoint/2.7.3',
        ),
        'mandatory' => false,
        'visible' => true,
        'auto_select' => 'SetupInfo::ModuleIsSelected("br-accesspoint") && SetupInfo::ModuleIsSelected("br-landscape")',

        // Components
        'datamodel' => array(
            'model.br-accesspoint-bridge-for-br-landscape.php',
        ),
        'webservice' => array(),
        'dictionary' => array(),
        'data.struct' => array(),
        'data.sample' => array(),

        // Documentation
        'doc.manual_setup' => '',
        'doc.more_information' => '',

        // Default settings
        'settings' => array(),
    )
);
