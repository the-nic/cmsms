<?php
#-------------------------------------------------------------------------
# Module: CMSMailer - a simple wrapper around phpmailer
# Version: 1.73.10, Robert Campbell <rob@techcom.dyndns.org>
#
#-------------------------------------------------------------------------
# CMS - CMS Made Simple is (c) 2005 by Ted Kulp (wishy@cmsmadesimple.org)
# This project's homepage is: http://www.cmsmadesimple.org
#
#-------------------------------------------------------------------------
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
# Or read it online: http://www.gnu.org/licenses/licenses.html#GPL
#
#-------------------------------------------------------------------------


#-------------------------------------------------------------------------
/* Your initial Class declaration. This file's name must
   be "[class's name].module.php", or, in this case,
   Skeleton.module.php
*/ 
class CMSMailer extends CMSModule
{
  var $the_mailer;

  /*---------------------------------------------------------
   CMSMailer()
   constructor
   ---------------------------------------------------------
  function CMSMailer()
  {
    // call the parent class' constructor
    parent::CMSModule();

    // now do our stuff
    $this->the_mailer = NULL;
  }
  


  /*---------------------------------------------------------
   GetName()
   ---------------------------------------------------------*/
  function GetName()
  {
    return 'CMSMailer';
  }


  /*---------------------------------------------------------
   GetFriendlyName()
   ---------------------------------------------------------*/
  function GetFriendlyName()
  {
    return $this->Lang('friendlyname');
  }

	
  /*---------------------------------------------------------
   GetVersion()
   ---------------------------------------------------------*/
  function GetVersion()
  {
    return '1.73.13';
  }


  /*---------------------------------------------------------
   GetHelp()
   ---------------------------------------------------------*/
  function GetHelp()
  {
    return $this->Lang('help');
  }

  
  /*---------------------------------------------------------
   GetAuthor()
   ---------------------------------------------------------*/
  function GetAuthor()
  {
    return 'Calguy1000';
  }


  /*---------------------------------------------------------
   GetAuthorEmail()
   ---------------------------------------------------------*/
  function GetAuthorEmail()
  {
    return 'calguy1000@hotmail.com';
  }

  
  /*---------------------------------------------------------
   GetChangeLog()
   ---------------------------------------------------------*/
  function GetChangeLog()
  {
    return $this->Lang('changelog');
  }

  
  /*---------------------------------------------------------
   IsPluginModule()
   ---------------------------------------------------------*/
  function IsPluginModule()
  {
    return false;
  }


  /*---------------------------------------------------------
   HasAdmin()
   This function returns a boolean value, depending on
   whether your module adds anything to the Admin area of
   the site. For the rest of these comments, I'll be calling
   the admin part of your module the "Admin Panel" for
   want of a better term.
   ---------------------------------------------------------*/
  function HasAdmin()
  {
    return true;
  }

  /*---------------------------------------------------------
   GetAdminSection()
   ---------------------------------------------------------*/
  function GetAdminSection()
  {
    return 'extensions';
  }


  /*---------------------------------------------------------
   GetAdminDescription()
   ---------------------------------------------------------*/
  function GetAdminDescription()
  {
    return $this->Lang('moddescription');
  }
  

  /*---------------------------------------------------------
   VisibleToAdminUser()
   ---------------------------------------------------------*/
  function VisibleToAdminUser()
  {
    return $this->CheckPermission('Modify Site Preferences' );
  }

  /*---------------------------------------------------------
   GetDependencies()
   ---------------------------------------------------------*/
  function GetDependencies()
  {
    return array();
  }
  

  /*---------------------------------------------------------
   Install()
   ---------------------------------------------------------*/
  function Install()
  {
    $this->SetPreference('mailer', 'smtp');
    $this->SetPreference('host', 'localhost');
    $this->SetPreference('port', 25 );
    $this->SetPreference('from', 'root@localhost');
    $this->SetPreference('fromuser', 'Root');
    $this->SetPreference('sendmail', '/usr/sbin/sendmail');
    $this->SetPreference('timeout', 1000);
    $this->SetPreference('smtpauth',0);
    $this->SetPreference('username','');
    $this->SetPreference('password','');
  }


