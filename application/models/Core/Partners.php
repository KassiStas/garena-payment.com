<?php
/**
 * Model for Application_Model_Crawler_SiteLinks
 *
 * @version $Id$
 */

class Application_Model_Core_Partners extends Base_Db_Table_Abstract {


/********************************************************************
* Define table Partners
********************************************************************/
    protected $_name        = 'Partners';
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
            "id"                           => "Partners.id                    = '{{param}}'",
            "partner_code"                 => "Partners.partner_code          LIKE '%{{param}}%'",
            "partner_name"                 => "Partners.partner_name          LIKE '%{{param}}%'",
            "service_code"                 => "Partners.service_code          LIKE '%{{param}}%'",
            "contact_name"                 => "Partners.contact_name          LIKE '%{{param}}%'",
            "contact_email"                => "Partners.contact_email         LIKE '%{{param}}%'",
            "contact_phone"                => "Partners.contact_phone         LIKE '%{{param}}%'",
            "status"                       => "Partners.status                = '{{param}}'",
            "public_key"                   => "Partners.public_key            LIKE '%{{param}}%'",
            "private_key"                  => "Partners.private_key           LIKE '%{{param}}%'",
            "credit"                       => "Partners.credit                = '{{param}}'",
            "created_date"                 => "Partners.created_date          = '{{param}}'",
            "created_by"                   => "Partners.created_by            LIKE '%{{param}}%'",
            "ip_address"                   => "Partners.ip_address            LIKE '%{{param}}%'",
        );
        $this->searchFields['All'] = implode(" OR ", $this->searchFields);

        $this->sortFields = array(
            "id_Sort"                      => "Partners.id                    {{param}}",
            "partner_code_Sort"            => "Partners.partner_code          {{param}}",
            "partner_name_Sort"            => "Partners.partner_name          {{param}}",
            "service_code_Sort"            => "Partners.service_code          {{param}}",
            "contact_name_Sort"            => "Partners.contact_name          {{param}}",
            "contact_email_Sort"           => "Partners.contact_email         {{param}}",
            "contact_phone_Sort"           => "Partners.contact_phone         {{param}}",
            "status_Sort"                  => "Partners.status                {{param}}",
            "public_key_Sort"              => "Partners.public_key            {{param}}",
            "private_key_Sort"             => "Partners.private_key           {{param}}",
            "credit_Sort"                  => "Partners.credit                {{param}}",
            "created_date_Sort"            => "Partners.created_date          {{param}}",
            "created_by_Sort"              => "Partners.created_by            {{param}}",
            "ip_address_Sort"              => "Partners.ip_address            {{param}}",
        );
    }

/********************************************************************
* PUT YOUR CODE HERE
********************************************************************/


    /**
     * Insert record in table SiteLinks
     * @param array $dataSiteLink
     * @return bool
     */
    public function add($data) {
        try {
            $data['create_by'] = "";
            $data['ip_address'] = $_SERVER["REMOTE_ADDR"];
            $newRow = $this->createRow($data);
            return $newRow->save();
        } catch (Exception $exc) {
            echo $exc->getMessage();die;
            if ( in_array(APPLICATION_ENV, array('development')) ){
                echo $exc->getMessage();
                die();
            }
            return false;
        }
    }
    
    

    /**
     * Update record exist in table SiteLinks
    
     * @param array $dataSiteLink     * @return bool
     */
    public function edit($data) {
        try {

            $oldRow = $this->find($data[current($this->_primary)])->current();
            $oldRow->setFromArray($data);
            return $oldRow->save();
        } catch (Exception $exc) {
            if ( in_array(APPLICATION_ENV, array('development')) ){
                echo $exc->getMessage();
                die();
            }
            return false;
        }
    }
}