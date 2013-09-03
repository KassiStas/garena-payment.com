<?php
/**
 * Model for Application_Model_Crawler_SiteLinks
 *
 * @version $Id$
 */

class Application_Model_Core_GarenaCards extends Base_Db_Table_Abstract {


/********************************************************************
* Define table GarenaCards
********************************************************************/
    protected $_name        = 'GarenaCards';
    protected $_primary     = array('cardno',);

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
            "cardno"                       => "GarenaCards.cardno             = '{{param}}'",
            "password"                     => "GarenaCards.password           LIKE '%{{param}}%'",
            "value"                        => "GarenaCards.value              = '{{param}}'",
            "days"                         => "GarenaCards.days               = '{{param}}'",
            "uid"                          => "GarenaCards.uid                = '{{param}}'",
            "added_time"                   => "GarenaCards.added_time         = '{{param}}'",
            "status"                       => "GarenaCards.status             = '{{param}}'",
            "extra"                        => "GarenaCards.extra              LIKE '%{{param}}%'",
            "topup_id"                     => "GarenaCards.topup_id           = '{{param}}'",
        );
        $this->searchFields['All'] = implode(" OR ", $this->searchFields);

        $this->sortFields = array(
            "cardno_Sort"                  => "GarenaCards.cardno             {{param}}",
            "password_Sort"                => "GarenaCards.password           {{param}}",
            "value_Sort"                   => "GarenaCards.value              {{param}}",
            "days_Sort"                    => "GarenaCards.days               {{param}}",
            "uid_Sort"                     => "GarenaCards.uid                {{param}}",
            "added_time_Sort"              => "GarenaCards.added_time         {{param}}",
            "status_Sort"                  => "GarenaCards.status             {{param}}",
            "extra_Sort"                   => "GarenaCards.extra              {{param}}",
            "topup_id_Sort"                => "GarenaCards.topup_id           {{param}}",
        );
    }

/********************************************************************
* PUT YOUR CODE HERE
********************************************************************/


}