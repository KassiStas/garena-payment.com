<?php
/**
 * Model for Application_Model_Crawler_SiteLinks
 *
 * @version $Id$
 */

class Application_Model_Core_ServiceLogs extends Base_Db_Table_Abstract {


/********************************************************************
* Define table ServiceLogs
********************************************************************/
    protected $_name        = 'ServiceLogs';
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
            "id"                           => "ServiceLogs.id                 = '{{param}}'",
            "log_type"                     => "ServiceLogs.log_type           LIKE '%{{param}}%'",
            "gg_username"                  => "ServiceLogs.gg_username        LIKE '%{{param}}%'",
            "partner_id"                   => "ServiceLogs.partner_id         = '{{param}}'",
            "topup_value"                  => "ServiceLogs.topup_value        = '{{param}}'",
            "topup_partner_txnid"          => "ServiceLogs.topup_partner_txnid = '{{param}}'",
            "extra"                        => "ServiceLogs.extra              LIKE '%{{param}}%'",
            "datetime"                     => "ServiceLogs.datetime           = '{{param}}'",
            "ip_address"                   => "ServiceLogs.ip_address         LIKE '%{{param}}%'",
        );
        $this->searchFields['All'] = implode(" OR ", $this->searchFields);

        $this->sortFields = array(
            "id_Sort"                      => "ServiceLogs.id                 {{param}}",
            "log_type_Sort"                => "ServiceLogs.log_type           {{param}}",
            "gg_username_Sort"             => "ServiceLogs.gg_username        {{param}}",
            "partner_id_Sort"              => "ServiceLogs.partner_id         {{param}}",
            "topup_value_Sort"             => "ServiceLogs.topup_value        {{param}}",
            "topup_partner_txnid_Sort"     => "ServiceLogs.topup_partner_txnid {{param}}",
            "extra_Sort"                   => "ServiceLogs.extra              {{param}}",
            "datetime_Sort"                => "ServiceLogs.datetime           {{param}}",
            "ip_address_Sort"              => "ServiceLogs.ip_address         {{param}}",
        );
    }

/********************************************************************
* PUT YOUR CODE HERE
********************************************************************/


}