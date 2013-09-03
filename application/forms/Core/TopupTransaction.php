<?php

class Application_Form_Core_TopupTransaction extends Zend_Form
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

        $partner_id = new Zend_Form_Element_Text('partner_id');
        $partner_id->setLabel('partner_id');
        $partner_id->addFilter('StringTrim');
        $partner_id->addValidator('Int');
        $partner_id->setRequired(false);
        $partner_id->setDecorators(array('ViewHelper'));
        $this->addElement($partner_id);

        $gg_uid = new Zend_Form_Element_Text('gg_uid');
        $gg_uid->setLabel('gg_uid');
        $gg_uid->addFilter('StringTrim');
        $gg_uid->addValidator('Int');
        $gg_uid->setRequired(false);
        $gg_uid->setDecorators(array('ViewHelper'));
        $this->addElement($gg_uid);

        $gg_username = new Zend_Form_Element_Text('gg_username');
        $gg_username->setLabel('gg_username');
        $gg_username->addFilter('StringTrim');
        $gg_username->setRequired(false);
        $gg_username->setDecorators(array('ViewHelper'));
        $this->addElement($gg_username);

        $topup_type = new Zend_Form_Element_Text('topup_type');
        $topup_type->setLabel('topup_type');
        $topup_type->addFilter('StringTrim');
        $topup_type->setRequired(false);
        $topup_type->setDecorators(array('ViewHelper'));
        $this->addElement($topup_type);

        $topup_value = new Zend_Form_Element_Text('topup_value');
        $topup_value->setLabel('topup_value');
        $topup_value->addFilter('StringTrim');
        $topup_value->addValidator('Int');
        $topup_value->setRequired(false);
        $topup_value->setDecorators(array('ViewHelper'));
        $this->addElement($topup_value);

        $topup_gg_cardno = new Zend_Form_Element_Text('topup_gg_cardno');
        $topup_gg_cardno->setLabel('topup_gg_cardno');
        $topup_gg_cardno->addFilter('StringTrim');
        $topup_gg_cardno->setRequired(false);
        $topup_gg_cardno->setDecorators(array('ViewHelper'));
        $this->addElement($topup_gg_cardno);

        $topup_partner_txnid = new Zend_Form_Element_Text('topup_partner_txnid');
        $topup_partner_txnid->setLabel('topup_partner_txnid');
        $topup_partner_txnid->addFilter('StringTrim');
        $topup_partner_txnid->addValidator('Int');
        $topup_partner_txnid->setRequired(false);
        $topup_partner_txnid->setDecorators(array('ViewHelper'));
        $this->addElement($topup_partner_txnid);

        $topup_datetime = new Zend_Form_Element_Text('topup_datetime');
        $topup_datetime->setLabel('topup_datetime');
        $topup_datetime->addFilter('StringTrim');
        $topup_datetime->addValidator('Date');
        $topup_datetime->setRequired(true);
        $topup_datetime->setDecorators(array('ViewHelper'));
        $this->addElement($topup_datetime);

        $topup_status = new Zend_Form_Element_Text('topup_status');
        $topup_status->setLabel('topup_status');
        $topup_status->addFilter('StringTrim');
        $topup_status->addValidator('Int');
        $topup_status->setRequired(false);
        $topup_status->setDecorators(array('ViewHelper'));
        $this->addElement($topup_status);

        $topup_response = new Zend_Form_Element_Text('topup_response');
        $topup_response->setLabel('topup_response');
        $topup_response->addFilter('StringTrim');
        $topup_response->setRequired(false);
        $topup_response->setDecorators(array('ViewHelper'));
        $this->addElement($topup_response);

        $ip_address = new Zend_Form_Element_Text('ip_address');
        $ip_address->setLabel('ip_address');
        $ip_address->addFilter('StringTrim');
        $ip_address->setRequired(false);
        $ip_address->setDecorators(array('ViewHelper'));
        $this->addElement($ip_address);

    }
}