<?php
/**
 * @version		$Id: md5.php 390 2010-11-05 11:35:33Z eddieajau $
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
class JFormRuleMd5 extends JFormRule
{
	/**
	 * The regular expression.
	 *
	 * @access	protected
	 * @var		string
	 * @since	1.1
	 */
	var $_regex = '^[A-Z0-9]{32}$';

	/**
	 * The regular expression modifiers.
	 *
	 * @access	protected
	 * @var		string
	 * @since	1.1
	 */
	var $_modifiers = 'i';
}