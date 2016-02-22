<?php
/**
 * @version		$Id: integers.php 390 2010-11-05 11:35:33Z eddieajau $
 * @package		JXtended.Libraries
 * @subpackage	Form
 * @copyright	Copyright 2005 - 2010 New Life in IT Pty Ltd. All rights reserved.
 * @license		GNU General Public License
 * @link		http://www.theartofjoomla.com
 */

defined('JPATH_BASE') or die('Restricted Access');

jimport('joomla.html.html');
require_once dirname(__FILE__).'/list.php';

/**
 * Form Field class for JXtended Libraries.
 *
 * @package		JXtended.Libraries
 * @subpackage	Form
 * @since		1.1
 */
class JFormFieldIntegers extends JFormFieldList
{
	/**
	 * The field type.
	 *
	 * @var		string
	 */
	protected $type = 'Integers';

	/**
	 * Method to get a list of options for a list input.
	 *
	 * @return	array		An array of JHtml options.
	 */
	protected function _getOptions()
	{
		$first		= (int)$this->_element->attributes('first');
		$last		= (int)$this->_element->attributes('last');
		$step		= (int)max(1, $this->_element->attributes('step'));
		$options	= array();

		for ($i = $first; $i <= $last; $i += $step) {
			$options[] = JHtml::_('select.option', $i);
		}

		// Merge any additional options in the XML definition.
		$options = array_merge(parent::_getOptions(), $options);

		return $options;
	}
}