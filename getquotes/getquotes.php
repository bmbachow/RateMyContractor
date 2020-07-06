<?php 
session_start();
include '../header.php';

?>
<title>Rate My Contractor</title>
<link rel="shortcut icon" href="../resources/favicon.ico" type="image/x-icon">
<link rel="icon" href="../resources/favicon.ico" type="image/x-icon">
<script type="text/javascript" src="formquotes.js"></script>
<link href="../css/stylequotes.css" rel="stylesheet">

<style type="text/css">
  #user_form fieldset:not(:first-of-type) {
    display: none;
  }
</style>
</head>

<body>
  
<?php include './menu.php'; ?>

  <div class="container">
    <div class="row">
        <div id="card2" class="col-lg-10 col-xl-9 mx-auto"><br>
        <br>
        <br>
        <br>
        <br>
        <div class="card card-signin flex-row my-5">
          <div class="card-img-left d-none d-md-flex">
             <!-- Background image for card set in CSS! -->
		  </div>
          <div id="card" class="card-body">
            <h2 class="card-title text-center">Get Quotes</h2>

<div class="container">
	<h5>  </h5>		
	<div class="progress">
	<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
	</div>
	<div class="alert alert-success hide"></div>	
	<form id="user_form" name="user_form" action="leads.php"  method="post" enctype="multipart/form-data">	
    
    <fieldset id="one">
	<h2>Step 1: Add Contact Information</h2>
	<div class="form-group">
	<label>*Required</label>
	<input type="text" class="form-control" name="fname" required id="fname" placeholder="First Name">
	</div>
	<div class="form-group">
	<label>*Required</label>
	<input type="email" class="form-control" required id="email" name="emailclient" placeholder="Email">
	</div>
	<div class="form-group">
	<label>*Required</label>
	<input type="text" class="form-control" id="phone" required name="phone" placeholder="Phone">
	</div>
	<input type="button" id="button" name="next" class="next btn btn-info" value="Next" />
	</fieldset>
    
    <fieldset id= two>
	<h2>Step 2: Add Work Area</h2>
	<div class="form-group">
	<label></label>
	<input type="text" class="form-control" name="city" id="city" placeholder="City">
	</div>
	<div class="form-group">
	<label></label>
	<input type="text" class="form-control" required id="state" name="state" placeholder="State">
	</div>
	<div class="form-group">
	<label>*Required</label>
	<input type="text" class="form-control" required id="zip" name="zip" placeholder="Zip Code">
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input type="button" id="button" name="next" class="next btn btn-info" value="Next" />
	</fieldset>
    
	<fieldset id="three">
	<h2> Step 3: Your Project</h2>
	<div class="form-group">
	<label>When do you need it done?</label>
	<select class="custom-select" name= time required>
      <option value="Urgently">Urgently</option>
      <option value="This Week">This Week</option>
      <option value="Next Week">Next Week</option>
      <option value="In The Future">In The Future</option>
    </select>
	</div>
	<div class="form-group">
	<label>Do you have a budget?</label>
	<input type="text" class="form-control" name="money" id="fname" placeholder="Amount">
	</div>
	<div class="form-group">
	<label>Job Type</label>
	<input type="text" class="form-control" name="type" id="type" placeholder="e.g. Painting, Tiling, etc.">
	</div>
	<div class="form-group">
	<label>Please Describe What You Want To Have Done...</label>
	<textarea name="leadinfo" required form="user_form" id="describe" wrap="hard" cols="83" rows="3"></textarea>
	</div>
	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input type="button" id="button" name="next" class="next btn btn-info" value="Next" />
	</fieldset>
	
	<fieldset id='four'>
	<h2>Step 4: Create Account</h2>
	<div class="form-group">
	<label for="email">Username</label>
	<input type="text" class="form-control" id="uid" name="uidUsers" required placeholder="Username">
	</div>
	<div class="form-group">
	<label for="password">Password</label>
	<input type="password" class="form-control" name="pwdUsers" id="pwd" required placeholder="Password">
	</div>
	<div class="form-group">
	<label for="password">Password Repeat</label>
	<input type="password" class="form-control" name="pwd-repeat" id="pwd-repeat" required placeholder="Password Repeat">
	</div>
	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input type="submit" name="submit" id="submit" class="submit btn btn-success" value="Submit" />
	</fieldset>
	</form>
</div>
		  </div>
		</div>
	  </div>
	</div>
  </div>
<br>
<br>

<?php include './footer.php'; ?>
</body>
</html>
