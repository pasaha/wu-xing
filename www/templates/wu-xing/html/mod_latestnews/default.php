<?php // no direct access
defined('_JEXEC') or die('Restricted access');

if($params->get('catid')==1){

 ?>


<dl class="newslist<?php echo $params->get('moduleclass_sfx'); ?>">
<?php foreach ($list as $item) :  ?>
	<?php if (0) { ?>
	<dt class="date">
		<strong><?php echo JHTML::_('date', $item->created, JText::_('DATE_FORMAT_LC3')); ?></strong>
	</dt>
	<?php }; ?>
	<dd>
		<a href="<?php echo $item->link; ?>"><?php echo $item->text; ?></a>
	</dd>
<?php endforeach; ?>
</dl>

<?php } else { ?>

<ul class="latest<?php echo $params->get('moduleclass_sfx'); ?>">
<?php foreach ($list as $item) :  ?>
	<li>
		<a href="<?php echo $item->link; ?>"><?php echo $item->text; ?></a>
	</li>
<?php endforeach; ?>
</ul>

<?php }; ?>