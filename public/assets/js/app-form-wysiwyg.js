var App = (function () {
    'use strict';

    App.textEditors = function () {

        //Summernote
        $('#about').summernote({
            height: 300
        });

        $('#our_mission').summernote({
            height: 100
        });

        $('#answer').summernote({
            height: 300
        });

        $('#opening_hours').summernote({
            height: 200
        });

        $('#address').summernote({
            height: 200
        });

        //$("#editor2").markdown({buttonSize: 'normal'});
    };

    return App;
})(App || {});
