
<?php
session_start();
 if(isset($_SESSION["uid"])==false)
     header("location:index.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
   
    <title>Donor Profile</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script type="text/javascript" src="js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <style>
        .pic{
            margin-right:850px;
        }
        .logout:hover{
             transform: scale(1.2);
            transition: ease all 1s;
        }
    </style>
    <script type="text/javascript">
       /* $(document).ready(function() {


           $("#search").click(function() {

                $did = $("#did").val();
                $.getJSON("blood-fetch-one-donor.php?did=" + $did, function(jsonArray) {

                     alert(JSON.stringify(jsonArray));
                    $("#dname").val(jsonArray[0].dname);
                    $("#age").val(jsonArray[0].age);
                    $("#bloodgroup").val(jsonArray[0].bloodgroup);
                    $("#gender").val(jsonArray[0].gender);
                    $("#address").val(jsonArray[0].address);
                    $("#city").val(jsonArray[0].city);
                    $("#mobile").val(jsonArray[0].mobile);
                    $("#donated").val(jsonArray[0].donated);
                    $("#medical").val(jsonArray[0].medical);
    
                });
            });
        });
*/
    </script>
</head>

<body>
     <nav class="navbar navbar-danger row bg-danger">
        <a class="navbar-brand" href="" >
            <h1 >Needy Dashboard</h1>
        </a>
        <div class="pic">
            <img src="pics/dashboard.jpg" >
        </div>
    </nav>
    <div class="row h3 bg-success text-white">
        <div class="col-md-3 " style="padding:10px;margin-left:20px;">
            Welcome: <?php echo $_SESSION["uid"]; ?>
        </div>
        <div class="col-md-1 offset-7 h3 bg-success text-white" style="padding:10px;margin-right:10px;">
            <a href="logout.php" style="color:inherit" class="logout">Logout</a>
        </div>
    </div>
    <!--Cards-->
    <center>
    
   <!-- <div class="card text-white bg-success mb-3" style="max-width:18rem;height:350px;float:left;margin-left:220px;width:200px;">
    <div class="card-body">
        <h5 class="card-title" style="text-color:white;"><h1><a href="needy-profile-front.php" style="color:inherit">Profile</a></h1></h5>
      </div>
           <img class="card-img-top" src="pics/profile.png" alt="Card image cap">

</div>-->
     <div class="card text-white bg-success mb-3" style="max-width:18rem;height:350px;float:left;margin-left:300px;">
  <div class="card-body">
      <h5 class="card-title"  style="text-color:white;"><h1><a href="needy-profile-front.php" style="color:inherit;">Profile</a></h1></h5>
    
  </div>
      <img class="card-img-top" src="pics/profile3.png" alt="Card image cap">
</div>
    <div class="card text-white bg-danger mb-3" style="max-width:18rem;height:350px;float:left;margin-left:300px;">
  <div class="card-body">
      <h5 class="card-title"  style="text-color:white;"><h1><a href="donor-search-front-cards.php" style="color:inherit;">Search Donors</a></h1></h5>
    
  </div>
      <img class="card-img-top" src="pics/search1.png" alt="Card image cap">
</div>

</center>
</body>

</html>
