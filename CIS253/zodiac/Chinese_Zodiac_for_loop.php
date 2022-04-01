<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Chinese_Zodiac_For_Loop</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>

<body>
    <h1>Chinese Zodiac for loop</h1>
    <?php
    $SignNames = array("Rat", "Ox", "Tiger", "Rabbit", "Dragon", "Snake", "Horse", "Goat", "Monkey", "Rooster", "Dog", "Pig");

    echo "<table>\n";
    echo "<tr>\n";
    for ($i = 0; $i < 12; ++$i) {
        echo "<th>$SignNames[$i]<br/>\n";
        echo "<img src= 'images/animals/" . $SignNames[$i] . ".gif' alt='" . $SignNames[$i] . "'/></th>\n";
    }

    for ($i = 1912; $i <= 2022; ++$i) {
        if ((($i - 1912) % 12) == 0) {
            echo "</tr><tr>";
        }
        echo "<td>" . $i . "</td>";
    }
    echo "</tr></table>";
    ?>
</body>

</html>