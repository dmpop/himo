<?php
error_reporting(E_ERROR);
?>

<html lang="en">
<!-- Author: Dmitri Popov, dmpop@linux.com
         License: GPLv3 https://www.gnu.org/licenses/gpl-3.0.txt -->

<head>
    <meta charset="utf-8">
    <title>ひも</title>
    <link rel="shortcut icon" href="img/favicon.png" />
    <link rel="stylesheet" href="water.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        textarea {
            font-size: 15px;
            width: 100%;
            height: 55%;
            line-height: 1.9;
            margin-top: 2em;
        }
    </style>
</head>

<body>
    <img style="display: inline; height: 2em; vertical-align: middle;" src="img/favicon.png" alt="logo" />
    <h1 style="display: inline; margin-left: 0.19em; letter-spacing: 3px; color: rgb(200, 113, 55); vertical-align: middle;">HIMO</h1>
    <hr style="margin-bottom: 2em;">
    <button style="display: inline;" onclick='window.location.href = "index.php"'>Back</button>
    <?php
    function Read()
    {
        $f = "commands.csv";
        echo file_get_contents($f);
    }
    function Write()
    {
        $f = "commands.csv";
        $fp = fopen($f, "w");
        $data = $_POST["text"];
        fwrite($fp, $data);
        fclose($fp);
    }
    if ($_POST["save"]) {
        Write();
    };
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <textarea name="text"><?php Read(); ?></textarea><br /><br />
        <input style="background-color: #ccffcc;" type="submit" name="save" value="Save">
    </form>
    <hr style="margin-top: 2em;">
    <p>This is <a href="https://github.com/dmpop/himo">Himo</a></p>
</body>

</html>