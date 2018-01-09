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
  // First, remove the tag from all who have it.
  $result = civicrm_api3('EntityTag', 'get', array(
    'tag_id' => "Multiple Recurring Payments",
    'options' => array('limit' => 0),
  ));
  foreach ($result['values'] as $entityTag) {
    civicrm_api3('EntityTag', 'delete', ['contact_id' => $entityTag['entity_id']]);
  }
  // Find those who need the tag.
  $contacts = CRM_Multiplerecurring::ContactsWithMultiple();
  // Add the "multiple recurring payments" tag to the deserving.
  foreach ($contacts as $cid) {
    $result = civicrm_api3('EntityTag', 'create', array(
      'entity_table' => "civicrm_contact",
      'entity_id' => $cid,
      'tag_id' => "Multiple Recurring Payments",
    ));
  }
  return civicrm_api3_create_success(array(), $params, 'Job', 'ProcessMultipleRecurring');
}
