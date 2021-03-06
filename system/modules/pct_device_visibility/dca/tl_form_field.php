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
 * Palettes
 */
foreach($GLOBALS['TL_DCA']['tl_form_field']['palettes'] as $k => $v)
{
	if(is_string($v))
	{
		$GLOBALS['TL_DCA']['tl_form_field']['palettes'][$k] = str_replace('tabindex','tabindex,pct_device',$v);
	}
} 

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_form_field']['fields']['pct_device'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['pct_device'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'				  => array(1,2),
	'reference'               => &$GLOBALS['TL_LANG']['pct_device_ref'],
	'eval'                    => array('tl_class'=>'clr','includeBlankOption'=>true,'chosen'=>true),
	'sql'					  => "int(2) NOT NULL default '0'",
);