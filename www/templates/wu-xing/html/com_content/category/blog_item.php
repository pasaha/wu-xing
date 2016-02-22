<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>

<?php if ($this->user->authorize('com_content', 'edit', 'content', 'all') || $this->user->authorize('com_content', 'edit', 'content', 'own')) : ?>
	<div class="contentpaneopen_edit<?php echo $this->escape($this->item->params->get( 'pageclass_sfx' )); ?>" style="float: left;">
		<?php echo JHTML::_('icon.edit', $this->item, $this->item->params, $this->access); ?>
	</div>
<?php endif; ?>
<div class="content-o">

<?php if (0 && $this->item->catid == 1 && $this->item->params->get('show_create_date')) : ?>

	<p class="date">
		<strong><?php echo JHTML::_('date', $this->item->created, JText::_('DATE_FORMAT_LC3')); ?></strong>
	</p>

<?php endif; ?>
<?php if ($this->item->params->get('show_title')) : ?>
<h2>
	<?php if ($this->item->readmore_link != '' &&  $this->item->params->get('show_readmore') && $this->item->readmore) : ?>
	<a href="<?php echo $this->item->readmore_link; ?>">
		<?php echo $this->escape($this->item->title); ?>
	</a>
	<?php else : ?>
		<?php echo $this->escape($this->item->title); ?>
	<?php endif; ?>
</h2>
<?php endif; ?>

<?php  if (!$this->item->params->get('show_intro')) :
	echo $this->item->event->afterDisplayTitle;
endif; ?>

<?php echo $this->item->event->beforeDisplayContent; ?>

<div class="article-content">
	<?php if (isset ($this->item->toc)) : ?>
		<?php $this->item->toc?>
	<?php endif; ?>

	<?php
		$item_text = preg_replace("/<img[^>]+\>/i", "", $this->item->text);
		preg_match_all("/(<img [^>]*>)/",$this->item->text,$matches,PREG_PATTERN_ORDER);
		// показывется только первая картинка из описания!
		for( $i=0; isset($matches[1]) && $i < 1; $i++ ) {
			$item_image = $matches[1][$i];
			$item_image = preg_replace("/class=\"caption\"/", "", $item_image);
			$item_image = preg_replace("/<img/", "<img class=\"preview_caption\"", $item_image);
		}
	?>

	<div class="image_content">
		<?php if ($this->item->readmore_link != '' &&  $this->item->params->get('show_readmore') && $this->item->readmore) : ?>
		<a href="<?php echo $this->item->readmore_link; ?>">
			<?php echo $item_image; ?>
		</a>
		<?php else : ?>
			<?php echo $item_image; ?>
		<?php endif; ?>
	</div>
	<?php if ($item_text) :  ?>
		<p><?php echo strip_tags($item_text); ?></p>
	<?php endif; ?>
	
</div>

<?php if ( intval($this->item->modified) != 0 && $this->item->params->get('show_modify_date')) : ?>
	<span class="modifydate">
		<?php echo JText::sprintf('LAST_UPDATED2', JHTML::_('date', $this->item->modified, JText::_('DATE_FORMAT_LC2'))); ?>
	</span>
<?php endif; ?>

<?php if ($this->item->params->get('show_readmore') && $this->item->readmore) : ?>
	<a href="<?php echo $this->item->readmore_link; ?>" title="<?php echo $this->escape($this->item->title); ?>" class="readon<?php echo $this->escape($this->item->params->get('pageclass_sfx')); ?>">
			<?php
				if ($this->item->readmore_register) :
					echo JText::_('Register to read more...');
				elseif ($readmore = $this->item->params->get('readmore')) :
					echo $readmore ;
				else :
					echo JText::sprintf('Read more...');
				endif;
			?>
	</a>
<?php endif; ?>

</div>

<?php echo $this->item->event->afterDisplayContent; ?>
