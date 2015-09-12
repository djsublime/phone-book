(function() {

    'use strict';

    angular.module('phoneBook', [
            'ngResource',
            'toastr'
        ])
        .run(['$rootScope', '$window', function run($rootScope, $window) {

            $rootScope.pageTitle = 'Phone Book';

            $rootScope.$back = function() {

                $window.history.back();

            };


        }])

    .config(function config($provide) {
        // set resource
        $provide.factory('Contact', function($resource) {
            return $resource('resource/contact/:id', null, {
                'update': {
                    method: 'PUT',
                    params: {
                        id: "@id"
                    },
                },
                'query': {
                    method: 'GET',
                    isArray: false
                },
            });
        });
    })

    .controller('AppCtrl', AppCtrl);

    AppCtrl.$inject = ['$scope', '$filter', 'toastr', 'Contact'];

    function AppCtrl($scope, $filter, toastr, Contact) {

        var vm = this;

        toastr.success('AppCtrl controller - started');

        var Entry = Contact;

        // INDEX METHOD

        vm.colection = Entry.query({page:1,per_page:5},function() {

            //logger.info(JSON.stringify(vm.colection));
            console.log(JSON.stringify(vm.colection));

            toastr.success('Loaded - success', 'Resource');

        }, function(error) {

            toastr.error('error', 'aResource');

        });


    }

})();
