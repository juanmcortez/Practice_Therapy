require('./bootstrap');

// bootstrap
try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');
    require('bootstrap');
} catch (e) { }

$(document).ready(function () {
    $('.sidebar-header').on('click', function () {
        $('#sidebar').toggleClass('hideme');
    });
});
