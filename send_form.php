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

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">

    <title>Vitor.cc | ✅ Thanks for your message!</title>
  </head>
  <body>

   <!-- Neutral Header -->

   <header class="neutral-header">
     <div class="container">
         <div class="row">
           <div class="col-sm">
             <a class="main-logo" href="#"><img src="img/main-logo.png" /></a>
             <div class="menu-holder float-right">
               <a href="#" class="mob-menu"><i class="icon icon-menu"></i></a>
             </div>
           </div>
         </div>
       </div>
   </header>

   <!-- Floating Header -->

    <header class="floating-header">
      <div class="container">
          <div class="row">
            <div class="col-sm">
              <a class="main-logo" href="#"><img src="img/main-logo.png" /></a>
              <div class="menu-holder float-right">
                <a href="#" class="mob-menu"><i class="icon icon-menu"></i></a>
              </div>
            </div>
          </div>
        </div>
    </header>

    <!-- Main Hero Section -->

    <section class="main-hero">
      <div class="container">
        <div class="row">
          <div class="col-sm">
            <h1>✅ Thanks for your message!</h1>
            <p>I will reply as soon as possible.</p>
          </div>
        </div>
      </div>
    </section>

    <footer>
      <div class="container">
        <div class="row">
          <nav class="footer-nav module">
            <li class="module">
              <a href="#" class="footer-nav-item">View More Work</a>
              <span>Take a look on more selected work</span>
            </li>
            <li>
              <a href="#" class="footer-nav-item">About Me</a>
              <span>Vitor Pinho builds awesome things for Web and Mobile</span>
            </li>
            <li>
              <a href="#" class="footer-nav-item">Contact Me</a>
              <span>I’m available for new projects</span>
            </li>
          </nav>
       </div>
       <div class="row">
         <div class="col-sm">
           <nav class="social-links">
             <a href="#" class="social-link-item"><i class="icon icon-dribbble"></i></a>
             <a href="#" class="social-link-item"><i class="icon icon-facebook"></i></a>
             <a href="#" class="social-link-item"><i class="icon icon-instagram"></i></a>
             <a href="#" class="social-link-item"><i class="icon icon-linkedin"></i></a>
             <a href="#" class="social-link-item"><i class="icon icon-messenger"></i></a>
             <a href="#" class="social-link-item"><i class="icon icon-mail"></i></a>
           </nav>
         </div>
       </div>

    </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
    <script src="js/slide-in.js"></script>
  </body>
</html>

<?php

}
?>
