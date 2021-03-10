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
    <link rel="stylesheet" href="classless.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        textarea {
            font-size: 15px;
            width: 100%;
            height: 55%;
            line-height: 1.9;
            margin-top: 2em;
            margin-bottom: 2em;
        }
    </style>
</head>

<body>
    <div class="text-center">
        <h1 class="text-center" style="letter-spacing: 3px;">HIMO</h1>
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
            echo "<script>";
            echo 'alert("Changes saved.")';
            echo "</script>";
        }
        if (isset($_POST["save"])) {
            Write();
        };
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <textarea name="text"><?php Read(); ?></textarea>
            <!-- <input type="submit" style="background-color: #ccffcc;" name="save" value="Save"/> -->
            <button type="submit" style="background-color: #ccffcc;" name="save">Save</button>
        </form>
        <hr style="margin-top: 2em;">
        <p>This is <a href="https://github.com/dmpop/himo">Himo</a></p>
    </div>
</body>

</html>