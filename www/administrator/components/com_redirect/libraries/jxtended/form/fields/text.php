<?php
/**
 * @version		$Id: text.php 390 2010-11-05 11:35:33Z eddieajau $
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
class JFormFieldText extends JFormField
{
	/**
	 * The field type.
	 *
	 * @var		string
	 */
	protected $type = 'Text';

	/**
	 * Method to get the field input.
	 *
	 * @return	string		The field input.
	 */
	protected function _getInput()
	{
		$size		= ($v = $this->_element->attributes('size')) ? ' size="'.$v.'"' : '';
		$class		= ($v = $this->_element->attributes('class')) ? 'class="'.$v.'"' : 'class="text_area"';
		$readonly	= $this->_element->attributes('readonly') == 'true' ? ' readonly="readonly"' : '';
		$onchange	= ($v = $this->_element->attributes('onchange')) ? ' onchange="'.$v.'"' : '';
		$maxLength	= ($v = $this->_element->attributes('maxlength')) ? ' maxlength="'.$v.'"' : '';

		return '<input type="text" name="'.$this->inputName.'" id="'.$this->inputId.'" value="'.htmlspecialchars($this->value).'" '.$class.$size.$readonly.$onchange.$maxLength.' />';
	}
}