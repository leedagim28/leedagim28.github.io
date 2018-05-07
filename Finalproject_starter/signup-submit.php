<!DOCTYPE html>
<html>
	<head>
		<title>GeekLuv</title>

		<meta charset="utf-8" />

		<!-- instructor-provided CSS and JavaScript links; do not modify -->
		<link href="heart.gif" type="image/gif" rel="shortcut icon" />
		<link href="Geekluv.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
        <?php include("Common.php"); ?>

        <?php
            $submitted = $_POST;
            $line = lineEncode($submitted);
            appendLine($line);
        ?>

        <div>
            <strong>Thanks you!</strong>
            <p>
                Welcome to Nerdluv, <?php echo $submitted["name"]; ?>!
            </p>
            <p>
                Now <a href="matches.php">log in to see your matches</a>
            </p>
        </div>

        <?php footer(); ?>
	</body>
</html>