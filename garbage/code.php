
<!--- restiration success--->
<html>
<head>
<link href="register.css" rel="stylesheet">
</head>
<body>

  <div class= "redirect" id="re">
	<?php header('Refresh:0; url= ../hosignin.php'); ?>
    <h1> <?php echo '';?> You have successfully registered, you are being redirected! </h1>

</body>

<!--- home biz page success--->
<div class="container">
			<div class="row">
			    <div class="col-2">
				    <h5>First Name:</h5>
			    </div>
				<div class="col-2">
				    <h5>Phone:</h5>
				</div>
				<div class="col-2">
				    <h5>Timing:</h5>
				</div>
				<div class="col-6">
				    <h5>Lead Info:</h5>
				</div>
			</div>
		</div>
		<?php
		
		$sql= "SELECT * FROM leads WHERE zip= '$zip';";
$result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
		
		?>
		<div class="container">
			<div class="row">	
			    <div class="col-2">
				    <h6><?=$row['fname'];?></h6>
				</div>
				<div class="col-2">
				    <h6><?=$row['phone'];?></h6>
				</div>
				<div class="col-2">
				    <h6><?=$row['time'];?></h6>
				</div>
				<div class="col-6">
				    <h6><?=$row['leadinfo'];?></h6>
				</div>
			</div>
		</div>
    <?php } ?>

<!--- homeowner home page success--->
	<div class="container">
			<div class="row">
			    <div class="col-4">
				    <h5>Business Name:</h5>
			    </div>
				<div class="col-2">
				    <h5>Phone:</h5>
				</div>
				<div class="col-2">
				    <h5>Email:</h5>
				</div>
				<div class="col-4">
				    <h5>About:</h5>
				</div>
			</div>
		</div>
		<?php
		
		$sql= "SELECT bname, phone, emailUsers, bio FROM users JOIN reviews ON users.id= reviews.userID WHERE reviews.leadID= '$id' LIMIT 3";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
		
		?>
		<div class="container">
			<div class="row">
			    <div class="col-4">
				    <h6><?=$row['bname'];?></h6>
				</div>
				<div class="col-2">
				    <h6><?=$row['phone'];?></h6>
				</div>
				<div class="col-2">
				    <h6><?=$row['emailUsers'];?></h6>
				</div>
				<div class="col-4">
				    <h6><?=$row['bio'];?></h6>
				</div>
			</div>
		</div>
<?php }

?>

<!--- homeowner potential quotes home page success--->
<div class="container">
			<div class="row">
			    <div class="col-2">
				    <h5>Business Name:</h5>
			    </div>
				<div class="col-2">
				    <h5>Phone:</h5>
				</div>
				<div class="col-2">
				    <h5>Email:</h5>
				</div>
				<div class="col-6">
				    <h5>About:</h5>
				</div>
			</div>
		</div>
		<?php
		
		$sql= "SELECT * FROM users WHERE zip= '$zip' LIMIT 5;";
$result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
		
		?>
		<div class="container">
			<div class="row">
			    <div class="col-2">
				    <h6><?=$row['bname'];?></h6>
				</div>
				<div class="col-2">
				    <h6><?=$row['phone'];?></h6>
				</div>
				<div class="col-2">
				    <h6><?=$row['emailUsers'];?></h6>
				</div>
				<div class="col-6">
				    <h6><?=$row['bio'];?></h6>
				</div>
			</div>
		</div>
	<?php } ?>

<!--- password reset display success--->
	<?php if(isset($_GET["reset"])) {
                if($_GET["reset"] == "success") {
                    echo '<p class= "signupsuccess"> Check Your Email!</p>';
                }
			}
			?>

<!--- verify email and url--->
<?php
$url="ratemycontractor.com/verify.php?token=".$token." &emailclient=".$emailclient;
	
	$to = $emailclient;

    $subject = 'Verify Your Email For Rate My Contractor';

    $message = '<p>We recieved a User with this email address. The link to verify your email is below. If you did not make this request, you can ignore this email.';
    $message .= 'Here is your email verify link: </br>';
    $message .= '<a href="' .$url . '">' .$url . '</a></p>';

    $headers = "From: RMC <noreply@gmail.com>\r\n";
    $headers .= "Content-type: text/html\r\n";

    if(mail($to, $subject, $message, $headers))
        echo "Email Success";
    else
        echo "Email sending failed";
	$_SESSION["uidUsers"] = $_POST['uidUsers'];
	?>

	<!-- services page 3.0 working -->
	<?php
