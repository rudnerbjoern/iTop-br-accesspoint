<?php

/**
 * @copyright   Copyright (C) 2024-2025 Björn Rudner
 * @license     https://www.gnu.org/licenses/gpl-3.0.en.html
 * @version     2026-07-24
 *
 * iTop module definition file
 */

/** @disregard P1009 Undefined type SetupWebPage */
SetupWebPage::AddModule(
    __FILE__, // Path to the current file, all other file names are relative to the directory containing this file
    'br-accesspoint-bridge-for-br-landscape/3.2.2',
    array(
        // Identification
        'label' => 'Bridge - Access Point + System Landscape',
        'category' => 'business',

        // Setup
        'dependencies' => array(
            'br-accesspoint/3.2.2||br-landscape/3.2.0',
            'br-accesspoint/3.2.2',
        ),
        'mandatory' => false,
        'visible' => true,
        'auto_select' => 'SetupInfo::ModuleIsSelected("br-accesspoint") && SetupInfo::ModuleIsSelected("br-landscape")',

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
