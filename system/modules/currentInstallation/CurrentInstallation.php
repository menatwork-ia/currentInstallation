<?php

/**
 * Contao Open Source CMS
 *
 * @copyright  MEN AT WORK 2014 
 * @package    currentInstallation
 * @license    GNU/LGPL 
 * @filesource
 */

class CurrentInstallation extends Backend
{

    public function __construct()
    {
        parent::__construct();
    }

    public function outputBackendTemplate($strContent, $strTemplate)
    {
        if ($strTemplate == 'be_main')
        {
            $strText       = '';
            $strForeground = $GLOBALS['TL_CONFIG']['currentInstallationForegroundColor'];
            $strBackground = $GLOBALS['TL_CONFIG']['currentInstallationBackgroundColor'];

            foreach ((array) deserialize($GLOBALS['TL_CONFIG']['currentInstallation']) as $value)
            {
                // Get the first result or english as fallback
                if (empty($strText) || $value['language'] == 'en')
                {
                    $strText = $value['text'];
                }

                // Search for current language
                if ($value['language'] == $GLOBALS['TL_LANGUAGE'])
                {
                    $strText = $value['text'];
                    break;
                }
            }

            if (!empty($strText))
            {
                $objTemplate             = new BackendTemplate('be_current_installation');
                $objTemplate->text       = $strText;

                $style = '';
                if ($strForeground) {
                    $style .= <<< EOF
#current-installation p {
  color: #{$strForeground};
}
#current-installation p a {
  color: #{$strForeground};
}
EOF;
                }
                if ($strBackground) {
                    $style .= <<< EOF
div#current-installation {
  background-color: #{$strBackground};
}
EOF;
                }

                if ($style) {
                    $style = <<<EOF

<style>
$style
</style>

EOF;

                    $strContent = str_replace('</head>', $style . '</head>', $strContent);
                }

                $strContent = preg_replace('~</div>\s*<div.+id="container"~', $objTemplate->parse()."\n$0", $strContent, 1);
            }
        }

        return $strContent;
    }

}