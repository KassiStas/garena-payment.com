<?php

class Base_Controller_TokenAction extends Zend_Controller_Action
{

    public function preDispatch()
    {
        $tokenModel = new Application_Model_Core_Tokens();
        $tokenKey = $this->_getParam('token');
        if ($row = $tokenModel->getValidateRow($tokenKey)) {
            $row->last_request_time = Zend_Date::now();
            $row->save();
            echo "ddd";
            die();
        } else {
            $error = new Zend_Controller_Plugin_ErrorHandler();
            $error->type = Zend_Controller_Plugin_ErrorHandler::EXCEPTION_OTHER;
            $error->request = clone ($request);
            $error->exception = $e;
            $request->setParam('error_handler', $error);
        }
    }
}



