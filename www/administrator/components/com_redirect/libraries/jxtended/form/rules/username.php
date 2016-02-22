<?php
/**
 * @version		$Id: username.php 390 2010-11-05 11:35:33Z eddieajau $
 * @package		JXtended.Libraries
 * @subpackage	Form
 * @copyright	Copyright 2005 - 2010 New Life in IT Pty Ltd. All rights reserved.
 * @license		GNU General Public License
 * @link		http://www.theartofjoomla.com
 */

defined('JPATH_BASE') or die('Restricted Access');

juimport('jxtended.form.formrule');

/**
 * Form Rule class for JXtended Libraries.
 *
 * @package		JXtended.Libraries
 * @subpackage	Form
 * @since		1.1
 */
class JFormRuleUsername extends JFormRule
{
	/**
	 * Method to test if a username is unique.
	 *
	 * @param	object		$field		A reference to the form field.
	 * @param	mixed		$values		The values to test for validiaty.
	 * @return	mixed		JException on invalid rule, true if the value is valid, false otherwise.
	 */
	public function test(&$field, &$values)
	{
		$return = false;
		$name	= $field->attributes('name');
		$key	= $field->attributes('field');
		$value	= isset($values[$key]) ? $values[$key] : 0;

		// Check the rule.
		if (!$key) {
			return new JException('Invalid Form Rule :: '.get_class($this));
		}

		// Check if the username is unique.
		$db = &JFactory::getDbo();
		$db->setQuery(
			'SELECT count(*) FROM `#__users`' .
			' WHERE `username` = '.$db->Quote($values[$name]) .
			' AND '.$db->nameQuote($key).' != '.$db->Quote($value)
		);
		$duplicate = (bool)$db->loadResult();

		// Check for a database error.
		if ($db->getErrorNum()) {
			return new JException('Database Error :: '.$db->getErrorMsg());
		}

		if (!$duplicate) {
			$return = true;
		}

		return $return;
	}
}