<?php

/**
 * Hooks
 */
$GLOBALS['TL_HOOKS']['outputBackendTemplate'][] = array('CurrentInstallation', 'outputBackendTemplate');

/**
 * CSS
 */
if (TL_MODE == 'BE')
{
    $GLOBALS['TL_CSS'][] = 'system/modules/currentInstallation/html/css/currentinstallation.css';
}
?>
