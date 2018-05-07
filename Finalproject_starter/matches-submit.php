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
            $allSingles = getAllSingles();
            $targetName = $_GET["name"];
            $currentSingleLine = getSingle($targetName, $allSingles);
            $matches = getMatches($currentSingleLine, $allSingles);
        ?>

        <strong>Matches for <?php echo $targetName; ?></strong>

        <?php foreach($matches as $match):
            $currentMatch = lineDecode($match);
        ?>
            <div class="match">
                <p>
                    <?php echo $currentMatch["name"]; ?>

                    <img src="
                    <?php
                        if ($currentMatch["gender"] === "F") {
                            echo 'user.png';
                        } else {
                            echo 'userm.png';
                        }
                    ?>
                    " width="150"/>
                 </p>
                <ul>
                    <li>
                        <strong>gender:</strong>
                        <?php echo $currentMatch["gender"]; ?>
                    </li>
                    <li>
                        <strong>age:</strong>
                        <?php echo $currentMatch["age"]; ?>
                    </li>
                    <li>
                        <strong>type:</strong>
                        <?php echo $currentMatch["personality"]; ?>
                    </li>
                    <li>
                        <strong>OS:</strong>
                        <?php echo $currentMatch["favorite-os"]; ?>
                    </li>
                </ul>
            </div>
        <?php endforeach; ?>
	</body>
</html>