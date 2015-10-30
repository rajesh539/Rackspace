
// Defining angularjs application.
var postApp = angular.module('postApp', []);
// Controller function and passing $http service and $scope var.
postApp.controller('postController', function ($scope, $http) {
    // create a blank object to handle form data.
    $scope.user = {};
    // calling our submit function.
    $scope.submitForm = function () {

        alert(JSON.stringify($scope.user));
        // Posting data to php file
        $http({
            method: 'POST',
            url: 'clone.php',
            data: $scope.user, //forms user object
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        })
                .success(function (data) {
                    if (data.errors) {
                        // Showing errors.
                        $scope.errorName = data.errors.name;
                        $scope.errorUserName = data.errors.username;
                        $scope.errorEmail = data.errors.email;
                    } else {
                        $http({
                            method: 'GET',
                            url: 'data.json',
                        })
                                .success(function (data) {
                                    if (data.errors) {
                                    } else {
                                        //alert((data.person).length);
                                        angular.forEach(data.person, function (value, key)
                                        {
                                            if ($scope.user.username == value.username || $scope.user.email == value.email)
                                            {
                                                        alert('Already exists');
                                                

                                            }
                                            else{
                                                $http({
                                                    method: 'GET',
                                                    url: 'register.php',
                                                    params: {username: $scope.user.username,password:$scope.user.password,email:$scope.user.email}
                                                }).success(function (data) {
                                                    alert("Please verify your email for activation link");
                                                    window.location = "login.html";

                                                });
                                            }
                                            
                                        });
                                    }
                                });
                    }
                });
    };
});