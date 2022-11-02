$(document).ready(function () {

    $('input').keyup(function () {

        if (this.value.length == +$(this).attr("maxlength")) {

            $(this).next().focus();
        }
    });
});