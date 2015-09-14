(function() {

    'use strict';

    angular.module('phoneBook', [
            'ngResource',
            'angular.filter',
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
    });

})();
