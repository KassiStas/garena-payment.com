<?php

class Application_Form_Core_Tokens extends Zend_Form
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

        $key = new Zend_Form_Element_Text('Key');
        $key->setLabel('Key');
        $key->addFilter('StringTrim');
        $key->setRequired(false);
        $key->setDecorators(array('ViewHelper'));
        $this->addElement($key);

        $start_time = new Zend_Form_Element_Text('start_time');
        $start_time->setLabel('start_time');
        $start_time->addFilter('StringTrim');
        $start_time->addValidator('Date');
        $start_time->setRequired(true);
        $start_time->setDecorators(array('ViewHelper'));
        $this->addElement($start_time);

        $last_request_time = new Zend_Form_Element_Text('last_request_time');
        $last_request_time->setLabel('last_request_time');
        $last_request_time->addFilter('StringTrim');
        $last_request_time->addValidator('Date');
        $last_request_time->setRequired(true);
        $last_request_time->setDecorators(array('ViewHelper'));
        $this->addElement($last_request_time);

    }
}