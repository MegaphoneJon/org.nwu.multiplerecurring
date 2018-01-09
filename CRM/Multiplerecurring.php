<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Util
 *
 * @author jon
 */

/**
 * Returns an array of contact IDs for contacts with multiple recurring payments.
 * @return array Contact IDs with multiple recurring payments.
 */
class CRM_Multiplerecurring {
  public static function ContactsWithMultiple() {
    $query = '
    SELECT cc.id 
    FROM civicrm_contribution_recur ccr 
    JOIN civicrm_contact cc ON ccr.contact_id = cc.id 
    WHERE contribution_status_id IN (2, 5) 
    GROUP BY contact_id 
    HAVING count(contact_id) > 1';
    $dao = CRM_Core_DAO::executeQuery($query);
    while ($dao->fetch()) {
      $result[] = $dao->id;
    }
    CRM_Core_Error::debug_var('result', $result);
    return $result;
  }

}
