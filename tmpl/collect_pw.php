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

	showHeader('',$me,'','');
	//show_popup_form_header("District 5 Password Update Screen","pw_update.php?".htmlspecialchars(SID));
	if (isset($error))
		echo "<p color='red'>$error</p>";
?>
<table>
<tr>
	<td><label>USPS Certificate:</label></td>
	<td><input type="text" id="certificate" name="certificate" size="32"
		<?php echo "value='$user->username' readonly "; ?> />
	</td>
</tr>
<tr>
	<td><label>Password:</label></td>
	<td><input type="password" id="password" name="password" size="32" value=""/></td>
</tr>
<tr>
	<td><label>Confirm Password:</label></td>
	<td><input type="password" id="conf_password" name="conf_password" size="32" value="" /> <br/>	
</td>
</tr>
<tr><td>
	<input type="submit" name="pw_update" value="Update Password" /><br/>
</td></tr>
<p>This must be your USPS Certificate!  You must enter your new password in both password fields.  After the database update you will be routed to the Member Only home page.</p>
</table>
<?php
	showTrailer();
?>


