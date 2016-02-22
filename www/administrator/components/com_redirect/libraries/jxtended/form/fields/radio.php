<?php
/**
 * @version		$Id: radio.php 390 2010-11-05 11:35:33Z eddieajau $
 * @package		JXtended.Libraries
 * @subpackage	Form
 * @copyright	Copyright 2005 - 2010 New Life in IT Pty Ltd. All rights reserved.
 * @license		GNU General Public License
 * @link		http://www.theartofjoomla.com
 */

defined('JPATH_BASE') or die;

jimport('joomla.html.html');
juimport('jxtended.form.formfield');

/**
 * Form Field class for JXtended Libraries.
 *
 * @package		JXtended.Libraries
 * @subpackage	Form
 * @since		1.1
 */
class JFormFieldRadio extends JFormField
{
	/**
	 * The field type.
	 *
	 * @var		string
	 */
	protected $type = 'Radio';

	/**
	 * Method to get the field input.
	 *
	 * @return	string		The field input.
	 */
	protected function _getInput()
	{
		$options = array();

		// Get the options for the radio list.
		foreach ($this->_element->children() as $option) {
			$options[] = JHtml::_('select.option', $option->attributes('value'), JText::_($option->data()));
		}

		return JHtml::_('select.radiolist', $options, $this->inputName, '', 'value', 'text', $this->value, $this->inputId);
	}
}