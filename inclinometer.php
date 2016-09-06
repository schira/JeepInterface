<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="mobile-web-app-capable" content="yes">
        <link rel="stylesheet" type="text/css" href="css/inclinometer.css">
        <script src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/jQueryRotateCompressed.js"></script>
    </head>
    <body>
        <div class="overlayContainer">
            <img src="images/inclinometerOverlay.png" class="jpoverlay">
            <img src="images/jeepside.png" class="jeepside" id="jeepside">
            <img src="images/jeepfront.png" class="jeepfront" id="jeepfront">
        </div>


        <script>
            var myVar = setInterval(axisControl, 100);
            function axisControl() {
                $.ajax({
                    type: "POST",
                    url: "jeepturn.php",
                    data: "Task=getaxis",
                    success: function (text) {
                        console.log(text)
                        axis = JSON.parse(text)
                        $("#jeepside").rotate(parseInt(axis.x));
                        $("#jeepfront").rotate(parseInt(axis.y));
                    }
                });
            }
        </script>
    </body>
</html>