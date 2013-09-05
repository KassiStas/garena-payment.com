<?php
class Application_Form_Validate_Datetime extends Zend_Validate_Abstract{
    const DATETIME_FORMAT_FAIL = 'Date time format fail';
    const DATETIME_FAIL = 'Date time fail';


    protected $_messageTemplates = array(
        self::DATETIME_FORMAT_FAIL=> self::DATETIME_FORMAT_FAIL,
        self::DATETIME_FAIL=> self::DATETIME_FAIL
    );

    public function isValid($value)
    {
        $valid = true;
        $this->_setValue($value);
        try{
//             echo $value;die;
            $date = new Zend_Date($value);
//             echo $date;die;
            $now = new Zend_Date();
            if($date->getYear() > $now->getYear() ){
                $valid = false;
                $this->_error(self::DATETIME_FAIL);
            }
        }catch(Exception $e){
            $this->_error(self::DATETIME_FORMAT_FAIL);
            $valid = false;
        }
        return $valid;
    }
}
