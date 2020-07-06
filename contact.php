<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="./resources/favicon.ico" type="image/x-icon">
  <link rel="icon" href="./resources/favicon.ico" type="image/x-icon">
  <title>RMC</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">
  <link href="css/contact.css" rel="stylesheet">

</head>

<body>

<?php include("menu.php"); ?>

  <!-- Page Content -->
  <div class="container">
    <br>
    <br>
    <br>

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3 text-center">Contact Us</h1>


    <!-- Content Row -->
    <div class="row">
      <!-- Map Column -->
      <div class="col-lg-8 mb-4">
        <!-- Embedded Google Map -->
        <iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3308.5160028121027!2d-118.4404805844445!3d33.97927758062574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2ba7feb5fd353%3A0x9f66688ae600847e!2s4712%20Admiralty%20Way%2C%20Marina%20Del%20Rey%2C%20CA%2090292!5e0!3m2!1sen!2sus!4v1574025985816!5m2!1sen!2sus' width="100%" height="400px" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
      </div>
      <!-- Contact Details Column -->
      <div class="col-lg-4 mb-4">
        <h3>Contact Details</h3>
        <p>
          4712 Admiralty Way
          <br>Marina Del Rey, CA 90292
          <br>
        </p>
        <p>
          <abbr title="Email">E</abbr>:
          <a href="mailto:info@ratemycontractor.com">info@ratemycontractor.com
          </a>
        </p>
        <p>
          <abbr title="Hours">H</abbr>: Monday - Friday: 9:00 AM to 5:00 PM
        </p>
      </div>
    </div>
    <!-- /.row -->

    <!-- Contact Form -->
    <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <div class="row">
      <div class="col-lg-8 mb-4">
        <h3>Send us a Message</h3>
        <form name="sentMessage" id="contactForm" novalidate action="./mail/contact_me.php" method="POST">
          <div class="control-group form-group">
            <div class="controls">
              <label>Full Name:</label>
              <input type="text" class="form-control" name="name" id="name" required data-validation-required-message="Please enter your name.">
              <p class="help-block"></p>
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Phone Number:</label>
              <input type="tel" class="form-control" name="phone" id="phone" required data-validation-required-message="Please enter your phone number.">
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Email Address:</label>
              <input type="email" class="form-control" name="email" id="email" required data-validation-required-message="Please enter your email address.">
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Message:</label>
              <textarea rows="10" cols="100" class="form-control" name="message" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
            </div>
          </div>
          <div id="success"></div>
          <!-- For success/fail messages -->
          <button type="submit" class="btn btn-primary" id="sendMessageButton">Send Message</button>
        </form>
      </div>
    </div>
  </div>
  
  <?php include('footer.php'); ?>

  <!-- Contact form JavaScript -->
  <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

</body>

</html>