  /*---------------------------------------------------------
   InstallPostMessage()
   ---------------------------------------------------------*/
  function InstallPostMessage()
  {
    return $this->Lang('postinstall');
  }


  /*---------------------------------------------------------
   UninstallPostMessage()
   ---------------------------------------------------------*/
  function UninstallPostMessage()
  {
    return $this->Lang('postuninstall');
  }


  /*---------------------------------------------------------
   Upgrade()
   ---------------------------------------------------------*/
  function Upgrade($oldversion, $newversion)
  {
    // nothing here
  }
	
	
  /*---------------------------------------------------------
   Uninstall()
   ---------------------------------------------------------*/
  function Uninstall()
  {
    $this->RemovePreference('mailer');
    $this->RemovePreference('host');
    $this->RemovePreference('port');
    $this->RemovePreference('from');
    $this->RemovePreference('fromuser');
    $this->RemovePreference('sendmail');
    $this->RemovePreference('timeout');
    $this->RemovePreference('smtpauth',0);
    $this->RemovePreference('username');
    $this->RemovePreference('password');
  }


  /*---------------------------------------------------------
   DoAction($action, $id, $params, $return_id)
   ---------------------------------------------------------*/
  function DoAction($action, $id, $params, $returnid=-1)
  {
    switch ($action)
      {
      case 'default':
	{
	  break;
	}
      case 'defaultadmin':
	{
	  $this->_DisplayAdminPanel( $id, $params, $returnid );
	  break;
	}
      case 'setadminprefs':
	{
	  $this->_SetAdminPrefs( $id, $params, $returnid );
	  break;
	}
      }
  }


