<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

include_once (dirname(__FILE__).DS.'/ja_vars.php');

?>
<?php
	//ie6 Quirks Mode
function is_ie6($user_agent) {
  $count = 0;
  str_ireplace('msie', '', $user_agent, $count);
  if ($count > 1) {
    return False;
  }
  if (stripos($user_agent, 'msie 6') === False) {
    return False; 
  }
  return True;                                                       
}
if (!is_ie6($_SERVER['HTTP_USER_AGENT'])) {
echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';

} 
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>">

<head>
<jdoc:include type="head" />
<?php JHTML::_('behavior.mootools'); ?>

<?php /* ?>



<link rel="stylesheet" href="<?php echo $tmpTools->baseurl(); ?>templates/system/css/system.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $tmpTools->baseurl(); ?>templates/system/css/general.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $tmpTools->templateurl(); ?>/css/template.css" type="text/css" />
<script language="javascript" type="text/javascript" src="<?php echo $tmpTools->templateurl(); ?>/js/ja.script.js"></script>

<?php if ($tmpTools->getParam('rightCollapsible')): ?>
<script language="javascript" type="text/javascript">
var rightCollapseDefault='<?php echo $tmpTools->getParam('rightCollapseDefault'); ?>';
var excludeModules='<?php echo $tmpTools->getParam('excludeModules'); ?>';
</script>
<script language="javascript" type="text/javascript" src="<?php echo $tmpTools->templateurl(); ?>/js/ja.rightcol.js"></script>
<?php endif; ?>

<?php  if($this->direction == 'rtl') : ?>
<link rel="stylesheet" href="<?php echo $tmpTools->templateurl(); ?>/css/template_rtl.css" type="text/css" />
<?php else : ?>
<link rel="stylesheet" href="<?php echo $tmpTools->templateurl(); ?>/css/menu.css" type="text/css" />
<?php endif; ?>

<?php if ($this->countModules('hornav')): ?>
<?php if ($tmpTools->getParam('horNavType') == 'css'): ?>
<link rel="stylesheet" href="<?php echo $tmpTools->templateurl(); ?>/css/ja-sosdmenu.css" type="text/css" />
<script language="javascript" type="text/javascript" src="<?php echo $tmpTools->templateurl(); ?>/js/ja.cssmenu.js"></script>
<?php else: ?>
<link rel="stylesheet" href="<?php echo $tmpTools->templateurl(); ?>/css/ja-sosdmenu.css" type="text/css" />
<script language="javascript" type="text/javascript" src="<?php echo $tmpTools->templateurl(); ?>/js/ja.moomenu.js"></script>
<?php endif; ?>
<?php endif; ?>

<?php if ($tmpTools->getParam('theme_header') && $tmpTools->getParam('theme_header')!='-1') : ?>
<link rel="stylesheet" href="<?php echo $tmpTools->templateurl(); ?>/styles/header/<?php echo $tmpTools->getParam('theme_header'); ?>/style.css" type="text/css" />
<?php endif; ?>
<?php if ($tmpTools->getParam('theme_background') && $tmpTools->getParam('theme_background')!='-1') : ?>
<link rel="stylesheet" href="<?php echo $tmpTools->templateurl(); ?>/styles/background/<?php echo $tmpTools->getParam('theme_background'); ?>/style.css" type="text/css" />
<?php endif; ?>
<?php if ($tmpTools->getParam('theme_elements') && $tmpTools->getParam('theme_elements')!='-1') : ?>
<link rel="stylesheet" href="<?php echo $tmpTools->templateurl(); ?>/styles/elements/<?php echo $tmpTools->getParam('theme_elements'); ?>/style.css" type="text/css" />
<?php endif; ?>

<!--[if IE 7.0]>
<style type="text/css">
.clearfix {display: inline-block;}
</style>
<![endif]-->
<?php if ($tmpTools->isIE6()): ?>
<!--[if lte IE 6]>
<script type="text/javascript">
var siteurl = '<?php echo $tmpTools->baseurl();?>';

window.addEvent ('load', makeTransBG);
function makeTransBG() {
	fixIEPNG($E('.ja-headermask'), '', '', 1);
	fixIEPNG($E('h1.logo a'));
	fixIEPNG($$('img'));
	fixIEPNG ($$('#ja-mainnav ul.menu li ul'), '', 'scale', 0, 2);
}
</script>
<style type="text/css">
.ja-headermask, h1.logo a, #ja-cssmenu li ul { background-position: -1000px; }
#ja-cssmenu li ul li, #ja-cssmenu li a { background:transparent url(<?php echo $tmpTools->templateurl(); ?>/images/blank.png) no-repeat right;}
.clearfix {height: 1%;}
</style>
<![endif]-->
<?php endif; ?>

<style type="text/css">
#ja-header,#ja-mainnav,#ja-container,#ja-botsl,#ja-footer {width: <?php echo $tmpWidth; ?>;margin: 0 auto;}
#ja-wrapper {min-width: <?php echo $tmpWrapMin; ?>;}
</style>

<?php */ ?>



