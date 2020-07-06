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
  <meta name="keywords" content="Contactor Services, Find a Contractor, Contractors Near Me, Review Contractors, Best Local Contractors">
  <link rel="shortcut icon" href="./resources/favicon.ico" type="image/x-icon">
  <link rel="icon" href="./resources/favicon.ico" type="image/x-icon">
  <title>Rate My Contractor | Services</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">

</head>

<body>

<?php include "menu.php"; ?>

  <!-- Page Content -->
  <div class="container">

    
    <!-- Image Header -->
    <div class="container" id="panorama">
    <img id="pan" class="img-fluid rounded mb-4" src="./resources/contractor-panorama.jpg" alt="Contractor Reviews">
      <h1 class="text"><strong>Some Services We Rate </strong></h1>
    </div>
    <div class="container">
    <h1 id="hidden"><strong>Some Services We Rate </strong></h1>
    </div>
    <!-- Services Section -->
    <div class="container">  
      <div class="row">      
        <div class="col-sm-3" id="col-sm-3">
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
   

<?php include 'footer.php'; ?>

</body>

</html>
