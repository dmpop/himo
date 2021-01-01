<!DOCTYPE html>
<html lang="en">
<!-- Author: Dmitri Popov, dmpop@linux.com, tokyoma.de
	 License: GPLv3 https://www.gnu.org/licenses/gpl-3.0.txt -->

<head>
	<meta charset="utf-8">
	<title>ひも</title>
	<link rel="shortcut icon" href="img/favicon.png" />
	<link rel="stylesheet" href="water.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<!-- Suppress form re-submit prompt on refresh -->
	<script>
		if (window.history.replaceState) {
			window.history.replaceState(null, null, window.location.href);
		}
	</script>

	<img style="display: inline; height: 2em; vertical-align: middle;" src="img/favicon.png" alt="logo" />
	<h1 style="display: inline; margin-left: 0.19em; letter-spacing: 3px; color: rgb(200, 113, 55); vertical-align: middle;">HIMO</h1>
	<hr style="margin-bottom: 2em;">

	<?php
	// Display the IP address of the machine running Himo
	echo '<p>';
	echo "IP address: <strong>";
	passthru('hostname -I');
	echo '</strong></p>';
	echo "<p style='margin-top: 2em;'>";

	// Check is the camera is connected
	$CAMERA = shell_exec("gphoto2 --auto-detect | grep usb | cut -b 36-42 | sed 's/,/\//'");
	// If the camera is not detected, show a warning message
	if (empty($CAMERA)) {
		echo '<img style="display: inline; height: 1.5em; margin-right: 0.5em; vertical-align: middle;" src="img/alert.svg" alt="alert" />';
		echo 'Camera is not connected.';
	}
	// Iff the camera is detected, capture a preview image
	if (!empty($_POST["refresh"])) {
		unlink("capture_preview.jpg");
		shell_exec("gphoto2 --capture-preview");
	}
	echo "</p>";
	// Show the captured preview image
	if (file_exists("capture_preview.jpg")) {
		echo '<img style="border-radius: 9px;" src="capture_preview.jpg">';
	}
	?>

	<form style="margin-top: 2em;" action=' ' method='POST'>
		<input style="display: inline;" type='submit' name='refresh' value='Refresh' />
		<input style="background-color: #cce6ff;  display: inline;" type='submit' name='capture' value='Capture' />
	</form>

	<?php
	if (!empty($_POST["capture"])) {
		echo "<pre>";
		passthru("gphoto2 --capture-image-and-download --keep --filename photos/%Y%m%d-%H%M%S-%03n.%C");
		echo "</pre>";
	}
	?>

	<form style="margin-top: 2em;" action='index.php' method='POST'>
		<select name='parameter'>
			<option value=''>Select command</option>
			<?php
			if (file_exists("commands.csv")) {
				$handle = fopen("commands.csv", "r");
				while (($row = fgetcsv($handle, 0, ";")) !== FALSE) {
					echo '<option value="' . $row[1] . '">' . $row[0] . "</option>";
				}
			} else {
				echo '<option disabled>commands.csv not found</option>';
			}
			?>
		</select>
		<input style="margin-top: 1.5em;" type="button" onclick="location.href='edit.php';" value="Edit" />
		<p>gPhoto2 parameters: <em style="color:lightgray">(example: --list-config)</em></p>
		<input style="margin-bottom: 1.5em;" type="text" name="cmd">
		<input style="background-color: #ccffcc; display: inline;" type='submit' value='OK' />
	</form>

	<?php

	if (!file_exists("photos")) {
		mkdir("photos", 0777, true);
	}

	if (!empty($_POST["cmd"])) {
		echo '<pre>';
		passthru('gphoto2 ' . $_POST["cmd"]);
		echo '</pre>';
	}

	if (isset($_POST["parameter"])) {
		echo '<hr style="margin-top: 2em;"><pre>';
		$command = 'gphoto2 ' . $_POST['parameter'];
		passthru("$command");
		echo '</pre>';
	}
	?>
	<hr style="margin-top: 2em;">
	<p>This is <a href="https://github.com/dmpop/himo">Himo</a></p>
</body>

</html>