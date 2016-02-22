<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<?php if ($params->get('item_title')) : ?>
<div class="contentpaneopen">
	<?php if ($params->get('link_titles') && $item->linkOn != '') : ?>
		<a href="<?php echo $item->linkOn;?>">
			<?php echo $item->title;?></a>
	<?php else : ?>
		<?php echo $item->title; ?>
	<?php endif; ?>
</div>
<?php endif; ?>

<?php if (!$params->get('intro_only')) :
	echo $item->afterDisplayTitle;
endif; ?>

<?php echo $item->beforeDisplayContent; ?>

<div class="cnt-hd">
<?php echo $item->title;?>
</div>
<div class="contentpaneopen">
      <?php if (isset($item->linkOn) && $item->readmore && $params->get('readmore')) : ?>
			<?php echo '<a class="readmore" href="'.$item->linkOn.'">'.$item->text.'</a>'; ?>
			<?php else : ?>
			<?php echo $item->text; ?>
			<?php endif; ?>
</div>

