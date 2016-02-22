<?php
/**
 * @version		$Id: uninstall.php 390 2010-11-05 11:35:33Z eddieajau $
 * @package		NewLifeInIT
 * @subpackage	com_redirect
 * @copyright	Copyright 2005 - 2010 New Life in IT Pty Ltd. All rights reserved.
 * @license		GNU General Public License <http://www.gnu.org/copyleft/gpl.html>
 * @link		http://www.theartofjoomla.com
 */

defined('_JEXEC') or die('Invalid Request.');


// Load the component language file
$language = JFactory::getLanguage();
$language->load('com_redirect');

// Include dependancies.
require_once dirname(__FILE__).'/helper.php';
require_once dirname(dirname(__FILE__)).'/version.php';

// Uninstall the modules.
$modules = PackageInstallerHelper::uninstallModules($this);
if ($modules === false) {
	return false;
}

// Uninstall the plugins.
$plugins = PackageInstallerHelper::uninstallPlugins($this);
if ($plugins === false) {
	return false;
}

// Display the results.
PackageInstallerHelper::displayInstalled(
	$modules,
	$plugins,
	JText::_('COM_REDIRECT_UNINSTALL_HEADING')
);
