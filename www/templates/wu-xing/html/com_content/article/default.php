<?php // no direct access
defined('_JEXEC') or die('Restricted access'); 

?>





<?php
 /* if ($this->params->get('show_page_title', 1) && $this->params->get('page_title') != $this->article->title) : ?>
<div class="componentheading"><?php echo $this->escape($this->params->get('page_title')); ?></div>
<?php endif; */ ?>

<?php if (($this->user->authorize('com_content', 'edit', 'content', 'all') || $this->user->authorize('com_content', 'edit', 'content', 'own')) && !$this->print) : ?>
	<div class="contentpaneopen_edit" >
		<?php echo JHTML::_('icon.edit', $this->article, $this->params, $this->access); ?>
	</div>
<?php endif; ?>

<?php if ($this->params->get('show_title',1)) : ?>
<h1><index><?php echo $this->escape($this->article->title); ?></index></h1>
<?php endif; ?>

<?php  if (!$this->params->get('show_intro')) :
	echo $this->article->event->afterDisplayTitle;
endif; ?>
<?php if (0 && $this->params->get('show_create_date') && $this->article->sectionid != 4) : ?>
	<p class="date date-hd">
		<strong><?php echo JHTML::_('date', $this->article->created, JText::_('DATE_FORMAT_LC3')) ?></strong>
	</p>
<?php endif; ?>

<?php echo $this->article->event->beforeDisplayContent; ?>

<div class="article-content article-single sing-<?php echo $this->article->sectionid; ?>">
	<?php if (isset ($this->article->toc)) : ?>
		<?php echo $this->article->toc; ?>
	<?php endif; ?>
	<index>
	<?php echo $this->article->text; ?>
	</index>
</div>


<?php if ( intval($this->article->modified) !=0 && $this->params->get('show_modify_date')) : ?>
	<p class="date">
<?php if ($this->params->get('show_create_date') && $this->article->sectionid == 4) : ?>
		<strong><?php echo JHTML::_('date', $this->article->created, JText::_('DATE_FORMAT_LC3')) ?></strong>
<?php endif; ?>
<?php if ( intval($this->article->modified) !=0 && $this->params->get('show_modify_date')) : ?>
		Последнее обновление: <em><?php echo JHTML::_('date', $this->article->modified, JText::_('DATE_FORMAT_LC3')) ?></em>
<?php endif; ?>
	<?php if ($this->params->get('show_hits')) : ?>
	<span class="fright">
		Просмотров:<em><?php echo $this->escape($this->article->hits) ? $this->escape($this->article->hits) : '-'; ?></em>
	</span>
	<?php endif; ?>

	</p>
<?php endif; ?>

<?php if ($this->escape($this->article->created_by_alias)) : ?>
<noindex>
		<p class="article-url">
			Источник: <a href="http://<?php echo $this->escape($this->article->created_by_alias) ; ?>" target="_blank">
				<?php echo $this->escape($this->article->created_by_alias); ?></a>
		</p>
</noindex>
<?php endif; ?>


<?php if ( false && ($this->article->sectionid == 4 || $this->article->sectionid == 3 || $this->article->sectionid == 5 )) : ?>
<div class="social-incs">

<div class="fb_share">
   <a name="fb_share" type="button" share_url="http://wu-xing.pasaha.ru/xingyiquan/25-xingyiquan-project/23-st9.html">Share</a>
	<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
</div>

<div class="fb_like">
	<iframe width="90" height="20" src="http://www.facebook.com/plugins/like.php?locale=en_US&href=http%3A%2F%2Fwu-xing.pasaha.ru%2Fxingyiquan%2F25-xingyiquan-project%2F23-st9.html&amp;layout=button_count&amp;show_faces=true&amp;action=like&amp;colorscheme=light" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
</div>

<div style="width: 60px !important; float: left; margin-left: 10px; border: none;">
	<script type="text/javascript" src="http://apis.google.com/js/plusone.js"></script>
	<g:plusone size="medium"></g:plusone>
</div>

<div style=" float: left; margin-left: 10px; margin-top: 0px; border: none;">
	<a counter="yes" type="icon" size="large" name="ya-share"> </a>
	<script charset="utf-8" type="text/javascript">if (window.Ya && window.Ya.Share) {Ya.Share.update();} else {(function(){if(!window.Ya) { window.Ya = {} };Ya.STATIC_BASE = 'http:\/\/img\-css.friends.yandex.net\/';Ya.START_BASE = 'http:\/\/my.ya.ru\/';var shareScript = document.createElement("script");shareScript.type = "text/javascript";shareScript.async = "true";shareScript.charset = "utf-8";shareScript.src = Ya.STATIC_BASE + "/js/api/Share.js";(document.getElementsByTagName("head")[0] || document.body).appendChild(shareScript);})();}</script>
</div>

<div style="float: left; margin-left: 10px; border: none;" >
	<a class="odkl-klass" href="http://wu-xing.pasaha.ru/xingyiquan/25-xingyiquan-project/23-st9.html" onclick="ODKL.Share(this);return false;">Класс!</a>
</div>

<div style="width: 150px !important; float: left; margin-left: 10px; border: none;">
<a target="_blank" class="mrc__plugin_like_button" href="http://connect.mail.ru/share" data-mrc-config={type:button,width:150}>Поделиться</a>
<script src="http://cdn.connect.mail.ru/js/loader.js" type="text/javascript" charset="UTF-8"></script>
</div>

</div>
<?php endif; ?>
<?php

if ($this->article->sectionid != 5) : // кроме раздел 'раздел'  
echo '<a class="back" href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($this->article->catid, $this->article->sectionid)).'"><i>«</i> Вернуться</a>';
endif;

?>

<?php echo $this->article->event->afterDisplayContent; ?>
