<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Formatted Text</title>
        <meta http-equiv= "content-type" content= "text/html; charset=iso-8859-1"/>
    </head>
    <body>
        <?php
            $DisplayValue = 9.876;
                echo "<pre>\n";
                echo "Unformatted text line 1.";
                echo "Unformatted text line 2.";
                echo "$DisplayValue = $DisplayValue";
                echo "</pre>\n";

                echo "<pre>\n";
                echo "Formatted text line 1. \r\n";
                echo "\tFormatted text line 2.\r\n";
                echo "\$DisplayValue = $DisplayValue";
                echo "</pre>\n";
        ?>
    </body>
</html>