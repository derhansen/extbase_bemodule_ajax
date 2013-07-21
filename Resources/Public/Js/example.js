$(document).ready(function () {

    $(function() {
        $( "#progressbar" ).progressbar();
    });

    function getStatus() {
        //check your progress
        console.log('checked');

        $.ajax({
            url: '<f:uri.action action='checkprocess' />',
            type: 'get',
            dataType: 'json',
            cache: false,
            async: true,
            success: function (data) {
                console.log(data);
                //assume the data returned in the percentage complete
                var percentage = parseInt(data);

                $("#progressbar").text('Index:' + percentage + ' von 29');

                //write your status somewhere, like a jQuery progress bar?

                if (percentage < 29) {
                    //if not complete, check again
                    getStatus();
                }
            }
        });
    }

    $("#start").click(function (event) {
        $.ajax({
            url: '<f:uri.action action='startprocess' />',
            type: 'get',
            dataType: 'json',
            cache: false,
            async: true,
            success: function (data) {
                console.log("success");
                console.log(data);
                getStatus();
            }
        });
        getStatus();
    });
});
