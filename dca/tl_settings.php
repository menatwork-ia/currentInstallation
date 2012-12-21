<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Load language files
 */

$this->loadLanguageFile('tl_user');

/**
 * Palettes
 */

$arrPalettes = explode(";", $GLOBALS['TL_DCA']['tl_settings']['palettes']['default']);
$arrPalettes = array_merge($arrPalettes, array('{currentInstallation_legend},currentInstallation'));
$GLOBALS['TL_DCA']['tl_settings']['palettes']['default'] = implode(";", $arrPalettes);

/**
 * Field
 */

$GLOBALS['TL_DCA']['tl_settings']['fields']['currentInstallation'] = array(
    'label'     => &$GLOBALS['TL_LANG']['tl_settings']['currentInstallation'],
    'exclude'   => true,
    'inputType' => 'multiColumnWizard',
    'eval'      => array(
        'columnFields' => array(
            'language' => array(
                'label'     => &$GLOBALS['TL_LANG']['tl_user']['language'],
                'default'   => $GLOBALS['TL_LANGUAGE'],
                'exclude'   => true,
                'filter'    => true,
                'inputType' => 'select',
                'options'   => $this->getBackendLanguages(),
                'eval'      => array(
                    'style'        => 'width:160px; margin-right:5px;',
                    'valign'       => 'middle'
                )
            ),
            'text' => array(
                'label'     => &$GLOBALS['TL_LANG']['tl_settings']['currentInstallation'],
                'inputType' => 'textarea',
                'eval'      => array(
                    'mandatory' => true,
                    'style'     => 'width:425px; height:50px;'
                )
            ),
        )
    )
);

?>
