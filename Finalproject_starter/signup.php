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

        <?php banner(); ?>

        <div>
            <form action="signup-submit.php" method="post">
                <fieldset>
                    <legend>
                        New User Signup:
                    </legend>
                    <ul>
                        <li>
                            <strong>Name:</strong>
                            <input type="text" name="name" size="16">
                        </li>
                        <li>
                            <strong>Gender:</strong>
                            <input type="radio" id="male" name="gender" value="M">
                            <label for="male">Male</label>
                            <input type="radio" id="female" name="gender" value="F" checked>
                            <label for="female">Female</label>
                        </li>
                        <li>
                            <strong>Age:</strong>
                            <input type="text" name="age" size="6">
                        </li>
                        <li>
                            <strong>Personality type:</strong>
                            <input type="text" name="personality" size="6" maxlength="4">
                            <a href="http://www.humanmetrics.com/cgi-win/JTypes2.asp">(Don't know your type?)</a>
                        </li>
                        <li>
                            <strong>Favorite OS:</strong>
                            <select name="favorite-os">
                                <option value="Windows" selected>Windows</option>
                                <option value="Mac OS X">Mac OS X</option>
                                <option value="Linux">Linux</option>
                            </select>
                        </li>
                        <li>
                            <strong>Seeking age:</strong>
                            <input type="text" name="min-age" placeholder="min" size="6">
                            to
                            <input type="text" name="max-age" placeholder="max" size="6">
                        </li>
                    </ul>

                    <input type="submit" value="Sign Up">
                </fieldset>
            </form>
        </div>
        <?php footer(); ?>
	</body>
</html>