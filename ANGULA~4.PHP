<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script type="text/javascript" src="js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script type="text/javascript" src="js/angular.min.js"></script>
    <script type="text/javascript">
        
        var myapp=angular.module("app",[]);
        myapp.controller("myController",function($scope,$http)
        {
            $scope.jsonArray=[];
            
            $scope.fetchAll=function()
            {
                $http.get("angular-json-blood-fetchall-donors-process.php").then(sokhe,okhe);
                function sokhe($jsonArray)
                {
                    $scope.jsonArray=$jsonArray.data;
                    //alert(JSON.stringify($scope.jsonArray));
                    /*for(i=0;i<$scope.jsonArray.length;i++)
                        alert($scope.jsonArray[i].did);*/
                }
                function okhe(error)
                {
                    
                    alert(error.data);
                }
            }
            
        });
    
    
    
    </script>
</head>
<body ng-app="app" ng-controller="myController">
    <input type="button" ng-click="fetchAll();" value="fetch all">
    <hr>
    <center>
    <input type="text" ng-model="srch" placeholder="hint..">
    </center>
    <table class="table">
       <thead class="thead-dark">
        <tr><th>DID</th><th>Name</th><th>Blood Group</th></tr>
        </thead>
        <tr ng-repeat="record in jsonArray | filter:srch">
               <td>{{record.did}}</td>
             <td>{{record.name}}</td>
             <td>{{record.age}}</td>
            
        </tr>
    </table>
</body>
</html>