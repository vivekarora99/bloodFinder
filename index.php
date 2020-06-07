<html>

<head>
    <title>JSG....</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script type="text/javascript" src="js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/angular.min.js"></script>
    <style>
        
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

        .services {
            width: 900px;
            height: 250px;
            text-align: center;


        }

        .card {
            
            box-shadow: 3px 3px 3px  gray
        }

        .box {
            background-color: whitesmoke;
        }

        .contact:hover {
            transform: rotate(360deg);
            transition: ease all 1s;
        }

        #img-pos1 {
          
            border: 1px red solid;
            border-radius: 50%;
            margin-top: 20px;
            box-shadow: 5px 5px 5px red;
            transform: rotate(0deg);
        }
        #img-pos2 {
          
            border: 1px red solid;
            border-radius: 50%;
            margin-top: 20px;
            box-shadow: 5px 5px 5px red;
            transform: rotate(0deg);
        }
        #img-pos3 {
          
            border: 1px red solid;
            border-radius: 50%;
            margin-top: 20px;
            box-shadow: 5px 5px 5px  red;
            transform: rotate(0deg);
        }
        
.pic1
{
    width: 150px;
    height: 150px;
    background-image: url(pics/needy.jpg);
    background-size: contain;
    display: flex;
    justify-content: center;
    align-items: flex-end;
}
        .pic1:hover {

            
            
            background-image:url(pics/needy3.jpg);
             background-size: contain;
            background-repeat: no-repeat;
        }
.pic2
{
    width: 150px;
    height: 150px;
    background-image: url(pics/donor.jpg);
    background-size: contain;
    display: flex;
    justify-content: center;
    align-items: flex-end;
}
        .pic2:hover {

            
            
            background-image:url(pics/donors1.jpg);
             background-size: contain;
            background-repeat: no-repeat;
        }
.pic3
{
    width: 150px;
    height: 150px;
    background-image: url(pics/ngo.png);
    background-size: contain;
    
    
}
        .pic3:hover {

            
            margin-top: inherit;
            background-image:url(pics/ngo11.jpg);
             background-size: contain;
            background-repeat: no-repeat;
        }
        .card-text{
            font-family:cursive;
            font-size: 20;
            font-weight: 500;
        }

        }

    </style>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.carousel').carousel({
                interval: 2500
            });


            //===========
            $("#signup").click(function() {

                if ($("#uid").val() == "") {
                    $("#uid").css("background-color", "gray");
                    return;
                } else {
                    $("#uid").css("background-color", "white");
                }
                $queryString = $("#frm").serialize();
                $queryString = $("#frm").serialize();
                $url = "ajax-signup-process.php?" + $queryString;


                $.get($url, function(response) {
                    //alert(response);
                    $("#res").html(response);

                });
            });
            //=========
            $("#login").click(function() {
                $uid = $("#uid1").val();
                $pwd = $("#pwd1").val();
                $.get("login-home-process.php?uid1=" + $uid + "&&pwd1=" + $pwd, function(response) {
                    response = response.trim();
                    if (response == "Invalid id")
                        alert("invalid id");
                    else
                    if (response == "Donor")
                        location.href = "donor-profile-front.php";
                    else
                    if (response == "Needy")
                        location.href = "needy-dashboard.php";


                });
            });
        });

    </script>
    <script type="text/javascript">
        var myapp = angular.module("module", []);
        //alert("hello");
        myapp.controller("mycontroller", function($scope, $http) {
            $scope.jsonarray = [];
            $scope.fetchdonors = function() {
                $http.get("regular-donors-process.php").then(ok, notok);

                function ok($jsonarray) {

                    $scope.jsonarray = $jsonarray.data;
                    //alert(JSON.stringify($scope.jsonarray));
                }

                function notok(error) {
                    alert(error.data);
                }
            }
        });

    </script>
</head>

<body ng-app="module" ng-controller="mycontroller" ng-init="fetchdonors();">
    <div id="fb-root"></div>
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.0';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

    </script>

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
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mt-2" style="padding:0px;">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <center>

                            <div class="carousel-item active">
                                <img class="d-block w-100" src="pics/slides4.jpg" alt="First slide" style="width:100%;">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="pics/slides2.png" alt="Second slide">
                            </div>
                            <!-- <div class="carousel-item">
                                <img class="d-block w-100" src="pics/slides3.jpg" alt="Third slide">
                            </div>
