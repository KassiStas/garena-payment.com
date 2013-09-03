<?php
/**
 * Model for Application_Model_Crawler_SiteLinks
 *
 * @version $Id$
 */

class Application_Model_Core_TopupTransaction extends Base_Db_Table_Abstract {


/********************************************************************
* Define table TopupTransaction
********************************************************************/
    protected $_name        = 'TopupTransaction';
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
            "id"                           => "TopupTransaction.id            = '{{param}}'",
            "partner_id"                   => "TopupTransaction.partner_id    = '{{param}}'",
            "gg_uid"                       => "TopupTransaction.gg_uid        = '{{param}}'",
            "gg_username"                  => "TopupTransaction.gg_username   LIKE '%{{param}}%'",
            "topup_type"                   => "TopupTransaction.topup_type    LIKE '%{{param}}%'",
            "topup_value"                  => "TopupTransaction.topup_value   = '{{param}}'",
            "topup_gg_cardno"              => "TopupTransaction.topup_gg_cardno LIKE '%{{param}}%'",
            "topup_partner_txnid"          => "TopupTransaction.topup_partner_txnid = '{{param}}'",
            "topup_datetime"               => "TopupTransaction.topup_datetime = '{{param}}'",
            "topup_status"                 => "TopupTransaction.topup_status  = '{{param}}'",
            "topup_response"               => "TopupTransaction.topup_response LIKE '%{{param}}%'",
            "ip_address"                   => "TopupTransaction.ip_address    LIKE '%{{param}}%'",
        );
        $this->searchFields['All'] = implode(" OR ", $this->searchFields);

        $this->sortFields = array(
            "id_Sort"                      => "TopupTransaction.id            {{param}}",
            "partner_id_Sort"              => "TopupTransaction.partner_id    {{param}}",
            "gg_uid_Sort"                  => "TopupTransaction.gg_uid        {{param}}",
            "gg_username_Sort"             => "TopupTransaction.gg_username   {{param}}",
            "topup_type_Sort"              => "TopupTransaction.topup_type    {{param}}",
            "topup_value_Sort"             => "TopupTransaction.topup_value   {{param}}",
            "topup_gg_cardno_Sort"         => "TopupTransaction.topup_gg_cardno {{param}}",
            "topup_partner_txnid_Sort"     => "TopupTransaction.topup_partner_txnid {{param}}",
            "topup_datetime_Sort"          => "TopupTransaction.topup_datetime {{param}}",
            "topup_status_Sort"            => "TopupTransaction.topup_status  {{param}}",
            "topup_response_Sort"          => "TopupTransaction.topup_response {{param}}",
            "ip_address_Sort"              => "TopupTransaction.ip_address    {{param}}",
        );
    }

/********************************************************************
* PUT YOUR CODE HERE
********************************************************************/


}