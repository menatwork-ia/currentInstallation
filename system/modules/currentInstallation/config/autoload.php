<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package CurrentInstallation
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	'CurrentInstallation' => 'system/modules/currentInstallation/CurrentInstallation.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'be_current_installation' => 'system/modules/currentInstallation/templates',
));
