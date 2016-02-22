<?php
/**
 * @version		$Id: language.php 390 2010-11-05 11:35:33Z eddieajau $
 * @copyright	Copyright 2005 - 2010 New Life in IT Pty Ltd. All rights reserved.
 * @license		GNU General Public License
 * @link		http://www.theartofjoomla.com
 */

defined('JPATH_BASE') or die;

jimport('joomla.html.html');
require_once dirname(__FILE__).'/list.php';

/**
 * Form Field class for the Joomla Framework.
 *
 * @package		JXtended.Libraries
 * @subpackage	Form
 * @since		1.1
 */
class JFormFieldLanguage extends JFormFieldList
{
	/**
	 * The field type.
	 *
	 * @var		string
	 */
	protected $type = 'Language';

	/**
	 * Method to get a list of options for a list input.
	 *
	 * @return	array		An array of JHtml options.
	 */
	protected function _getOptions()
	{
		jimport('joomla.language.helper');
		$client		= $this->_element->attributes('client');
		$options	= array_merge(
						parent::_getOptions(),
						JLanguageHelper::createLanguageList($this->value, constant('JPATH_'.strtoupper($client)), true)
					);

		return $options;
	}
}