<?php
/**
 * @version		$Id: redirect.php 391 2010-11-05 11:40:55Z eddieajau $
 * @package		NewLifeInIT
 * @subpackage	com_redirect
 * @copyright	Copyright 2010 New Life in IT Pty Ltd. All rights reserved.
 * @license		GNU General Public License version 2 or later.
 * @link		http://www.jentla.com
 * @author		Andrew Eddie <andrew.eddie@newlifeinit.com>
 */

// no direct access
defined('_JEXEC') or die;

/**
 * Component HTML Helper
 *
 * @package		NewLifeInIT
 * @subpackage	com_redirect
 */
class JHtmlRedirect
{
	function footer()
	{
		JHtml::_('behavior.modal', 'a.modal');
		echo '<div id="taojfooter">';
		echo  '<a href="'.JRoute::_('index.php?option=com_redirect&view=about&tmpl=component').'" class="modal" rel="{handler: \'iframe\'}">';
		echo 'Redirect '.RedirectVersion::getVersion(true, true).'</a>';
		echo ' &copy; 2005 - 2010 <a href="http://www.newlifeinit.com" target="_blank">New Life in IT Pty Ltd</a>. All rights reserved.';
		echo '</div>';
	}
}
