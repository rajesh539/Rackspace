


    

// Defining angularjs application.
var loginApp = angular.module('loginApp', []);
// Controller function and passing $http service and $scope var.
loginApp.controller('loginController', function ($scope, $http) {
    // create a blank object to handle form data.
    $scope.login = {};
    $scope.user = {};
    $scope.switch2=false;
   $scope.logout=function(){
        window.location="login.html";
    }
    
    // calling our submit function.
    $scope.submitForm = function () {

       

        // Posting data to php file
        $http({
            method: 'GET',
            url: 'data.json',
        })
                .success(function (data) {
                    
                    if (data.errors) {
                    } else {
                        
                        angular.forEach(data.person, function (value, key)
                        {
                            
                            if ($scope.login.username == value.username && $scope.login.password == value.password && value.status==1)
                            {

                                $http({
                                    method: 'GET',
                                    url: 'server.php',
                                    params: {username: value.username}
                                }).success(function (data) {
                                    $scope.login=false;
                                    
                                    $scope.switch2=true;

                                });

                            }
                            else {
                                //alert('Login Failed');
                            }
                        });
                        
                    }
                });
    }
    
    
    $scope.signup=function(){
        
       window.location = "index.php";
    }
    
});