  /*---------------------------------------------------------
   _DisplayAdminPanel($id, $params, $return_id )
   NOT PART OF THE MODULE API
   ---------------------------------------------------------*/
  function _DisplayAdminPanel($id, &$params, $returnid )
  {
    if( !$this->CheckPermission('Modify Site Preferences') )
      return;

    $this->smarty->assign('endform',
			  $this->CreateFormEnd());
    $this->smarty->assign('startform',
			  $this->CreateFormStart( $id, 'setadminprefs', $returnid ));

    $maileritems = array();
    $maileritems['mail'] = 'mail';
    $maileritems['sendmail'] = 'sendmail';
    $maileritems['smtp'] = 'smtp';
    $this->smarty->assign('prompt_mailer', $this->Lang('mailer'));
    $this->smarty->assign('info_mailer', $this->Lang('info_mailer'));
    $this->smarty->assign('input_mailer',
			  $this->CreateInputDropdown( $id, 'input_mailer',
						      $maileritems, -1,
						      $this->GetPreference('mailer',-1)));

    $this->smarty->assign('prompt_host', $this->Lang('host'));
    $this->smarty->assign('info_host', $this->Lang('info_host'));
    $this->smarty->assign('input_host',
			  $this->CreateInputText( $id, 'input_host',
						  $this->GetPreference('host'),
						  50, 80 ));

    $this->smarty->assign('prompt_port', $this->Lang('port'));
    $this->smarty->assign('info_port', $this->Lang('info_port'));
    $this->smarty->assign('input_port',
			  $this->CreateInputText( $id, 'input_port',
						  $this->GetPreference('port'),
						  6, 8));

    $this->smarty->assign('prompt_from', $this->Lang('from'));
    $this->smarty->assign('info_from', $this->Lang('info_from'));
    $this->smarty->assign('input_from',
			  $this->CreateInputText( $id, 'input_from',
						  $this->GetPreference('from'),
						  80, 80));

    $this->smarty->assign('prompt_fromuser',$this->Lang('fromuser'));
    $this->smarty->assign('info_fromuser', $this->Lang('info_fromuser'));
    $this->smarty->assign('input_fromuser',
			  $this->CreateInputText( $id, 'input_fromuser',
						  $this->GetPreference('fromuser'),
						  50, 80));
			  
    $this->smarty->assign('prompt_sendmail',$this->Lang('sendmail'));
    $this->smarty->assign('info_sendmail', $this->Lang('info_sendmail'));
    $this->smarty->assign('input_sendmail',
			  $this->CreateInputText( $id, 'input_sendmail',
						  $this->GetPreference('sendmail'),
						  50, 255));

    $this->smarty->assign('prompt_timeout', $this->Lang('timeout'));
    $this->smarty->assign('info_timeout', $this->Lang('info_timeout'));
    $this->smarty->assign('input_timeout',
			  $this->CreateInputText( $id, 'input_timeout',
						  $this->GetPreference('timeout'),
						  5, 5));

    $this->smarty->assign('prompt_smtpauth', $this->Lang('smtpauth'));
    $this->smarty->assign('info_smtpauth', $this->Lang('info_smtpauth'));
    $this->smarty->assign('input_smtpauth',
			  $this->CreateInputCheckbox($id, 'input_smtpauth',1,
						     $this->GetPreference('smtpauth')));

    $this->smarty->assign('prompt_username', $this->Lang('username'));
    $this->smarty->assign('info_username', $this->Lang('info_username'));
    $this->smarty->assign('input_username',
			  $this->CreateInputText( $id, 'input_username',
						  $this->GetPreference('username'),
						  30, 30));

    $this->smarty->assign('prompt_password', $this->Lang('password'));
    $this->smarty->assign('info_password', $this->Lang('info_password'));
    $this->smarty->assign('input_password',
			  $this->CreateInputPassword( $id, 'input_password',
						      $this->GetPreference('password')));

    $this->smarty->assign('prompt_testaddress', 
			  $this->Lang('prompt_testaddress'));
    $this->smarty->assign('input_testaddress',
			  $this->CreateInputText( $id, 'input_testaddress',
						  '',
						  40, 60));
    $this->smarty->assign('sendtest',
			  $this->CreateInputSubmit( $id, 'sendtest',
						    $this->Lang('sendtest'), '', '', $this->Lang('sendtestmailconfirm')));

    $this->smarty->assign('prompt_charset',
		    $this->Lang('charset'));
    $this->smarty->assign('input_charset',
		    $this->CreateInputText($id,'input_charset',
					   $this->GetPreference('charset'),
					   40,40));

    $this->smarty->assign('submit',
			  $this->CreateInputSubmit( $id, 'submit', 
						    $this->Lang('submit'), '', '',
						    $this->Lang('settingsconfirm')));
    $this->smarty->assign('cancel',
			  $this->CreateInputSubmit( $id, 'cancel', 
						    $this->Lang('cancel')));

    echo $this->ProcessTemplate('prefs.tpl');
  }


  /*---------------------------------------------------------
   DisplayErrorPage($id, $params, $return_id, $message)
   NOT PART OF THE MODULE API
   ---------------------------------------------------------*/
  function _DisplayErrorPage($id, &$params, $returnid, $message='')
  {
    $this->smarty->assign('title_error', $this->Lang('error'));
    if ($message != '')
      {
	$this->smarty->assign('message', $message);
      }
    
    // Display the populated template
    echo $this->ProcessTemplate('error.tpl');
  }

  //////////////////////////////////////////////////////////////////////
  //// BEGIN API SECTION
  //////////////////////////////////////////////////////////////////////

  /*---------------------------------------------------------
   reset()
   NOT PART OF THE MODULE API
   ---------------------------------------------------------*/
  function reset()
  {
    $this->_load();
    $this->the_mailer->Timeout = $this->GetPreference('timeout');
    $this->the_mailer->Sendmail = $this->GetPreference('sendmail');
    $this->the_mailer->Port   = $this->GetPreference('port');
    $this->the_mailer->Mailer = $this->GetPreference('mailer');
    $this->the_mailer->FromName = $this->GetPreference('fromuser');
    $this->the_mailer->From = $this->GetPreference('from');
    $this->the_mailer->Host = $this->GetPreference('host');
    $this->the_mailer->SMTPAuth = $this->GetPreference('smtpauth');
    $this->the_mailer->Username = $this->GetPreference('username');
    $this->the_mailer->Password = $this->GetPreference('password');
    $this->the_mailer->ClearAddresses();
    $this->the_mailer->ClearAttachments();
    $this->the_mailer->ClearCustomHeaders();
    $this->the_mailer->ClearBCCs();
    $this->the_mailer->ClearCCs();
    $this->the_mailer->ClearReplyTos();
    $charset = $this->GetPreference('charset');
    if( !empty($charset) ) {
      $this->SetCharSet($charset);
    }
  }


