<?php
/**
 * @version		$Id: boolean.php 390 2010-11-05 11:35:33Z eddieajau $
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
class JFormRuleBoolean extends JFormRule
{
	/**
	 * The regular expression.
	 *
	 * @var		string
	 */
	protected $_regex = '^0|1|true|false$';

	/**
	 * The regular expression modifiers.
	 *
	 * @var		string
	 */
	protected $_modifiers = 'i';
}