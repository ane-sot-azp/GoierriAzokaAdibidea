<?php
 
$env = parse_ini_file(__DIR__ . '/../../../.env');
 
$APP_DIR = $env["APP_DIR"];
 
require_once($_SERVER["DOCUMENT_ROOT"] . $APP_DIR . '/src/views/parts/layouts/layoutTop.php'); //Aplikazioaren karpeta edozein lekutatik atzitzeko.
 
require_once(APP_DIR . '/src/views/parts/sidebar.php');
 
require_once(APP_DIR . '/src/views/parts/header.php');
 
$config = simplexml_load_file(APP_DIR . '/conf.xml');
$mainColor = $config->mainColor;
$footerColor = $config->footerColor;
 
?>
<div class="laburpenaDiv">
    <?php
    $config = simplexml_load_file(APP_DIR . '/conf.xml');
    ?>
    <form action="<?= HREF_APP_DIR ?>/src/php/post.php" method="post">
        <input type="hidden" value="changeConfig" name="action" />
        <div>
            <div>
                <label for="mainColor">Kolore nagusia:</label>
            </div>
            <div>
                <input type="color" id="mainColor" name="mainColor" value="<?= $mainColor ?>" />
            </div>
        </div>
        <div>
            <div>
                <label for="footerColor">Footer kolorea:</label>
            </div>
            <div>
                <input type="color" id="footerColor" name="footerColor" value="<?= $footerColor ?>" />
            </div>
        </div>
        <button type="submit" onclick="koloreak('<?= $mainColor ?>', '<?= $footerColor ?>')">Gorde</button>
    </form>
</div>
 
<?php
require_once(APP_DIR . '/src//views/parts/layouts/layoutBottom.php');
?>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
 
<script>
    function koloreak(mainColor, footerColor) {
        $.ajax({
            url: postDir,
            type: 'POST',
            data: {
                action: "changeConfig",
                mainColor: $("#mainColor").val(),
                footerColor: $("#footerColor").val()
            }
        })
            .done(function (data) {
                location.reload();
            })
            .fail(function () {
                console.log("Errorea");
            })
            .always(function () { });
    }
 
 
</script>