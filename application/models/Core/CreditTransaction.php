<?php
/**
 * Model for Application_Model_Crawler_SiteLinks
 *
 * @version $Id$
 */

class Application_Model_Core_CreditTransaction extends Base_Db_Table_Abstract {


/********************************************************************
* Define table CreditTransaction
********************************************************************/
    protected $_name        = 'CreditTransaction';
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
            "id"                           => "CreditTransaction.id           = '{{param}}'",
            "invoice_id"                   => "CreditTransaction.invoice_id   LIKE '%{{param}}%'",
            "partner_id"                   => "CreditTransaction.partner_id   = '{{param}}'",
            "amount"                       => "CreditTransaction.amount       = '{{param}}'",
            "real_revenue"                 => "CreditTransaction.real_revenue = '{{param}}'",
            "activator"                    => "CreditTransaction.activator    LIKE '%{{param}}%'",
            "txn_datetime"                 => "CreditTransaction.txn_datetime = '{{param}}'",
        );
        $this->searchFields['All'] = implode(" OR ", $this->searchFields);

        $this->sortFields = array(
            "id_Sort"                      => "CreditTransaction.id           {{param}}",
            "invoice_id_Sort"              => "CreditTransaction.invoice_id   {{param}}",
            "partner_id_Sort"              => "CreditTransaction.partner_id   {{param}}",
            "amount_Sort"                  => "CreditTransaction.amount       {{param}}",
            "real_revenue_Sort"            => "CreditTransaction.real_revenue {{param}}",
            "activator_Sort"               => "CreditTransaction.activator    {{param}}",
            "txn_datetime_Sort"            => "CreditTransaction.txn_datetime {{param}}",
        );
    }

/********************************************************************
* PUT YOUR CODE HERE
********************************************************************/


}