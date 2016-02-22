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
 * The HTML Redirect link view
 *
 * @package		NewLifeInIT
 * @subpackage	com_redirect
 * @version		1.0
 */
class RedirectViewLink extends JView
{
	/**
	 * Display the view
	 *
	 * @access	public
	 */
	function display($tpl = null)
	{
		$this->state	= $this->get('State');
		$this->item		= $this->get('Item');
		$this->form		= $this->get('Form');

		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

		// Bind the item data to the form object.
		if ($this->item) {
			$this->form->bind($this->item);
		}

		$this->buildDefaultToolBar();

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
		JRequest::setVar('hidemainmenu', true);

		if (is_object($this->item)) {
			$isNew			= ($this->item->id == 0);
		}
		else {
			$isNew			= true;
		}

		JToolBarHelper::title('Redirect: '.$isNew ? 'Add Link' : 'Edit Link', 'logo');
		JToolBarHelper::custom('link.save2new', 'new.png', 'new_f2.png', 'Save and New', false);
		JToolBarHelper::save('link.save');
		JToolBarHelper::apply('link.apply');
		JToolBarHelper::cancel('link.cancel');

		// We can't use the toolbar helper here because there is no generic popup button.
		//$bar = &JToolBar::getInstance('toolbar');
		//$bar->appendButton('Popup', 'config', 'JX_CONFIGURATION', 'index.php?option=com_redirect&view=config&tmpl=component', 570, 500);

		//JToolBarHelper::help('index', true);
	}
}