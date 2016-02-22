<?php
/**
 * @version		$Id: controller.php 390 2010-11-05 11:35:33Z eddieajau $
 * @package		NewLifeInIT
 * @subpackage	com_redirect
 * @copyright	Copyright 2005 - 2010 New Life in IT Pty Ltd. All rights reserved.
 * @license		GNU General Public License <http://www.gnu.org/copyleft/gpl.html>
 * @link		http://www.theartofjoomla.com
 */

defined('_JEXEC') or die;

jimport('joomla.application.component.controller');

/**
 * Base controller class for Redirect.
 *
 * @package		NewLifeInIT
 * @subpackage	com_redirect
 * @since		1.0
 */
class RedirectController extends JController
{
	/**
	 * Method to display a view.
	 *
	 * @return	void
	 * @since	1.0
	 */
	public function display()
	{
		// Get the document object.
		$document = JFactory::getDocument();

		// Set the default view name and format from the Request.
		$vName		= JRequest::getWord('view', 'links');
		$vFormat	= $document->getType();
		$lName		= JRequest::getWord('layout', 'default');

		// Get and render the view.
		if ($view = $this->getView($vName, $vFormat)) {
			switch ($vName)
			{
				default:
					$model = $this->getModel($vName);
					break;
			}

			// Push the model into the view (as default).
			if ($model) {
				$view->setModel($model, true);
			}

			// Push document object into the view.
			$view->document = $document;

			// Set the layout for the view.
			$view->setLayout($lName);
			$view->display();
		}
		else {
			// Error condition.
		}
	}
}
