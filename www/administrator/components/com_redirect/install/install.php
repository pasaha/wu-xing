<?php
/**
 * @version		$Id: install.php 390 2010-11-05 11:35:33Z eddieajau $
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

// PHP 5 check
if (version_compare(PHP_VERSION, '5.2.4', '<')) {
	$this->parent->abort(JText::_('J_USE_PHP5'));
	return false;
}

// Include dependancies.
require_once dirname(__FILE__).'/helper.php';
require_once dirname(dirname(__FILE__)).'/version.php';

// Install the modules.
$modules = PackageInstallerHelper::installModules($this);
if ($modules === false) {
	return false;
}

// Install the plugins.
$plugins = PackageInstallerHelper::installPlugins($this);
if ($plugins === false) {
	return false;
}

// Fix the link bug.
PackageInstallerHelper::fixLink('com_redirect');

// Perform upgrades.

// Display the results.
PackageInstallerHelper::displayInstalled(
	$modules,
	$plugins,
	JText::sprintf('COM_REDIRECT_INSTALLED', RedirectVersion::VERSION.'.'.RedirectVersion::SUBVERSION.' '.RedirectVersion::STATUS)
);
