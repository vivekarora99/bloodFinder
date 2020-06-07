<?php
session_start();
?>
<html>
<head>
    <title>JSG......</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script type="text/javascript" src="js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <style>
        .container {}

        .col-md-10 {
            background-color: white;
            font-family: cursive;
        }

        .col-md-6 {
            height: 600px;
            background-color: whitesmoke;
        }

        .col-md-3 {
            margin-right: auto;
        }

        .left {
           
            background-color: white;
            height: 600px;
        }

        .right {

            background-color: white;
            height: 600px;
        }

        .id {
            width: 400px;
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
                 
                 $nid=$("#nid").val();
                $.getJSON("needy-fetch-one.php?did="+$nid,function(jsonArray){
                    alert();
                    //alert(JSON.stringify(jsonArray[0]));
                    $("#name").val(jsonArray[0].name);
                    $("#idproof").val(jsonArray[0].idproof);
                     $("#orgname").val(jsonArray[0].orgname);
                     $("#mobile").val(jsonArray[0].mobile);
                     $("#address").val(jsonArray[0].address);
                    $("#city").val(jsonArray[0].city);
                   
                   
                    //$("#hdn").val(jsonArray[0].pic);
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
        
    <form name="frm" action="needy-profile-save.php" method="post" enctype="multipart/form-data">
        <input type="hidden" id="hdn">
        
            <div class="row">
                <div class="col-md-12" style="height:50px" ;>
                    <center>
                        <h2>
                            <p class="text-danger">
                                <marquee behavior="alternate"><b>NEEDY PROFILE</b></marquee>
                            </p>
                        </h2>
                    </center>
                </div>

            </div>
            <div class="container-fluid">
            <div class="row">
                <div class="col-md-3" style="height:600px;" ;>
                    <div class="left">
                        <div class=" ">
                            <img src=pics/a+.jpg width="200" height="200">
                        </div>
                        <div class=" ">
                            <img src=pics/b+.jpg width="200" height="200">
                        </div>

                        <div class=" ">
                            <img src=pics/ab+.jpg width="200" height="200">
                        </div>

                    </div>
                </div>
                <div class="col-md-6" style="height:840px;" ;>
                    <div class="id">
                        <br>
                        <div class="form-group">Needy ID<input readonly type="text" class="form-control" name="nid" id="nid" placeholder="Enter Needy ID" value=<?php echo $_SESSION["uid"];?>>
                        <input type="button" class="btn btn-danger" name="search" value="search" id="fetch"></div><br>
                        <div class="search"></div>
                    </div>
                    <div class="name">
                        Name<input type="text" class="form-control" name="name" id="name" placeholder="Enter Needy's Name">
                    </div><br>
                    <div class="proof">
                        <select class="custom-select mr-sm-2"  name="idproof" id="idproof">
        <option selected>Choose...</option>
        <option value="aadhar">Aadhaar Card</option>
        <option value="pan">PAN Card</option>
        <option value="voter">Voter Card</option>
        <option value="driving">Driving License</option>
        <option value="other">Other ID Proof</option>
      </select>
                    </div>
                    <div><br>Upload Proof Pic:
                        <br> <input type="file" name="profile" onchange="showpreview(this);">
                        <img src="" id="prev" width="200" height="200">
                    </div>
                    <div>
                        Mobile No.<input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter Mobile Number">
                    </div>
                    <p>
                        <br>Address:
                        <textarea rows="3" cols="50" id="address" name="address"></textarea>

                    </p>
                    <div>
                        City<input type="text" class="form-control" id="city" name="city" placeholder="Enter City's Name">
                    </div>
                    <br><input class="btn btn-danger" type="submit" name="btn" id="save" value="save">
                    <input class="btn btn-danger" type="submit" name="btn" id="update" value="update">
                </div>
                <div class="col-md-3" style="height:600px;" ;>
                    <div class="right">
                        <div class=" ">
                            <img src=pics/a-.jpg width="200" height="200">
                        </div>
                        <div class=" ">
                            <img src=pics/b-.jpg width="200" height="200">
                        </div>

                        <div class="">
                            <img src=pics/ab-.jpg width="200" height="200">
                        </div>

                    </div>



                </div>
            </div>
        
        </div>
    </form>
</body>

</html>

