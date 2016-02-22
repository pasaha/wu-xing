<?php
/**
 * @version		$Id: spacer.php 390 2010-11-05 11:35:33Z eddieajau $
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
class JFormFieldSpacer extends JFormField
{
	/**
	 * The field type.
	 *
	 * @var		string
	 */
	protected $type = 'Spacer';

	/**
	 * Method to get the field input.
	 *
	 * @return	string		The field input.
	 */
	protected function _getInput()
	{
		return '<hr />';
	}
}