<?php

require ('../db_connect.php');

if (isset($_POST["bname"]))
{
$bname = $_POST["bname"];
$city = $_POST["zip"];
        
$sql = "SELECT *, users.id AS uID FROM users WHERE (bname LIKE '%$bname%') AND (zip = '$city' OR city = '$city') ORDER BY RAND();";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Rate My Contractor is meant for homeowners who are looking to find reliable contractors to work on their homes. Here they can find contractor ratings on local contractors who will do the work for them. Rate My Contractor is a growing population of homeowner reviews. These local reviews will help owners find a high quality contractor for the job. ">
    <meta name="keywords" content="find a contractor, reliable contractors, contractor ratings, local contractors, contractor near me, local reviews">
  <link rel="shortcut icon" href="../resources/favicon.ico" type="image/x-icon">
  <link rel="icon" href="../resources/favicon.ico" type="image/x-icon">
  <title>Find A Contractor | Rate My Contractor </title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href=https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css>
  <script src= https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js></script>
  <script src= https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <!-- Custom styles for this template -->
  <link href="find.css" rel="stylesheet">

</head>

<body>

 <?php include "./menu.php" ?>
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
            <?php 
            if ($row['claimed']==0){
            ?>
            <tr>
                 <td>Claim Your Business:  </td>
                 <td><a href="../biz/claimsignup.php?uID=<?=$row["uID"];?>">Claim Profile!</a></td>
            </tr>
            <?php } ?>
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

}else {
   echo "0 results";
}
}


?>

<?php include '../footer.php'; ?>

</body>
</html>