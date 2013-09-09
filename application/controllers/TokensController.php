<?php


/**
 * Controller for Tokens controller
 *
 * @author  kissconcept
 * @version $Id$
 */
class TokensController extends Zend_Controller_Action
{
    /**
     * Init model
     */
    public function init() {
        $this->_model = new Application_Model_Core_Tokens();
    }
    /**
    * Function show all Sites
    */
    public function indexAction() {
        $this->_helper->redirector('show-tokens');
    }    
    
   /**
    * Function show all Tokens
    * @return list Tokens
    * @author 
    */
    public function showTokensAction() {
        /*Get parameters filter*/
        $params            = $this->_getAllParams();
        $params['page']    = $this->_getParam('page',1);
        $params['perpage'] = $this->_getParam('perpage',NUMBER_OF_ITEM_PER_PAGE);
        
        /*Get all data*/
        $paginator = Zend_Paginator::factory($this->_model->getQuerySelectAll($params));
        $paginator->setCurrentPageNumber($params['page']);
        $paginator->setItemCountPerPage($params['perpage']);

        /*Assign varible to view*/
        $this->view->paginator = $paginator;
        $this->view->assign($params);
    }
    
    /**
    * Add record Tokens
    * @param array $formData
    * @return
    * @author 
    */
    public function addTokensAction() {
        $form = new Application_Form_Core_Tokens();

        /* Proccess data post*/
        if($this->_request->isPost()) {
            $this->view->isSaved = false;
            $formData = $this->_request->getPost();
            if($form->isValid($formData)) {
                if($this->_model->add($formData)){
                    $this->view->isSaved = true;
                }
            }
        }
        $this->view->form = $form;
    }
    
    /**
    * Update record Tokens.
    * @param array $formData
    * @return
    * @author 
    */
    public function updateTokensAction() {
        
        /* Check valid data */
        if(null == $id = $this->_request->getParam('id',null)){
            $this->_helper->redirector('show-tokens');
        }

        $row = $this->_model->find($id)->current();
        if(!$row) {
            $this->_helper->redirector('show-tokens');
        }
    
        $form = new Application_Form_Core_Tokens();

        /* Proccess data post*/
        if($this->_request->isPost()) {
            $this->view->isSaved = false;
            $formData = $this->_request->getPost();
            if($form->isValid($formData)) {
                if($this->_model->edit($form->getValues())){
                    $this->view->isSaved = true;
                }
            }
        }
        $form->populate($row->toArray());
        $this->view->form = $form;
    }
    
    /**
    * Delete record Tokens.
    * @param $id
    * @return
    * @author 
    */
    public function deleteTokensAction(){
        /* Check valid data */
        if(null == $id = $this->_request->getParam('id',null)){
            $this->_helper->redirector('show-tokens');
        }

        $row = $this->_model->find($id)->current();
        if($row) {
            $row->delete();
        }
        $this->_helper->redirector('show-tokens');
    }
    
    /**
    * Function show all Tokens
    * @return list Tokens
    * @author 
    */
    public function ajaxShowTokensAction() {
        $this->_helper->layout->disableLayout();
        
        /*Get parameters filter*/
        $params            = $this->_getAllParams();
        $params['page']    = $this->_getParam('page',1);
        $params['perpage'] = $this->_getParam('perpage',20);
        
        /*Get all data*/
        $paginator = Zend_Paginator::factory($this->_model->getQuerySelectAll($params));
        $paginator->setCurrentPageNumber($params['page']);
        $paginator->setItemCountPerPage($params['perpage']);

        /*Assign varible to view*/
        $this->view->paginator = $paginator;
        $this->view->assign($params);
    }
    
   /**
    * Add record Tokens
    * @param array $formData
    * @author 
    */
    public function ajaxAddTokensAction() {
    
        $this->_helper->layout->disableLayout();
        
        $form = new Application_Form_Core_Tokens();

        /* Proccess data post*/
        if($this->_request->isPost()) {
            $formData = $this->_request->getPost();
            if($form->isValid($formData)) {
                if($this->_model->add($formData)){
                    die('1');
                }
            }
        }
        $form->populate($form->getValues());
        $this->view->form = $form;
    }
    
   /**
    * Update record Tokens
    * @param array $formData
    * @author 
    */
    public function ajaxUpdateTokensAction() {
    
        $this->_helper->layout->disableLayout();
        
        /* Check valid data */
        if(null == $id = $this->_request->getParam('id',null)){
            die('0');
        }

        $row = $this->_model->find($id)->current();
        if(!$row) {
            die('0');
        }
    
        $form = new Application_Form_Core_Tokens();

        /* Proccess data post*/
        if($this->_request->isPost()) {
            $formData = $this->_request->getPost();
            $formData['id'] = $id;
            if($form->isValid($formData)) {
                if($this->_model->edit($form->getValues())){
                    die('1');
                }
            }
        }
        $form->populate($form->getValues());
        $this->view->form = $form;
    }
    
    /**
    * Delete record Tokens.
    * @param $id
    * @author 
    */
    public function ajaxDeleteTokensAction(){
        
        /* Check valid data */
        if(null == $id = $this->_request->getParam('id',null)){
            die('0');
        }

        $row = $this->_model->find($id)->current();
        if($row) {
            if($row->delete()){
                die('1');
            }
        }
        die('0');
    }
}