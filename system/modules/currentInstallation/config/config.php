<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 *
 * @copyright  MEN AT WORK 2013 
 * @package    currentInstallation
 * @license    GNU/LGPL 
 * @filesource
 */

/**
 * Hooks
 */
$GLOBALS['TL_HOOKS']['outputBackendTemplate'][] = array('CurrentInstallation', 'outputBackendTemplate');

/**
 * CSS
 */
if (TL_MODE == 'BE')
{
    $GLOBALS['TL_CSS'][] = 'system/modules/currentInstallation/html/ci.css';
}

?>