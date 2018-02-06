<?php
/*-------------------------------------------------------+
| SYSTOPIA Custom Mail Header Extension                  |
| Copyright (C) 2017 SYSTOPIA                            |
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
 * Form controller class
 *
 * @see https://wiki.civicrm.org/confluence/display/CRMDOC/QuickForm+Reference
 */
class CRM_Custommailheader_Form_Settings extends CRM_Core_Form {
  public function buildQuickForm() {

    // add form elements
    $this->add(
      'text',
      'extra_mail_header',
      E::ts('Extra Mail Header'),
      array("class" => "huge"),
      FALSE
    );
    $this->addButtons(array(
      array(
        'type' => 'submit',
        'name' => E::ts('Submit'),
        'isDefault' => TRUE,
      ),
    ));

    // export form elements
    parent::buildQuickForm();
  }

  /**
   * set the default (=current) values in the form
   */
  public function setDefaultValues() {
    $config = CRM_Custommailheader_Config::singleton();
    return $config->getSettings();
  }

  /**
   * Post process input values and save them to DB
   */
  public function postProcess() {
    $config = CRM_Custommailheader_Config::singleton();
    $values = $this->exportValues();
    $config->setSettings($values);
    parent::postProcess();
  }

}
