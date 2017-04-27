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
 * Hooks
 */
if(TL_MODE == 'FE')
{ 
	$GLOBALS['TL_HOOKS']['getArticle'][] 			= array('PCT_DeviceVisibility','getArticleCallback');
	$GLOBALS['TL_HOOKS']['isVisibleElement'][] 		= array('PCT_DeviceVisibility','isVisibleElementCallback');
	$GLOBALS['TL_HOOKS']['compileFormFields'][] 	= array('PCT_DeviceVisibility','compileFormFieldsCallback');
}