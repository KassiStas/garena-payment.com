<?php


/**
 *
 get_full_info_by_username
 get_full_info_by_uuid
 check_username_exist
 check_creditpay_exist
 get_prepaid_cardinfo
 init_topup
 execute_topup
 */
/**
 * Controller for CreditTransaction controller
 *
 * @author  Tung Ly
 * @version $Id$
 */
class PaymentServiceController extends Base_Controller_TokenAction
{
    private $gws_client;
    
    /**
     * Init model
     */
    public function init() {
        $this->_model = new Application_Model_Service_User();
        
        
        
    }

    public function getFullInfoByUsernameAction(){
//         include "GWSClient3/include.php";
        $this->gws_client->set_module('User');
        $r = $this->gws_client->get_fullinfo_by_uid(56109663);
         
        $u = $r->body;
        var_dump($u);die;
        $result = array('test' => 1);
        echo json_encode($result);die;
    
    }
    
    public function getFullInfoByUuidAction(){
        
    }
    public function checkUsernameExistAction(){
        
    }
    public function topupRepaidAction(){
        
    }
    public function topupExcuteAction(){
        
    }
}