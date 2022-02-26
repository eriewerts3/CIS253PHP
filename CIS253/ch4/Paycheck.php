<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Paycheck Calculator</title>
        <meta http-equiv= "content-type" content= "text/html; charset=iso-8859-1"/>
    </head>
    <body>
        <?php
            $hours = $_POST["hours"];
            $wage = $_POST["wage"];
            $errors = 0;
            $otWage = 0;
            $otHours = 0;
            
            //checks if hours data in form is a number
            if (is_numeric($hours)) {
                //checks if hours data in form is greater than 0
                if ($hours>0) {
                    if ($hours>40) {
                        $otHours = $hours - 40;
                        $regHours = 40;
                    }
                } else {
                    //code if hours data in form is 0 
                    ++$errors;
                    echo"<p>Hours section needs to be above 0</p>";
                }
                
            } else {
                //code if hours data in form is NaN
                ++$errors;
                echo"<p>Hours section needs to be typed in a numerical format </p>";
            }

            //checks if wage data in form is a number
            if (is_numeric($wage)) {
                //checks if wage data in form is greater than 0
                if ($wage>0) {
                    //Rounds wage number
                    $wage = round($wage, 2);
                    //Calculates Gross income
                    //calculating OT wage
                    if ($hours>40) {
                        $otWage  = $otHours * $wage * 1.5;
                        $gross = $otWage + ($wage * $regHours);
                    } else {
                        $gross = $wage * $hours;
                    }
                } else {
                    //code if wage data in form is 0 
                    ++$errors;
                    echo"<p>Wage section needs to be above 0</p>";
                }
                
            } else {
                //code if wage data in form is NaN
                ++$errors;
                echo"<p>Wage section needs to be typed in a numerical format </p>";
            }
            

            //Resulting statements
            if($errors == 0){
                echo "<p>Based on the employee working ".$hours." hours at a rate of \$".$wage." per hour.</p>";
                echo "<p>The employee's gross income will be: \$" .$gross. ".</p>";
                echo "<p>The overtime wage for this employee is: \$" .$otWage. ".</p>";
            }
        ?>
        <p><a href="Paycheck.html">Calculate another paycheck</a></p>
    </body>
</html>