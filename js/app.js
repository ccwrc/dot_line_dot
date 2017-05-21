
$(document).ready(function () {

    var counterInNewSpan = function (max, textArea) {
        var count = 0;
        var newSpan = $("<span>");
        textArea.after(newSpan);

        textArea.on("keyup", function () {
            count = $(this)[0].value.length;

            if (count > max) {
                $(this)[0].value = $(this)[0].value.substr(0, max);
                count = max;
            }
            $("span")[0].innerText = count + "/" + max;

            if (count < 2) {
                $("span").css("color", "black");
            } else if (count < (max * 0.95)) {
                $("span").css("color", "blue");
            } else {
                $("span").css("color", "red");
            }
        });
    };

    var idsForCounterArray = [
        "#inputToMorse", "#inputToText"
    ];

    for (var i = 0; i < idsForCounterArray.length; i++) {
        counterInNewSpan($(idsForCounterArray[i]).data("max_char_input"), $(idsForCounterArray[i]));
    }

});

