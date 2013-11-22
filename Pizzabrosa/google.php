<?php
########## Google Settings.. Client ID, Client Secret #############
$google_client_id   = '734341103868.apps.googleusercontent.com';
$google_client_secret   = 'vIZx8tLYgh_JfjhG0B_8VIvA';
$google_redirect_url    = 'http://localhost/Pizzabrosa/OrdenPizza.php';
$google_developer_key   = 'AIzaSyAKXf40T2dmNJPyOKOTDFbW90iQhbL7ztI';

########## MySql details #############
$db_username = "root"; //Database Username
$db_password = ""; //Database Password
$hostname = "localhost"; //Mysql Hostname
$db_name = 'pizzabrosas'; //Database Name
###################################################################

//include google api files
require_once 'google/Google_Client.php';
require_once 'google/contrib/Google_Oauth2Service.php';

//start session
session_start();

$gClient = new Google_Client();
$gClient->setApplicationName('Login con Pizzabrosa');
$gClient->setClientId($google_client_id);
$gClient->setClientSecret($google_client_secret);
$gClient->setRedirectUri($google_redirect_url);
$gClient->setDeveloperKey($google_developer_key);

$google_oauthV2 = new Google_Oauth2Service($gClient);

//If user wish to log out, we just unset Session variable
if (isset($_REQUEST['reset']))
{
  unset($_SESSION['token']);
  $gClient->revokeToken();
  header('Location: ' . filter_var($google_redirect_url, FILTER_SANITIZE_URL));
}

if (isset($_GET['code']))
{
    $gClient->authenticate($_GET['code']);
    $_SESSION['token'] = $gClient->getAccessToken();
    header('Location: ' . filter_var($google_redirect_url, FILTER_SANITIZE_URL));
    return;
}


if (isset($_SESSION['token']))
{
        $gClient->setAccessToken($_SESSION['token']);
}


if ($gClient->getAccessToken())
{
      //Get user details if user is logged in
      $user                 = $google_oauthV2->userinfo->get();
      $user_id              = $user['id'];
      $user_name            = filter_var($user['name'], FILTER_SANITIZE_SPECIAL_CHARS);
      $email                = filter_var($user['email'], FILTER_SANITIZE_EMAIL);
      $profile_url          = filter_var($user['link'], FILTER_VALIDATE_URL);
      $profile_image_url    = filter_var($user['picture'], FILTER_VALIDATE_URL);
      $personMarkup         = "$email<div><img src='$profile_image_url?sz=50'></div>";
      $_SESSION['token']    = $gClient->getAccessToken();
}
else
{
    //get google login url
    $authUrl = $gClient->createAuthUrl();
}

//HTML page start
echo '<html xmlns="http://www.w3.org/1999/xhtml">';
echo '<head>';
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
echo '<title>Login with Google</title>';
echo '</head>';
echo '<body>';
echo '<h1>Login with Google</h1>';

if(isset($authUrl)) //user is not logged in, show login button
{
    echo '<a class="login" href="'.$authUrl.'"><img src="images/google-login-button.png" /></a>';
}
else // user logged in
{
   /* connect to mysql */
    $connecDB = mysql_connect($hostname, $db_username, $db_password)or die("Unable to connect to MySQL");
    mysql_select_db($db_name,$connecDB);

    //compare user id in our database
    $result = mysql_query("SELECT COUNT(google_id) FROM google_users WHERE google_id=$user_id");
    if($result === false) {
        die(mysql_error()); //result is false show db error and exit.
    }

    $UserCount = mysql_fetch_array($result);

    if($UserCount[0]) //user id exist in database
    {
        echo 'Welcome back '.$user_name.'!';
    }else{ //user is new
        echo 'Hi '.$user_name.', Thanks for Registering!';
        @mysql_query("INSERT INTO google_users (google_id, google_name, google_email, google_link, google_picture_link) VALUES ($user_id, '$user_name','$email','$profile_url','$profile_image_url')");
    }


    echo '<br /><a href="'.$profile_url.'" target="_blank"><img src="'.$profile_image_url.'?sz=50" /></a>';
    echo '<br /><a class="logout" href="?reset=1">Logout</a>';

    //list all user details
    echo '<pre>';
    print_r($user);
    echo '</pre>';
}

echo '</body></html>';
?>