<?php

/**
 * Contao Open Source CMS
 *
 * @copyright  MEN AT WORK 2014 
 * @package    currentInstallation
 * @license    GNU/LGPL 
 * @filesource
 */

$this->loadLanguageFile('tl_user');

/**
 * Palettes
 */
$arrPalettes = explode(";", $GLOBALS['TL_DCA']['tl_settings']['palettes']['default']);
$arrPalettes = array_merge($arrPalettes, array('{currentInstallation_legend},currentInstallation,currentInstallationForegroundColor,currentInstallationBackgroundColor'));
$GLOBALS['TL_DCA']['tl_settings']['palettes']['default'] = implode(";", $arrPalettes);

/**
 * Field
 */
$GLOBALS['TL_DCA']['tl_settings']['fields']['currentInstallation'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_settings']['currentInstallation'],
    'exclude'   => true,
    'inputType' => 'multiColumnWizard',
    'eval'      => array
    (
        'columnFields' => array
        (
            'language' => array
            (
                'label'     => &$GLOBALS['TL_LANG']['tl_user']['language'],
                'default'   => $GLOBALS['TL_LANGUAGE'],
                'exclude'   => true,
                'filter'    => true,
                'inputType' => 'select',
                'options'   => $this->getBackendLanguages(),
                'eval'      => array
                (
                    'style'        => 'width:160px; margin-right:5px;',
                    'valign'       => 'top'
                )
            ),
            'text' => array
            (
                'label'     => &$GLOBALS['TL_LANG']['tl_settings']['currentInstallation'],
                'inputType' => 'textarea',
                'eval'      => array
                (
                    'mandatory'      => true,
                    'style'          => 'width:425px; height:50px;',
                    'allowHtml'      => true,
                    'preserveTags'   => true,
                    'decodeEntities' => true
                )
            )
        )
    )
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['currentInstallationForegroundColor'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_settings']['currentInstallationForegroundColor'],
    'inputType' => 'text',
    'eval'      => array
    (
        'maxlength'      => 6,
        'colorpicker'    => true,
        'isHexColor'     => true,
        'decodeEntities' => true,
        'tl_class'       => 'w50 wizard',
    )
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['currentInstallationBackgroundColor'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_settings']['currentInstallationBackgroundColor'],
    'inputType' => 'text',
    'eval'      => array
    (
        'maxlength'      => 6,
        'colorpicker'    => true,
        'isHexColor'     => true,
        'decodeEntities' => true,
        'tl_class'       => 'w50 wizard',
    )
);