  /*---------------------------------------------------------
   _SetAdminPrefs($id, $params, $return_id )
   NOT PART OF THE MODULE API
   ---------------------------------------------------------*/
  function _SetAdminPrefs($id, &$params, $returnid )
  {
    if( !$this->CheckPermission('Modify Site Preferences') )
      return;

    if( isset( $params['input_mailer'] ) )
      {
	$this->SetPreference('mailer',$params['input_mailer']);
      }

    if( isset( $params['input_host'] ) )
      {
	$this->SetPreference('host',$params['input_host']);
      }

    if( isset( $params['input_port'] ) )
      {
	$this->SetPreference('port',$params['input_port']);
      }

    if( isset( $params['input_from'] ) )
      {
	$this->SetPreference('from',$params['input_from']);
      }

    if( isset( $params['input_fromuser'] ) )
      {
	$this->SetPreference('fromuser',$params['input_fromuser']);
      }

    if( isset( $params['input_sendmail'] ) )
      {
	$this->SetPreference('sendmail',$params['input_sendmail']);
      }

    if( isset( $params['input_timeout'] ) )
      {
	$this->SetPreference('timeout',$params['input_timeout']);
      }

    if( isset( $params['input_smtpauth'] ) )
      {
	$this->SetPreference('smtpauth',$params['input_smtpauth']);
      }
    else
      {
	$this->SetPreference('smtpauth',0);
      }

    if( isset( $params['input_username'] ) )
      {
	$this->SetPreference('username',$params['input_username']);
      }

    if( isset( $params['input_password'] ) )
      {
	$this->SetPreference('password',$params['input_password']);
      }

    if( isset( $params['input_charset'] ) )
      {
	$this->SetPreference('charset',trim($params['input_charset']));
      }

    $this->reset();

    if( isset( $params['sendtest'] ) )
      {
	// here we're gonna send a nice, hard coded test message
	if( !isset( $params['input_testaddress'] ) || trim($params['input_testaddress']) == '' )
	  {
	    $this->_DisplayErrorPage( $id, $params, $returnid, 
				      $this->Lang('error_notestaddress'));
	    return;
	  }
	else
	  {
	    $this->AddAddress( $params['input_testaddress'] );
	    $this->SetBody( $this->Lang('testbody'));
	    $this->SetSubject( $this->Lang('testsubject'));
	    $this->Send();
	    $this->reset(); // yes, another reset
	  }
      }

    $this->Redirect( $id, 'defaultadmin', $returnid, $params );
  }

  ////////////////////////////////////////////////////////////
  //                     UTILITIES                          //
  ////////////////////////////////////////////////////////////
  function _load()
  {
    if( $this->the_mailer == NULL )
      {
	require_once(dirname(__FILE__).'/phpmailer/class.phpmailer.php' );
	$this->the_mailer = new PHPMailer;
	$this->the_mailer->PluginDir=dirname(__FILE__).'/phpmailer/';
	$this->reset();
      }
  }

  ////////////////////////////////////////////////////////////
  //                     API FUNCTIONS                      //
  ////////////////////////////////////////////////////////////

  function GetAltBody()
  {
    $this->_load();
    return $this->the_mailer->AltBody;
  }

  function SetAltBody( $txt )
  {
    $this->_load();
    $this->the_mailer->AltBody = $txt;
  }

  function GetBody()
  {
    $this->_load();
    return $this->the_mailer->Body;
  }

  function SetBody( $txt )
  {
    $this->_load();
    $this->the_mailer->Body = $txt;
  }

  function GetCharSet()
  {
    $this->_load();
    return $this->the_mailer->CharSet;
  }

  function SetCharSet( $txt )
  {
    $this->_load();
    $this->the_mailer->CharSet = $txt;
  }

