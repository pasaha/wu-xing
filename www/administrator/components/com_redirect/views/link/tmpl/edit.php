<?php
/**
 * @version		$Id: edit.php 390 2010-11-05 11:35:33Z eddieajau $
 * @package		NewLifeInIT
 * @subpackage	com_redirect
 * @copyright	Copyright 2005 - 2010 New Life in IT Pty Ltd. All rights reserved.
 * @license		GNU General Public License <http://www.gnu.org/copyleft/gpl.html>
 * @link		http://www.theartofjoomla.com
 */

defined('_JEXEC') or die('Invalid Request.');

// Include the component HTML helpers.
JHTML::addIncludePath(JPATH_COMPONENT.'/helpers/html');

// Load the behaviors.
JHTML::_('behavior.formvalidation');
JHTML::_('behavior.keepalive');
JHTML::_('behavior.tooltip');

// Load the default stylesheet.
JHTML::stylesheet('default.css', 'administrator/components/com_redirect/media/css/');

// Get the form fields.
$fields	= $this->form->getFields();
?>
<form action="<?php echo JRoute::_('index.php?option=com_redirect&view=links');?>" method="post" name="adminForm" id="link-form">
	<div class="col width-60">
		<div>
			<?php echo $fields['old_url']->label; ?><br />
			<?php echo $fields['old_url']->input; ?>
		</div>
		<br />
		<div>
			<?php echo $fields['new_url']->label; ?><br />
			<?php echo $fields['new_url']->input; ?>
		</div>
		<br />
		<div>
			<?php echo $fields['comment']->label; ?><br />
			<?php echo $fields['comment']->input; ?>
		</div>
	</div>

	<div class="col width-40">
		<fieldset>
			<legend><?php echo JText::_('Details'); ?></legend>

			<table class="adminlist">
				<tbody>
					<tr>
						<td>
							<?php echo $fields['published']->label; ?><br />
							<?php echo $fields['published']->input; ?>
						</td>
					</tr>
					<tr>
						<td>
							<?php echo $fields['created_date']->label; ?><br />
							<?php echo $fields['created_date']->input; ?>
						</td>
					</tr>
					<tr>
						<td>
							<?php echo $fields['updated_date']->label; ?><br />
							<?php echo $fields['updated_date']->input; ?>
						</td>
					</tr>
				</tbody>
			</table>
		</fieldset>
	</div>
	<div class="clr"></div>
	<input type="hidden" name="task" value="" />
	<?php echo JHTML::_('form.token'); ?>
</form>
