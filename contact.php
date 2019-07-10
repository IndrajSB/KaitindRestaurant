<?php

    $error = ""; $successMessage = "";

    if ($_POST)
    {

        if (!$_POST["email"])
        {

            $error .= "An email address is required.<br>";

        }

        if (!$_POST["content"])
        {

            $error .= "The content field is required.<br>";

        }

        if (!$_POST["subject"])
        {

            $error .= "The subject is required.<br>";

        }

        if ($_POST['email'] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false)
        {

            $error .= "The email address is invalid.<br>";

        }

        if ($error != "")
        {

            $error = '<div class="alert alert-danger" role="alert"><p>There were error(s) in your form:</p>' . $error . '</div>';

        }
        else
        {

            $emailTo = "me@mydomain.com";

            $subject = $_POST['subject'];

            $content = $_POST['content'];

            $headers = "From: ".$_POST['email'];

            if (mail($emailTo, $subject, $content, $headers))
            {
                $successMessage = '<div class="alert alert-success" role="alert">Your message was sent, we\'ll get back to you ASAP!</div>';
            }
            else
            {
                $error = '<div class="alert alert-danger" role="alert"><p><strong>Your message couldn\'t be sent - please try again later</div>';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </head>
  <body>

    <!--Navigation Bar-->
    <section id="nav-bar">
      <nav class="navbar navbar-expand-lg navbar-custom">
        <a class="navbar-brand" href="#"><img src="img/Name.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">ABOUT US</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Menu
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Dinner</a>
                <a class="dropdown-item" href="#">Dessert</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">CONTACT</a>
            </li>
          </ul>
        </div>
      </nav>
    </section>

    <div class="container">

      <h1>Get in touch!</h1>

        <div id="error"><? echo $error.$successMessage; ?></div>

        <form method="post">
          <fieldset class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
            <small class="text-muted">We'll never share your email with anyone else.</small>
          </fieldset>
          <fieldset class="form-group">
            <label for="subject">Subject</label>
            <input type="text" class="form-control" id="subject" name="subject" >
          </fieldset>
          <fieldset class="form-group">
            <label for="exampleTextarea">What would you like to ask us?</label>
            <textarea class="form-control" id="content" name="content" rows="3"></textarea>
          </fieldset>
          <button type="submit" id="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

    <!-- jQuery first, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>


    <script type="text/javascript">

          $("form").submit(function(e) {

              var error = "";

              if ($("#email").val() == "") {

                  error += "The email field is required.<br>"

              }

              if ($("#subject").val() == "") {

                  error += "The subject field is required.<br>"

              }

              if ($("#content").val() == "") {

                  error += "The content field is required.<br>"

              }

              if (error != "") {

                 $("#error").html('<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>' + error + '</div>');

                  return false;

              } else {

                  return true;

              }
          })

    </script>

    <!--footer-->
    <section id="footer">
      <div class="container">
        <h1>Contact Us</h1>
      </div>
      <p class="footer-msg">
        <a href="mailto: isbdevelopers@gmail.com">Email: isbdevelopers@gmail.com</a>
        <br>
        <a href="tel: 07527418276">Tel: 07527418276</a>
      </p>
      <div class="socials">
        <a href="mailto: "><i class="fa fa-envelope"></i></a>
        <a href="tel: "><i class="fa fa-phone"></i></a>
        <a href=""><i class="fa fa-instagram"></i></a>
        <a href=""><i class="fa fa-twitter"></i></a>
      </div>
      <p class="footer-msg">Developed by <a href="https://isbdevelopers.com/">www.isbdevelopers.com</a></p>
    </section>

  </body>
</html>
