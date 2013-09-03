<?php

class Application_Form_Core_CreditTransaction extends Zend_Form
{

    /**
     * @author code generate
     * @return mixed
     */
    public function __construct($option = array())
    {
        $id = new Zend_Form_Element_Hidden('id');
        $id->setDecorators(array('ViewHelper'));
        $this->addElement($id);

        $invoice_id = new Zend_Form_Element_Text('invoice_id');
        $invoice_id->setLabel('invoice_id');
        $invoice_id->addFilter('StringTrim');
        $invoice_id->setRequired(false);
        $invoice_id->setDecorators(array('ViewHelper'));
        $this->addElement($invoice_id);

        $partner_id = new Zend_Form_Element_Text('partner_id');
        $partner_id->setLabel('partner_id');
        $partner_id->addFilter('StringTrim');
        $partner_id->addValidator('Int');
        $partner_id->setRequired(false);
        $partner_id->setDecorators(array('ViewHelper'));
        $this->addElement($partner_id);

        $amount = new Zend_Form_Element_Text('amount');
        $amount->setLabel('amount');
        $amount->addFilter('StringTrim');
        $amount->addValidator('Int');
        $amount->setRequired(false);
        $amount->setDecorators(array('ViewHelper'));
        $this->addElement($amount);

        $real_revenue = new Zend_Form_Element_Text('real_revenue');
        $real_revenue->setLabel('real_revenue');
        $real_revenue->addFilter('StringTrim');
        $real_revenue->addValidator('Int');
        $real_revenue->setRequired(false);
        $real_revenue->setDecorators(array('ViewHelper'));
        $this->addElement($real_revenue);

        $activator = new Zend_Form_Element_Text('activator');
        $activator->setLabel('activator');
        $activator->addFilter('StringTrim');
        $activator->setRequired(false);
        $activator->setDecorators(array('ViewHelper'));
        $this->addElement($activator);

        $txn_datetime = new Zend_Form_Element_Text('txn_datetime');
        $txn_datetime->setLabel('txn_datetime');
        $txn_datetime->addFilter('StringTrim');
        $txn_datetime->addValidator('Date');
        $txn_datetime->setRequired(false);
        $txn_datetime->setDecorators(array('ViewHelper'));
        $this->addElement($txn_datetime);

    }
}