<?php
/**
 * @version		$Id: equals.php 390 2010-11-05 11:35:33Z eddieajau $
 * @package		JXtended.Libraries
 * @subpackage	Form
 * @copyright	Copyright 2005 - 2010 New Life in IT Pty Ltd. All rights reserved.
 * @license		GNU General Public License
 * @link		http://www.theartofjoomla.com
 */

defined('JPATH_BASE') or die;

juimport('jxtended.form.formrule');

/**
 * Form Rule class for JXtended Libraries.
 *
 * @package		JXtended.Libraries
 * @subpackage	Form
 * @since		1.1
 */
class JFormRuleEquals extends JFormRule
{
	/**
	 * Method to test if two values are equal. To use this rule, the form
	 * XML needs a validate attribute of equals and a field attribute
	 * that is equal to the field to test against.
	 *
	 * @param	object		$field		A reference to the form field.
	 * @param	mixed		$values		The values to test for validiaty.
	 * @return	mixed		JException on invalid rule, true if the value is valid, false otherwise.
	 */
	public function test(&$field, &$values)
	{
		$return = false;
		$field1	= $field->attributes('name');
		$field2	= $field->attributes('field');

		// Check the rule.
		if (!$field2) {
			return new JException('Invalid Form Rule :: '.get_class($this));
		}

		// Test the two values against each other.
		if ($values[$field1] == $values[$field2]) {
			$return = true;
		}

		return $return;
	}
}