<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Visitor Feedback</title>
        <meta http-equiv= "content-type" content= "text/html; charset=iso-8859-1"/>
    </head>
    <body>
        <h2>Visitor Feedback</h2>
        <hr />
        <?php
            $Dir = "comments";
            if (is_dir($Dir)) {
                $CommentFiles = scandir($Dir);
                foreach($CommentFiles as $FileName) {
                    if (($FileName != ".") && ($FileName != "..")) {
                        $fp = fopen($Dir . "/" . $FileName, "r");
                        if ($fp === FALSE) {
                            echo "There was an error reading file \"$FileName\"<br />\n";
                        } else {
                            echo "From <strong>$FileName</strong><br />";
                            $From = fgets($fp);
                            echo "From: " . htmlentities($From) . "<br />\n";
                            $Email = fgets($fp);
                            echo "Email Address: " . htmlentities($Email) . "<br />\n";
                            $Date = fgets($fp);
                            echo "Date: " . htmlentities($Date) . "<br />\n";
                            echo "Comment:<br />\n";
                            $Comment = "";
                            while (!feof($fp)) {
                                $Comment .= fgets($fp);
                            }
                            echo htmlentities($Comment) . "<br />\n";
                            echo "<hr />\n";
                            fclose($fp);
                        }
                        
                    }
                }
            }
        ?>
    </body>
</html>