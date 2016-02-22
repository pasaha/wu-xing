<?php
/**
 * @version		$Id: password.php 390 2010-11-05 11:35:33Z eddieajau $
 * @package		JXtended.Libraries
 * @subpackage	Form
 * @copyright	Copyright 2005 - 2010 New Life in IT Pty Ltd. All rights reserved.
 * @license		GNU General Public License
 * @link		http://www.theartofjoomla.com
 */

defined('JPATH_BASE') or die;

juimport('jxtended.form.formfield');

/**
 * Form Field class for JXtended Libraries.
 *
 * @package		JXtended.Libraries
 * @subpackage	Form
 * @since		1.1
 */
class JFormFieldPassword extends JFormField
{
	/**
	 * The field type.
	 *
	 * @var		string
	 */
	protected $type = 'Password';

	/**
	 * Method to get the field input.
	 *
	 * @return	string		The field input.
	 */
	protected function _getInput()
	{
		$size	= $this->_element->attributes('size') ? 'size="'.$this->_element->attributes('size').'"' : '';
		$class	= $this->_element->attributes('class') ? 'class="'.$this->_element->attributes('class').'"' : 'class="text_area"';
		$auto	= $this->_element->attributes('autocomplete') == 'off' ? 'autocomplete="off"' : '';

		return '<input type="password" name="'.$this->inputName.'" id="'.$this->inputId.'" value="'.htmlspecialchars($this->value).'" '.$auto.' '.$class.' '.$size.' />';
	}
}