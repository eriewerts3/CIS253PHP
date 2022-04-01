<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Chinese Zodiac - A Code Demo for PHP</title>
        <meta http-equiv= "content-type" content= "text/html; charset=iso-8859-1"/>
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
                   $ProverbFileName="proverbs.txt";

                   function validateInput($data, $fieldName) {
                    //Checks for string and adds error if empty otherwise returns data through retval variable 
                        global $errorCount;
                        if(empty($data)){
                            echo "\"$fieldName\" is a required field.\n";
                            ++$errorCount;
                            $retval = "";
                        } else {
                            $retval = $data;
                        }
                        return($retval);
                        print($retval);
                    }
                   
                   function displayForm() {
                       ?>
                        <!--Container function for form-->
                            <form action = "UploadProverb.php" method = "post">
                                <p>Chinese Proverb:<br />
                                <textarea rows="6" cols="60" name="Proverb"></textarea>
                                </p>
                                <p><input type="reset" value="Clear Form" />&nbsp; &nbsp;<input type="submit" name="Submit" value="Add Chinese Proverb" /></p>
                            </form>
                        <?php
                   }
                   
                   function saveProverb($data) { 
                        //Writes proverb to proverb.txt p. 271 bottom
                        $retval=true;
                        global $errorCount;
                        $provtext = "proverbs.txt";
                        // Check if proverbs.txt is writable
                        if (is_writable($provtext)) {
                            // Attempts to open proverbs.txt in append mode and if not, displays message and adds error
                            if (!$fp = fopen($provtext, "a")) {
                                echo "Cannot open ($provtext)";
                                ++$errorCount;
                            } else {
                                //Attempts to write $data to proverbs.txt returns message and error if fail(false)
                                $retval= fwrite($fp, $data . "\n");
                                if ($retval === FALSE) {
                                    echo "Cannot write to file";
                                    ++$errorCount;
                                } else {
                                    //closes file
                                    fclose($fp);
                                    //returns value
                                    return $retval;
                                }
                            }
                        } else {
                            echo"($provtext) is not writable.";
                        }
                   }
                   
                   function displayProverbs() {
                        global $ProverbFileName;
                        
                        $ProverbArray = file($ProverbFileName, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                        if ($ProverbArray===FALSE)
                           echo "<p>There are no proverbs available.</p>\n";
                        else if (count($ProverbArray)==0)
                           echo "<p>There are no proverbs available.</p>\n";
                        else {
                           $i = 0;
                           echo "<p><dd>\n";
                           foreach ($ProverbArray as $Proverb) {
                              echo "<dt>Proverb " . ++$i . "</dt>\n";
                              echo "<dd>" . htmlentities($Proverb) . "</dd>\n";
                           }
                           echo "</dd></p>\n";
                           echo "<p><a href='" . $_SERVER['SCRIPT_NAME'] . 
                                 "'>Add another proverb</a></p>\n";
                        } 
                   }
                   
                   $ShowForm = TRUE;
                   $errorCount = 0;
                   $Proverb = "";
                   if (isset($_POST['Submit'])) {
                        $Proverb = validateInput($_POST['Proverb'],"New Proverb");
                        if ($errorCount==0) {
                             saveProverb($Proverb);
                             $ShowForm = FALSE;
                        }
                        else
                             $ShowForm = TRUE;
                   }
                   if ($ShowForm == TRUE) {
                        if ($errorCount>0) // if there were errors
                             echo "<p>Please re-enter the form information below.</p>\n";
                        displayForm($Proverb);
                   } 
                   else {
                        displayProverbs();
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
    </body>
</html>