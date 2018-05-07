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

        <div>
            <form action="matches-submit.php" method="get">
                <fieldset>
                    <legend>
                        Returning User:
                    </legend>

                    <ul>
                        <li>
                            <strong>Name:</strong>
                            <input type="text" name="name" size="16">
                        </li>
                    </ul>

                    <input type="submit" value="View My Maches">
                </fieldset>
            </form>
        </div>

        <?php footer(); ?>
	</body>
</html>