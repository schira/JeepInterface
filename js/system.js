(function () {

    $(function () {
        thisFun = this;
        $('#shutdown-phonecount').on('focusin', function () {
            console.log("Saving value " + $(this).val());
            $(thisFun).data('shutdownphonecount', $(this).val());
        });
        $("#btnReboot").on('click', function () {
            $.ajax({
                type: "POST",
                url: "../../executeClass.php",
                data: "Task=rebootSystem",
                success: function (text) {
                    if (text == "success") {
                    }
                }
            });
        });
        $("#btnShutdown").on('click', function () {
            $.ajax({
                type: "POST",
                url: "../../executeClass.php",
                data: "Task=shutdownSystem",
                success: function (text) {
                    if (text == "success") {
                    }
                }
            });
        });
        $("#btnSave").on('click', function () {
            if ($(thisFun).data('shutdownphonecount') == 'undefined') {
                oldValue = $("#shutdown-phonecount")[0].valueAsNumber;
            } else {
                oldValue = $(thisFun).data('shutdownphonecount')
            }
            $.ajax({
                type: "POST",
                url: "../../executeClass.php",
                data: "Task=updateSystemSettings&oldValue=" + oldValue + "&newValue=" + $("#shutdown-phonecount")[0].valueAsNumber,
                success: function (text) {

                    $('#mainArea').load('/mainbtnsSystem.php');

                }
            });
        });
    });
}).call(this);


