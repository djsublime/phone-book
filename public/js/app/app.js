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
    })

    .controller('AppCtrl', AppCtrl);

    AppCtrl.$inject = ['$scope', '$filter', '$window', 'toastr', 'Contact'];

    function AppCtrl($scope, $filter, $window, toastr, Contact) {

        var vm = this;

        toastr.success('AppCtrl controller - started');

        /*
            200: The request was successful.
            201: The resource was successfully created.
            204: The request was successful, but we did not send any content back.
            400: The request failed due to an application error, such as a validation error.
            401: An API key was either not sent or invalid.
            403: The resource does not belong to the authenticated user and is forbidden.
            404: The resource was not found.
            500: A server error occurred.
        */

        var Entry = Contact;

        // INDEX METHOD 

        vm.table = {};
        vm.table.page = 1;
        vm.table.per_page = 5;

        vm.paginateFn = function paginateFn(page, per_page) {

            page = page || vm.table.page;
            per_page = per_page || vm.table.per_page;

            vm.table.page = page;

            vm.colection = Entry.query({
                page: page,
                per_page: per_page
            }, function() {

                //logger.info(JSON.stringify(vm.colection));
                //console.log(JSON.stringify(vm.colection));

                toastr.success('Loaded - success', 'Resource');

            }, function(error) {

                toastr.error('error', 'Resource');

            });

        };

        vm.paginateFn(); // call resource

        vm.form = {};
        vm.form.mode = 'add';
        vm.form.data = {};
        vm.form.updated = {};
        vm.form.errors = {};

        vm.editFn = function(contact) {

            vm.form.mode = 'edit';

            vm.form.data = angular.copy(contact);
        };

        vm.submitFn = function() {

            vm.form.errors = {};

            if (vm.form.mode === 'edit') {

                vm.putEntry(vm.form.data.id);

            } else {

                vm.addEntry();

            }
        };

        // PUT METHOD
        vm.putEntry = function(id) {

            vm.update = Entry.get({
                id: id
            }, function() {

                angular.extend(vm.update, vm.form.data);

                vm.update.$update({
                    id: id
                }, function(data) {

                    vm.paginateFn(); // get page and pre page

                    vm.form.updated = data.id;

                    vm.form.mode = 'add';

                    vm.form.data = {};

                    toastr.success('Success', 'Update Entry');

                    console.log(JSON.stringify(data));


                }, function(error) {

                    for (var prop in error.data) {
                        vm.form.errors[prop] = error.data[prop][0];
                    }
                    console.log(error.data);

                    toastr.error('Add new record', 'Error');

                });

            }, function(error) {

                toastr.error(error.data.error, 'Error');

                console.log(JSON.stringify(error));

            });

        };

        // STORE METHOD
        vm.addEntry = function() {

            Entry.save(vm.form.data, function(data) {

                vm.colection.data.push(data);

                toastr.success('Success', 'New Entry');

                console.log(JSON.stringify(data));

            }, function(error) {

                for (var prop in error.data) {
                    vm.form.errors[prop] = error.data[prop][0];
                }
                console.log(error.data);

                toastr.error('Add new record', 'Error');

            });

        };

        // DELETE METHOD
        vm.deleteEntry = function(id) {

            var deleteEntry = $window.confirm('Are you absolutely sure you want to delete?');

            if (deleteEntry) {

                Entry.delete({
                    id: id
                }, function(data) {

                    vm.colection.data = $filter('filter')(vm.colection.data, {
                        id: '!' + id
                    });

                    toastr.success('Deleted - success', 'Resource');

                }, function(error) {

                    toastr.error(error.data.error, 'Error');

                    console.info(JSON.stringify(error));

                });

            }
        };

    }

})();
