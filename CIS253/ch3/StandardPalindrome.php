<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Perfect Palindrome</title>
        <meta http-equiv= "content-type" content= "text/html; charset=iso-8859-1"/>
    </head>
    <body>
    <h1>Standard Palindrome</h1>
        <?php
            function palindrom_checker($test_string){
                
                //removes punctuation and special characters
                $nopunks = preg_replace('/[^A-Za-z0-9/-]/', '', $test_string);
                
                // removes spaces
                $nospace = str_replace(' ', '', $nopunks);

                //lowercase
                $lower = strtolower($nospace);

                //reverse string
                $rev = strrev($lower);
                //create empty string for flipped palindrom
                $pal = "";

                foreach ($rev as $value) {
                    // reversing and concatinating to pal variable
                    $pal.= $value;
                }
                //comparing equality
                if ($lower == $pal){
                    echo '<p>The string, "' . $test_string . '", is a standard palindrom.';
                }else{
                echo '<p>The string, "' . $test_string . '", is not a standard palindrom.';
                }
            }
            $a = "Madam, I'm Adam.";
            $b = "supercalifragilisticexpialidocious";
            palindrom_checker($a);
            palindrom_checker($b);
        ?>
    </body>
</html>