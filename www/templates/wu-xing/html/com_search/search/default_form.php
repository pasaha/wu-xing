<?php defined('_JEXEC') or die('Restricted access'); ?>

<form id="searchForm" action="<?php echo JRoute::_( 'index.php?option=com_search' );?>" method="post" name="searchForm">
<div class="search-wr-main">

	<table class="contentpaneopen<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
		<tr>
			<td nowrap="nowrap">
				<span class="search"><input style="width:300px" type="text" name="searchword" id="search_searchword" size="30" maxlength="20" value="<?php echo $this->escape($this->searchword); ?>" class="inputbox" /></span>
			</td>
			<td width="100%" nowrap="nowrap">
				<button name="Search" onclick="this.form.submit()" class="button"><?php echo JText::_( 'Search' );?></button>
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<?php echo $this->lists['searchphrase']; ?>
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<label for="ordering">
					<?php echo JText::_( 'Ordering' );?>:
				</label>
				<?php echo $this->lists['ordering'];?>
			</td>
		</tr>
	</table>
</div>
	<?php if ($this->params->get( 'search_areas', 1 )) : ?>
<div class="search_areas">
		<?php foreach ($this->searchareas['search'] as $val => $txt) :
			$checked = is_array( $this->searchareas['active'] ) && in_array( $val, $this->searchareas['active'] ) ? 'checked="checked"' : '';
		?>
		<input type="checkbox" name="areas[]" value="<?php echo $val;?>" id="area_<?php echo $val;?>" <?php echo $checked;?> />
			<label for="area_<?php echo $val;?>">
				<?php echo JText::_($txt); ?>
			</label>
		<?php endforeach; ?>
</div>

	<?php endif; ?>


	<table class="searchintro<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
	<tr>
		<td colspan="3" class="search-view">
			<?php echo 'Результаты поиска: ' .' <b>'. $this->escape($this->searchword) .'</b>'; ?>
		</td>
	</tr>
	<tr>
		<td class="search-cmn">
			<?php echo $this->result; ?>
		</td>
	</tr>
</table>

<?php if($this->total > 0) : ?>
<div class="search-nav">
	<div class="fright">
		<label for="limit">
			<?php echo JText::_( 'Display Num' ); ?>
		</label>
		<?php echo $this->pagination->getLimitBox( ); ?>
	</div>
	<div class="s-cnt">
		<?php echo $this->pagination->getPagesCounter(); ?>
	</div>
</div>
<?php endif; ?>

<input type="hidden" name="task"   value="search" />
</form>
