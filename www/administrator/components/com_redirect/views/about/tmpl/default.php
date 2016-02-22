<?php
/**
 * @version		$Id: default.php 390 2010-11-05 11:35:33Z eddieajau $
 * @package		NewLifeInIT
 * @subpackage	com_redirect
 * @copyright	Copyright 2010 New Life in IT Pty Ltd. All rights reserved
 * @license		GNU General Public License <http://www.fsf.org/licensing/licenses/gpl.html>
 * @link		http://www.theartofjoomla.com
 */

// No direct access.
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
JHtml::stylesheet('default.css', 'administrator/components/com_redirect/media/css/');

// Initialise variables.
$db			= $this->get('Dbo');
$jVersion	= new JVersion;

// Pre-compute server information.
if (isset($_SERVER['SERVER_SOFTWARE'])) {
	$server = $_SERVER['SERVER_SOFTWARE'];
}
else  {
	$sf = getenv('SERVER_SOFTWARE');
	if ($sf) {
		$server = $sf;
	}
	else {
		$server = 'Not applicable.';
	}
}
?>
	<h1>
		<?php echo JText::_('COM_REDIRECT_TITLE');?>
	</h1>

	<p>
		<img src="components/com_redirect/media/img/redirect_128x128.png" align="right" alt="Logo" />
		<?php echo JText::_('COM_REDIRECT_DESC'); ?>
	</p>

	<p>
		<a href="http://www.theartofjoomla.com/extensions/redirect.html">
			http://www.theartofjoomla.com/extensions/redirect.html</a>.
	</p>

	<h2>
		<?php echo JText::_('COM_REDIRECT_ABOUT_SUPPORT');?>
	</h2>

	<p>
		<?php echo JText::_('COM_REDIRECT_ABOUT_SUPPORT_DESC');?><p>

	<textarea style="width:100%;font-family:monospace;" onclick="this.focus();this.select();" rows="10">
Joomla   : <?php echo $jVersion->getLongVersion(); ?>

Software : <?php echo RedirectVersion::getVersion(true, true); ?>

Server   : <?php echo $server; ?>

PHP      : <?php echo phpversion(); ?>

Database : <?php echo $db->getVersion(); ?> <?php echo $db->getCollation(); ?>

Browser  : <?php echo htmlspecialchars(phpversion() <= '4.2.1' ? getenv('HTTP_USER_AGENT') : $_SERVER['HTTP_USER_AGENT'], ENT_QUOTES); ?>

Platform : <?php echo php_uname(); ?> <?php echo php_sapi_name(); ?>
	</textarea>

	<h2>
		<?php echo JText::_('COM_REDIRECT_ABOUT_CHANGELOG');?>
	</h2>

	<dl>
		<dt>Version 1.0.2 - 5 November 2010</dt>
		<dd>
			<ul>
				<li>Initial release.</li>
			</ul>
		</dd>
	</dl>
