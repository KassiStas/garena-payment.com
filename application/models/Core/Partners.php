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
            "status"                       => "Partners.status                LIKE '%{{param}}%'",
            "credit"                       => "Partners.credit                LIKE '%{{param}}%'",
            "created_date"                 => "Partners.created_date          LIKE '%{{param}}%'",
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
            // generate 2048-bit RSA key
            $pkGenerate = openssl_pkey_new(array(
                'private_key_bits' => SSL_PRIVATE_KEY_BITS,
                'private_key_type' => OPENSSL_KEYTYPE_RSA
            ));
            $pkGeneratePrivate='';
            // get the private key
            openssl_pkey_export($pkGenerate,$pkGeneratePrivate); // NOTE: second argument is passed by reference
            // get the public key
            $pkGenerateDetails = openssl_pkey_get_details($pkGenerate);
            $pkGeneratePublic = $pkGenerateDetails['key'];

            $data['create_by'] = "";
            $data['public_key'] = $pkGeneratePublic;
            $data['private_key'] = $pkGeneratePrivate;
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
    
    public function getPartnerCreditTransactionStatistic(){
        //select partner_id, sum(amount), sum(real_revenue) from CreditTransaction group by partner_id;
        $sql = "
            SELECT 
              id as partner_id,
              partner_name,
              partner_code,
              (SELECT SUM(topup_value) FROM TopupTransaction as tt WHERE tt.partner_id = p.id and topup_status=1) as TopupAmount,
              (SELECT SUM(amount) FROM CreditTransaction as ct WHERE ct.partner_id = p.id) as CreditAmount
              
            FROM Partners as p            
            ";
//         $stm = $this->_db->query($sql);
        $this->_db->setFetchMode(Zend_Db::FETCH_OBJ);
        $records = $this->_db->fetchAll($sql);
//         var_dump($records);die;
        return $records;
    }
    

    public function getPartnerDetail($partnerId){
        //select partner_id, sum(amount), sum(real_revenue) from CreditTransaction group by partner_id;
        $partnerId = mysql_real_escape_string(trim($partnerId));
        $sql = "
            SELECT
              id as partner_id,
              partner_name,
              partner_code,
              contact_name,
              contact_email,
              contact_phone,
              status,              
              (SELECT SUM(topup_value) FROM TopupTransaction as tt WHERE tt.partner_id = p.id and topup_status=1) as charged,
              (SELECT SUM(amount) FROM CreditTransaction as ct WHERE ct.partner_id = p.id) as topedup
              
            FROM Partners as p where p.id = $partnerId
            ";
        //         $stm = $this->_db->query($sql);
        $this->_db->setFetchMode(Zend_Db::FETCH_OBJ);
        $record = $this->_db->fetchRow($sql);
        //         var_dump($records);die;
        return $record;
    }
}