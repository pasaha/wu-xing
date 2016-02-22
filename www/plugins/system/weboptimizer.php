<?php
// ==============================================================================================
// Licensed under the GNU GPLv3 (LICENSE.txt)
// ==============================================================================================
// @author     Nikolay Matsievsky aka sunnybear (http://www.web-optimizer.us/)
// @version    0.6.7
// @copyright  Copyright &copy; 2009 Nikolay Matsievsky, All Rights Reserved
// ==============================================================================================
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.plugin.plugin');
/**
 * Web Optimizer system plugin
 */
class plgSystemWebOptimizer extends JPlugin {
/* optimization configuration */
	var $_options;
/* load options and make all changes on the server side */
	function plgSystemWebOptimizer(&$subject, $config) {
		global $mainframe;
		parent::__construct($subject, $config);
		if (empty($_SERVER['DOCUMENT_ROOT']) || strpos(JPATH_ROOT, $_SERVER['DOCUMENT_ROOT']) === false) {
			$document_root = realpath(JPATH_ROOT) . '/';
		} else {
			$document_root = realpath($_SERVER['DOCUMENT_ROOT']) . '/';
		}
/* load config options */
		$config =& JFactory::getConfig();
		$this->_options = array(
			'javascript_cachedir' => str_replace('\\', '/', realpath(JPATH_ROOT . '/cache/wo')) . '/',
			'css_cachedir' => str_replace('\\', '/', realpath(JPATH_ROOT . '/cache/wo')) . '/',
			'html_cachedir' => str_replace('\\', '/', realpath(JPATH_ROOT . '/cache/wo')) . '/',
			'website_root' => str_replace('\\', '/', realpath(JPATH_ROOT)) . '/',
			'document_root' => str_replace('\\', '/', $document_root),
			'host' => $_SERVER['HTTP_HOST'],
			'active' => 1,
			'php' => substr(phpversion(), 0, 1),
			'buffered' => 0,
			'license' => $this->params->get('license', ''),
			'unobtrusive' => array(
				'on' => $this->params->get('unobtrusive_on', false),
				'body' => $this->params->get('unobtrusive_body', false),
				'all' => $this->params->get('unobtrusive_all', false),
				'informers' => $this->params->get('unobtrusive_informers', false),
				'counters' => $this->params->get('unobtrusive_counters', false),
				'ads' => $this->params->get('unobtrusive_ads', false),
				'iframes' => $this->params->get('unobtrusive_iframes', false)
			),
			'external_scripts' => array(
				'on' => $this->params->get('external_scripts_on', true),
				'inline' => $this->params->get('external_scripts_inline', true),
				'head_end' => $this->params->get('external_scripts_head_end', true),
				'css' => $this->params->get('external_scripts_css', true),
				'css_inline' => $this->params->get('external_scripts_css_inline', true),
				'ignore_list' => $this->params->get('external_scripts_ignore_list', 'tiny_mce.js tiny_mce_gzip.php fckeditor.js'),
				'include_code' => $this->params->get('external_scripts_include_code', ''),
				'user' => $this->params->get('external_scripts_user', ''),
				'pass' => $this->params->get('external_scripts_pass', '')
			),
			'performance' => array(
				'mtime' => $this->params->get('performance_mtime', true),
				'plain_string' => $this->params->get('performance_plain_string', true),
				'quick_check' => $this->params->get('performance_quick_check', false),
				'cache_version' => $this->params->get('performance_cache_version', 0),
				'uniform_cache' => $this->params->get('performance_uniform_cache', false)
			),
			'minify' => array(
				'javascript' => $this->params->get('minify_javascript', true),
				'javascript_body' => $this->params->get('minify_javascript_body', false),
				'with_jsmin' => $this->params->get('minify_with', '') == 'with_jsmin' && $this->params->get('minify_javascript_with', true),
				'with_packer' => $this->params->get('minify_with', '') == 'with_packer' && $this->params->get('minify_javascript_with', true),
				'with_yui' => $this->params->get('minify_with', '') == 'with_yui' && $this->params->get('minify_javascript_with', true),
				'css' => $this->params->get('minify_css', true),
				'css_body' => $this->params->get('minify_css_body', false),
				'page' => $this->params->get('minify_page', true),
				'html_comments' => $this->params->get('minify_html_comments', false),
				'html_one_string' => $this->params->get('minify_html_one_string', false),
				'css_file' => $this->params->get('minify_css_file', ''),
				'javascript_file' => $this->params->get('minify_javascript_file', '')
			),
			'gzip' => array(
				'javascript' => $this->params->get('gzip_javascript', true),
				'css' => $this->params->get('gzip_css', true),
				'page' => $this->params->get('gzip_page', true),
				'fonts' => $this->params->get('gzip_fonts', true),
				'cookie' => $this->params->get('gzip_cookie', true),
				'noie' => $this->params->get('gzip_noie', false),
				'javascript_level' => $this->params->get('gzip_javascript_level', 7),
				'page_level' => $this->params->get('gzip_page_level', 7),
				'css_level' => $this->params->get('gzip_css_level', 7),
				'fonts_level' => $this->params->get('gzip_fonts_level', 7)
			),
			'far_future_expires' => array(
				'javascript' => $this->params->get('far_future_expires_javascript', true),
				'css' => $this->params->get('far_future_expires_css', true),
				'fonts' => $this->params->get('far_future_expires_fonts', true),
				'images' => $this->params->get('far_future_expires_images', true),
				'video' => $this->params->get('far_future_expires_video', true),
				'static' => $this->params->get('far_future_expires_static', true),
				'html' => $this->params->get('far_future_expires_html', false),
				'html_timeout' => $this->params->get('far_future_expires_html_timeout', 60),
				'external' => $this->params->get('far_future_expires_external', false)
			),
			'html_cache' => array(
				'enabled' => $this->params->get('html_cache_enabled', false),
				'timeout' => $this->params->get('html_cache_timeout', 600),
				'flush_only' => $this->params->get('html_cache_flush_only', true),
				'flush_size' => $this->params->get('html_cache_flush_size', 1024),
				'ignore_list' => $this->params->get('html_cache_ignore_list', ''),
				'allowed_list' => $this->params->get('html_cache', 'office data msfrontpage yahoo googlebot yandex yadirect dyatel msnbot twiceler'),
			),
			'footer' => array(
				'text' => $this->params->get('footer_text', true),
				'image' => $this->params->get('footer_image', 'web.optimizer.stamp.png'),
				'link' => $this->params->get('footer_link', 'Accelerated with Web Optimizer'),
				'css_code' => $this->params->get('footer_css_code', 'float:right;margin:-104px 4px -100px'),
				'spot' => $this->params->get('footer_spot', true),
			),
			'data_uris' => array(
				'on' => $this->params->get('data_uris_on', true),
				'mhtml' => $this->params->get('data_uris_mhtml', true),
				'separate' => $this->params->get('data_uris_separate', true),
				'domloaded' => $this->params->get('data_uris_domloaded', false),
				'smushit' => $this->params->get('data_uris_smushit', false),
				'size' => $this->params->get('data_uris_size', 24576),
				'mhtml_size' => $this->params->get('data_uris_mhtml_size', 51200),
				'ignore_list' => $this->params->get('data_uris_ignore_list', ''),
				'additional_list' => $this->params->get('data_uris_additional_list', '')
			),
			'css_sprites' => array(
				'enabled' => $this->params->get('css_sprites_enabled', true),
				'truecolor_in_jpeg' => $this->params->get('css_sprites_truecolor_in_jpeg', false),
				'aggressive' => $this->params->get('css_sprites_aggressive', false),
				'extra_space' => $this->params->get('css_sprites_extra_space', true),
				'no_ie6' => $this->params->get('css_sprites_no_ie6', true),
				'memory_limited' => $this->params->get('css_sprites_memory_limited', true),
				'dimensions_limited' => $this->params->get('css_sprites_dimensions_limited', 900),
				'ignore_list' => $this->params->get('css_sprites_ignore_list', 'corners.gif')
			),
			'parallel' => array(
				'enabled' => $this->params->get('parallel_enabled', true),
				'check' => $this->params->get('parallel_check', true),
				'allowed_list' => $this->params->get('parallel_allowed_list', ''),
				'additional' => $this->params->get('parallel_additional', ''),
				'additional_list' => $this->params->get('parallel_additional_list', '')
			),
			'htaccess' => array(
				'enabled' => $this->params->get('htaccess_enabled', true),
				'mod_deflate' => $this->params->get('htaccess_mod_deflate', true),
				'mod_gzip' => $this->params->get('htaccess_mod_gzip', true),
				'mod_expires' => $this->params->get('htaccess_mod_expires', true),
				'mod_headers' => $this->params->get('htaccess_mod_headers', true),
				'mod_setenvif' => $this->params->get('htaccess_mod_setenvif', true),
				'mod_rewrite' => $this->params->get('htaccess_mod_rewrite', true),
				'mod_mime' => $this->params->get('htaccess_mod_mime', true),
				'local' => $this->params->get('htaccess_local', false)
			),
		);
		if ($mainframe->isAdmin()) {
/* check and write (if required) .htaccess rules */
			$htaccess = $this->_options['website_root'] . '.htaccess';
			$content = @file_get_contents($htaccess);
			$webo_cachedir = $this->_options['website_root'] . 'plugins/system/web-optimizer/';
			if (!strpos($content, 'Web Optimizer')) {
				require($webo_cachedir . 'libs/php/view.php');
				$view = new compressor_view();
				$view->set_paths($this->_options['document_root']);
				$view->paths['full']['current_directory'] = $webo_cachedir;
				require($webo_cachedir . 'controller/admin.php');
/* Con. the admin controller */
				$admin = new admin(array(
					'view' => $view,
					'basepath' => $webo_cachedir,
					'skip_render' => 1)
				);
				if (!@is_file($webo_cachedir . 'index.before')) {
/* download initial website state */
					$admin->view->download('http://webo.name/check/index2.php?url=' . $_SERVER['HTTP_HOST'] . '&mode=xml&source=wo', $webo_cachedir . 'index.before', 1);
				}
				$admin->input['user'] = $admin->compress_options = $this->_options;
				$admin->set_options(0);
/* write all rules to .htaccess file */
				$admin->write_htaccess(1);
			}
/* check for default files in cache */
			if (!@is_file($this->_options['css_cachedir'] . $this->_options['footer']['image'])) {
				@copy($webo_cachedir . 'images/' . $this->_options['footer']['image'], $this->_options['css_cachedir'] . 'web.optimizer.stamp.png');
			}
			if (!@is_file($this->_options['javascript_cachedir'] . 'yass.loader.js')) {
				@copy($webo_cachedir . 'libs/js/yass.loader.js', $this->_options['javascript_cachedir'] . 'yass.oader.js');
			}
			if (!@is_file($this->_options['javascript_cachedir'] . 'wo.cookie.php')) {
				@copy($webo_cachedir . 'libs/js/wo.cookie.php', $this->_options['javascript_cachedir'] . 'wo.cookie.php');
			}
			if (!@is_file($this->_options['html_cachedir'] . 'wo.static.php')) {
				@copy($webo_cachedir . 'libs/php/wo.static.php', $this->_options['html_cachedir'] . 'wo.static.php');
			}
		}
/* check for cache directory */
		if (!@is_dir(JPATH_ROOT . '/cache/wo/')) {
			@mkdir(JPATH_ROOT . '/cache/wo/', octdec("0755"));
		}
	}
/* Prepare content */	
	function onAfterRender() {
		global $mainframe;
		$content = JResponse::toString();
/* skip admin and debug modes */
		if ($mainframe->isAdmin() || JDEBUG || empty($content)) {
			return;
		}
		if ($this->_options['php'] == 4) {
			if (!class_exists('compressor')) {
				require(JPATH_ROOT . '/plugins/system/web-optimizer/controller/compressor.php');
			}
/* Include this for path getting help */
			if (!class_exists('compressor_view')) {
				require(JPATH_ROOT . '/plugins/system/web-optimizer/libs/php/view.php');
			}
/* skip __autoload for PPH5+ */
		} else {
			if (!class_exists('compressor', false)) {
				require(JPATH_ROOT . '/plugins/system/web-optimizer/controller/compressor.php');
			}
/* Include this for path getting help */
			if (!class_exists('compressor_view', false)) {
				require(JPATH_ROOT . '/plugins/system/web-optimizer/libs/php/view.php');
			}
		}
/* Con. the view library */
		$view = new compressor_view();
/* create libraries array -- include them only if we are really compressing */
		$libraries = array();
/* Include this for CSS Sprites generating */
		$libraries['css_sprites'] = 'css.sprites.php';
		$libraries['css_sprites_optimize'] = 'css.sprites.optimize.php';
		if ($this->_options['php'] == 4) {
/* JSMin */
			$libraries['JSMin'] = 'jsmin4.php';
/* Dean Edwards Packer */
			$libraries['JavaScriptPacker'] = 'packer4.php';
/* CSS Tidy */
			$libraries['csstidy'] = 'class.csstidy4.php';
/* YUI Compressor */
			$libraries['YuiCompressor'] = 'class.yuicompressor4.php';
/* if not PHP4 -- PHP5 by default */
		} else {
/* JSMin */
			$libraries['JSMin'] = 'jsmin5.php';
/* Dean Edwards Packer */
			$libraries['JavaScriptPacker'] = 'packer5.php';
/* CSS Tidy */
			$libraries['csstidy'] = 'class.csstidy.php';
/* YUI Compressor */
			$libraries['YuiCompressor'] = 'class.yuicompressor.php';
		}
/* Con. the compression controller */
		$web_optimizer = new web_optimizer(array(
			'view' => $view,
			'options' => $this->_options,
			'libraries' => $libraries)
		);
		JResponse::setBody($web_optimizer->finish($content));
	}
}
