<?php require_once('recaptchalib.config.php');
	  require_once('recaptchalib.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 <!--- 
 ALL CONTENT ARE EDITED AND OWNED BY TITANIUM NETWORK
 Author  : DevGordo
 Company : GordoCréu dev team
 Website : #####
 Created Date : 10:52 PM 7/16/2014
 !--->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US" >

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Dream Register</title>
<link rel='stylesheet' id='gantry631-css'  href='wp-content/plugins/gantry/css/gantry78b2.css?ver=1.28' type='text/css' media='all' />
<link rel='stylesheet' id='wordpress421-css'  href='wp-content/plugins/gantry/css/wordpress78b2.css?ver=1.28' type='text/css' media='all' />
<link rel='stylesheet' id='wordpress789-css'  href='wp-content/themes/rt_dominion_wp/css/wordpress78b2.css?ver=1.28' type='text/css' media='all' />
<link rel='stylesheet' id='style161-css'  href='wp-content/themes/rt_dominion_wp/css/style178b2.css?ver=1.28' type='text/css' media='all' />
<link rel='stylesheet' id='template100-css'  href='wp-content/themes/rt_dominion_wp/css/template78b2.css?ver=1.28' type='text/css' media='all' />

	<style type="text/css">
		<!--

#rt-main-surround ul.menu li.active > a, #rt-main-surround ul.menu li.active > .separator, #rt-main-surround ul.menu li.active > .item, .rt-article-title span, #rt-main-surround h2.title span {color:#cc0000;}
body a, #rt-main-surround ul.menu a:hover, #rt-main-surround ul.menu .separator:hover, #rt-main-surround ul.menu .item:hover, #rt-top .titlecolor h2.title span, #rt-main-surround h2.title span {color:#cc0000;}
		-->
	</style>

	<script type="text/javascript">//<![CDATA[
window.addEvent('domready', function() {
				var modules = ['rt-block'];
				var header = ['h3','h2','h1'];
				GantryBuildSpans(modules, header);
		

				var switcher = document.id('gantry-viewswitcher');
				if (switcher) {
					switcher.addEvent('click', function(e) {
						e.stop();
						if ('0' == '0') document.id('gantry-viewswitcher').addClass('off');
						else $('gantry-viewswitcher').removeClass('off');
						Cookie.write('dominion-win-switcher', '0');
						window.location.reload();
					});
				}
		
            new Fusion('ul.menutop', {
                pill: 0,
                effect: 'slide and fade',
                opacity:  1,
                hideDelay:  500,
                centered:  0,
                tweakInitial: {'x': -6, 'y': 0},
                tweakSubsequent: {'x':  -4, 'y':  -22},
                menuFx: {duration:  200, transition: Fx.Transitions.Sine.easeOut},
                pillFx: {duration:  400, transition: Fx.Transitions.Back.easeOut}
            });
            
});	//]]></script>
<script type="text/javascript"> 
function redirectPage(url) {
    //window.top.location.href = url; 
    document.location.href = url;
}

</script>

</head>
<div  class="col12">
		
						
			            <div class="rt-grid-4 rt-pull-8">
            
	
    			
			
						<form id="form-login" action="index.php" method="post">
				<fieldset class="input">
					<p>
						<font color=black><label >Onderon Login</label></font><br />
						<input type="text" name="login" class="inputbox" alt="username" size="18" />
					</p>
					<p>
						<font color=black><label >Onderon Password</label></font><br />
						<input type="password" name="pass" class="inputbox" size="18" alt="password" />
					</p>
					<p>
						<font color=black><label >Confirm Password</label></font><br />
						<input type="password" name="cpass" class="inputbox" size="18" alt="password" />
					</p>
					<p>
						<font color=black><label >E-mail</label></font><br />
						<input type="text" name="mail" class="inputbox" alt="username" size="18" />
					</p>
					<p>
						<font color=black><label >Nick do amigo (Deixe em branco se tiver nenhum)</label></font><br />
						<input type="text" name="friend" class="inputbox" alt="friend" size="18" />
					</p><br>
					<p>
						<font color=black><label >Confirm that you are a human:</label></font><br /> <?php echo recaptcha_get_html($recaptcha_public_key); ?>
			  		</p>
					<div class="readon"><input type="submit" value="Create Onderon Account" class="button" name="submit" /></div>
				</fieldset>							
			</form>
			
						
	
					</div>
</html>
<?php error_reporting (E_ALL ^ E_NOTICE);
require_once('recaptchalib.config.php');
require_once('recaptchalib.php');

//MSSQL settings
$db_user = 'rf'; // SQL ID
$db_pass = 'bermuda02'; // SQL PASSWORD 
$db_base = "jubileu"; // SQL BASE name 
$db_host = "127.0.0.1"; // SQL HOST 

$reg_open = true;

$tabelka = '';

if($reg_open AND isset($_POST['login']))
{

$connectsql=mssql_connect($db_host, $db_user, $db_pass) or die('<center><b>'.$lang_error_cant_connect1.'</b><br />'.$lang_error_cant_connect2.'<br /><br /><a href="index.php" class="btn btn-info">Back</a></center>');
$db = @mssql_select_db($db_base,$connectsql) or die('<center><b>'.$lang_error_cant_connect1.'</b><br />'.$lang_error_cant_connect2.'<br /><br /><a href="index.php" class="btn btn-info">Back</a></center>');

$login = $_POST['login'];
$pw = $_POST['pass'];
$cpw = $_POST['cpass'];
$email = $_POST['mail'];
$friend = $_POST['friend'];

$login = trim($login);
$pw = trim($pw);
$cpw = trim($cpw);
$email = trim($email);
$friend = trim($friend);

if(ereg("[^0-9a-zA-Z_-]", $login, $str))
{
echo '<div id="form-login"><ul><li><a>Illegal characters, Username must only contain a-z, A-Z e 0-9</a></li></ul></div>';
}
elseif(ereg("[^0-9a-zA-Z_-]", $pw, $str))
{
echo '<div id="form-login"><ul><li><a>Illegal Characters, Password must only contain a-z, A-Z e 0-9</a></li></ul></div>';
}
elseif(ereg("[^0-9]", $pin, $str))
{
echo '<div id="form-login"><ul><li><a>Illegal Characters, Pin must only numeric</a></li></ul></div>';
}
elseif (empty($login))
{
echo '<div id="form-login"><ul><li><a>Username must be filled</a></li></ul></div>';
}
elseif (empty($pw))
{
echo '<div id="form-login"><ul><li><a>Password must be filled</a></li></ul></div>';
}
elseif (empty($cpw))
{
echo '<div id="form-login"><ul><li><a>Confirm Password must be filled</a></li></ul></div>';
}
elseif (empty($email))
{
echo '<div id="form-login"><ul><li><a>E-mail must be filled.</a></li></ul></div>';
}
elseif (strpos($email,'\''))
{
echo '<div id="form-login"><ul><li><a>E-mail not valid.</a></li></ul></div>';
}
else
{
$login_test = strtolower($login);

$stmt1 = mssql_init('[dbo].[pSelect_UserRFTestAccount]');
mssql_bind($stmt1, '@id', $login,  SQLVARCHAR,     false,  false,   16);
$resultx = mssql_execute($stmt1) or die('Failed to verify login. Please try again.');

mssql_free_statement($stmt1);

if ((mssql_num_rows($resultx)) > 0)
{
echo '<div id="form-login"><ul><li><a>Try other username.</a></li></ul></div>';
}
elseif (strlen($login) < 4)
{
echo '<div id="form-login"><ul><li><a>Username must be between 4 and 10 chars long and use only letter or number characters.</a></li></ul></div>';
}
elseif (strlen($pw) < 4)
{
echo '<div id="form-login"><ul><li><a>Password must be between 4 and 10 characters.</a></li></ul></div>';
}
elseif (strlen($pw) > 12)
{
echo '<div id="form-login"><ul><li><a>Password must be between 4 and 12 characters.</a></li></ul></div>';
}
elseif (strlen($login) > 12)
{
echo '<div id="form-login"><ul><li><a>Username must be between 4 and 12 chars long and use only letter or number characters.</a></li></ul></div>';
}
elseif ($pw != $cpw)
{
echo '<div id="form-login"><ul><li><a>Password did not match.</a></li></ul></div>';
}
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo '<div id="form-login"><ul><li><a>The email provided is not valid.</a></li></ul></div>';
}
elseif (strlen($friend) > 16)
{
echo "<div id='form-login'><ul><li><a>Your friend's character name is too big. Please try again with a different name.</a></li></ul></div>";
}
else
{
	$response = recaptcha_check_answer($recaptcha_private_key,$_SERVER['REMOTE_ADDR'],$_POST['recaptcha_challenge_field'],$_POST['recaptcha_response_field']);
	if(!$response->is_valid){
		if($response->error == 'incorrect-captcha-sol'){
			echo '<div id="form-login"><ul><li><a>Incorrect answer to reCAPTCHA.</a></li></ul></div>';
		}else{
			echo '<div id="form-login"><ul><li><a>'. $response->error .'</a></li></ul></div>';
		}
	}

	else {
		$stmt = mssql_init('[dbo].[pInsert_UserRFTestAccount]');
	    mssql_bind($stmt, '@id', $login,  SQLVARCHAR,     false,  false,   16);
	    mssql_bind($stmt, '@password', $pw,  SQLVARCHAR,     false,  false,   24);
	    mssql_bind($stmt, '@email', $email,  SQLVARCHAR,     false,  false,   50);
	    mssql_bind($stmt, '@friend', $friend,  SQLVARCHAR,     false,  empty($friend),   16);


	    mssql_execute($stmt) or die('Failed to create user. Please try again.<br /><br /><a href="index.php" class="btn btn-info">Back</a>');

    	mssql_free_statement($stmt);

    	$db2 = @mssql_select_db('cantina',$connectsql);

    	$stmt2 = mssql_init('[dbo].[pInsert_UserStatusAccount]');
    	mssql_bind($stmt2, '@id', $login,  SQLVARCHAR,     false,  false,   16);

    	mssql_execute($stmt2) or die('Failed to create user status. Please try again.<br /><br /><a href="index.php" class="btn btn-info">Back</a>');

    	mssql_free_statement($stmt2);

		echo '<div id="form-login"><ul><li><a>Congratulations, <b>'. htmlspecialchars($login, ENT_QUOTES) .'</b>. Your account has been created.</a></li></ul></div>';

		echo "<script> redirectPage('http://45.35.41.102:9992/contas/success.html'); </script>";

	}

	
}
}
}
elseif($reg_open)
{
echo $tabelka;
}
else
{
echo '<center>Registration is currently closed. Please try again later<br /></center>';
}
?>