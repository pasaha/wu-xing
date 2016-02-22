<?php
/**
 * @version		$Id: version.php 400 2010-11-08 03:54:47Z eddieajau $
 * @package		NewLifeInIT
 * @subpackage	com_redirect
 * @copyright	Copyright 2005 - 2010 New Life in IT Pty Ltd. All rights reserved.
 * @license		GNU General Public License <http://www.gnu.org/copyleft/gpl.html>
 * @link		http://www.theartofjoomla.com
 */

defined('_JEXEC') or die;

/**
 * Finder Version Object
 *
 * @package		NewLifeInIT
 * @subpackage	com_redirect
 * @since		1.0
 */
final class RedirectVersion
{
	/**
	 * Extension name string.
	 *
	 * @var		string
	 * @since	1.0
	 */
	const EXTENSION = 'com_redirect';

	/**
	 * Major.Minor version string.
	 *
	 * @var		string
	 * @since	1.0
	 */
	const VERSION = '1.0';

	/**
	 * Maintenance version string.
	 *
	 * @var		string
	 * @since	1.0
	 */
	const SUBVERSION = '2';

	/**
	 * Version status string.
	 *
	 * @var		string
	 * @since	1.0
	 */
	const STATUS = '';

	/**
	 * Version release time stamp.
	 *
	 * @var		string
	 * @since	1.0
	 */
	const DATE = '2010-11-08 00:00:00';

	/**
	 * Source control revision string.
	 *
	 * @var		string
	 * @since	1.0
	 */
	const REVISION = '$Revision: 400 $';

	/**
	 * Method to get the build number from the source control revision string.
	 *
	 * @return	integer	The version build number.
	 * @since	1.0
	 */
	public static function getBuild()
	{
		return intval(substr(self::REVISION, 11));
	}

	/**
	 * Gets the version number.
	 *
	 * @param	boolean	$build	Optionally show the build number.
	 * @param	boolean	$status	Optionally show the status string.
	 *
	 * @return	string
	 * @since	1.0.3
	 */
	public static function getVersion($build = false, $status = false)
	{
		$text = self::VERSION.'.'.self::SUBVERSION;

		if ($build) {
			$text .= ':'.self::getBuild();
		}
		if ($status) {
			$text .= ' '.self::STATUS;
		}

		return $text;
	}
}