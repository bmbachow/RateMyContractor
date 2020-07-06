<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../resources/favicon.ico" type="image/x-icon">
        <link rel="icon" href="../resources/favicon.ico" type="image/x-icon">
        <title>Rate My Contractor | Pricing</title>
        
        <link href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" rel="stylesheet">
        <!-- Bootstrap core CSS -->
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      
        <!-- Custom styles for this template -->
        <link href="../css/modern-business.css" rel="stylesheet">

        

    <!-- link to the SqPaymentForm library -->
    <script type="text/javascript" src="https://js.squareupsandbox.com/v2/paymentform">
    </script>

    <!-- link to the local custom styles for SqPaymentForm -->
    <link rel="stylesheet" type="text/css" href="paypal.css">

  </head>
      <body>
  
<?php include "./menu.php" ?>

<div class="container-fluid">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="row w-75 mx-auto justify-content-center">
      <div class="col-sm-4 mb-5">
        <div class="card h-100">
          <div class="card-body">              
              <h5 class="card-title text-muted text-uppercase text-center">Basic Plus</h5>
              <h6 class="card-price text-center">$40<span class="period">/month</span></h6>
              <hr>
          <ul class="fa-ul">
                <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Claim Profile</strong></li>
                <li><span class="fa-li"><i class="fas fa-check"></i></span>8 Photo Showcase</li>
                <li><span class="fa-li"><i class="fas fa-check"></i></span>Phone Number Displayed</li>
                <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Reviews</li>
                <li><span class="fa-li"><i class="fas fa-check"></i></span>One Consultation To Optimize Page</li>
                <li><span class="fa-li"><i class="fas fa-check"></i></span>Leads Emailed To You</li>
                <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Leads Texted To You Instantly</li>
                <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Respond To Reviews</li>
                <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Unlimited Leads</li>
              </ul>
            </div>
        </div>
      </div>
      <div class="col-sm-4 mb-5">
        <div class="card h-100">
          <div class="card-body">
          <h3>Welcome To The Team!</h3>
            <hr/>
            <div id="paypal" >
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                  <input type="hidden" name="cmd" value="_s-xclick">
                  <input type="hidden" name="hosted_button_id" value="M88PNLJRHDUJ8">
                <table>
                <tr><td><input type="hidden" name="on0" value=""></td></tr><tr><td><select name="os0">
	                <option value="Basic Plus">Basic Plus : $40.00 - Monthly</option>
	                <option value="Professional">Professional : $300.00 - Yearly</option>
                </select> </td></tr>
                </table>
                <input type="hidden" name="currency_code" value="USD">
                  <input id="imgbutton" type="image" src="../resources/button_join-now.png" name="submit" alt="PayPal - The safer, easier way to pay online!">
                  <img id="imgcard" src="../resources/Paypal Cards.png">
                  <img alt="" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                </form>      
             </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
    
<?php include "./footer.php" ?>