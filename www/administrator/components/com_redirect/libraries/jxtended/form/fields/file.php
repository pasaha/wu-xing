<?php
/**
 * @version		$Id: file.php 390 2010-11-05 11:35:33Z eddieajau $
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
class JFormFieldFile extends JFormField
{
	/**
	 * The field type.
	 *
	 * @var		string
	 */
	public $type = 'File';

	/**
	 * Method to get the field input.
	 *
	 * @return	string		The field input.
	 */
	protected function _getInput()
	{
		$size		= $this->_element->attributes('size') ? ' size="'.$this->_element->attributes('size').'"' : '';
		$class		= $this->_element->attributes('class') ? 'class="'.$this->_element->attributes('class').'"' : 'class="text_area"';
		$onchange	= $this->_element->attributes('onchange') ? ' onchange="'.$this->_element->attributes('onchange').'"' : '';

		return '<input type="file" name="'.$this->inputName.'" id="'.$this->inputId.'" value="" '.$class.$size.$onchange.' />';
	}
}