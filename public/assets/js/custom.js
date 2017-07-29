function getFollowData() {
    var url = $(location).attr('href');
    var splitedUrl = url.split('/');
    var username = splitedUrl[splitedUrl.length - 1];

    if (username.charAt(0) == '@') {
        $.ajax({
            url: "/follow/data",
            method: "POST",
            data: { username : username },
        }).done(function(response) {
            if (response == 'Same') {
                var follow = $('#follow');

                follow.prop("disabled", true);
                follow.val("Followed")
            } else if(response == "Follower") {
                var follow = $('#follow');

                follow.prop("disabled", true);
                follow.val("Followed")
            }
        }).fail(function( jqXHR, textStatus ) {
            console.log(textStatus);
        });
    }
}

$(document).ready(function() {
    $('#follow').on('click', function () {
        var url = $(location).attr('href');
        var splitedUrl = url.split('/');
        var username = splitedUrl[splitedUrl.length - 1];
        var follow = $('#follow');

        if (follow.val() == "Follow" && follow.prop("disabled") == false) {
            $.ajax({
                url: "/follow/create",
                method: "POST",
                data: { username : username },
            }).done(function(response) {
                if (response == "Done") {
                    follow.val("Followed")
                }
            }).fail(function( jqXHR, textStatus ) {
                alert(textStatus);
            });
        }
    });

    $('#PostStatus').on('click', function(event) {
        event.preventDefault();

        var status = $('#status').val();

        $.ajax({
            url: "/feed/status",
            method: "POST",
            data: { body : status },
        }).done(function(response) {
            $('#status').val("");
        }).fail(function( jqXHR, textStatus ) {
            alert(textStatus);
        });
    });
});