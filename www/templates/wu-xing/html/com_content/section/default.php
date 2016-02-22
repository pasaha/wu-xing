<?php // no direct access
defined('_JEXEC') or die('Restricted access');
$cparams =& JComponentHelper::getParams('com_media');
?>
<?php if ($this->params->get('show_page_title', 1)) : ?>
<div class="componentheading<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
	<?php echo $this->escape($this->params->get('page_title')); ?>
</div>
<?php endif; ?>

<div class="contentpane<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">

<?php if ($this->params->get('show_description') && $this->section->description) : ?>
<div class="contentdescription<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>" colspan="2">
	<?php if ($this->params->get('show_description_image') && $this->section->image) : ?>
		<img src="<?php echo $this->baseurl . '/' . $cparams->get('image_path') . '/'.  $this->section->image;?>" align="<?php echo $this->section->image_position;?>" hspace="6" alt="<?php echo $this->section->image;?>" />
	<?php endif; ?>
		<?php echo $this->section->description; ?>
</div>
<?php endif; ?>

<?php if ($this->params->get('show_categories', 1)) : ?>
<div class="blog-list-wr blog_bg">
<ul class="cat-list vert">

	<?php
	$counter = 0;
	 foreach ($this->categories as $category) : ?>
		<?php if (!$this->params->get('show_empty_categories') && !$category->numitems) continue; ?>
		<li<?php if ($counter%2!=0) : ?> class="odd"<?php endif; ?>>
			<h2><a href="<?php echo $category->link; ?>"><?php echo $this->escape($category->title);?></a></h2>
			<?php if ($this->params->def('show_category_description', 1) && $category->description) : ?>

			<?php echo $category->description; ?>
			<?php endif; ?>
			
			<?php if ($this->params->get('show_cat_num_articles')) : ?>
			<p class="pab">
			<a class="readon" title="<?php echo $this->escape($category->title);?>" href="<?php echo $category->link; ?>">Список публикаций</a>
			Публикаций:<span>
				 <?php if ($category->numitems==1) {
				echo $category->numitems;}
				else {
				echo $category->numitems;} ?>
			</span></p>
			<?php endif; ?>
			
		</li>
	<?php 
	$counter += 1;

	endforeach; ?>
	</ul>
</div>
<?php endif; ?>

</div>
