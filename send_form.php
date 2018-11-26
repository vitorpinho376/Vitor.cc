<?php
if(isset($_POST['email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "mail@vitor.cc";
    $email_subject = "New Lead on Vitor.cc";

    function died($error) {
        // your error code can go here
        echo "Please fill up all required formfields.";
        echo "Errors below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fill up all required formfields.<br /><br />";
        die();
    }


    // validation expected data exists
    if(!isset($_POST['username']) ||
        !isset($_POST['email']) ||
        !isset($_POST['message'])) {
        died('Sorry, your application was not applied. Please try again.');
    }



    $first_name = $_POST['username']; // required
    $business_from = $_POST['business']; // Not required
    $email_from = $_POST['email']; // required
    $e_message = $_POST['message']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'Fill up a valid e-mail.<br />';
  }

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'Invalid.<br />';
  }

  if(strlen($e_message) < 2) {
    $error_message .= 'Invalid.<br />';
  }

  if(strlen($error_message) > 0) {
    died($error_message);
  }

    $email_message = "Form details below.\n\n";


    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }



    $email_message .= "Name: ".clean_string($first_name)."\n";
    $email_message .= "Business Name: ".clean_string($business_from)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Message: ".clean_string($e_message)."\n";

// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
?>



<?php

}
?>
