<?php  
  require_once('facebook/src/facebook.php');  
  // manejar codigo de error, si esta presente  
  if (isset($_REQUEST['error_reason'])) {  
        echo("<script>self.close();</script>");  
        exit;  
  }  
  // construir el objecto sdk de facebook  
  $script_url = 'http://localhost/Pizzabrosa/fblogin.php';  
  $fb_apikey = '495448047228675';  
  $fb_secret = '3ef0579641dc6dde64611ba7f78b8e41';  
  $facebook = new Facebook(array(  
       'appId' => $fb_apikey,  
       'secret' => $fb_secret  
  ));  
  // obtener el codigo de respuesta  
  $code = $_REQUEST["code"];  
  // construir el URL de login de Facebook  
  $fbLoginUrl = $facebook->getLoginUrl(array(  
       'scope' => 'email',  
       'display' => 'popup',  
       'redirect_uri' => $script_url  
  ));  
  // si no existe codigo de retorno de facebook, enviarmos al usuario al formulario  
  // de login de Facebook  
  if(empty($code)) {  
       echo("<script> top.location.href='$fbLoginUrl'</script>");  
       exit;  
  } else {  
            // obtener el token de autenticacion a partir de Facebook Graph  
            $token_url = "https://graph.facebook.com/oauth/access_token?"  
              . "client_id=" . $fb_apikey . "&redirect_uri=" . urlencode($script_url)  
              . "&client_secret=" . $fb_secret . "&code=" . $code;  
            // obteenemos la respuesta y la interpretamos  
            $response = @file_get_contents($token_url);  
            $params = null;  
            parse_str($response, $params);  
            // asignamos al objecto Facebook el token para proceder a realizar  
            // llamadas al API posteriormente  
            $facebook->setAccessToken($params['access_token']);  
            $fbme = $facebook->api('/me', 'GET');  
            if ($fbme) {  
                 // teniendo el objeto Facebook ME (datos del usuario) procedemos  
        // a realizar nuestro proceso ya sea de login o registro.                 
                 proceed_login_or_register($fbme);  
            }   
  }  
  ?>  