-->

                            <div class="carousel-item">
                                <img class="d-block w-100" src="pics/slides1.jpg" alt="Third slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="pics/slides5.jpg" alt="Fourth slide">
                            </div>
                        </center>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row bg-danger">
            <div class="col-md-12 ">
                <div class="p-3 mb-2  text-white">
                    <h3>
                        <center>OUR SERVICES</center>
                    </h3>
                </div>
            </div>

        </div>

        <div class="row mt-2 mb-2">
            <div class="col-md-4">

                <div class="card" >
                 <center> <div class="pic1" id="img-pos1">
                    
                     </div></center>
                   <!--<div id="pic1">
                    <center><img class="img-pos" id="pic1" src="pics/needy.jpg" alt="Card image cap" style="height:150px;width:150px;"></center></div>-->
                    <div class="card-body">
                        <h3 class="card-title">
                            <center>
                                <p class="text-danger"><b>NEEDY</b></p>
                            </center>
                        </h3>
                        <p class="card-text">If you need blood in emergency then you can register and get blood from donors as early as possible.</p>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                  <center> <div class="pic2" id="img-pos2">
                    
                     </div></center>
                   <!-- <center><img class="img-pos" src="pics/donor.jpg" alt="Card image cap" style="border-radius:50%;height:150px;width:150px;"></center>-->
                    <div class="card-body">
                        <h3 class="card-title">
                            <center>
                                <p class="text-danger"><b>DONOR</b></p>
                            </center>
                        </h3>
                        <p class="card-text">You can donate blood to needies and can become member by registering<br><br></p>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <center> <div class="pic3" id="img-pos3">
                    
                     </div></center>
                    <!--<center><img class="img-pos" src="pics/ngo.png" alt="Card image cap" style="border-radius:50%;height:150px;width:150px;"></center>-->
                    <div class="card-body">
                        <h2 class="card-title">
                            <center>
                                <p class="text-danger"><b>NGOs</b></p>
                            </center>
                        </h2>
                        <p class="card-text">If you are already registered with any NGO,you can register and needy can get benefit.</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row bg-danger">
            <div class="col-md-12">
                <div class="p-3 mb-2 bg-danger text-white">
                    <h2>
                        <center>OUR REGULAR DONORS</center>
                    </h2>
                </div>
            </div>

        </div>
    </div>
     <marquee scrolldelay="10" scrollamount="10">
    <div class="higlights">
       
            <div class="row mt-4" style="height:340px">
                <div class="col-md-4" ng-repeat="record in jsonarray">

                    <div class="card">
                        <center><img class="card-img-top" src="uploads/{{record.orgname}}" alt="Card image cap" style="height:100px;width:100px;"></center>
                        <div class="card-body" style="padding:0px; margin-bottom:0px; ">
                            <center>
                                <table border="1px" width="80%; height:100%" style="margin:0px" class="table table-striped">
                                    <tr >
                                        <th scope="col">Name</th>
                                        <td>
                                            <p class="text-success"><b>{{record.name}}</b></p>
                                        </td>
                                    </tr>
                                    <tr >
                                        <th scope="col">City</th>
                                        <td>
                                            <p class="text-success"><b>{{record.city}}</b></p>
                                        </td>
                                    </tr>

                                    <tr >
                                        <th scope="col">No. of times blood donated</th>
                                        <td>
                                            <p class="text-danger" style="font-size:30;"><b>{{record.number}}</b></p>
                                        </td>
                                    </tr>
                                </table>
                            </center>
                        </div>

                    </div>

                </div>
            </div>
        
    </div></marquee>
    <div class="container-fluid">
        <div class="row bg-danger">

            <div class="col-md-12">
                <div class="p-3 mb-2 bg-danger text-white">
                    <h2>
                        <center>NGOs INVOLVED</center>
                    </h2>
                </div>
            </div>

        </div>

        <div class="row mt-2 mb-2">
            <div class="col-md-4">

                <div class="card">
                    <h5 class="card-title">
                        <p class="text-success" style="font-size:25;"><b>All India Helping Hands</b></p>
                    </h5>
                    <h6 class="card-subtitle mb-2 text-muted">
                        <p class="text-primary">NGO</p>
                    </h6>
                    <div class="card-body" style="padding:0px; margin-bottom:0px; ">

                        <table border="1px" width="100%; height:100%" style="margin:0px">

                            <tr>
                                <th>City</th>
                                <td>
                                    <p class="text-danger"><b>Jaipur</b></p>
                                </td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>
                                    <p class="text-danger"><b>Silver Colony,Jaipur,Rajasthan (India).</b></p>
                                </td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    
                        <h5 class="card-title">
                            <p class="text-success" style="font-size:25;"><b>Khoon Daan</b></p>
                        </h5>
                        <h6 class="card-subtitle mb-2 text-muted">
                            <p class="text-primary">NGO</p>
                        </h6>
                        <div class="card-body" style="padding:0px; margin-bottom:0px; ">

                            <table border="1px" width="100%; height:100%" style="margin:0px">

                                <tr>
                                    <th>City</th>
                                    <td>
                                        <p class="text-danger"><b>Agra</b></p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>
                                        <p class="text-danger"><b>Birla Colony,Agra,Rajasthan (India).</b></p>
                                    </td>
                                </tr>
                            </table>

                        </div>
                    
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <h5 class="card-title">
                        <p class="text-success" style="font-size:25;"><b>New Life-Blood Bank</b></p>
                    </h5>
                    <h6 class="card-subtitle mb-2 text-muted">
                        <p class="text-primary">NGO</p>
                    </h6>
                    <div class="card-body" style="padding:0px; margin-bottom:0px; ">

                        <table border="1px" width="100%; height:100%" style="margin:0px">

                            <tr>
                                <th>City</th>
                                <td>
                                    <p class="text-danger"><b>Jaipur</b></p>
                                </td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>
                                    <p class="text-danger"><b>Bharat Nagar,Amritsar,Punjab(India)</b></p>
                                </td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row bg-danger">

            <div class="col-md-12">
                <div class="p-3 mb-2 bg-danger text-white" id="about">
                    <h2>
                        <center>ABOUT US</center>
                    </h2>
                </div>
            </div>
   

        </div>
                 <p class="p-3 mb-2 bg-light text-dark" style="font-size:25;font-family:cursive";>
                bloodfinders.com is a platform where needy can find blood even in emergency and donors can donate blood. Infact any NGO can also register on bloodfinders.com</p>
        </div>

    <div class="container-fluid">
        <div class="row bg-danger">

            <div class="col-md-12">
                <div class="p-3 mb-2 bg-danger text-white" id="bce">
                    <h2>
                        <center>REACH US</center>
                    </h2>
                </div>
            </div>

        </div>
        <div class="row">

            <div class="col-md-4 offset-1">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3448.4759251774103!2d74.94744201443196!3d30.19496118182778!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39172d5c7119df67%3A0x86852b7dbbaba55c!2sBlood+Bank%2CCivil+hospital%2CBathinda!5e0!3m2!1sen!2sin!4v1531473729127" width="500" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div class="col-md-4 ml-5">
                <div class="fb-page" width="500" height="450" data-href="https://www.facebook.com/Bloodfinder-newlife-1837068093015237/?modal=admin_todo_tour" data-tabs="timeline" data-width="500" data-height="450" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                    <blockquote cite="https://www.facebook.com/Bloodfinder-newlife-1837068093015237/?modal=admin_todo_tour" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Bloodfinder-newlife-1837068093015237/?modal=admin_todo_tour">Bloodfinder-newlife</a></blockquote>
                </div>
            </div>
        </div>
    </div>

    <br><br>
    <!--Signup Modals -->
    <div class="modal fade" tabindex="-1" role="dialog" id="signupModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white">Sign Up</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <form id="frm">
                    <div class="modal-body">

                        <div class="form-group">

                            <!--<label for="uid">User ID</label> 
                            <span id="res" class="text-danger"></span>
                            <img id="waitt" src="pics/wait3.gif">
                            -->
                            Username ID<span id="res" class="text-danger" style="font-weight: bold;font-family: cursive;font-size:28;"></span><input type="text" class="form-control" id="uid" name="uid" aria-describedby="emailHelp" placeholder="Enter username for your account">


                        </div>

                        <div class="form-group">
                            <label for="pwd">Password</label>
                            <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="mobile">Mobile No</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" aria-describedby="emailHelp" placeholder="Enter your Mobile no(Privacy Ensured)">

                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Type</label>
                            <select class="form-control" name="type" id="type">
      <option selected value="">Select</option>
      <option>Donor</option>
      <option>Needy</option>
      
    </select>
                        </div>
                    </div>
                    <div class="modal-footer bg-danger" style="margin-bottom:-18px;">
                        <button type="button" class="btn btn-primary" name="btn" id="signup" value="signup">Signup</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!--Login Modals -->
    <div class="modal fade" tabindex="-1" role="dialog" id="loginModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <form id="frm1">
                    <div class="modal-body">

                        <div class="form-group">

                            Username ID<input type="text" class="form-control" id="uid1" name="uid1" aria-describedby="emailHelp" placeholder="Enter username for your account">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password</label>
                            <input type="password" class="form-control" id="pwd1" name="pwd1" placeholder="Password" >
                        </div>

                    </div>
                    <div class="modal-footer bg-danger" style="margin-bottom:-18px;">
                        <button type="button" class="btn btn-primary" name="btn" id="login" value="login" >Login</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>
