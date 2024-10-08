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
    'br-accesspoint-bridge-for-teemip-ip-management/3.1.3',
    array(
        // Identification
        'label' => 'Bridge - Access Point + TeemIP IPAM',
        'category' => 'business',

        // Setup
        'dependencies' => array(
            'br-accesspoint/3.1.3||teemip-ip-mgmt/3.0.0',
            'br-accesspoint/3.1.3',
        ),
        'mandatory' => false,
        'visible' => true,
        'auto_select' => 'SetupInfo::ModuleIsSelected("br-accesspoint") && SetupInfo::ModuleIsSelected("teemip-ip-mgmt")',

        // Components
        'datamodel' => array(),
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
