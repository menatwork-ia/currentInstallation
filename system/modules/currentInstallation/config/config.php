<?php

/**
 * Contao Open Source CMS
 *
 * @copyright  MEN AT WORK 2014 
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
    $GLOBALS['TL_CSS'][] = 'system/modules/currentInstallation/assets/ci.css';
}