<?php
session_start();
?>
<html>

<head>
    <title>JSG.....</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script type="text/javascript" src="js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <style>
        .container{
            
        }
        .col-md-10{
            background-color: white;
            font-family:cursive;
        }
        .col-md-7{
            background-color: whitesmoke;
        }
        .col-md-3{
            background-color:white;
            
        }
        .id{
            width:400px;
        }
        .search{
            float: left;
            margin-top: 2px;    
        }
          li {
            float: left;
            font-size: 20px;
            padding: 12px;

            color: white;
            border-left: 2px white solid;
            margin-left: 14px;
        }

        ol {
            list-style: none;
            width: 100%;
            border: 1px white;
            overflow: hidden;
            cursor: pointer;

        }

        li:hover {
            background-color: white;
            color: black;

        }

        li:active {
            transform: translate(3px, 3px);
        }

    </style>
    <script type="text/javascript">
        function showpreview(file) {

             alert($("#hdn").val());
            if (file.files && file.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#prev').attr('src', e.target.result);
                }
                reader.readAsDataURL(file.files[0]);
            }


        }
         
        $(document).ready(function(){
            
           
             
             $("#fetch").click(function(){
                 $did=$("#did").val();
                $.getJSON("donor-fetch-one-donor.php?did="+$did,function(jsonArray){
                    
                    //alert(JSON.stringify(jsonArray[0]));
                    $("#name").val(jsonArray[0].name);
                    $("#age").val(jsonArray[0].age);
                    $("#bloodgrp").val(jsonArray[0].bloodgrp);
                    $("#prev").prop("src","uploads/"+jsonArray[0].orgname);
                    $("#gender").val(jsonArray[0].gender);
                    $("#address").val(jsonArray[0].address);
                    $("#city").val(jsonArray[0].city);
                    $("#mobile").val(jsonArray[0].mobile);
                    $("#number").val(jsonArray[0].number);
                    $("#medical").val(jsonArray[0].medical);
                    $("#orgname").val(jsonArray[0].orgname);
                    $("#hdn").val(jsonArray[0].pic);
                   // $("#hdn").val(jsonArray[0].pic);
                    
                  
                });
            });
        });
    </script>
    </head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-danger row">
        <nav class="navbar navbar">
            <a class="navbar-brand" href="#">
    <img src="pics/logo2.png" width="200" height="50" alt="">
  </a>
        </nav>
        <a class="navbar-brand" href="index.php" style="text-decoration-style:cursive;">
            <h2>bloodfinder.com</h2>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <ol>
                    <li>
                        <a href="index.php" style="text-decoration:none;color:inherit;">Home</a>
                    </li>
                    <li>
                        <a data-toggle="modal" data-target="#signupModal" style="text-decoration:none;color:inherit;">Signup</a>
                    </li>
                    <li>
                        <a data-toggle="modal" data-target="#loginModal" style="text-decoration:none;color:inherit;">Login</a>
                    </li>
                    <!-- <li class="nav-item active">
                                <a class="nav-link" href="#" data-toggle="modal" data-target="#signupModal" style="text-decoration:none;color:inherit;">Signup</a>
                            </li>
                             <li class="nav-item active">
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal" style="text-decoration:none;color:inherit;">Login</a>
                        </li>-->
                    <li class="nav-item active">
                        <a href="ngo-registration-front.html" style="text-decoration:none;color:inherit;">NGO Registration</a>
                    </li>
                    <a href="#about">
                        <li>About Us</li></a>
                    <a href="#bce">
                        <li>Contact Us</li>
                        <img src="pics/contactus1.jpg" width="65px;" height="65px;" style="float:inherit;" class="contact">
                    </a>
                </ol>

            </ul>

        </div>
    </nav>
    <form name="frm" action="donor-profile-save.php" method="post" enctype="multipart/form-data">
    <input type="hidden" id="hdn">
  
  <div class="row">
     <div class="col-md-10"  style="height:50px";><center><h2><p class="text-danger"><marquee behavior="alternate"><b>DONOR PROFILE</b></marquee></p></h2></center></div>
     <div class="col-md-2 mt-2">
          <a href="logout.php">  <button type="button" class="btn btn-outline-danger"><b>Logout</b></button></a>
            
        </div>
     
      
  </div>
  <div class="container">
  <div class="row">
      <div class="col-md-7" style="height:820px; margin-left:0px"  ; >
         <div class="id">
       <div>DonorID<input type="text" readonly class="form-control" name="did" id="did"  placeholder="Enter Donor ID" value=<?php echo $_SESSION["uid"];?>></div>
         <div class="search"><input type="button" class="btn btn-danger" name="search"  value="Search" id="fetch"></div>
          </div>
          <div class="name">
       <br><br>Name<input type="text" class="form-control" name="name" id="name" placeholder="Enter Donor's Name" required>
          </div>
          <div class="age">
       Age<input type="text" class="form-control" name="age" id="age" placeholder="Enter Donor's Age" required>
          </div>
          <div class="bgroup">
       Blood Group<input type="text" class="form-control" name="bloodgrp" id="bloodgrp" placeholder="Enter Blood Group" required>
          </div>
          <h6> Gender:</h6>
    <select name="gender" id="gender" required>
       <option value="male">Male</option>
        <option value="female">Female</option>
    </select>
    <br><br>
     <p>
        Address:
           <textarea rows="3" cols="50" id="address" name="address" required></textarea>
           
       </p>
       <div>
       City<input type="text" class="form-control" id="city" name="city" placeholder="Enter City's Name" required>
          </div>
       <div>
       Mobile No.<input type="text" class="form-control"  name="mobile" id="mobile" placeholder="Enter Mobile Number" required>
          </div>
          <div>
       No. of times blood donated<input type="text" class="form-control" name="number" id="number" placeholder="Enter No. of times you have  donated blood" required>
          </div>
      <br>  
     <p>
        Medical History:
           <textarea rows="3" cols="50" id="medical"  name="medicalhistory" ></textarea>
           
       </p>
       
       <input class="btn btn-danger" type="submit" name="btn" id="save" value="save">
                <input class="btn btn-danger" type="submit" name="btn" id="update" value="update">
                
      </div>
      
    
      <div class="col-md-3 offset-md-1" style="height:820px;"; >
         <div class="p-3 mb-2 bg-danger text-white">
             <b>Please Upload your Pic:</b><input type="file" name="profile" onchange="showpreview(this);">
                    <img src="" id="prev" width="200" height="200">
                    
         </div>
         <div class="p-3 mb-2 bg-danger ">
             <img src=pics/blood.jpg width="200" height="200">
         </div>
         
          <div class="p-3 mb-2 bg-danger ">
             <img src=pics/blood1.jpg width="200" height="200">
         </div>
         
          </div>
  
</div>
    </div>
    </form>
</body>
</html>
