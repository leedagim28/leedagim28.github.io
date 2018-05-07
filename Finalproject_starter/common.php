<?php
    function banner() {
        echo '
        <div id="bannerarea">
            <img src="nerdxing.jpg" alt="banner logo" /> <br />
            where meek geeks meet
        </div>
        ';
    }
    function footer() {
        echo '
        <div>
            <p>
                This page is for single nerds to meet and date each other!  Type in your personal information and wait for the nerdly luv to begin!  Thank you for using our site.
            </p>
            <p>
                Results and page (C) Copyright Geekluv Inc.
            </p>
            <ul>
                <li>
                    <a href="geekluv.php">
                        <img src="back.gif" alt="icon" />
                        Back to front page
                    </a>
                </li>
            </ul>
        </div>
    ';
    }
    function lineEncode($dict) {
        // get all values and concate into single line
        return implode(",", array_values($dict));
    }
    function lineDecode($line) {
        $keys = array("name", "gender", "age", "personality", "favorite-os", "min-age", "max-age");
        $values = explode(",", $line);
        // reates an array by using the values from the keys array as keys and the values from the values array as the corresponding values
        return array_combine($keys, $values);
    }
    function appendLine($line) {
        $file = "singles.txt";
        // Open the file to get existing content
        $current = file_get_contents($file);
        // New line to be appended
        $line = "\n" . $line;
        // Append a new line to the file
        $current .= $line;
        // Write the contents back to the file
        file_put_contents($file, $current);
    }
    function getAllSingles() {
        $allSingles = array();
        $file_handle = fopen("singles.txt", "r");
        while (!feof($file_handle)) {
            $line = fgets($file_handle);
            array_push($allSingles, $line);
        }
        fclose($file_handle);
        return $allSingles;
    }
    function getSingle($name, $allSingles) {
        $single = array_filter($allSingles, function ($line) use ($name) {
            $n = lineDecode($line)["name"];
            return $n === $name;
        });
        return array_pop($single);
    }
    function getOppositeGender($gender) {
        if ($gender === "M") {
            return "F";
        } else {
            return "M";
        }
    }
    function getMatches($currentSingleLine, $allSingles) {
        $currentSingle = lineDecode($currentSingleLine);
        // filter by gender (opposite gender)
        $filtered = array_filter($allSingles, function($line) use ($currentSingle) {
            $oppositeGender = getOppositeGender($currentSingle["gender"]);
            $g = lineDecode($line)["gender"];
            return $g === $oppositeGender;
        });
        // filter by age (each person is between the other's min/max age inclusive)
        $filtered = array_filter($filtered, function($line) use ($currentSingle) {
            $age = (int) $currentSingle["age"];
            $minAge = (int) $currentSingle["min-age"];
            $maxAge = (int) $currentSingle["max-age"];
            $targetSingle = lineDecode($line);
            $targetAge = (int) $targetSingle["age"];
            $targetMin = (int) $targetSingle["min-age"];
            $targetMax = (int) $targetSingle["max-age"];
            return $minAge <= $targetAge && $targetAge <= $maxAge && $targetMin <= $age && $age <= $targetMax;
        });
        // same fav os (But Mac compatible with Linux)
        $filtered = array_filter($filtered, function($line) use ($currentSingle) {
            $favoriteOs = $currentSingle["favorite-os"];
            $targetSingle = lineDecode($line);
            $targetFavoriteOs = $targetSingle["favorite-os"];
            if (in_array($favoriteOs, array("Mac OS X", "Linux"))) {
                // treat Mac and Linux the same
                return in_array($targetFavoriteOs, array("Mac OS X", "Linux"));
            }
            return $favoriteOs === $targetFavoriteOs;
        });
        // shares one personailty type
        $filtered = array_filter($filtered, function($line) use ($currentSingle) {
            $personality = $currentSingle["personality"];
            $targetSingle = lineDecode($line);
            $targetPersonality = $targetSingle["personality"];
            $targetPersonality = strtolower($targetPersonality);
            $personality = strtolower($personality);
            // find if any in common. (I/E S/N T/F J/P) has no overlaps
            $common = array_unique(array_intersect(str_split($personality), str_split($targetPersonality)));
            return $common;
        });
        return $filtered;
    }
?>