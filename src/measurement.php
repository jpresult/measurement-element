<?php
/**
* @package   com_zoo
* @author    G. Arends http://www.jpresult.nl
* @copyright Copyright (C) JP Result
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

/*
   Class: ElementCurrency
       The currency element class
*/
class ElementMeasurement extends Element {

    /*
       Function: edit
           Renders the edit form field.

       Returns:
           String - html
    */
    public function edit() {
        return $this->app->html->_('control.text', $this->getControlName('value'), $this->get('value', $this->config->get('default')), 'size="60" maxlength="255"');
    }

    /*
    Function: render
        Renders the element.

   Parameters:
        $params - render parameter

    Returns:
        String - html
    */
    public function render($params = array()) {
        $params = $this->app->data->create($params);
        $html = $this->get('value');
        $html .= strtolower($params->get('unit'));
        $conversion = $params->get('conversion');
        if(!empty($conversion)) {
            $html .= '<sup>'.$params->get('conversion').'</sup>';
        }
        return $html;
    }

    /*
        Function: hasValue
            Checks if the element's value is set.

       Parameters:
            $params - render parameter

        Returns:
            Boolean - true, on success
    */
    public function hasValue($params = array()) {
        $value = $this->get('value');
        return !empty($value);
    }
}