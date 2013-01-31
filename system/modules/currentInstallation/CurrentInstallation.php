<?php

/**
 * Contao Open Source CMS
 *
 * @copyright  MEN AT WORK 2013 
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
            $strText = '';

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
                $objTemplate       = new BackendTemplate('be_current_installation');
                $objTemplate->text = $strText;

                $strContent = preg_replace("/<div.*id=\"header\">/", $objTemplate->parse() . "\n$0", $strContent, 1);
            }
        }

        return $strContent;
    }

}

?>
