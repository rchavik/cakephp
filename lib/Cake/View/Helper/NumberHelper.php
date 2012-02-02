<?php
/**
 * Number Helper.
 *
 * Methods to make numbers more readable.
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

App::uses('CakeNumber', 'Utility');
App::uses('AppHelper', 'View/Helper');

/**
 * Number helper library.
 *
 * Methods to make numbers more readable.
 *
 * @package       Cake.View.Helper
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/number.html
 */
class NumberHelper extends AppHelper {

	/** CakeNumber instance
	 */
	protected $_CakeNumber = null;

	/* Default Constructor
	 *
	 * @param View $View The View this helper is being attached to.
	 * @param array $settings Configuration settings for the helper
	 */
	function __construct(View $View, $settings = array()) {
		parent::__construct($View, $settings);
		$this->_CakeNumber = new CakeNumber();
	}

	/** 
	 * Call methods from CakeNumber utility class
	 */
	function __call($method, $params) {
		return call_user_func_array(array($this->_CakeNumber, $method), $params);
	}

}