// $user_ip = getenv('REMOTE_ADDR');
// $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
// $city = $geo["geoplugin_city"];

//$array= array("Asbestos Certification","Heating","Building Moving","Finish Carpentry","Ceramic Mosaic Tile","Concrete","Drywall","Earthwork and Pavin","Electrical","Fencing","Fire Protection","Flooring","Carpentry","General","Glazing","Home Improvement","Hazardous Substance Certification","Insulation","Handyman","Landscape","Plastering","Lathing","Voltage Systems","Masonry","Metal Roofing","Metal","Painting","Pipeline","Plumbing","Steel","Roofing","Sanitation","Solar","Sheet Metal","Swimming Pool","HVAC","Welding");
//$url= "ratemycontractor.com/cnpwd.php?type=".$type."&zip=".$city;
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="contractor, rating, reviews, services, comment, quotes, estimates, leads">
  <meta name="author" content="">
  <link rel="shortcut icon" href="./resources/favicon.ico" type="image/x-icon">
  <link rel="icon" href="./resources/favicon.ico" type="image/x-icon">
  <title>RMC</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">

</head>

<body>

<?php include("menu.php"); ?>

  <!-- Page Content -->
  <div class="container">

    
    <!-- Image Header -->
    <div class="container" id="panorama">
    <img id="pan" class="img-fluid rounded mb-4" src="./resources/contractor-panorama.jpg" alt="Contractor Reviews">
      <h1 class="text"><strong>Some Services We Rate </strong></h1>
    </div>
    <!-- Services Section -->
    <div class="container">  
      <div class="row">      
        <div class="col-sm-3">
          <ul>
            <li><a href="./search.php?type=Asbestos">Asbestos Certification</a></li>
            <li><a href="./search.php?type=Heating">Hot Water, Heating</a></li>
            <li><a href="./search.php?type=Abatement">Abatement</a></li>
            <li><a href="./search.php?type=Moving">Moving</a></li>
            <li><a href="./search.php?type=Demo">Demo</a></li>
            <li><a href="./search.php?type=Carpentry">Carpentry</a></li>
            <li><a href="./search.php?type=Tiling">Tiling</a></li>
            <li><a href="./search.php?type=Concrete">Concrete </a></li>
            <li><a href="./search.php?type=Drywall">Drywall </a></li>
            <li><a href="./search.php?type=Paving">Paving</a></li>
            <li><a href="./search.php?type=Electrical">Electrical </a></li>
          </ul>
        </div>      
        <div class="col-sm-3">
          <ul>
            <li><a href="./search.php?type=Fencing">Fencing </a></li>
            <li><a href="./search.php?type=Fire Protection">Fire Protection </a></li>
            <li><a href="./search.php?type=Flooring">Flooring </a></li>
            <li><a href="./search.php?type=Finish Carpentry"> Finish Carpentry </a></li>
            <li><a href="./search.php?type=General">General </a></li>
            <li><a href="./search.php?type=Remodel">Remodel </a></li>
            <li><a href="./search.php?type=Glazing">Glazing </a></li>
            <li><a href="./search.php?type=Home Improvement">Home Improvement </a></li>
            <li><a href="./search.php?type=Hazardous Substances">Hazardous Substances</a></li>
            <li><a href="./search.php?type=Insulation">Insulation </a></li>
            <li><a href="./search.php?type=Handyman">Handyman</a></li>
          </ul>
        </div>      
        <div class="col-sm-3">
         <ul>
          <li><a href="./search.php?type=Landscape">Landscape </a></li>
          <li><a href="./search.php?type=Plastering">Plastering </a></li>
          <li><a href="./search.php?type=Lathing">Lathing </a></li>
          <li><a href="./search.php?type=Voltage Systems">Voltage Systems </a></li>
          <li><a href="./search.php?type=Masonry">Masonry </a></li>
          <li><a href="./search.php?type=Metal Roofing">Metal Roofing </a></li>
          <li><a href="./search.php?type=Metal">Metal </a></li>
          <li><a href="./search.php?type=Painting">Painting </a></li>
          <li><a href="./search.php?type=Pipeline">Pipeline </a></li>
          </ul>
        </div>      
        <div class="col-sm-3">
         <ul>
          <li><a href="./search.php?type=Plumbing">Plumbing </a></li>
          <li><a href="./search.php?type=Steel">Steel </a></li>
          <li><a href="./search.php?type=Roofing">Roofing </a></li>
          <li><a href="./search.php?type=Sanitation">Sanitation </a></li>
          <li><a href="./search.php?type=Solar">Solar </a></li>
          <li><a href="./search.php?type=Sheet Metal">Sheet Metal</a></li>
          <li><a href="./search.php?type=Swimming Pools">Swimming Pools</a></li>
          <li><a href="./search.php?type=HVAC">HVAC </a></li>
          <li><a href="./search.php?type=Welding">Welding </a></li>
          <li><a href="search.php"><strong>AND MORE SEARCH NOW!</strong></a></li>
          </ul>
        </div>  
      </div> 
    </div>
   </div>
   

