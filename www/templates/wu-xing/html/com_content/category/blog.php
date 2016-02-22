<?php // no direct access
defined('_JEXEC') or die('Restricted access');
$cparams =& JComponentHelper::getParams('com_media');
?>
<?php if ($this->params->get('show_page_title', 1)) : ?>
<h1><?php echo $this->escape($this->params->get('page_title')); ?></h1>
<?php endif; ?>
<?php if ($this->category->image) : ?>
		<img class="s-img" src="<?php echo $this->baseurl . '/' . $cparams->get('image_path') . '/'. $this->category->image;?>" alt="<?php echo $this->category->image;?>" />
<?php endif; ?>
<?php if ($this->category->description) : ?>
<div class="category-dsc">
	<?php echo $this->category->description; ?>
</div>
	<?php endif; ?>

<div class="blog-list-wr<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
<ul class="blog-list hor">
<?php if ($this->params->get('num_leading_articles')) : ?>

<?php for ($i = $this->pagination->limitstart; $i < ($this->pagination->limitstart + $this->params->get('num_leading_articles')); $i++) : ?>
		<?php if ($i >= $this->total) : break; endif; ?>
	<li class="f-view">
		<?php
			$this->item =& $this->getItem($i, $this->params);
			echo $this->loadTemplate('item');
		?>
	</li>
<?php endfor; ?>
	
<?php else : $i = $this->pagination->limitstart; endif; ?>

<?php for ($i = $this->pagination->limitstart + $this->params->get('num_leading_articles'); $i < $this->total; $i++) : ?>
		<?php if ($i >= $this->total) : break; endif; ?>
	<li>
		<?php
			$this->item =& $this->getItem($i, $this->params);
			echo $this->loadTemplate('item');
		?>
	</li>
<?php endfor; ?>

</ul>

<?php if (0 && $this->params->get('num_links') && ($i < $this->total)) : ?>

		<div class="blog_more">
			<?php
				$this->links = array_splice($this->items, $i - $this->pagination->limitstart);
				echo $this->loadTemplate('links');
			?>
		</div>

<?php endif; ?>
<?php if ($this->params->get('show_pagination')) : ?>
		<?php echo $this->pagination->getPagesLinks(); ?>
<?php endif; ?>
<?php if ($this->params->get('show_pagination_results')) : ?>

		<?php echo $this->pagination->getPagesCounter(); ?>

<?php endif; ?>
</div>