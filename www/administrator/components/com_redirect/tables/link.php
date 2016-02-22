<?php
/**
 * @version		$Id: link.php 390 2010-11-05 11:35:33Z eddieajau $
 * @package		NewLifeInIT
 * @subpackage	com_redirect
 * @copyright	Copyright 2005 - 2010 New Life in IT Pty Ltd. All rights reserved.
 * @license		GNU General Public License <http://www.gnu.org/copyleft/gpl.html>
 * @link		http://www.theartofjoomla.com
 */

defined('_JEXEC') or die;

jimport('joomla.database.table');

/**
 * Link Table for Redirect.
 *
 * @package		NewLifeInIT
 * @subpackage	com_redirect
 * @since		1.0
 */
class RedirectTableLink extends JTable
{
	/**
	 * @var int
	 */
	var $id = null;
	/**
	 * @var varchar
	 */
	var $old_url = null;
	/**
	 * @var varchar
	 */
	var $new_url = null;
	/**
	 * @var varchar
	 */
	var $comment = null;
	/**
	 * @var int unsigned
	 */
	var $published = null;
	/**
	 * @var int unsigned
	 */
	var $created_date = null;
	/**
	 * @var int unsigned
	 */
	var $updated_date = null;

	/**
	 * Constructor
	 *
	 * @param	object	Database object
	 * @return	void
	 * @since	1.0
	 */
	public function __construct(&$db)
	{
		parent::__construct('#__redirect_links', 'id', $db);
	}

	/**
	 * Overloaded check function.
	 *
	 * @return	boolean
	 * @since	1.0
	 */
	public function check()
	{
		// check for valid name
		if((trim($this->old_url)) == '') {
			$this->setError(JText::_('Must have a source URL'));
			return false;
		}
		// check for valid name
		if((trim($this->new_url)) == '') {
			$this->setError(JText::_('Must have a destination URL'));
			return false;
		}

		return true;
	}
}
