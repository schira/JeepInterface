<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jQueryRotateCompressed.js"></script>

<table border ="1">
    <tr>
        <th>
            Roll
        </th>
        <th>
            Pitch
        </th>
    </tr>
    <tr>
        <td><img src="images/jeepside.jpg" id="jeepside"></td>
        <td> <img src="images/jeepfront.jpg" id="jeepfront"></td>

    </tr>
</table>
</table>

<script>
    pitch();
    function pitch() {
        $.ajax({
            type: "POST",
            url: "jeepturn.php",
            data: "Task=getx",
            success: function (text) {
                console.log(text)
                $("#jeepside").rotate(parseInt(text));
                pitch();
            }
        });
    }
    roll();
    function roll() {
        $.ajax({
            type: "POST",
            url: "jeepturn.php",
            data: "Task=gety",
            success: function (text) {
                console.log(text)
                $("#jeepfront").rotate(parseInt(text));
                roll();
            }
        });
    }
</script>