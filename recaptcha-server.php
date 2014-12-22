<!DOCTYPE html>
<html>
  <head>
    <title>reCAPTCHA demo: Server side - verify input</title>
  </head>
  <body>
	<h1><strong>reCAPTCHA DEMO</strong></h1>
<?php

if (isset($_POST[email]))
{
    $serverSecret='YOUR-PRIVATE-KEY-SEE-GOOGLE-SITE';
    $queryUrl= 'https://www.google.com/recaptcha/api/siteverify?secret='.$serverSecret.'&response='.$_POST[responsePost].'&remoteip='.$_SERVER['REMOTE_ADDR'];
    $responseJson = file_get_contents($queryUrl);
    if (strpos($responseJson, '"success": true'))
    {
        echo '<p>SUCCESS: You submitted:<br>';
        echo 'eMail='.$_POST[email].'<br>';
        echo '</p>';    
    }
    else
    {
        echo '<p>FAILURE: Captcha Error<br>';
        echo 'Error:<br>'.$responseJson;
        echo '</p>';    
        exit();
    }

}

?>
    <br>
    <a href="recaptcha-form.html">Restart</a>

  </body>
</html>      

