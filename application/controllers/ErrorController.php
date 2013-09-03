<?php

class ErrorController extends Zend_Controller_Action
{
    public function init() {

    }
    
    public function errorAction()
    {
        $errors = $this->_getParam('error_handler');

        if (!$errors) {
            $this->view->message = 'You have reached the error page';
            return;
        }

        switch ($errors->type) {
            case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ROUTE:
            case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_CONTROLLER:
            case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ACTION:
//                if(APPLICATION_ENV == 'production'){
                if(APPLICATION_ENV == 'production'){
                    $this->_forward('page-not-found');
                    return;
                }
                // 404 error -- controller or action not found
                $this->getResponse()->setHttpResponseCode(404);
                $this->view->message = PAGE_NOT_FOUND;
                break;
            default:
                if(APPLICATION_ENV == 'production'){
                    $this->_forward('app-error');
                    return;
                }
                // application error
                $this->getResponse()->setHttpResponseCode(500);
                $this->view->message = APPLICATION_ERROR;
                break;
        }

        // Log exception, if logger available
        if ($log = $this->getLog()) {
            $log->crit($this->view->message, $errors->exception);
        }

        // conditionally display exceptions
        if ($this->getInvokeArg('displayExceptions') == true) {
            $this->view->exception = $errors->exception;
        }

        $this->view->request   = $errors->request;
    }

    public function pageNotFoundAction(){
        
    }
    
    public function appErrorAction(){
        
    }
    
    public function getLog()
    {
        $bootstrap = $this->getInvokeArg('bootstrap');
        if (!$bootstrap->hasResource('Log')) {
            return false;
        }
        $log = $bootstrap->getResource('Log');
        return $log;
    }


}

