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
 * Description
 * .pct_device = 1 // mobile only
 * .pct_device = 2 // desktop only
 */


/**
 * Class file
 * PCT_DeviceVisibility
 */ 
class PCT_DeviceVisibility
{ 
 	/**
 	 * Is mobile flag
 	 * @var boolean
 	 */
 	protected $blnIsMobile = false;
 	
 	
 	/**
 	 * Set mobile variable on init
 	 */
 	public function __construct()
 	{
	 	$this->blnIsMobile = (boolean)\Environment::getInstance()->agent->mobile;
 	}
 	
 	
 	/**
	 * Check device visibility settings for articles
	 * @param object
	 * @return object
	 * 
	 * Called from getArticle hook
	 */
	public function getArticleCallback($objArticle)
	{
		$intDevice = (int)$objArticle->pct_device;
		
		// mobile only || desktop only
		if( ($intDevice === 1 && $this->blnIsMobile === false) || ($intDevice === 2 && $this->blnIsMobile === true) )
		{
			$objArticle->published = 0;
		}
		
		return $objArticle;
	}
	
		
	/**
	 * Check device visibility settings for form field widgets
	 * @param string
	 * @param widget
	 * @return widget
	 *
	 * Called from compileFormFields hook
	 */
	public function compileFormFieldsCallback($arrFields)
	{
		if(!is_array($arrFields) || count($arrFields) < 1)
		{
			return $arrFields;
		}
		
		$arrReturn = array();
		foreach($arrFields as $objModel)
		{
			$intDevice = (int)$objModel->pct_device;
			
			// mobile only || desktop only
			if( ($intDevice === 1 && $this->blnIsMobile === false) || ($intDevice === 2 && $this->blnIsMobile === true) )
			{
				continue;
			}
			
			$arrReturn[] = $objModel;
		}
		
		return $arrReturn;
	}
	
	
	/**
	 * Check device visibility settings for content elements and modules via page layout
	 * @param object
	 * @param string
	 * @return string
	 *
 	 * Called from isVisibleElement hook
	 */
	public function isVisibleElementCallback($objRow, $blnIsVisible)
	{
		$intDevice = (int)$objRow->pct_device;
		
		// mobile only || desktop only
		if( ($intDevice === 1 && $this->blnIsMobile === false) || ($intDevice === 2 && $this->blnIsMobile === true) )
		{
			return false;
		}
		
		return $blnIsVisible;	
	}
}