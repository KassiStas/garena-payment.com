<?php


/**
 * Controller for TopupTransaction controller
 *
 * @author  Tung Ly
 * @version $Id$
 */
class TopupTransactionController extends Zend_Controller_Action
{
    /**
     * Init model
     */
    public function init() {
        $this->_model = new Application_Model_Core_TopupTransaction();
    }
    /**
    * Function show all Sites
    */
    public function indexAction() {
        $this->_helper->redirector('show-topup-transaction');
    }    
    
   /**
    * Function show all TopupTransaction
    * @return list TopupTransaction
    * @author 
    */
    public function showTopupTransactionAction() {
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
    * Add record TopupTransaction
    * @param array $formData
    * @return
    * @author 
    */
    public function addTopupTransactionAction() {
        $form = new Application_Form_Core_TopupTransaction();

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
    * Update record TopupTransaction.
    * @param array $formData
    * @return
    * @author 
    */
    public function updateTopupTransactionAction() {
        
        /* Check valid data */
        if(null == $id = $this->_request->getParam('id',null)){
            $this->_helper->redirector('show-topup-transaction');
        }

        $row = $this->_model->find($id)->current();
        if(!$row) {
            $this->_helper->redirector('show-topup-transaction');
        }
    
        $form = new Application_Form_Core_TopupTransaction();

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
    * Delete record TopupTransaction.
    * @param $id
    * @return
    * @author 
    */
    public function deleteTopupTransactionAction(){
        /* Check valid data */
        if(null == $id = $this->_request->getParam('id',null)){
            $this->_helper->redirector('show-topup-transaction');
        }

        $row = $this->_model->find($id)->current();
        if($row) {
            $row->delete();
        }
        $this->_helper->redirector('show-topup-transaction');
    }

    /**
     * Function show all TopupTransaction
     * @return list TopupTransaction
     * @author
     */
    public function ajaxShowPartnerTopupTransactionAction() {
        $this->_helper->layout->disableLayout();
        if(null == $partnerId = $this->_request->getParam('partnerId',null)){
            die('Error');
        }
        $groupBy = $this->_getParam('groupBy', 'year');
        
        $partnerTopupTransactions = $this->_model->getPartnerTopupTransactions($partnerId, $groupBy);
//         var_dump($partnerTopupTransactions);die;
        
        $this->view->data = $partnerTopupTransactions;
        $this->view->groupBy = $groupBy;
    }
    
    /**
    * Function show all TopupTransaction
    * @return list TopupTransaction
    * @author 
    */
    public function ajaxShowTopupTransactionAction() {
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
    * Add record TopupTransaction
    * @param array $formData
    * @author 
    */
    public function ajaxAddTopupTransactionAction() {
    
        $this->_helper->layout->disableLayout();
        
        $form = new Application_Form_Core_TopupTransaction();

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
    * Update record TopupTransaction
    * @param array $formData
    * @author 
    */
    public function ajaxUpdateTopupTransactionAction() {
    
        $this->_helper->layout->disableLayout();
        
        /* Check valid data */
        if(null == $id = $this->_request->getParam('id',null)){
            die('0');
        }

        $row = $this->_model->find($id)->current();
        if(!$row) {
            die('0');
        }
    
        $form = new Application_Form_Core_TopupTransaction();

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
    * Delete record TopupTransaction.
    * @param $id
    * @author 
    */
    public function ajaxDeleteTopupTransactionAction(){
        
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