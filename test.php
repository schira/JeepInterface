<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jQueryRotateCompressed.js"></script>

<table border ="1">
    <tr>
        <th>
            ---
        </th>
    </tr>
    <tr style="line-height: 110px;" >
        <td style="padding-top:4px;padding-left: 20px; background-repeat: no-repeat; background-size: 100% auto;" background="images/inclinometerOverlay.png" >
            <img style="margin-left:-10px; margin-top:25px;" src="images/jeepside.png" id="jeepside">
            &nbsp;&nbsp;&nbsp;
            <img style="margin-top:26px;" src="images/jeepfront.png" id="jeepfront">
        </td>
    </tr>
</table>
</table>

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