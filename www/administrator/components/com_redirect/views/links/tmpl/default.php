<?php
/**
 * @version		$Id: default.php 399 2010-11-08 03:54:16Z eddieajau $
 * @package		NewLifeInIT
 * @subpackage	com_redirect
 * @copyright	Copyright 2005 - 2010 New Life in IT Pty Ltd. All rights reserved.
 * @license		GNU General Public License <http://www.gnu.org/copyleft/gpl.html>
 * @link		http://www.theartofjoomla.com
 */

defined('_JEXEC') or die('Invalid Request');

// Load the tooltip behavior.
JHTML::_('behavior.tooltip');

// Load the default stylesheets and behaviors.
JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
JHTML::stylesheet('default.css', 'administrator/components/com_redirect/media/css/');
JHTML::script('list.js', 'administrator/components/com_redirect/media/js/');

$orderCol	= $this->state->get('list.ordering');
$orderDirn	= $this->state->get('list.direction');

// Build the toolbar.
?>
<form action="index.php?option=com_redirect&amp;view=links" method="post" name="adminForm">
	<fieldset class="filter">
		<div class="left">
			<label for="search"><?php echo JText::_('Search'); ?>:</label>
			<input type="text" name="filter_search" id="search" value="<?php echo $this->state->get('filter.search'); ?>" size="60" title="<?php echo JText::_('Search in title'); ?>" />
			<button type="submit"><?php echo JText::_('Go'); ?></button>
			<button type="button" onclick="$('search').value='';$('published').value=0;this.form.submit();"><?php echo JText::_('Clear'); ?></button>
		</div>
		<div class="right">
			<ol>
				<li>
					<label for="published">
						<?php echo JText::_('REDIRECT_SHOW_BY_STATE'); ?>
					</label>
					<select name="filter_state" id="published" class="inputbox" onchange="this.form.submit()">
					<?php
						echo JHTML::_('select.options', $this->filter_state, 'value', 'text', $this->state->get('filter.state'));
					?>
					</select>
				</li>
			</ol>
		</div>
	</fieldset>

<table class="adminlist">
	<thead>
		<tr>
			<th width="20">
				<input type="checkbox" name="toggle" value="" class="checklist-toggle" />
			</th>
			<th class="left">
				<?php echo JHTML::_('grid.sort', 'REDIRECT_LINK_OLD_URL', 'old_url', $orderDirn, $orderCol); ?>
			</th>
			<th width="30%">
				<?php echo JHTML::_('grid.sort', 'REDIRECT_LINK_NEW_URL', 'new_url', $orderDirn, $orderCol); ?>
			</th>
			<th width="30%">
				<?php echo JHTML::_('grid.sort', 'REDIRECT_LINK_REFERRER', 'referer', $orderDirn, $orderCol); ?>
			</th>
			<th width="12%">
				<?php echo JHTML::_('grid.sort', 'REDIRECT_LINK_UPDATED_DATE', 'updated_date', $orderDirn, $orderCol); ?>
				<?php echo JHTML::_('grid.sort', 'REDIRECT_LINK_CREATED_DATE', 'created_date', $orderDirn, $orderCol); ?>
			</th>
			<th width="5%">
				<?php echo JHTML::_('grid.sort', 'REDIRECT_LINK_STATE', 'published', $orderDirn, $orderCol); ?>
			</th>
			<th nowrap="nowrap" width="5%">
				<?php echo JHTML::_('grid.sort', 'REDIRECT_LINK_HITS', 'hits', $orderDirn, $orderCol); ?>
			</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td colspan="7">
				<?php echo $this->pagination->getListFooter(); ?>
			</td>
		</tr>
	</tfoot>
	<tbody>
<?php
		foreach ($this->items as $i => $item) :
?>
		<tr class="row<?php echo $i % 2; ?>">
			<td style="text-align:center" class="checklist">
				<?php echo JHTML::_('grid.id', $item->id, $item->id); ?>
			</td>
			<td>
				<a href="<?php echo JRoute::_('index.php?option=com_redirect&task=link.edit&l_id='.$item->id);?>">
					<?php echo $this->escape($item->old_url); ?></a>
			</td>
			<td>
				<?php echo $this->escape($item->new_url); ?>
			</td>
			<td>
				<?php echo $this->escape($item->referer); ?>
			</td>
			<td align="center" nowrap="nowrap">
				<?php echo JHTML::_('date', $item->updated_date, '%Y-%m-%d %H:%I:%S'); ?>
				<br /><?php echo JHTML::_('date', $item->created_date, '%Y-%m-%d %H:%I:%S'); ?>
			</td>
			<td align="center">
				<?php echo JHTML::_('grid.published', $item, $item->id, 'tick.png', 'publish_x.png', 'link.'); ?>
			</td>
			<td align="center">
				<?php echo (int) $item->hits; ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>

<fieldset class="batch">
	<h4>Link Activation Values</h4>
	<ol>
		<li>
			<label for="new_url"><?php echo JText::_('REDIRECT_LINK_NEW_URL'); ?>:</label>
			<input type="text" name="new_url" id="new_url" value="" size="50" title="<?php echo JText::_('REDIRECT_LINK_NEW_URL_DESC'); ?>" />
		</li>
		<li>
			<label for="comment"><?php echo JText::_('REDIRECT_LINK_COMMENT'); ?>:</label>
			<input type="text" name="comment" id="comment" value="" size="50" title="<?php echo JText::_('REDIRECT_LINK_COMMENT_DESC'); ?>" />
		</li>
	</ol>
</fieldset>

	<input type="hidden" name="task" value="" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="filter_order" value="<?php echo $orderCol; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $orderDirn; ?>" />
	<?php echo JHTML::_('form.token'); ?>
</form>
<?php echo JHtml::_('redirect.footer'); ?>