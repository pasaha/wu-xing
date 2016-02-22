<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>

<?php if ($this->user->authorize('com_content', 'edit', 'content', 'all') || $this->user->authorize('com_content', 'edit', 'content', 'own')) : ?>
	<div class="contentpaneopen_edit<?php echo $this->escape($this->item->params->get( 'pageclass_sfx' )); ?>" style="float: left;">
		<?php echo JHTML::_('icon.edit', $this->item, $this->item->params, $this->access); ?>
	</div>
<?php endif; ?>
<div class="content-o<?php echo $this->escape($this->item->params->get( 'pageclass_sfx' )); ?>">

<?php if ($this->item->params->get('show_title')) : ?>
<h2>
	<?php if ($this->item->readmore_link != '') : ?>
	<a href="<?php echo $this->item->readmore_link; ?>">
		<?php echo $this->escape($this->item->title); ?>
	</a>
	<?php else : ?>
		<?php echo $this->escape($this->item->title); ?>
	<?php endif; ?>
</h2>
<?php endif; ?>

<?php if ($this->item->params->get('show_url') && $this->item->urls) : ?>
	<p class="article-url">Источник :
		<a href="http://<?php echo $this->escape($this->item->urls) ; ?>" target="_blank">
			<?php echo $this->escape($this->item->urls); ?>
		</a>
	</p>
<?php endif; ?>

<?php echo $this->item->event->beforeDisplayContent; ?>

<div class="article-content article-single">
<?php if (isset ($this->item->toc)) : ?>
	<?php echo $this->item->toc; ?>
<?php endif; ?>
<?php echo $this->item->text; ?>
</div>
<?php /* ?>
<?php if ( intval($this->item->modified) != 0 && $this->item->params->get('show_modify_date')) : ?>
	<span class="modifydate">
		<?php echo JText::sprintf('LAST_UPDATED2', JHTML::_('date', $this->item->modified, JText::_('DATE_FORMAT_LC2'))); ?>
	</span>
<?php endif; ?>
<?php */ ?>
<?php if ($this->item->params->get('show_readmore') && $this->item->readmore) : ?>
	<a href="<?php echo $this->item->readmore_link; ?>" title="<?php echo $this->escape($this->item->title); ?>" class="readon<?php echo $this->escape($this->item->params->get('pageclass_sfx')); ?>">
			<?php if ($this->item->readmore_register) : ?>
				<?php echo JText::_('Register to read more...'); ?>
			<?php else : ?>
				<?php echo JText::_('Read more...'); ?>
			<?php endif; ?>
	</a>
<?php endif; ?>
<?php if ($this->item->params->get('show_create_date')) : ?>
	<p class="date">
		<strong><?php echo JHTML::_('date', $this->item->created, JText::_('DATE_FORMAT_LC3')); ?></strong>
	</p>
<?php endif; ?>


</div>

<?php echo $this->item->event->afterDisplayContent; ?>
