<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<script language="javascript" type="text/javascript">

	function tableOrdering( order, dir, task )
	{
		var form = document.adminForm;

		form.filter_order.value 	= order;
		form.filter_order_Dir.value	= dir;
		document.adminForm.submit( task );
	}
</script>
<form action="<?php echo $this->action; ?>" method="post" name="adminForm">


<?php if ($this->params->get('filter') || $this->params->get('show_pagination_limit')) : ?>
<div class="page-from clearfix">
		<?php if ($this->params->get('filter')) : ?>
			<div class="fleft">
				<?php echo JText::_($this->params->get('filter_type') . ' Filter').'&nbsp;'; ?>
				<input type="text" name="filter" value="<?php echo $this->escape($this->lists['filter']);?>" class="inputbox" onchange="document.adminForm.submit();" />
			</div>
		<?php endif; ?>
		<?php if ($this->params->get('show_pagination_limit')) : ?>
			<div class="fright">
			<?php
				echo '&nbsp;&nbsp;&nbsp;'.JText::_('Display Num').'&nbsp;';
				echo $this->pagination->getLimitBox();
			?>
			</div>
		<?php endif; ?>
</div>
<?php endif; ?>



<br style="clear:both">

<div class="blog-list-wr blog_bg">
<ul class="blog-list hor">
<?php foreach ($this->items as $item) : ?>
<li>
	<div class="content-o<?php echo $this->escape($this->params->get( 'pageclass_sfx' )); ?>">
		<h2><a href="<?php echo $item->link; ?>"><?php echo $this->escape($item->title); ?></a></h2>
<?php if ($item->introtext && $item->fulltext) : ?>
		<div class="article-content">
			<?php echo $item->introtext; ?>
		</div>
<?php endif; ?>
	<a href="<?php echo $item->link; ?>" title="<?php echo $this->escape($item->title); ?>" class="readon<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
			<?php if ($this->item->readmore_register) : ?>
				<?php echo JText::_('Register to read more...'); ?>
			<?php else : ?>
				<?php echo JText::_('Read more...'); ?>
			<?php endif; ?>
	</a>

<?php if ($this->params->get('show_create_date')) : ?>
	<p class="date">
		<strong><?php echo JHTML::_('date', $this->item->created, JText::_('DATE_FORMAT_LC3')); ?></strong>
	</p>
<?php endif; ?>

	</div>
</li>
<?php endforeach; ?>
</ul>
</div>


<?php if ($this->params->get('show_pagination')) : ?>
	<div class="stf<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
		<?php echo $this->pagination->getPagesLinks(); ?>
	</div>
	<div class="stf-sub">
		<?php echo $this->pagination->getPagesCounter(); ?>
	</div>
<?php endif; ?>

<input type="hidden" name="id" value="<?php echo $this->category->id; ?>" />
<input type="hidden" name="sectionid" value="<?php echo $this->category->sectionid; ?>" />
<input type="hidden" name="task" value="<?php echo $this->lists['task']; ?>" />
<input type="hidden" name="filter_order" value="" />
<input type="hidden" name="filter_order_Dir" value="" />
<input type="hidden" name="limitstart" value="0" />
<input type="hidden" name="viewcache" value="0" />
</form>
