<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<?php if ($headerText) : ?>
<h4 class="bannerheader"><?php echo $headerText ?></h4>

<?php endif; ?>
<ul class="banners<?php echo $params->get( 'moduleclass_sfx' ) ?>">
<?php foreach($list as $item) :

	?><li><?php
	echo modBannersHelper::renderBanner($params, $item);
	?>
	</li>
<?php endforeach; ?>

</ul>
<?php if ($footerText) : ?>
<p class="bannerfooter<?php echo $params->get( 'moduleclass_sfx' ) ?>">
		 <?php echo $footerText ?>
</p>
<?php endif; ?>
