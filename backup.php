<?php

  require "Mail.php";

  $rcv = 'destination@gmail.com';


  $headers['from'] = 'PFsense XXX.XXX.XXX.XXX';
  $headers['To'] = $rcv;
  $headers['Subject'] = 'Backup PFsense';
  $headers['Date'] = date("r");

  $body = file_get_contents('/cf/conf/config.xml');

  $smtpinfo["host"] = 'smtp.gmail.com';
  $smtpinfo["port"] = "587";
  $smtpinfo["auth"] = true;
  $smtpinfo["username"] = "your_account@gmail.com";
  $smtpinfo["password"] = "your_password";

  $mail_object =& Mail::factory("smtp", $smtpinfo);
  $mail_object->send($rcv, $headers, $body);



  if(PEAR::isError($mail_object)){
  echo($mail_object->getMessage());
  }
  else{
    echo("Well done! \n");
  }
?>
