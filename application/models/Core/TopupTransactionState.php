<?php
/**
 * Model for Application_Model_Crawler_SiteLinks
 *
 * @version $Id$
 */

class Application_Model_Core_TopupTransactionState extends Base_Db_Table_Abstract {


/********************************************************************
* Define table TopupTransactionState
********************************************************************/
    protected $_name        = 'TopupTransactionState';
    protected $_primary     = array('id',);

    protected $_dependentTables = array(

    );

    protected $_referenceMap    = array(

    );


/********************************************************************
* Define field search, sort
********************************************************************/
    public $searchFields = array();
    public $sortFields   = array();

    public function init() {
        parent::init();

         /* Define field to search */
        $this->searchFields = array(
            "id"                           => "TopupTransactionState.id       = '{{param}}'",
            "partner_id"                   => "TopupTransactionState.partner_id = '{{param}}'",
            "gg_username"                  => "TopupTransactionState.gg_username LIKE '%{{param}}%'",
            "topup_type"                   => "TopupTransactionState.topup_type LIKE '%{{param}}%'",
            "topup_value"                  => "TopupTransactionState.topup_value = '{{param}}'",
            "topup_partner_txnid"          => "TopupTransactionState.topup_partner_txnid = '{{param}}'",
            "topup_datetime"               => "TopupTransactionState.topup_datetime = '{{param}}'",
            "topup_status"                 => "TopupTransactionState.topup_status = '{{param}}'",
            "topup_response"               => "TopupTransactionState.topup_response LIKE '%{{param}}%'",
            "ip_address"                   => "TopupTransactionState.ip_address LIKE '%{{param}}%'",
        );
        $this->searchFields['All'] = implode(" OR ", $this->searchFields);

        $this->sortFields = array(
            "id_Sort"                      => "TopupTransactionState.id       {{param}}",
            "partner_id_Sort"              => "TopupTransactionState.partner_id {{param}}",
            "gg_username_Sort"             => "TopupTransactionState.gg_username {{param}}",
            "topup_type_Sort"              => "TopupTransactionState.topup_type {{param}}",
            "topup_value_Sort"             => "TopupTransactionState.topup_value {{param}}",
            "topup_partner_txnid_Sort"     => "TopupTransactionState.topup_partner_txnid {{param}}",
            "topup_datetime_Sort"          => "TopupTransactionState.topup_datetime {{param}}",
            "topup_status_Sort"            => "TopupTransactionState.topup_status {{param}}",
            "topup_response_Sort"          => "TopupTransactionState.topup_response {{param}}",
            "ip_address_Sort"              => "TopupTransactionState.ip_address {{param}}",
        );
    }

/********************************************************************
* PUT YOUR CODE HERE
********************************************************************/


}