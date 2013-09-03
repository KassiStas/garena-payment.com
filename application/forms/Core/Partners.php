<?php

class Application_Form_Core_Partners extends Zend_Form
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

        $partner_code = new Zend_Form_Element_Text('partner_code');
        $partner_code->setLabel('partner_code');
        $partner_code->addFilter('StringTrim');
        $partner_code->setRequired(false);
        $partner_code->setDecorators(array('ViewHelper'));
        $this->addElement($partner_code);

        $partner_name = new Zend_Form_Element_Text('partner_name');
        $partner_name->setLabel('partner_name');
        $partner_name->addFilter('StringTrim');
        $partner_name->setRequired(true);
        $partner_name->setDecorators(array('ViewHelper'));
        $this->addElement($partner_name);

        $service_code = new Zend_Form_Element_Text('service_code');
        $service_code->setLabel('service_code');
        $service_code->addFilter('StringTrim');
        $service_code->setRequired(false);
        $service_code->setDecorators(array('ViewHelper'));
        $this->addElement($service_code);

        $contact_name = new Zend_Form_Element_Text('contact_name');
        $contact_name->setLabel('contact_name');
        $contact_name->addFilter('StringTrim');
        $contact_name->setRequired(false);
        $contact_name->setDecorators(array('ViewHelper'));
        $this->addElement($contact_name);

        $contact_email = new Zend_Form_Element_Text('contact_email');
        $contact_email->setLabel('contact_email');
        $contact_email->addFilter('StringTrim');
        $contact_email->addValidator('EmailAddress');
        $contact_email->setRequired(false);
        $contact_email->setDecorators(array('ViewHelper'));
        $this->addElement($contact_email);

        $contact_phone = new Zend_Form_Element_Text('contact_phone');
        $contact_phone->setLabel('contact_phone');
        $contact_phone->addFilter('StringTrim');
        $contact_phone->setRequired(false);
        $contact_phone->setDecorators(array('ViewHelper'));
        $this->addElement($contact_phone);

        $status = new Zend_Form_Element_Checkbox("status");
        $status->setLabel('Status');
        $status->setRequired(false);
        $status->setDecorators(array('ViewHelper'));
        $this->addElement($status);

        $public_key = new Zend_Form_Element_Textarea('public_key');
        $public_key->setLabel('public_key');
        $public_key->setRequired(false);
        $public_key->setDecorators(array('ViewHelper'));
        $this->addElement($public_key);

        $private_key = new Zend_Form_Element_Textarea('private_key');
        $private_key->setLabel('private_key');
        $private_key->setRequired(false);
        $private_key->setDecorators(array('ViewHelper'));
        $this->addElement($private_key);

        $credit = new Zend_Form_Element_Text('credit');
        $credit->setLabel('credit');
        $credit->addFilter('StringTrim');
        $credit->addValidator('Int');
        $credit->setRequired(false);
        $credit->setDecorators(array('ViewHelper'));
        $this->addElement($credit);

    }
}