<?php
/**
 * $Id: default.php 11917 2009-05-29 19:37:05Z ian $
 */
defined( '_JEXEC' ) or die( 'Restricted access' );

$cparams = JComponentHelper::getParams ('com_media');
?>
<?php if ( $this->params->get( 'show_page_title', 1 ) && !$this->contact->params->get( 'popup' ) && $this->params->get('page_title') != $this->contact->name ) : ?>
	<div class="componentheading<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
		<?php echo $this->params->get( 'page_title' ); ?>
	</div>
<?php endif; ?>
<div id="component-contact">


<?php if ( $this->params->get( 'show_contact_list' ) && count( $this->contacts ) > 1) : ?>
<div>
		<form action="<?php echo JRoute::_('index.php') ?>" method="post" name="selectForm" id="selectForm">
		<?php echo JText::_( 'Select Contact' ); ?>:
			<br />
			<?php echo JHTML::_('select.genericlist',  $this->contacts, 'contact_id', 'class="inputbox" onchange="this.form.submit()"', 'id', 'name', $this->contact->id);?>
			<input type="hidden" name="option" value="com_contact" />
		</form>
</div>
<?php endif; ?>
<?php if ( $this->contact->name && $this->contact->params->get( 'show_name' ) ) : ?>
<div class="contentheading<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
		<?php echo $this->escape($this->contact->name); ?>
</div>
<?php endif; ?>
<?php if ( $this->contact->con_position && $this->contact->params->get( 'show_position' ) ) : ?>
<div class="con_position">
	<?php echo $this->escape($this->contact->con_position); ?>
</div>
<?php endif; ?>
<div class="contact">
<?php if ( $this->contact->image && $this->contact->params->get( 'show_image' ) ) : ?>
<div class="c-image">
	<?php echo JHTML::_('image', 'images/stories' . '/'.$this->contact->image, JText::_( 'Contact' ), array('align' => 'middle')); ?>
</div>
	<?php endif; ?>
<div class="address">
<?php echo $this->loadTemplate('address'); ?>
</div>
</div>
<?php if ( $this->contact->params->get( 'allow_vcard' ) ) : ?>
<div>
	<?php echo JText::_( 'Download information as a' );?>
		<a href="<?php echo JURI::base(); ?>index.php?option=com_contact&amp;task=vcard&amp;contact_id=<?php echo $this->contact->id; ?>&amp;format=raw&amp;tmpl=component">
			<?php echo JText::_( 'VCard' );?></a>
</div>
<?php endif;
if ( $this->contact->params->get('show_email_form') && ($this->contact->email_to || $this->contact->user_id))
	
	echo '<br style="clear:both;"/><hr />' . $this->loadTemplate('form');
?>
</div>
