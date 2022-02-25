<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Number Form</title>
        <meta http-equiv= "content-type" content= "text/html; charset=iso-8859-1"/>
    </head>
    <body>
        <?php
            $DisplayForm - TRUE;
            $Number = "";
            if (isset($_POST['Submit'])) {
                $Number = $_POST['Number'];
                if (is_numeric($Number)) {
                    $DisplayForm = FALSE;
                } else {
                    echo "<p>You need to enter a numeric value.</p>\n";
                    $DisplayForm = TRUE;
                }
            }
            if ($DisplayForm) {
        ?>
            <form name="NumberForm" action="NumberForm.php" method="post">
                <p>Enter a number: <input type="text" name="Number" value= "<?php echo $Number; ?>"/></p>
                <p><input type="reset" value="Clear Form">&nbsp;&nbsp;<input type="submit" name="Submit" value="Send Form">
                </p>
            </form>
        <?php
            }
            else {
                echo"<p>Thank you for entering a number.</p>\n";
                echo"<p>Your number, $Number, squared is " . ($Number*$Number). ".</p>\n";
                echo"<p><a href=\"NumberForm.php\"Try again?</a></p>\n";
            }
        ?>
    </body>
</html>