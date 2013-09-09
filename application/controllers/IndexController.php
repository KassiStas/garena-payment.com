<?php
/**
 * Controller Index
 *
 * @author      code generate
 * @package   	KiSS
 * @version     $Id$
 * @todo remove
 */
class IndexController extends Zend_Controller_Action
{
    /**
     * (non-PHPdoc)
     * @see Zend_Controller_Action::init()
     */
    public function init () {}
    /**
     * Home page - Main Panel
     *
     */
public function indexAction() {
        $partnerModel = new Application_Model_Core_Partners();
        $records = $partnerModel->getPartnerCreditTransactionStatistic();
        $this->view->records = $records;
    }
    
    



}
