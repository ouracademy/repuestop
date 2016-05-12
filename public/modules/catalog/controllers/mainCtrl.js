angular.module('orderCustomerCtrl', [])
    .controller('orderCustomerController', function($scope, $http, filterFilter, Repuest, Party) {
        Repuest.get()
            .success(function(data) {
                $scope.repuests = data.products;
                $scope.brands = data.brands;
                $scope.currentPage = 1;
                $scope.pageSize = 40;
                $scope.maxSize = 5;
                $scope.totalItems = data.products.length;
                $scope.noOfPages = Math.ceil($scope.totalItems / $scope.pageSize);
                hideAllOptions();
            });
        $scope.finishedWizard = function() {
            console.log("Finish");
        }
        $scope.customerInfoValidation = function() {
            if ($scope.shoppingCart.party === null) {
                return false;
            }
            return true;
        };
        $scope.search = {};
        $scope.resetFilters = function() {
            $scope.search = {};
        };
        $scope.$watch('search', function(newVal, oldVal) {
            $scope.filtered = filterFilter($scope.repuests, newVal);
            $scope.totalItems = $scope.filtered.length;
            $scope.noOfPages = Math.ceil($scope.totalItems / $scope.pageSize);
            $scope.currentPage = 1;
        }, true);
        $scope.shoppingCart = {
            "body": [],
            "total": 0,
            "party": null,
            "status": "Created"
        };

        function isEqual(object, value) {
            if (object === value) {
                return true;
            }
            return false;
        }

        function hideAllOptions() {
            $scope.flag = false;
            $scope.bRegisterCompany = false;
            $scope.bRegisterPerson = false;
            $scope.dataPerson = false;
            $scope.dataCompany = false;
        }
        $scope.typesParty = [{
            name: "person",
            typeDocument: "DNI"
        }, {
            name: "company",
            typeDocument: "RUC"
        }];
        $scope.nroIdentification="";
        $scope.verificateIdentification = function(typeParty, nroIdentification) {
            hideAllOptions();
            Party.get(typeParty.name, nroIdentification)
                .success(function(data) {
                    $scope.party = data.party;
                    if (isEqual($scope.party, undefined)) {
                        $scope.message = "Identificacion no existente";
                        if (isEqual(typeParty.name, "person")) {
                            $scope.bRegisterPerson = !$scope.bRegisterPerson;
                        }
                        if (isEqual(typeParty.name, "company")) {
                            $scope.bRegisterCompany = !$scope.bRegisterPerson;
                        }
                    }
                    else {
                        $scope.message = "Cliente existente";
                        $scope.shoppingCart.party = data.party.id;
                        if (isEqual(typeParty.name, "person")) {
                            $scope.dataPerson = !$scope.dataPerson;
                        }
                        if (isEqual(typeParty.name, "company")) {
                            $scope.dataCompany = !$scope.dataCompany;
                        }
                    }
                });
        }
        $scope.message = '';
    })
    .controller('orderController', function($scope, $http, Order) {
        $scope.addRow = function(index) {
            $scope.message = 'Orden en curso';
            var id = $scope.repuests[index].id;
            var name = $scope.repuests[index].codeOwner;
            var amount = $scope.repuests[index].price * $scope.quantity;
            $scope.total = $scope.total + amount;
            $scope.shoppingCart.body.push({
                "product": id,
                "name": name,
                "quantity": $scope.quantity,
                "unit": "U",
                "amount": amount
            });
            $scope.shoppingCart.total = $scope.shoppingCart.total + amount;
        };
        $scope.removeItem = function(index) {
            $scope.shoppingCart.total = $scope.shoppingCart.total - $scope.shoppingCart.body[index].amount;
            $scope.shoppingCart.body.splice(index, 1);
        };
        $scope.addOrder = function() {
            if (isOrderValid()) {
                Order.save($scope.shoppingCart)
                    .success(function(data) {
                        $scope.message = data.response.message;
                        $scope.shoppingCart.body = [];
                        $scope.shoppingCart.total = 0;
                    })
                    .error(function(data) {
                        console.log(data);
                    });
            }
            else {
                $scope.message = 'Los datos no son válidos';
            }
        };

        function isOrderValid() {
            if ($scope.shoppingCart.body.length > 0 &&
                $scope.shoppingCart.party !== null &&
                $scope.shoppingCart.status === "Created") {
                return true;
            }
            return false;
        }
    })

.controller('ModalDemoCtrl', function($scope, $modal, $log) {
     $scope.message = "";
        $scope.animationsEnabled = true;
        $scope.person = {
            "firstName": "",
            "fatherLastName": "",
            "motherLastName": "",
            "identification": "",
            "email": "",
            "telephone": "",
            "address": ""
        };
        $scope.company = {
            "name": "maria",
            "identification":"",
            "email": "a@gmail,com",
            "telephone": "111222",
            "address": "limaa"
        };
        
        $scope.openRegisterPerson = function(size) {
            var modalInstance = $modal.open({
                animation: $scope.animationsEnabled,
                templateUrl: 'regPersonModalContent.html',
                controller: 'InstancePersonCtrl',
                size: size,
                resolve: {
                    person: function() {
                        return $scope.person;
                    }
                }
            });

            modalInstance.result.then(function(selectedItem) {
            }, function() {
                $log.info('Modal dismissed at: ' + new Date());
            });
        };   
        $scope.openRegisterCompany = function(size) {
            var modalInstance = $modal.open({
                animation: $scope.animationsEnabled,
                templateUrl: 'regCompanyModalContent.html',
                controller: 'InstanceCompanyCtrl',
                size: size,
                resolve: {
                    company: function() {
                        return $scope.company;
                    }
                }
            });

            modalInstance.result.then(function(selectedItem) {
            }, function() {
                $log.info('Modal dismissed at: ' + new Date());
            });
        };
        $scope.toggleAnimation = function() {
            $scope.animationsEnabled = !$scope.animationsEnabled;
        };

    })
    .controller('InstancePersonCtrl', function($scope, $modalInstance, person, Person) {

        $scope.person = person;
        $scope.errors={};
        $scope.register = function() {
            if (isPersonValid()) {
                Person.save($scope.person)
                    .success(function(data) {
                        $scope.messageOK = data.messageOK;
                        $scope.errors = data.errors;
                         console.log(data.errors);
                         console.log($scope.errors);
                    })
                    .error(function(data) {
                        console.log(data);
                    });
            }
            else {
                $scope.message = 'Los datos no son válidos';
            }
           // $modalInstance.close();
        }
        function isPersonValid(){
            return true;
        }
        $scope.close = function() {
           $modalInstance.close();
        };
        

        $scope.cancel = function() {
            $modalInstance.dismiss('cancel');
        };
    })
    .controller('InstanceCompanyCtrl', function($scope, $modalInstance, company, Company) {

        $scope.company = company;
        $scope.errors ={};
        $scope.messageOK ="";
        
        $scope.register = function() {
             console.log(company);
            if (isCompanyValid()) {
                Company.save($scope.company)
                    .success(function(data) {
                        $scope.messageOK = data.messageOK;
                        $scope.errors =data.errors;
                    })
                    .error(function(data) {
                        console.log(data);
                    });
            }
            else {
                $scope.message = 'Los datos no son válidos';
            }
        }
        function isCompanyValid(){
            return true;
        }
        $scope.close = function() {
           $modalInstance.close();
        };
        $scope.cancel = function() {
            $modalInstance.dismiss('cancel');
        };
    });