<!--[if IE 8]>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<![endif]-->	
<link rel="stylesheet" href="<?php echo $tmpTools->templateurl(); ?>/_inc/css/index.css" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
 <script type="text/javascript">
     jQuery.noConflict();
 </script>
<!--[if (gt IE 7)|!(IE)]><!-->
	<link rel="stylesheet" href="<?php echo $tmpTools->templateurl(); ?>/_inc/css/uri.css" type="text/css" />
<!--<![endif]-->
<!--[if lte IE 7]>
	<link rel="stylesheet" href="<?php echo $tmpTools->templateurl(); ?>/_inc/css/ie_uri.php" type="text/css" />
<![endif]-->

<!--[if gt IE 6]>
<script type="text/javascript" src="<?php echo $tmpTools->templateurl(); ?>/_inc/js/dd_belatedpng_0.0.8a-min.js"></script>
<script type="text/javascript">
DD_belatedPNG.fix('.png');
</script>

<![endif]-->

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-24853014-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
      function initialize() {
        var myOptions = {
          scaleControl: true,
  //        center: new google.maps.LatLng(55.73700760521405,37.66770749330135),
          center: new google.maps.LatLng(55.796146,37.776953),
  //        center: new google.maps.LatLng(55.77206306774709,37.68493800401302),
          zoom: 11,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var map = new google.maps.Map(document.getElementById('map_google'),
            myOptions);

        var marker1 = new google.maps.Marker({
          map: map,
 //         position: new google.maps.LatLng(55.77206306774709,37.68493800401302)
          position: new google.maps.LatLng(55.796146,37.776953)
        });
        var infowindow1 = new google.maps.InfoWindow();
        infowindow1.setContent('<h3>Зал на м. Измайловская</h3><p><b>Семейный клуб "Морелия"</b></p><p>\r\n2-я Прядильная д. 3, кор. 2<\/p>');
        google.maps.event.addListener(marker1, 'click', function() {
            infowindow1.open(map, marker1);
        });
 /*
        var marker2 = new google.maps.Marker({
          map: map,
          position: new google.maps.LatLng(55.71321081939507,37.58249371289821)
        });
        var infowindow2 = new google.maps.InfoWindow();
        infowindow2.setContent('<h3>Нескучный сад</h3><p>\r\n(5 мин от метро) - открытая площадка<\/p>');
        google.maps.event.addListener(marker2, 'click', function() {
            infowindow2.open(map, marker2);
        });

        var marker3 = new google.maps.Marker({
          map: map,
          position: new google.maps.LatLng(55.7072057086225,37.733013918395955)
        });
        var infowindow3 = new google.maps.InfoWindow();
        infowindow3.setContent('<h3>Текстильщики</h3><p>\r\n(5 мин от метро) - открытая площадка<\/p>');
        google.maps.event.addListener(marker3, 'click', function() {
            infowindow3.open(map, marker3);
        });*/
      }

</script>
</head>

<body id="body" class="fs<?php echo $tmpTools->getParam(JA_TOOL_FONT);?> <?php echo $tmpTools->browser();?>" >

<!--LiveInternet counter--><script type="text/javascript"><!--
new Image().src = "//counter.yadro.ru/hit?r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";h"+escape(document.title.substring(0,80))+
";"+Math.random();//--></script><!--/LiveInternet-->

<div id="main-wrap">
<?php if( $this->countModules('top') ): ?>
	  <div id="top-include">
			<jdoc:include type="modules" name="top" style="xhtml" />
	  </div>
<?php endif; ?>
<div class="sh sh-out" id="outwrap">
	<div class="c">
		<div class="cc" id="outline">
			<div id="hd">
<?php
//echo('<pre>');
//print_r($this);
//echo('</pre>');
?>
<!-- BEGIN: HEADER -->
				<h2 id="logo">
<?php if($tmpTools->isFrontPage()){ ?>
					<span>Клуб «У Синъ»</span>	Школа боевых искусств
<?php }else{ ?>
					<a href="/" title="<?php echo $siteName; ?>">
						<span>Клуб «У Синъ»</span>	Школа боевых искусств
					</a>
<?php } ?>
				</h2>
				<?php if($this->countModules('user4')) : ?>
				<div id="ja-search" class="user4">
					<noindex>
					<ul class="social-icons hor">
						<li><a class="social-icons__icon social-icons__icon_vk" href="http://vk.com/wu_xing" title="группа ВКонтакте" target="_blank" rel="nofollow">ВКонтакте</a></li>
						<li><a class="social-icons__icon social-icons__icon_yt" href="http://www.youtube.com/user/WuXingRussia" title="канал в YouTube" target="_blank" rel="nofollow">YouTube</a></li>
					</ul>
					</noindex>
					<jdoc:include type="modules" name="user4" />
				</div>
				<?php endif; ?>
			</div>
<!-- END: HEADER -->
<!-- BEGIN: MAIN NAVIGATION -->
			<div id="main-list">
<?php if ($this->countModules('hornav')): ?>
	<jdoc:include type="modules" name="hornav" />
<?php endif; ?>
			</div>
<!-- END: MAIN NAVIGATION -->				
<?php if(!$tmpTools->isFrontPage()) : ?>
			<div id="pathway">
				<jdoc:include type="module" name="breadcrumbs" />
			</div>
<?php endif ; ?>
<jdoc:include type="message" />
<div id="bd">
	<div id="ja-containerwrap<?php echo $divid; ?>" class="clearfix cols">

		<div id="content" class="mcoll">
			<div class="tube">
	
				<jdoc:include type="component" />
	
<?php if($this->countModules('banner')) : ?>
				<div id="banners">
					<jdoc:include type="modules" name="banner" />
				</div>
<?php endif; ?>
			
			</div>
		</div>

		<?php if ($this->countModules('left') || $this->countModules('right')): ?>
		<!-- BEGIN: LEFT COLUMN -->
		<div id="left-right" class="right-coll">
<?php if ($this->countModules('left')): ?>
			<jdoc:include type="modules" name="left" style="xhtml" />
<?php endif; ?>
<?php if ($this->countModules('right')): ?>
			<jdoc:include type="modules" name="right" style="xhtml" />
<?php endif; ?>
		</div>
		<!-- END: LEFT COLUMN -->
		<?php endif; ?>

	</div>

<?php if( $this->countModules('user1') ): ?>
	<div id="user-1" class="clearfix cols">
			<jdoc:include type="modules" name="user1" style="xhtml" />
	</div>
<?php endif; ?>


<?php if( $this->countModules('user2') ||  $this->countModules('user3') ): ?>
<div id="user-inc" class="clearfix cols">


<?php if( $this->countModules('user2') ): ?>
	<div id="user-2" class="mcoll">
			<jdoc:include type="modules" name="user2" style="xhtml" />
	</div>
<?php endif; ?>

<?php if( $this->countModules('user3') ): ?>
	<div id="user-3" class="right-coll">
			<jdoc:include type="modules" name="user3" style="xhtml" />
	</div>
<?php endif; ?>

</div>
<?php endif; ?>

</div>

	</div>
	<div id="ft" class="cc">
<?php if( $this->countModules('user5') ): ?>
		<div id="bott-menu" class="hor user5">
			<jdoc:include type="modules" name="user5" style="xhtml" />
		</div>
<?php endif; ?>
		<div class="tube cols">
<p class="copy">2011 © wu-xing.ru | 2011 © Школа боевых искусств «У Синъ»</p>

			<div class="copy-coll">
				<jdoc:include type="modules" name="footer" />
			</div>
				<div class="counters">
					<p>
						
					</p>
				</div>
				<div id="copy-right">
<jdoc:include type="modules" name="syndicate" />
				</div>
			</div>
		</div>

		<i class="sll"></i><i class="srr"></i>
	</div>
	<i class="t tll"></i><i class="t trr"></i><i class="b bll"></i><i class="b brr"></i>
</div>
<div class="d-wr">
	<div class="d-afts owr">
		<i class="dragon-l"></i><i class="dragon-r-1"></i><i class="dragon-r-2"></i>
	</div>
</div>
</div>
<jdoc:include type="modules" name="debug" />

</body>

</html>
