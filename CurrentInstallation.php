<?php

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
            $strOutput = '';

            foreach ((array) deserialize($GLOBALS['TL_CONFIG']['currentInstallation']) as $value)
            {
                // Get the first result or english as fallback
                if (empty($strOutput) || $value['language'] == 'en')
                {
                    $strOutput = $value['text'];
                }

                // Search for current language
                if ($value['language'] == $GLOBALS['TL_LANGUAGE'])
                {
                    $strOutput = $value['text'];
                    break;
                }
            }

            if (!empty($strOutput))
            {
                $objTemplate            = new BackendTemplate('be_current_installation');
                $objTemplate->strOutput = $strOutput;

                $strContent = preg_replace("/<div.*id=\"header\">/", $objTemplate->parse() . "\n$0", $strContent, 1);
            }
        }

        return $strContent;
    }

}

?>
