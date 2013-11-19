
<?php
require 'config.php';
require 'facebook/src/facebook.php';
// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
  'appId'  => $config['App_ID'],
  'secret' => $config['App_Secret'],
  'cookie' => true
));
 
if(isset($_GET['fbTrue']))
{
    $token_url = "https://graph.facebook.com/oauth/access_token?"
       . "client_id=".$config['App_ID']."&redirect_uri=" . urlencode($config['callback_url'])
       . "&client_secret=".$config['App_Secret']."&code=" . $_GET['code']; 
 
     $response = file_get_contents($token_url);
     $params = null;
     parse_str($response, $params);
 
     $graph_url = "https://graph.facebook.com/me?access_token=" 
       . $params['access_token'];
 
     $user = json_decode(file_get_contents($graph_url));
     $content = $user;
}
else
{
    $content= 'https://www.facebook.com/dialog/oauth?client_id='.$config['App_ID'].'&redirect_uri='.$config['callback_url'].'&scope=email,user_likes,publish_stream';

    header("location:$content");
}
 ?>