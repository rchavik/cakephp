<?php
/**
 * Time Helper class file.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Helper
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('CakeTime', 'Utility');
App::uses('Multibyte', 'I18n');
App::uses('AppHelper', 'View/Helper');

/**
 * Time Helper class for easy use of time data.
 *
 * Manipulation of time data.
 *
 * @package       Cake.View.Helper
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/time.html
 */
class TimeHelper extends AppHelper {

/**
 * CakeTime instance
 */
	protected $_CakeTime = null;

/**
 * Constructor
 *
 * @param View $View the view object the helper is attached to.
 * @param array $settings Settings array Settings array
 */
	public function __construct(View $View, $settings = array()) {
		parent::__construct($View, $settings);
		$this->_CakeTime = new CakeTime($settings);
	}

/**
 * Magic accessor for deprecated attributes.
 *
 * @param string $name Name of the attribute to set.
 * @param string $value Value of the attribute to set.
 * @return mixed
 */
	public function __set($name, $value) {
		switch ($name) {
			case 'niceFormat':
				$this->_CakeTime->{$name} = $value; break;
			default:
				$this->{$name} = $value; break;
		}
	}

/**
 * Magic isset check for deprecated attributes.
 *
 * @param string $name Name of the attribute to check.
 * @return boolean
 */
	public function __isset($name) {
		if (isset($this->{$name})) {
			return true;
		}
		$magicGet = array('niceFormat');
		if (in_array($name, $magicGet)) {
			return $this->__get($name) !== null;
		}
		return null;
	}

/**
 * Magic accessor for attributes that were deprecated.
 *
 * @param string $name Name of the attribute to get.
 * @return mixed
 */
	public function __get($name) {
		if (isset($this->_CakeTime->{$name})) {
			return $this->_CakeTime->{$name};
		}
		$magicGet = array('niceFormat');
		if (in_array($name, $magicGet)) {
			return $this->_CakeTime->{$name};
		}
		return null;
	}

	/** 
	 * Call methods from CakeTime utility class
	 */
	public function __call($method, $params) {
		return call_user_func_array(array($this->_CakeTime, $method), $params);
	}

}
