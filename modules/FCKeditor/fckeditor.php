<?php /*
 * FCKeditor - The text editor for internet
 * Copyright (C) 2003-2004 Frederico Caldeira Knabben
 * 
 * Licensed under the terms of the GNU Lesser General Public License:
 * 		http://www.opensource.org/licenses/lgpl-license.php
 * 
 * For further information visit:
 * 		http://www.fckeditor.net/
 * 
 * File Name: fckeditor.php
 * 	This is the integration file for PHP.
 * 	
 * 	It defines the FCKeditor class that can be used to create editor
 * 	instances in PHP pages on server side.
 * 
 * Version:  2.0 RC1
 * Modified: 2004-11-29 17:56:52
 * 
 * File Authors:
 * 		Frederico Caldeira Knabben (fredck@fckeditor.net)
 */

class FCKeditor
{
	var $InstanceName ;
	var $BasePath ;
	var $Width ;
	var $Height ;
	var $ToolbarSet ;
	var $Value ;
	var $Config ;

	function FCKeditor( $instanceName )
	{
		$this->InstanceName	= $instanceName ;
		$this->BasePath		= '/FCKeditor/' ;
		$this->Width		= '100%' ;
		$this->Height		= '200' ;
		$this->ToolbarSet	= 'Default' ;
		$this->Value		= '' ;

		$this->Config		= array() ;
	}

	function Create()
	{
		echo $this->CreateHtml() ;
	}
	
	function CreateHtml()
	{
		$HtmlValue = htmlspecialchars( $this->Value ) ;

		$Html = '<div class="wysiwyg">' ;
		
		if ( $this->IsCompatible() )
		{
			$Link = "{$this->BasePath}editor/fckeditor.html?InstanceName={$this->InstanceName}" ;
			
			if ( $this->ToolbarSet != '' )
				$Link .= "&Toolbar={$this->ToolbarSet}" ;

			// Render the linked hidden field.
			$Html .= "<input type=\"hidden\" id=\"{$this->InstanceName}\" name=\"{$this->InstanceName}\" value=\"{$HtmlValue}\" />" ;

			// Render the configurations hidden field.
			$Html .= "<input type=\"hidden\" id=\"{$this->InstanceName}___Config\" value=\"" . $this->GetConfigFieldString() . "\" />" ;

			// Render the editor IFRAME.
			$Html .= "<iframe id=\"{$this->InstanceName}___Frame\" src=\"{$Link}\" width=\"{$this->Width}\" height=\"{$this->Height}\" frameborder=\"no\" scrolling=\"no\"></iframe>" ;
		}
		else
		{
			if ( strpos( $this->Width, '%' ) === false )
				$WidthCSS = $this->Width . 'px' ;
			else
				$WidthCSS = $this->Width ;

			if ( strpos( $this->Height, '%' ) === false )
				$HeightCSS = $this->Height . 'px' ;
			else
				$HeightCSS = $this->Height ;

			$Html .= "<textarea name=\"{$this->InstanceName}\" rows=\"4\" cols=\"40\" style=\"width: {$WidthCSS}; height: {$HeightCSS}\" wrap=\"virtual\">{$HtmlValue}</textarea>" ;
		}

		$Html .= '</div>' ;
		
		return $Html ;
	}

	function IsCompatible()
	{
		$sAgent = $_SERVER['HTTP_USER_AGENT'] ;

		if ( strpos($sAgent, 'MSIE') !== false && strpos($sAgent, 'mac') === false && strpos($sAgent, 'Opera') === false )
		{
			$iVersion = (int)substr($sAgent, strpos($sAgent, 'MSIE') + 5, 3) ;
			return ($iVersion >= 5.5) ;
		}
		else if ( strpos($sAgent, 'Gecko') !== false )
		{
			$iVersion = (int)substr($sAgent, strpos($sAgent, 'Gecko/') + 6, 8) ;
			return ($iVersion >= 20030210) ;
		}
		else
			return false ;
	}

	function GetConfigFieldString()
	{
		$sParams = '' ;
		$bFirst = true ;

		foreach ( $this->Config as $sKey => $sValue )
		{
			if ( $bFirst == false )
				$sParams .= '&' ;
			else
				$bFirst = false ;
			
			if ( $sValue === true )
				$sParams .= htmlspecialchars( $sKey ) . '=true' ;
			else if ( $sValue === false )
				$sParams .= htmlspecialchars( $sKey ) . '=false' ;
			else
				$sParams .= htmlspecialchars( $sKey ) . '=' . htmlspecialchars( $sValue ) ;
		}
		
		return $sParams ;
	}
}

?>
