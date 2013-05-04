function channel_setStatus(data, img, file) {
    // Post request
    $.post(file, data,
            function(reponse, textStatus) {
                if (textStatus == 'success') {
                    // Change image src
                    if ($('img#' + img).attr("src") == "../images/ok.png") {
                        $('img#' + img).attr("src", "../images/cancel.png");
                    } else {
                        $('img#' + img).attr("src", "../images/ok.png");
                    }
                }
            });
}