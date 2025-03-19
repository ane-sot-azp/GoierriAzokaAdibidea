<h2 style="text-align: center;">Iruzkinak bidali</h2>

<form id="iruzkinaForm" method="post" style="text-align: center;">
    <label for="iruzkina">Iruzkina:</label>
    <textarea id="iruzkina" name="iruzkina" rows="4" cols="50" placeholder="Zure iruzkina hemen..." required></textarea><br>
    <button type="submit" style="border-radius: 10px">Bidali</button>
</form>

<h3 style="text-align: center;">Iruzkinak:</h3>
<div id="iruzkinak" style="text-align: center;">
    <?php
    $xmlIruzkinak = simplexml_load_file('iruzkinak.xml');
    foreach ($xmlIruzkinak->iruzkina as $iruzkina) {
        echo "<p>" . htmlspecialchars($iruzkina) . "</p>";
    }
    ?>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.js"
            integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {

        $("#iruzkinaForm").submit(function(e){
            e.preventDefault();
            iruzkinaBidali();
        })
    });

    function iruzkinaBidali() {
        var iruzkina = $('#iruzkina').val();
        $.ajax({
            url: 'iruzkinakJaso.php',
            type: 'POST',
            data: {
                iruzkina: iruzkina
            }
        })
                .done(function (data) {
                    $('#iruzkina').val('');
                    location.reload();
                })
                .fail(function () {
                    console.log("Errorea");
                })
    };
 
    </script>