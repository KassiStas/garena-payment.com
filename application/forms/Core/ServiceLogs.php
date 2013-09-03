<?php

class Application_Form_Core_ServiceLogs extends Zend_Form
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

        $log_type = new Zend_Form_Element_Text('log_type');
        $log_type->setLabel('log_type');
        $log_type->addFilter('StringTrim');
        $log_type->setRequired(false);
        $log_type->setDecorators(array('ViewHelper'));
        $this->addElement($log_type);

        $gg_username = new Zend_Form_Element_Text('gg_username');
        $gg_username->setLabel('gg_username');
        $gg_username->addFilter('StringTrim');
        $gg_username->setRequired(false);
        $gg_username->setDecorators(array('ViewHelper'));
        $this->addElement($gg_username);

        $partner_id = new Zend_Form_Element_Text('partner_id');
        $partner_id->setLabel('partner_id');
        $partner_id->addFilter('StringTrim');
        $partner_id->addValidator('Int');
        $partner_id->setRequired(false);
        $partner_id->setDecorators(array('ViewHelper'));
        $this->addElement($partner_id);

        $topup_value = new Zend_Form_Element_Text('topup_value');
        $topup_value->setLabel('topup_value');
        $topup_value->addFilter('StringTrim');
        $topup_value->addValidator('Int');
        $topup_value->setRequired(false);
        $topup_value->setDecorators(array('ViewHelper'));
        $this->addElement($topup_value);

        $topup_partner_txnid = new Zend_Form_Element_Text('topup_partner_txnid');
        $topup_partner_txnid->setLabel('topup_partner_txnid');
        $topup_partner_txnid->addFilter('StringTrim');
        $topup_partner_txnid->addValidator('Int');
        $topup_partner_txnid->setRequired(false);
        $topup_partner_txnid->setDecorators(array('ViewHelper'));
        $this->addElement($topup_partner_txnid);

        $extra = new Zend_Form_Element_Text('extra');
        $extra->setLabel('extra');
        $extra->addFilter('StringTrim');
        $extra->setRequired(false);
        $extra->setDecorators(array('ViewHelper'));
        $this->addElement($extra);

        $datetime = new Zend_Form_Element_Text('datetime');
        $datetime->setLabel('datetime');
        $datetime->addFilter('StringTrim');
        $datetime->addValidator('Date');
        $datetime->setRequired(true);
        $datetime->setDecorators(array('ViewHelper'));
        $this->addElement($datetime);

        $ip_address = new Zend_Form_Element_Text('ip_address');
        $ip_address->setLabel('ip_address');
        $ip_address->addFilter('StringTrim');
        $ip_address->setRequired(false);
        $ip_address->setDecorators(array('ViewHelper'));
        $this->addElement($ip_address);

    }
}