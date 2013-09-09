<?php

/**
 * Model for Application_Model_Crawler_SiteLinks
 *
 * @version $Id$
 */
class Application_Model_Core_Tokens extends Base_Db_Table_Abstract
{

    /**
     * ******************************************************************
     * Define table Tokens
     * *******************************************************************
     */
    const REQUEST_TIMEOUT_MINUTES = 5;

    protected $_name = 'Tokens';

    protected $_primary = array(
        'id'
    );

    protected $_dependentTables = array()

    ;

    protected $_referenceMap = array()

    ;

    /**
     * ******************************************************************
     * Define field search, sort
     * *******************************************************************
     */
    public $searchFields = array();

    public $sortFields = array();

    public function init()
    {
        parent::init();
        
        /* Define field to search */
        $this->searchFields = array(
            "id" => "Tokens.id                      = '{{param}}'",
            "key" => "Tokens.key                     LIKE '%{{param}}%'",
            "start_time" => "Tokens.start_time              = '{{param}}'",
            "last_request_time" => "Tokens.last_request_time       = '{{param}}'"
        );
        $this->searchFields['All'] = implode(" OR ", $this->searchFields);
        
        $this->sortFields = array(
            "id_Sort" => "Tokens.id                      {{param}}",
            "key_Sort" => "Tokens.key                     {{param}}",
            "start_time_Sort" => "Tokens.start_time              {{param}}",
            "last_request_time_Sort" => "Tokens.last_request_time       {{param}}"
        );
    }

    /**
     * ******************************************************************
     * PUT YOUR CODE HERE
     * *******************************************************************
     */
    public function getValidateRow($tokenKey)
    {
        if ($tokenKey) {
            $select = $this->select()
                ->where('`key` = ?', $tokenKey)
                ->where('TIMESTAMPDIFF(MINUTE,NOW(),last_request_time) > ?', 5);
            return $this->fetchRow($select);
        }
        return null;
    }
}