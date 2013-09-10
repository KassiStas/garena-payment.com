<?php

class Base_Controller_TokenAction extends Zend_Controller_Action
{

    public function preDispatch()
    {
        $tokenModel = new Application_Model_Core_Tokens();
        $tokenKey = $this->_getParam('token');
//         die($tokenKey);
        $row = $tokenModel->getValidateRow($tokenKey);
//             var_dump($row);die;
        if ($row) {
            $row->last_request_time = Zend_Date::now()->toString('yyyy-MM-dd hh:mm:ss');
            $row->save();
//             echo "ddd";
//             die();
        } else {
            $error = new Zend_Controller_Plugin_ErrorHandler();
            $error->type = Base_Controller_Exception::EXCEPTION_PERMISSION;
            $error->request = clone ($this->getFrontController()->getRequest());
            $error->exception = new Base_Controller_Exception();
            $this->getFrontController()->getRequest()->setParam('error_handler', $error);
            $this->_forward('error','error');
        }
    }
}



