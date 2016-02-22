<?php
/**
 * @version		$Id: accesslevel.php 390 2010-11-05 11:35:33Z eddieajau $
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
class JFormFieldAccessLevel extends JFormFieldList
{
	/**
	 * The field type.
	 *
	 * @var		string
	 */
	protected $type = 'AccessLevel';

	/**
	 * Method to get a list of options for a list input.
	 *
	 * @return	array		An array of JHtml options.
	 */
	protected function _getOptions()
	{
		// Get a database object.
		$db = JFactory::getDbo();

		// Get the user groups from the database.
		$db->setQuery(
			'SELECT a.id AS value, a.name AS text' .
			' FROM #__groups AS a' .
			' ORDER BY a.id ASC'
		);
		$options = $db->loadObjectList();

		// Merge any additional options in the XML definition.
		$options = array_merge(parent::_getOptions(), $options);

		return $options;
	}
}