  function GetConfirmReadingTo()
  {
    $this->_load();
    return $this->the_mailer->ConfirmReadingTo;
  }

  function SetConfirmReadingTo( $txt )
  {
    $this->_load();
    $this->the_mailer->ConfirmReadingTo = $txt;
  }

  function GetContentType()
  {
    $this->_load();
    return $this->the_mailer->ContentType;
  }

  function SetContentType( $txt )
  {
    $this->_load();
    $this->the_mailer->ContentType = $txt;
  }

  function GetEncoding()
  {
    $this->_load();
    return $this->the_mailer->Encoding;
  }

  function SetEncoding( $txt )
  {
    $this->_load();
    $this->the_mailer->Encoding = $txt;
  }

  function GetErrorInfo()
  {
    $this->_load();
    return $this->the_mailer->ErrorInfo;
  }

  function GetFrom()
  {
    $this->_load();
    return $this->the_mailer->From;
  }

  function SetFrom( $txt )
  {
    $this->_load();
    $this->the_mailer->From = $txt;
  }

  function GetFromName()
  {
    $this->_load();
    return $this->the_mailer->FromName;
  }

  function SetFromName( $txt )
  {
    $this->_load();
    $this->the_mailer->FromName = $txt;
  }

  function GetHelo()
  {
    $this->_load();
    return $this->the_mailer->Helo;
  }

  function SetHelo( $txt )
  {
    $this->_load();
    $this->the_mailer->Helo = $txt;
  }

  function GetHost()
  {
    $this->_load();
    return $this->the_mailer->Host;
  }

  function SetHost( $txt )
  {
    $this->_load();
    $this->the_mailer->Host = $txt;
  }

  function GetHostname()
  {
    $this->_load();
    return $this->the_mailer->Hostname;
  }

  function SetHostname( $txt )
  {
    $this->_load();
    $this->the_mailer->Hostname = $txt;
  }

  function GetMailer()
  {
    $this->_load();
    return $this->the_mailer->Mailer;
  }

  function SetMailer( $txt )
  {
    $this->_load();
    $this->the_mailer->Mailer = $txt;
  }

  function GetPassword()
  {
    $this->_load();
    return $this->the_mailer->Password;
  }

  function SetPassword( $txt )
  {
    $this->_load();
    $this->the_mailer->Password = $txt;
  }

  function GetPort()
  {
    $this->_load();
    return $this->the_mailer->Port;
  }

  function SetPort( $txt )
  {
    $this->_load();
    $this->the_mailer->Port = $txt;
  }

  function GetPriority()
  {
    $this->_load();
    return $this->the_mailer->Priority;
  }

  function SetPriority( $txt )
  {
    $this->_load();
    $this->the_mailer->Priority = $txt;
  }

  function GetSender()
  {
    $this->_load();
    return $this->the_mailer->Sender;
  }

  function SetSender( $txt )
  {
    $this->_load();
    $this->the_mailer->Sender = $txt;
  }

  function GetSendmail()
  {
    $this->_load();
    return $this->the_mailer->Sendmail;
  }

  function SetSendmail( $txt )
  {
    $this->_load();
    $this->the_mailer->Sendmail = $txt;
  }

  function GetSMTPAuth()
  {
    $this->_load();
    return $this->the_mailer->SMTPAuth;
  }

  function SetSMTPAuth( $txt )
  {
    $this->_load();
    $this->the_mailer->SMTPAuth = $txt;
  }

  function GetSMTPDebug()
  {
    $this->_load();
    return $this->the_mailer->SMTPDebug;
  }

  function SetSMTPDebug( $txt )
  {
    $this->_load();
    $this->the_mailer->SMTPDebug = $txt;
  }

  function GetSMTPKeepAlive()
  {
    $this->_load();
    return $this->the_mailer->SMTPKeepAlive;
  }

  function SetSMTPKeepAlive( $txt )
  {
    $this->_load();
    $this->the_mailer->SMTPKeepAlive = $txt;
  }

  function GetSubject()
  {
    $this->_load();
    return $this->the_mailer->Subject;
  }

