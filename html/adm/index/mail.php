<?php
if(isset($_POST['mail']) && !empty($_POST['mail'])) {
  $filename = 'client.xml';
  $path = '/home/monkey/Downloads';
  $file = $path . "/" . $filename;

  $mailto = $_POST['mail'];
  $subject = 'Client XML';
  $message = 'Our list of client in format XML';

  $content = file_get_contents($file);
  $content = chunk_split(base64_encode($content));

  $eol = "\r\n";

  $headers = "From: <ebet-esport.space@support.com>" . $eol;
  $headers .= "MIME-Version: 1.0" . $eol;

  $body = $message;

  if (mail($mailto, $subject, $body, $headers)) {
      echo "mail send ... OK";
  } else {
      echo "mail send ... KO!";
      print_r( error_get_last() );
  }
}

?>
