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
    'br-accesspoint/3.1.3',
    array(
        // Identification
        //
        'label' => 'Datamodel: Access Point',
        'category' => 'business',

        // Setup
        //
        'dependencies' => array(
            'itop-config-mgmt/3.1.0',
            'teemip-network-mgmt-extended/3.0.0',
        ),
        'mandatory' => false,
        'visible' => true,
        'installer' => 'AccessPointInstaller',

        // Components
        //
        'datamodel' => array(),
        'webservice' => array(),
        'data.struct' => array(),
        'data.sample' => array(),

        // Documentation
        //
        'doc.manual_setup' => '',
        'doc.more_information' => '',

        // Default settings
        //
        'settings' => array(),
    )
);

// Add Installer for NetworkDeviceType: Access Point
if (!class_exists('AccessPointInstaller')) {
    /**
     * Module installation handler
     */
    class AccessPointInstaller extends ModuleInstallerAPI
    {
        public static function AfterDatabaseCreation(Config $oConfiguration, $sPreviousVersion, $sCurrentVersion)
        {
            // Create NetworkDeviceType: Access Point introduced in Version 0.1.2
            if (version_compare($sPreviousVersion, '0.1.2', '<')) {
                SetupLog::Info("|- Installing AccessPoint from '$sPreviousVersion' to '$sCurrentVersion'. The extension creates NetworkDeviceType: Access Point ...");

                if (MetaModel::IsValidClass('NetworkDeviceType')) {
                    // Create NetworkDeviceType
                    $oSearch = DBObjectSearch::FromOQL('SELECT NetworkDeviceType WHERE name = "Access Point"');
                    $oSet = new DBObjectSet($oSearch);
                    $oAccessPoint = $oSet->Fetch();

                    if ($oAccessPoint === null) {
                        try {
                            $oAccessPoint = MetaModel::NewObject('NetworkDeviceType', array(
                                'name' => 'Access Point',
                            ));
                            $oAccessPoint->DBWrite();
                            SetupLog::Info('|  |- NetworkDeviceType "Access Point" created.');
                        } catch (Exception $oException) {
                            SetupLog::Info('|  |- Could not create NetworkDeviceType. (Error: ' . $oException->getMessage() . ')');
                        }
                    } else {
                        SetupLog::Info('|  |- NetworkDeviceType "Access Point" already existing!');
                    }
                }
            }
        }
    }
};