  function SetSubject( $txt )
  {
    $this->_load();
    $this->the_mailer->Subject = $txt;
  }

  function GetTimeout()
  {
    $this->_load();
    return $this->the_mailer->Timeout;
  }

  function SetTimeout( $txt )
  {
    $this->_load();
    $this->the_mailer->Timeout = $txt;
  }

  function GetUsername()
  {
    $this->_load();
    return $this->the_mailer->Username;
  }

  function SetUsername( $txt )
  {
    $this->_load();
    $this->the_mailer->Username = $txt;
  }

  function GetWordWrap()
  {
    $this->_load();
    return $this->the_mailer->WordWrap;
  }

  function SetWordWrap( $txt )
  {
    $this->_load();
    $this->the_mailer->WordWrap = $txt;
  }

  function AddAddress( $address, $name = '' )
  {
    $this->_load();
    return $this->the_mailer->AddAddress( $address, $name );
  }

  function AddAttachment( $path, $name = '', $encoding = 'base64',
			  $type = 'application/octet-stream' )
  {
    $this->_load();
    return $this->the_mailer->AddAttachment( $path, $name, $encoding, $type );
  }

  function AddBCC( $addr, $name = '' )
  {
    $this->_load();
    $this->the_mailer->AddBCC( $addr, $name );
  }

  function AddCC( $addr, $name = '' )
  {
    $this->_load();
    $this->the_mailer->AddCC( $addr, $name );
  }

  function AddCustomHeader( $txt )
  {
    $this->_load();
    $this->the_mailer->AddCustomHeader( $txt );
  }

  function AddEmbeddedImage( $path, $cid, $name = '', $encoding = 'base64',
			     $type = 'application/octet-stream' )
  {
    $this->_load();
    return $this->the_mailer->AddEmbeddedImage( $path, $cid, 
						$name, $encoding, $type );
  }

  function AddReplyTo( $addr, $name = '' )
  {
    $this->_load();
    $this->the_mailer->AddReplyTo( $addr, $name );
  }


  function AddStringAttachment( $string, $filename, $encoding = 'base64',
				$type = 'application/octet-stream' )
  {
    $this->_load();
    $this->the_mailer->AddStringAttachment( $string, $filename, $encoding, $type );
  }

  function ClearAddresses()
  {
    $this->_load();
    $this->the_mailer->ClearAddresses();
  }

  function ClearAllRecipients()
  {
    $this->_load();
    $this->the_mailer->ClearAllRecipients();
  }

  function ClearAttachments()
  {
    $this->_load();
    $this->the_mailer->ClearAttachments();
  }

  function ClearBCCs()
  {
    $this->_load();
    $this->the_mailer->ClearBCCs();
  }

  function ClearCCs()
  {
    $this->_load();
    $this->the_mailer->ClearCCs();
  }

  function ClearCustomHeaders()
  {
    $this->_load();
    $this->the_mailer->ClearCustomHeaders();
  }

  function ClearReplyTos()
  {
    $this->_load();
    $this->the_mailer->ClearReplyTos();
  }
  
  function IsError()
  {
    $this->_load();
    return $this->the_mailer->IsError();
  }

  function IsHTML($var = true)
  {
    $this->_load();
    return $this->the_mailer->IsHTML($var);
  }

  function IsMail()
  {
    $this->_load();
    return $this->the_mailer->IsMail();
  }

  function IsQmail()
  {
    $this->_load();
    return $this->the_mailer->IsQmail();
  }

  function IsSendmail()
  {
    $this->_load();
    return $this->the_mailer->IsSendmail();
  }

  function IsSMTP()
  {
    $this->_load();
    return $this->the_mailer->IsSMTP();
  }

  function Send()
  {
    $this->_load();
    return $this->the_mailer->Send();
  }

  function SetLanguage( $lang_type, $lang_path = '' )
  {
    $this->_load();
    return $this->the_mailer->SetLanguage( $lang_type, $lang_path );
  }

  function SmtpClose()
  {
    $this->_load();
    return $this->the_mailer->SmtpClose();
  }

} // class CMSMailer

?>
