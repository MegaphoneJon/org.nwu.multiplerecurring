<?php
use CRM_Multiplerecurring_ExtensionUtil as E;

/**
 * Job.Processmultiplerecurring API specification (optional)
 * This is used for documentation and validation.
 *
 * @param array $spec description of fields supported by this API call
 * @return void
 * @see http://wiki.civicrm.org/confluence/display/CRMDOC/API+Architecture+Standards
 */
function _civicrm_api3_job_Processmultiplerecurring_spec(&$spec) {
}

/**
 * Job.Processmultiplerecurring API
 *
 * @param array $params
 * @return array API result descriptor
 * @see civicrm_api3_create_success
 * @see civicrm_api3_create_error
 * @throws API_Exception
 */
function civicrm_api3_job_Processmultiplerecurring($params) {
  $contacts = CRM_Multiplerecurring::ContactsWithMultiple();
  return civicrm_api3_create_success(array(), $params, 'Job', 'ProcessMultipleRecurring');
  foreach ($contacts as $cid) {

}
