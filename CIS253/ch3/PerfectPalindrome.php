<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Perfect Palindrome</title>
        <meta http-equiv= "content-type" content= "text/html; charset=iso-8859-1"/>
    </head>
    <body>
        <h1>Perfect Palindrome</h1>
        <?php
            function palindrom_checker($test_string){
                //reverse string
                $rev = strrev($test_string);
                //comparing equality
                if ($test_string == $rev){
                    echo '<p>The string, "' . $test_string . '", is a perfect palindrom.';
				}else{
                    echo '<p>The string, "' . $test_string . '", is not a perfect palindrom.';
                }
            }
            $a = "racecar";
            $b = "supercalifragilisticexpialidocious";
            palindrom_checker($a);
            palindrom_checker($b);
        ?>
    </body>
</html>