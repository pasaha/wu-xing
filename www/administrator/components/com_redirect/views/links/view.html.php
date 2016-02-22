<?php
/**
 * @version		$Id: view.html.php 390 2010-11-05 11:35:33Z eddieajau $
 * @package		NewLifeInIT
 * @subpackage	com_redirect
 * @copyright	Copyright 2005 - 2010 New Life in IT Pty Ltd. All rights reserved.
 * @license		GNU General Public License <http://www.gnu.org/copyleft/gpl.html>
 * @link		http://www.theartofjoomla.com
 */

defined('_JEXEC') or die('Invalid Request.');

jimport('joomla.application.component.view');

/**
 * The HTML Redirect links view
 *
 * @package		NewLifeInIT
 * @subpackage	com_redirect
 * @version		1.0
 */
class RedirectViewLinks extends JView
{
	/**
	 * Display the view
	 */
	public function display($tpl = null)
	{
		// Get data from the model.
		$this->state		= $this->get('State');
		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');

		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

		// Build the state filter options.
		$poptions[] = JHTML::_('select.option','*', 'Any');
		$poptions[] = JHTML::_('select.option', '0', 'Pending');
		$poptions[] = JHTML::_('select.option', '1', 'Active');
		$poptions[] = JHTML::_('select.option', '2', 'Archived');

		// Assign data to the view.
		$this->filter_state = $poptions;

		$this->buildDefaultToolBar();

		// Render the layout.
		parent::display($tpl);
	}

	/**
	 * Build the default toolbar.
	 *
	 * @return	void
	 * @since	1.0
	 */
	protected function buildDefaultToolBar()
	{
		$bar = JToolBar::getInstance('toolbar');

		JToolBarHelper::title('Redirect: Links', 'logo');

		JToolBarHelper::custom('link.activate', 'default.png', 'default_f2.png', 'Activate', true);
		JToolBarHelper::custom('link.archive', 'archive.png', 'archive_f2.png', 'Archive', true);
		JToolBarHelper::custom('link.publish', 'publish.png', 'publish_f2.png', 'Publish', true);
		JToolBarHelper::custom('link.unpublish', 'unpublish.png', 'unpublish_f2.png', 'Unpublish', true);
		JToolBarHelper::custom('link.edit', 'edit.png', 'edit_f2.png', 'Edit', true);
		JToolBarHelper::custom('link.add', 'new.png', 'new_f2.png', 'New', false);
		JToolBarHelper::deleteList('Are you sure you want to remove these links?', 'link.delete', 'delete');

		// We can't use the toolbar helper here because there is no generic popup button.
		JToolBar::getInstance('toolbar')
			->appendButton('Popup', 'help', 'COM_REDIRECT_TOOLBAR_ABOUT', 'index.php?option=com_redirect&view=about&tmpl=component');
	}
}