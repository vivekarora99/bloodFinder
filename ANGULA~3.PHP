<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viweport" content="width=device-width,inital-scale=1,shrink-to-fit=no">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <script type="text/javascript" src="js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="js/angular.min.js"></script>
    <script type="text/javascript">
        var myapp = angular.module("module", []);


        myapp.controller("myController", function($scope, $http) {
            $scope.jsonArray = [];

            $scope.fetchAll = function() {
                $http.get("angular-json-fetchall-donor-process.php").then(fine, notfine);

                function fine($jsonArray) {
                    $scope.jsonArray = $jsonArray.data;
                    //alert(JSON.stringify($scope.jsonArray));
                }

                function notfine(error) {

                    alert(error.data);
                }
                
            }

            $scope.doSms=function(mobile)
            {
                $http.get("sms-send.php?mobile="+mobile).then(fine, notfine);
                function fine(res)
                {
                    alert(res.data);
                }
                function notfine(res)
                {
                    alert(res.data);
                }

            }
        });

    </script>
</head>

<body ng-app="module" ng-controller="myController" ng-init="fetchAll();">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-info">
                    <a class="navbar-brand" href="#"></a>
                    <img src="pics/donate_blood.jpg" width="50" height="50" class="d-inline-block align-top" alt=""> Needy Profile
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#" data-toggle="modal" data-target="#signupModal" style="margin-left:50px">Signup <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Login</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Services
        </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Development</a>
                                    <a class="dropdown-item" href="#">Training</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Placement</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="#">Disabled</a>
                            </li>

                        </ul>
                    </div>
                </nav>
            </div>
        </div><br>
        <input type="button" ng-click="fetchAll();" value="fetch all">
        <hr>
        <center>
            search:<input type="text" ng-model="srch" placeholder="hint..">
        </center>
        <div class="row" style="height:600px; overflow:scroll;">
            <div class="col-md-3 mt-3 "  ng-repeat="record in jsonArray|filter:srch" >
                <div class="card" >
                    <center><img class="card-img-top" style="width:100px; height:100px; margin:20px;border-radius:50%" src="uploads/{{record.profile}}" alt="Card image cap"></center>
                    <div class="card-body">
                        <h5 class="card-title text-danger">{{record.cname}}</h5>
                        <p class="card-text">
                            
                            <table width=100%>
                                <tr><td>{{record.medicalhistory}}</td></tr>
                            </table>
                        </p>
                        <button ng-click="doSms(record.mobile);" class="btn btn-primary">Send SMS</a>
                    </div>
                </div>
            </div>
        </div>



    </div>
</body>

</html>
