<html>

<head>
    <title>JSG.....</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script type="text/javascript" src="js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/angular.min.js"></script>

    <style>
        .col-md-10 {
            background-color: white;
            font-family: cursive;
        }

        .col-md-7 {
            height: 800px;
            background-color: whitesmoke;
        }

        .col-md-2 {
            margin-right: auto;
        }

        .left {
            margin-left: 20px;
            background-color: white;
            height: 800px;
        }

        .right {
            margin-right: 0px;
            background-color: white;
            height: 800px;
            float: right;
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
        .contact:hover {
            transform: rotate(360deg);
            transition: ease all 1s;
        }

    </style>
    <script type="text/javascript">
        var myapp = angular.module("module", []);
        myapp.controller("mycontroller", function($scope, $http) {
            $scope.jsonarray = [];
            $scope.jsonarray2 = [];
            $scope.jsonarray3 = [];

            $scope.fetchbloodgrps = function() {
                $http.get("donor-fetch-all-bloodgrp-process.php").then(ok, notok);

                function ok($jsonarray) {
                    $scope.jsonarray = $jsonarray.data;
                    //alert(JSON.stringify($scope.jsonarray));

                }

                function notok(error) {
                    alert(error.data);
                }
            }
            $scope.fetchcities = function() {


                $http.get("donor-search-fetch-cities.php?bloodgrp=" + $scope.bg).then(ok, notok);

                function ok($jsonarray) {
                    $scope.jsonarray2 = $jsonarray.data;
                    // alert(JSON.stringify($scope.jsonarray2));
                }

                function notok(error) {
                    alert(error.data);
                }
            }
            $scope.dosearch = function() {
                //alert("hello");
                $bloodgrp = $("#bloodgrp").val();
                $city = $("#city").val();
                $http.get("donor-search-process.php?bloodgrp="+$bloodgrp +"&&city="+$city).then(ok, notok);

                function ok($jsonarray) {
                    $scope.jsonarray3 = $jsonarray.data;
                    alert(JSON.stringify($scope.jsonarray3));
                }

                function notok(error) {
                    alert(error.data);
                }
            }
            $scope.doSMS=function(mobile)
            {
               $http.get("sms-process.php?mobile="+mobile).then(ok, notok);
                function ok(res)
                {
                    alert(res.data);
                }
                function notok(res)
                {
                    alert(res.data);
                }
            }

        });

    </script>
</head>

<body ng-app="module" ng-controller="mycontroller" ng-init="fetchbloodgrps();">
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
    <form name="frm">
        <input type="hidden" id="hdn">


        <div class="row">
            <div class="col-md-10" style="height:50px" ;>
                <center>
                    <h2>
                        <p class="text-danger">
                            <marquee behavior="alternate"><b><img src="pics/donosearch.jpg" height="50px">SEARCH DONORS<img src="pics/donosearch.jpg" height="50px"> 
</b></marquee>
                        </p>
                    </h2>
                </center>
            </div>

        </div>
        <div class="row">
            <div class="col-md-2" style="height:800px;" ;>
                <div class="left">
                    <div class=" ">
                        <img src=pics/o+.png width="200" height="400">
                    </div>
                    <div class=" ">
                        <img src=pics/b--.png width="200" height="400">
                    </div>


                </div>
            </div>
            <div class="col-md-7" style="height:840px;" ;>
                <br>
                <div>
                    <label style="font-family:cursive;font-weight:500;font-size:20">    <p class="text-danger" ><b>Available Blood Groups</b></p></label>
                    <select class="form-control" ng-model="bg" name="bloodgrp" id="bloodgrp" ng-change="fetchcities();">
      <option selected value="">Select</option>
      <option ng-repeat="record in jsonarray">{{record.bloodgrp}}</option>
      
    </select>
                </div>
                <br>

                <div>
                    <label style="font-family:cursive;font-weight:500;font-size:20">    <p class="text-danger" ><b>City</b></p></label>
                    <select class="form-control" ng-model="city" name="city" id="city" ng-change="fetchcities();">
      <option selected value="">Select</option>
      <option ng-repeat="record in jsonarray2">{{record.city}}</option>
      
    </select>
                </div>
                <br><input class="btn btn-danger" type="button" name="search" id="search" value="search" 
                ng-click="dosearch();">
                <div class="row mt-4" style="height:600px">
                    <div class="col-md-4" ng-repeat="record in jsonarray3">

                        <div class="card">
                            <img class="card-img-top" src="uploads/{{record.orgname}}" alt="Card image cap">
                            <div class="card-body" style="padding:0px; margin-bottom:0px; ">
                                <h5 class="bg-danger text-white" style="text-align:center">Details:</h5>

                                <table border="1px" width="100%; height:100%" style="margin:0px">
                                    <tr>
                                        <th>AGE</th>
                                        <td>
                                            <p class="text-danger"><b> {{record.age}}</b></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Gender</th>
                                        <td>
                                            <p class="text-danger"><b>{{record.gender}}</b></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Mobile No.</th>
                                        <td>
                                            <p class="text-danger"><b>{{record.mobile}}</b></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>No. of times blood donated</th>
                                        <td>
                                            <p class="text-danger"><b>{{record.number}}</b></p>
                                        </td>
                                    </tr>
                                        <tr>
                                        <th>Name</th>
                                        <td>
                                            <p class="text-danger"><b>{{record.name}}</b></p>
                                        </td>
                                    </tr>


                                </table>

                            </div>
                            <div class="mt-1">
                               <center> <button type="button" class="btn btn-danger" ng-click="doSMS(record.mobile);">Send SMS</button></center>
                            </div>
                            <!--<div class="card-footer bg-success text-white" style="text-align:center; height:35px">
                               <center> <button type="button" class="btn btn-success" >Send SMS</button></center>
                            </div>-->
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-2 " style="height:800px;" ;>
                <div class="right">
                    <div class=" ">
                        <img src=pics/o-.png width="200" height="400">
                    </div>
                    <div class=" ">
                        <img src=pics/a--.png width="200" height="400">
                    </div>


                </div>



            </div>

        </div>

    </form>
</body>

</html>
