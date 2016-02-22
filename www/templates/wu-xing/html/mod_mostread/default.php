<?php // no direct access

defined('_JEXEC') or die('Restricted access');

$mcounter = 0;

foreach ($list as $item){

if(!$mcounter){
?>

	<div class="content-o">
		<?php if($item->showLink){ ?>
			<h2><a href="<?php echo $item->link; ?>"><?php echo $item->name; ?></a></h2>
			<?php echo $item->text; ?>
			<a class="readon" href="<?php echo $item->link; ?>" title="<?php echo $item->name; ?>">Читать полностью</a>
			
		<?php }else{ ?>
			<h2><?php echo $item->name; ?></h2>
			<?php echo $item->text; ?>
		<?php }; ?>
	</div>
	<ul class="mostread<?php echo $params->get('moduleclass_sfx'); ?>">


<?php
}else{
?>

	<li>
		<a href="<?php echo $item->link; ?>">
			<?php echo $item->name; ?></a>
	</li>


<?php
	}
	$mcounter+=1;
};
?>
</ul>