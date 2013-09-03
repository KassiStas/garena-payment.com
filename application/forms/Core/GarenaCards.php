<?php

class Application_Form_Core_GarenaCards extends Zend_Form
{

    /**
     * @author code generate
     * @return mixed
     */
    public function __construct($option = array())
    {
        $cardno = new Zend_Form_Element_Hidden('cardno');
        $cardno->setDecorators(array('ViewHelper'));
        $this->addElement($cardno);

        $password = new Zend_Form_Element_Text('password');
        $password->setLabel('password');
        $password->addFilter('StringTrim');
        $password->setRequired(false);
        $password->setDecorators(array('ViewHelper'));
        $this->addElement($password);

        $value = new Zend_Form_Element_Text('value');
        $value->setLabel('value');
        $value->addFilter('StringTrim');
        $value->addValidator('Int');
        $value->setRequired(false);
        $value->setDecorators(array('ViewHelper'));
        $this->addElement($value);

        $days = new Zend_Form_Element_Text('days');
        $days->setLabel('days');
        $days->addFilter('StringTrim');
        $days->addValidator('Int');
        $days->setRequired(false);
        $days->setDecorators(array('ViewHelper'));
        $this->addElement($days);

        $uid = new Zend_Form_Element_Text('uid');
        $uid->setLabel('uid');
        $uid->addFilter('StringTrim');
        $uid->addValidator('Int');
        $uid->setRequired(false);
        $uid->setDecorators(array('ViewHelper'));
        $this->addElement($uid);

        $added_time = new Zend_Form_Element_Text('added_time');
        $added_time->setLabel('added_time');
        $added_time->addFilter('StringTrim');
        $added_time->addValidator('Date');
        $added_time->setRequired(true);
        $added_time->setDecorators(array('ViewHelper'));
        $this->addElement($added_time);

        $status = new Zend_Form_Element_Text('status');
        $status->setLabel('status');
        $status->addFilter('StringTrim');
        $status->addValidator('Int');
        $status->setRequired(false);
        $status->setDecorators(array('ViewHelper'));
        $this->addElement($status);

        $extra = new Zend_Form_Element_Text('extra');
        $extra->setLabel('extra');
        $extra->addFilter('StringTrim');
        $extra->setRequired(false);
        $extra->setDecorators(array('ViewHelper'));
        $this->addElement($extra);

        $topup_id = new Zend_Form_Element_Text('topup_id');
        $topup_id->setLabel('topup_id');
        $topup_id->addFilter('StringTrim');
        $topup_id->addValidator('Int');
        $topup_id->setRequired(false);
        $topup_id->setDecorators(array('ViewHelper'));
        $this->addElement($topup_id);

    }
}