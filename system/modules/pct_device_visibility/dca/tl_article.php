<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2017
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_device_visibility
 * @link		http://contao.org
 */

/**
 * Subpalettes
 */
$GLOBALS['TL_DCA']['tl_article']['subpalettes']['published'] .= ',pct_device';

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_article']['fields']['pct_device'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['pct_device'],
	'default'				  => 'auto',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'				  => array(1,2),
	'reference'               => &$GLOBALS['TL_LANG']['pct_device_ref'],
	'eval'                    => array('tl_class'=>'clr','includeBlankOption'=>true,'chosen'=>true),
	'sql'					  => "int(2) NOT NULL default '0'",
);