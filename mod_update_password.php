<?php
/**
* @package Author
* @author Joesph P. Gibson
* @website www.joesboat.org
* @email joe@joesboat.org
* @copyright Copyright (C) 2018 Joseph P. Gibson. All rights reserved.
* @license GNU General Public License version 2 or later; see LICENSE.txt
**/

// no direct access
defined('_JEXEC') or die('Restricted access');
jimport("usps.includes.routines");
jimport("usps.tableD5VHQAB");
jimport("usps.Joes_factory");
require_once(dirname(__FILE__).'/helper.php');
$dbSource 	= $params->get('dbsource');
$vhqab  = JoeFactory::getLibrary("USPSd5tableVHQAB",$dbSource);
$me = JFactory::getApplication()->getMenu()->getActive()->alias;
$session = JFactory::getSession();
$user = JFactory::getUser();
$error = '';
	if ($user->guest){
		header("Location: home");
		exit(0);
	}
	if (isset($_POST['command'])){
		if (strtolower($_POST['command'])=="cancel"){
			header("Location: member_control.php?".htmlspecialchars(SID));
			exit(0);
		}
	}
	if (isset($_POST['unlink'])){
		unlink($_POST['unlink']);
	}
	if (isset($_POST['pw_update'])){
		if ( 	($_POST['password']== '') or 
				($_POST['password'] != $_POST['conf_password']) ) {
			$error = 'There was an error in your data. Please make sure you filled in all the required data and that the password fields match.';
			if (isset($_POST['unlink'])){
				header("Location:../index.php");
				exit;	
			}
			require(JModuleHelper::getLayoutPath('mod_update_password',"collect_pw"));
		}else{
			$vhqab->updatePassword($user->username,$_POST['password']);
			require(JModuleHelper::getLayoutPath('mod_update_password',"notify_pw"));
		}
	}else{				// This is the display 
		$update_ok = FALSE;
		require(JModuleHelper::getLayoutPath('mod_update_password',"collect_pw"));
	}


?>