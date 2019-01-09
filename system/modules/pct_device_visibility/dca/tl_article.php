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
$GLOBALS['TL_DCA']['tl_article']['config']['onload_callback'][] = array('tl_article_pct_device_visibility', 'modifyDCA');

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_article']['fields']['pct_device'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['pct_device'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'				  => array(1,2),
	'reference'               => &$GLOBALS['TL_LANG']['pct_device_ref'],
	'eval'                    => array('tl_class'=>'clr','includeBlankOption'=>true,'chosen'=>true),
	'sql'					  => "int(2) NOT NULL default '0'",
);

/**
 * Class
 * tl_article_pct_device_visibility
 */
class tl_article_pct_device_visibility extends \Backend
{
	/**
	 * Inject the device selection field
	 */
	public function modifyDCA()
	{
		if( array_key_exists('published',$GLOBALS['TL_DCA']['tl_article']['subpalettes']) )
		{
			$GLOBALS['TL_DCA']['tl_article']['subpalettes']['published'] .= ',pct_device';
		}
		else
		{
			$GLOBALS['TL_DCA']['tl_article']['palettes']['default'] = str_replace('published','published,pct_device',$GLOBALS['TL_DCA']['tl_article']['palettes']['default']);
		}
	}
}