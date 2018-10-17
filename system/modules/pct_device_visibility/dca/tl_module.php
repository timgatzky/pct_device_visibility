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
 * Config
 */
$GLOBALS['TL_DCA']['tl_module']['config']['onload_callback'][] = array('tl_module_pct_device_visibility', 'modifyDca');
 

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['pct_device'] = array
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
 * Class file
 * tl_content_pct_device_visibility
 */
class tl_module_pct_device_visibility
{
	/**
	 * Modify the DCA
	 * @param object
	 */
	public function modifyDca($objDC)
	{
		if(!$GLOBALS['loadDataContainer'][$objDC->table])
		{
			\Controller::loadDataContainer($objDC->table);
		}
		
		foreach($GLOBALS['TL_DCA'][$objDC->table]['palettes'] as $k => $v)
		{
			if(is_string($v))
			{
				$GLOBALS['TL_DCA'][$objDC->table]['palettes'][$k] = str_replace('guests','guests,pct_device',$v);
			}
		} 
	}
}