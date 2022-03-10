<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>View Files</title>
        <meta http-equiv= "content-type" content= "text/html; charset=iso-8859-1"/>
    </head>
    <body>
        <?php
            $Dir = "files";
            $DirOpen = opendir($Dir);
            while ($CurFile = readdir($DirOpen)) {
                if ((strcmp($CurFile, '.')!= 0) && (strcmp($CurFile, '..') !=0)) {
                    echo "<a href=\"files/". $CurFile . "\">" . $CurFile . "</a><br />";
                }
                closedir($DirOpen);
            }
        ?>
    </body>
</html>