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

        //$("#editor2").markdown({buttonSize: 'normal'});
    };

    return App;
})(App || {});