<?php include('footer.php'); ?>

</body>

</html>


<!-- working search page 3.0 -->

<?php

$type= $_GET['type'];

$user_ip = getenv('REMOTE_ADDR');
$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
$city = $geo["geoplugin_city"];
?>


<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="./resources/favicon.ico" type="image/x-icon">
    <link rel="icon" href="./resources/favicon.ico" type="image/x-icon">
    <title>RMC</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet" />
  </head>


    <body>

  <?php include("menu.php"); ?>
        
    
<div class="s01">
    <form action="./search/find.php" method="POST">
      <div class="inner-form">
        <div class="input-field first-wrap">
          <input name="bname" id="search" type="text" value= "<?php echo $type ?>" placeholder= "Painting, Tiling, Handyman, Etc.">
        </div>
        <div class="input-field second-wrap">
          <input name="zip" id="location" type="text" value="<?php echo $city ?>" placeholder="Zip Code or City">
        </div>
        <div class="input-field third-wrap">
          <button class="btn-search" type="submit">Search</button>
        </div>
      </div>
    </form>
  </div>

<?php include('footer.php'); ?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css"></script>


</body>
</html>

<!-- working Index.php file v3.0 -->

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
  <link href="css/index.css" rel="stylesheet">

</head>

<body>

  <?php include("menu.php"); ?>
<br>
<br>
  <header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" style="background-image: url('./resources/2018-0326-find-it-duke-hero_hero.jpg')">
          <div class="carousel-caption d-none d-md-block">
            <h2><strong> Choose Who You Want</strong></h2>
          </div>
        </div>
        <!-- Slide Two - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('./resources/hire the best.jpg')">
          <div class="carousel-caption d-none d-md-block">
            <h2><strong>Hire The Best</strong></h2>
          </div>
        </div>
        <!-- Slide Three - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('./resources/forget the rest.jpg')">
          <div class="carousel-caption d-none d-md-block">
            <h2><strong>Forget The Rest!</strong></h2>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </header>

  <!-- Page Content -->
  <div class="container-fluid">
  <div class="s01">
    <form action="./search/find.php" method="POST">
      <div class="inner-form">
        <div class="input-field first-wrap">
          <input name="bname" id="search" type="text" placeholder=" E.g. Painting, Plumbing, Handyman...">
        </div>
        <div class="input-field second-wrap">
          <input name="zip" id="location" type="text" placeholder="Zip Code or City">
        </div>
        <div class="input-field third-wrap">
          <button class="btn-search" type="submit">Search Pros</button>
        </div>
      </div>
    </form>
  </div>
  </div>
    <!-- Marketing Icons Section -->
    <div class="container-fluid">
    <div class="row w-75 mx-auto" style="height: 15rem;">
      <div class="col-lg-4 mb-5">
        <div class="card h-100">
          <h3 class="card-header">Have A Project?</h3>
          <div class="card-body">
            <h4 class="card-text">Click below to find the top rated contractors in your area.</h4>
          </div>
          <div >
            <img class="card-img-bottom" src="https://www.mrsvangelista.com/wp-content/uploads/2018/11/project-management-6.jpg">
          </div>
          <div class="card-footer">
            <a href="search.php" class="btn btn-primary btn-block btn-lg">Search Contractors</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-5">
        <div class="card h-100">
          <h3 class="card-header">Want to Rate A Contractor?</h3>
          <div class="card-body">
            <h4 class="card-text">Click below and sign in to start rating all your professionals.</h4>
          </div>
          <div>
            <img class="card-img-bottom" src="https://blackstormdesign.com/wp-content/uploads/2017/01/5starreviewer3-2.png">
          </div>
          <div class="card-footer">
            <a href="hosignup.php" class="btn btn-primary btn-block btn-lg">Review Contractors</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-5">
        <div class="card h-100">
          <h3 class="card-header">Are You A Contractor?</h3>
          <div class="card-body">
            <h4 class="card-text">Click below to sign up and start managing your own profile to attract clients.</h4>
          </div>
          <div>
            <img class="card-img-bottom" src="https://realestateblog.reiclub.com/wp-content/uploads/2e1ax_default_entry_istock_000016132777xsmall.jpg">
          </div>
          <div class="card-footer">
            <a href="pricing.php" class="btn btn-primary btn-block btn-lg">Join The Team</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid mx-0 px-0">
    <div class="row w-100 mx-auto" style="margin-top: 26rem;">
      <div class="col">
        <div class="card" style="border: 0 !important; margin-left: -2rem !important; margin-right: -2rem !important;margin-bottom: -3rem !important;">
          <img class="card-img" style="height: 30rem; width: 100% !important;" src="https://www.99.co/blog/singapore/wp-content/uploads/2017/06/irresponsible-contractor-cover-900x386.jpg">
          <div class="card-img-overlay">
          <h1 id= text1 class="card-title mx-auto" style="margin-top: 6rem; width:50%;">
            A Little About Us
          </h1>
              <h3 id="text" class="card-text mx-auto" style="width: 50%;">
                RateMyContractor was created with one goal in sight - to help people connect with the right contractor for their project. We are a growing compilation of homeowner’s experiences with local contractors. The people who join Rate My Contractor are not only interested in sharing their experience but are looking for a trustworthy service professional that will perform the high quality work that all homeowners deserve.
              </h3>
            </div>
        </div>
      </div>
    </div>
  </div>
