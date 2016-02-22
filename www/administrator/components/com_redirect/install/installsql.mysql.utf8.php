-- <?php /* $Id:schema.php 1865 2007-09-22 00:35:42Z masterchief $ */ defined('_JEXEC') or die() ?>;

CREATE TABLE IF NOT EXISTS `#__redirect_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `old_url` varchar(150) NOT NULL,
  `new_url` varchar(150) NOT NULL,
  `referer` varchar(150) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `hits` int(10) unsigned NOT NULL,
  `published` tinyint(4) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_link_old` (`old_url`),
  KEY `idx_link_updated` (`updated_date`),
  KEY `idx_hits` (`hits`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8