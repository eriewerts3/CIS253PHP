<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Chinese Zodiac - A Code Demo for PHP</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" href="https://use.typekit.net/ezg7oqn.css">
    <link rel="stylesheet" href="zodiac.css">
</head>

<body>
    <div id="container">
        <div id="header">
            <?php
            include("includes/inc_header.php");
            ?>
        </div>
        <div id="nav">
            <?php
            include("includes/inc_nav.php");
            ?>
        </div>
        <div id="textr">
            <?php
            function validateInput($data, $fieldName)
            { //p. 225 or p. 220 or p. 202 #3
                global $errorCount;
                if (empty($data)) {
                    echo "\"$fieldName\" is a required field.\n";
                    ++$errorCount;
                    $retval = "";
                } else {
                    if (is_numeric($data)) {
                        if (($data >= 1912) && ($data <= 2022)) {
                            $retval = $data;
                        } else {
                            echo "The \"$fieldName\" should be between 1912 and 2022<br>\n";
                            ++$errorCount;
                            $retval = "";
                        }
                    } else {
                        echo "The field \"$fieldName\" should be a number above zero.<br>\n";
                        ++$errorCount;
                        $retval = "";
                    }
                }
                return ($retval);
            }

            function displayForm($Year)
            {
            ?>
                <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post">
                    <p>Your Birth Year: <input type="text" name="Year" value="2021" /></p>
                    <p><input type="reset" value="Clear Form" />&nbsp; &nbsp;<input type="submit" name="Submit" value="Show Me My Sign" /></p>
                </form>
            <?php
            }

            function put_contents($fname, $data)
            { //p. 271 $fname=$SaveFilename , $data=savestring
                $retval = true;
                $fp = fopen($fname, "wb");
                if ($fp === FALSE) {
                    echo "There was an error creating \"" . htmlentities($fname) . "\".<br />\n";
                } else {
                    $retval = fwrite($fp, $data);
                    fclose($fp);
                    return $retval;
                }
            }

            function get_contents($fname)
            { // 
                $retval = "";
                $fp = fopen($fname, "rb");
                if ($fp === FALSE)
                    $retval = FALSE;
                else {
                    while (!feof($fp)) {
                        $retval .= fread($fp, 8192);
                    }
                }
                fclose($fp);
                return $retval;
            }
            function StatisticsForYear($Year)
            { //Builds statistics text files
                $retval = 0;
                $counter_file = "./statistics/BirthYear_" . $Year . "_Count.txt";

                if ((is_file($counter_file)) && (is_readable($counter_file))) {
                    $retval = get_contents($counter_file);
                }
                ++$retval;

                put_contents($counter_file, $retval);

                return $retval;
            }
            function displayResults($Year)
            {
                $CZIndex = ($Year + 8) % 12;
                if ($CZIndex = 0) {
                    echo "<p>You were born under the sign of the Rat.</p>\n";
                    echo "<p><img src='images/animals/Rat.gif' alt='Rat' title='Rat' /></p>\n";
                } else if ($CZIndex = 1) {
                    echo "<p>You were born under the sign of the Ox.</p>\n";
                    echo "<p><img src='images/animals/Ox.gif' alt='Ox' title='Ox' /></p>\n";
                } else if ($CZIndex = 2) {
                    echo "<p>You were born under the sign of the Tiger.</p>\n";
                    echo "<p><img src='images/animals/Tiger.gif' alt='Tiger' title='Tiger' /></p>\n";
                } else if ($CZIndex = 3) {
                    echo "<p>You were born under the sign of the Rabbit.</p>\n";
                    echo "<p><img src='images/animals/Rabbit.gif' alt='Rabbit' title='Rabbit' /></p>\n";
                } else if ($CZIndex = 4) {
                    echo "<p>You were born under the sign of the Dragon.</p>\n";
                    echo "<p><img src='images/animals/Dragon.gif' alt='Dragon' title='Dragon' /></p>\n";
                } else if ($CZIndex = 5) {
                    echo "<p>You were born under the sign of the Snake.</p>\n";
                    echo "<p><img src='images/animals/Snake.gif' alt='Snake' title='Snake' /></p>\n";
                } else if ($CZIndex = 6) {
                    echo "<p>You were born under the sign of the Horse.</p>\n";
                    echo "<p><img src='images/animals/Horse.gif' alt='Horse' title='Horse' /></p>\n";
                } else if ($CZIndex = 7) {
                    echo "<p>You were born under the sign of the Goat.</p>\n";
                    echo "<p><img src='images/animals/Goat.gif' alt='Goat' title='Goat' /></p>\n";
                } else if ($CZIndex = 8) {
                    echo "<p>You were born under the sign of the Monkey.</p>\n";
                    echo "<p><img src='images/animals/Monkey.gif' alt='Monkey' title='Monkey' /></p>\n";
                } else if ($CZIndex = 9) {
                    echo "<p>You were born under the sign of the Rooster.</p>\n";
                    echo "<p><img src='images/animals/Rooster.gif' alt='Rooster' title='Rooster' /></p>\n";
                } else if ($CZIndex = 10) {
                    echo "<p>You were born under the sign of the Dog.</p>\n";
                    echo "<p><img src='images/animals/Dog.gif' alt='Dog' title='Dog' /></p>\n";
                } else if ($CZIndex = 11) {
                    echo "<p>You were born under the sign of the Pig.</p>\n";
                    echo "<p><img src='images/animals/Pig.gif' alt='Pig' title='Pig' /></p>\n";
                }
                $YearCount = StatisticsForYear($Year);
                echo "<p>You are person $YearCount to enter the year $Year.</p>\n";
                echo "<p style = 'text-align:center'><a href='index.php?page=control_structures'>Back</a></p>\n";
            }

            $ShowForm = TRUE;
            $errorCount = 0;
            $Year = date("Y");
            if (isset($_POST['Submit'])) {
                $Year = validateInput($_POST['Year'], "Birth Year");
                if ($errorCount == 0)
                    $ShowForm = FALSE;
                else
                    $ShowForm = TRUE;
            }
            if ($ShowForm == TRUE) {
                if ($errorCount > 0) // if there were errors
                    echo "<p>Please re-enter the form information below.</p>\n";
                displayForm($Year);
            } else {
                displayResults($Year);
            }
            ?>
        </div>
        <div id="photol">
            <?php
            include("includes/inc_LPhoto.php");
            ?>
        </div>
        <div id="footer">
            <?php
            include("includes/inc_footer.php");
            ?>
        </div>
    </div>
    </div>
</body>

</html>