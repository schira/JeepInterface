<link href="/css/inclinometer.css" rel="stylesheet">
<script type="text/javascript" src="js/jQueryRotateCompressed.js"></script>

<div class="overlayContainer">
    <img src="/images/inclogauge.png" class="jpoverlay">
    <img src="/images/jeeppitch.png" class="jeepside" id="jeepside">
    <img src="/images/jeeproll.png" class="jeepfront" id="jeepfront">
</div>
<div id='pitchraw' class='pitchraw'>0&deg;</div>
<div id='rollraw' class='rollraw'>0&deg;</div>
<script>
    var myVar = setInterval(axisControl, 1000);
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
                $('#pitchraw').html(parseInt(Math.abs(axis.x)) + '&deg;');
                $('#rollraw').html(parseInt(Math.abs(axis.y)) + '&deg;');
            }
        });
    }
</script>