<?php

require_once 'mytestext.civix.php';

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */

CRM_Core_Resources::singleton()->addStyleFile('org.civicrm.mytestext', 'ang/css/ngDatepicker.css');
CRM_Core_Resources::singleton()->addScriptFile('org.civicrm.mytestext', 'ang/js/moment-with-locales.min.js');
CRM_Core_Resources::singleton()->addScriptFile('org.civicrm.mytestext', 'ang/js/ngDatepicker.min.js');
CRM_Core_Resources::singleton()->addScriptFile('org.civicrm.mytestext', 'ang/js/dirPagination.js');



function mytestext_civicrm_config(&$config) {
  _mytestext_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @param array $files
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function mytestext_civicrm_xmlMenu(&$files) {
  _mytestext_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function mytestext_civicrm_install() {
  _mytestext_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function mytestext_civicrm_uninstall() {
  _mytestext_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function mytestext_civicrm_enable() {
  _mytestext_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function mytestext_civicrm_disable() {
  _mytestext_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @param $op string, the type of operation being performed; 'check' or 'enqueue'
 * @param $queue CRM_Queue_Queue, (for 'enqueue') the modifiable list of pending up upgrade tasks
 *
 * @return mixed
 *   Based on op. for 'check', returns array(boolean) (TRUE if upgrades are pending)
 *                for 'enqueue', returns void
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function mytestext_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _mytestext_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function mytestext_civicrm_managed(&$entities) {
  _mytestext_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * @param array $caseTypes
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function mytestext_civicrm_caseTypes(&$caseTypes) {
  _mytestext_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function mytestext_civicrm_angularModules(&$angularModules) {
_mytestext_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function mytestext_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _mytestext_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Functions below this ship commented out. Uncomment as required.
 *

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 *
function mytestext_civicrm_preProcess($formName, &$form) {

} // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 */
 /*My custome page hook*/
function mytestext_civicrm_navigationMenu(&$menu) {
  _mytestext_civix_insert_navigation_menu($menu, NULL, array(
    'label' => ts('My Page Hook', array('domain' => 'org.civicrm.mytestext')),
    'name' => 'custome_hook',
    'url' => 'civicrm/a/#/memberships',
    'permission' => 'access CiviReport,access CiviContribute',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _mytestext_civix_navigationMenu($menu);
} // */
