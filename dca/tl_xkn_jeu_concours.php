<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * TYPOlight Open Source CMS
 * Copyright (C) 2005-2010 Leo Feyer
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  2010 - Kantik / Noodle 
 * @author     Erwan Ripoll 
 * @package    xkn_jeu_concours
 * @license    LGPL 
 * @filesource
 */


/**
 * Table tl_xkn_jeu_concours
 */
$GLOBALS['TL_DCA']['tl_xkn_jeu_concours'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'enableVersioning'            => true
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 1,
			'fields'                  => array('title'),
			'flag'                    => 1
		),
		'label' => array
		(
			'fields'                  => array('title'),
			'format'                  => '%s'
		),
		'global_operations' => array
		(
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset();"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_xkn_jeu_concours']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif',
				'attributes'          => 'class="edit"'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_xkn_jeu_concours']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_xkn_jeu_concours']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_xkn_jeu_concours']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'                => array('type_jeu'),
		'default'                     => 'type_jeu',
		'formulaire'                  => 'type_jeu, date_begin, date_end, published, calendrier, title, subtitle, presentation, img, explication_texte, legal, pdfSingleSRC',
		'qcm'                     		=> 'type_jeu, date_begin, date_end, published, calendrier, title, subtitle, presentation, img, explication_texte, legal, question, reponse_1, reponse_2, reponse_3, pdfSingleSRC',
		'upload'                      => 'type_jeu, date_begin, date_end, published, calendrier, title, subtitle, presentation, img, explication_texte, legal, pdfSingleSRC',
	),

	// Subpalettes
	'subpalettes' => array
	(
	//	'type_jeu'                   => 'question, reponse_1, reponse_2, reponse_3'
	),

	// Fields
	'fields' => array
	(
		'date_begin' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_xkn_jeu_concours']['date_begin'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'rgxp'=>'date', 'datepicker'=>true)
		),
		'date_end' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_xkn_jeu_concours']['date_end'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'rgxp'=>'date', 'datepicker'=>true)
		),
		'published' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_xkn_jeu_concours']['published'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'checkbox'
		),
		'type_jeu' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_xkn_jeu_concours']['type_jeu'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'select',
			'options'                 => array('formulaire', 'qcm', "upload"),
			'eval'                    => array('includeBlankOption'=>false)
		),
		'calendrier' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_xkn_jeu_concours']['calendrier'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'checkbox'
		),
		'title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_xkn_jeu_concours']['title'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'decodeEntities'=>true)
		),
		'subtitle' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_xkn_jeu_concours']['subtitle'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'textarea',
			'eval'                    => array('mandatory'=>true)
		),
		'presentation' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_xkn_jeu_concours']['presentation'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'textarea',
			'eval'                    => array('mandatory'=>true, 'rte'=>'tinyMCE', 'helpwizard'=>true)
		),
		'img' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_xkn_jeu_concours']['img'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'fileTree',
			'eval'                    => array('files'=>true, 'mandatory'=>true, 'extensions'=>'jpg, gif, png', 'fieldType'=>'radio'),
		),
		'explication_texte' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_xkn_jeu_concours']['explication_texte'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'textarea',
			'eval'                    => array('mandatory'=>true, 'rte'=>'tinyMCE', 'helpwizard'=>true)
		),
		'legal' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_xkn_jeu_concours']['legal'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'textarea',
			'eval'                    => array('mandatory'=>true, 'rte'=>'tinyMCE', 'helpwizard'=>true)
		),
		'img_validation' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_xkn_jeu_concours']['img_validation'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'fileTree',
			'eval'                    => array('files'=>true, 'extensions'=>'jpg, gif, png', 'fieldType'=>'radio'),
		),
		'validation_texte' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_xkn_jeu_concours']['validation_texte'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'textarea',
			'eval'                    => array('rte'=>'tinyMCE', 'helpwizard'=>true)
		),
		'pdfSingleSRC' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_xkn_jeu_concours']['pdfSingleSRC'],
			'exclude'                 => true,
			'inputType'               => 'fileTree',
			'eval'                    => array('fieldType'=>'radio', 'files'=>true, 'mandatory'=>true, 'extensions'=>'pdf')
		)
	)
);

?>