<?php include('footer.php'); ?>
</body>
</html>

<!-- working find.php file v3.0 -->

<?php

require ('../db_connect.php');

if (isset($_POST['bname']))
{
$bname = $_POST['bname'];
$zip = $_POST['zip'];
        
$sql = "SELECT *, users.id AS uID FROM users WHERE bname LIKE '%$bname%' AND zip = '$zip' OR city = '$zip' ORDER BY RAND();";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="../resources/favicon.ico" type="image/x-icon">
  <link rel="icon" href="../resources/favicon.ico" type="image/x-icon">
  <title>RMC</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href=https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css>
  <script src= https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js></script>
  <script src= https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <!-- Custom styles for this template -->
  <link href="find.css" rel="stylesheet">

</head>

<body>

 <?php include("./menu.php") ?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<h3> </h3>

<?php
    while($row = $result->fetch_assoc()) { ?>
        <table id="table">
        <img id="img" src="<?php echo '../biz/update/images/' . $row['profile_image']; ?>" width="275" height="350" alt="">
            <tr>
            <td>Business: </td>
            <td><a href="profileviewer.php?uID=<?=$row["uID"];?>"<td><?=$row["bname"];?></td></td></a>
            </tr>
            <tr>
                <td> </td>
            </tr>
            <tr>
                <td>First Name: </td>
                <td><?=$row["fname"];?></td>
                </tr>
            <tr>
                  <td>Last Name:  </td>
                  <td><?=$row["lname"];?></td>
                </tr>
              <tr>
                  <td>City:  </td>
                  <td><?=$row["city"];?></td>
                </tr>
             <tr>
                 <td>State:  </td>
                 <td><?=$row["state"];?></td>
                </tr>
             <tr>
                 <td>About Us:  </td>
                 <td style="width: 50rem"><?=$row["bio"];?></td>
                </tr>
             <tr><td> </td></tr>
             <tr>
                 <td>Get A Quote:  </td>
                 <td><a href="../getquotes/getquotes.php"<td> Click Here </td></td></a>
            </tr>
             <tr>
                 <td>Claim Your Business:  </td>
                 <td><a href="../biz/bizsignup.php?uID=<?=$row["uID"];?>">Claim Profile!</a></td>
            </tr>
             <tr>
                 <td>Review:  </td>
                 <td>
                    <?php 
                      echo "<a href='../hos/reviews.php?uID=".$row["uID"]."' target='_blank'>Review this contractor</a>";
                    ?>                
                </td>
            </tr>
            </table>
             <hr />
             <?php
        
    }
}
else {
   echo "0 results";
}

}

?>

<?php include('./footer.php'); ?>

</body>
</html>


<!-- profile viewer ratings attempt -->
<?php
    
    $stmt = $conn->prepare("SELECT * FROM reviews JOIN leads ON reviews.leadID = leads.id WHERE reviews.userID = '".$_GET['uID']."'");
    $stmt->execute();
    $result = $stmt->get_result();
      while ($row = $result->fetch_assoc()) {
      }      
  ?>