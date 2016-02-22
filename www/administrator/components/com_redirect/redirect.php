<?php
/**
 * @version		$Id: redirect.php 390 2010-11-05 11:35:33Z eddieajau $
 * @package		NewLifeInIT
 * @subpackage	com_redirect
 * @copyright	Copyright 2005 - 2010 New Life in IT Pty Ltd. All rights reserved.
 * @license		GNU General Public License <http://www.gnu.org/copyleft/gpl.html>
 * @link		http://www.theartofjoomla.com
 */

defined('_JEXEC') or die;

$lang = JFactory::getLanguage();
$lang->load('com_redirect', JPATH_COMPONENT);

// Import the component version class.
require_once JPATH_COMPONENT.'/version.php';
require_once JPATH_COMPONENT.'/libraries/loader.php';

juimport('joomla.application.component.controller');

// Execute the task.
$controller	= JController::getInstance('Redirect');
$controller->execute(JRequest::getCmd('task'));
$controller->redirect();
