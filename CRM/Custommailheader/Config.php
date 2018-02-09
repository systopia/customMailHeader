<?php
/*-------------------------------------------------------+
| SYSTOPIA bPK Extension                                 |
| Copyright (C) 2018 SYSTOPIA                            |
| Author: P. Batroff (batroff@systopia.de)               |
+--------------------------------------------------------+
| This program is released as free software under the    |
| Affero GPL license. You can redistribute it and/or     |
| modify it under the terms of this license which you    |
| can read by viewing the included agpl.txt or online    |
| at www.gnu.org/licenses/agpl.html. Removal of this     |
| copyright header is strictly prohibited without        |
| written permission from the original author(s).        |
+--------------------------------------------------------*/

use CRM_Custommailheader_ExtensionUtil as E;

/**
 * Configurations
 */
class CRM_Custommailheader_Config {

  private static $singleton = NULL;

  /**
   * get the config instance
   */
  public static function singleton() {
    if (self::$singleton === NULL) {
      self::$singleton = new CRM_Custommailheader_Config();
    }
    return self::$singleton;
  }

  /**
   * get bPK settings
   *
   * @return array
   */
  public function getSettings() {
    $settings = CRM_Core_BAO_Setting::getItem('de.systopia.customMailHeader', 'custommailheader_settings');
    return $settings;
  }

  /**
   * set bPK settings
   *
   * @param $settings array
   */
  public function setSettings($settings) {
    CRM_Core_BAO_Setting::setItem($settings, 'de.systopia.custommailheader', 'custommailheader_settings');
  }
}