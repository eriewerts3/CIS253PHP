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
                function displayForm() {
            ?>
                <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
                <p>Picture to Upload:
                <input type="file" name="picture_file" /> (Maximum file size 5MB)
                </p>
                <p><input type="reset" value="Clear Form" />   <input type="submit" name="submit" value="Upload Image" /></p>
                </form>
            <?php
                }//Closing Brace for display form
                function saveImage($Image) {
                     $ImageFolderName = "./images/";
                     $retval = TRUE;
                     if (is_array($Image)) {  // Finds whether a variable is an array
                            if ((!(empty($Image['tmp_name']) || empty($Image['name']))) && ((!isset($Image['error']) || ($Image['error']==UPLOAD_ERR_OK)))) {
                                 $destName =  $ImageFolderName . $Image['name'];
                                 if (move_uploaded_file($Image['tmp_name'], $destName)) { // p. 250 #4
                                    chmod($destName);
                                  }
                                 else {
                                    ++$errorCount;
                                    echo("There was an error while processing your image or you image was an empty file.");
                                 }
                            }
                            else {
                                ++$errorCount;
                                echo"There was a problem processing your image.";
                            }
                       }	 
                    return($retval); 
                }
                
                function displayImage($ImageName) {
                     echo "<img src='images/" . $ImageName . 
                          "' alt='" . $ImageName . 
                          "' title='" . $ImageName . 
                          "' /></p>\n";
                }
                
                $ShowForm = TRUE;
                $errorCount = 0;
                $Image = "";
                if (isset($_FILES['picture_file'])) {
                     if (saveImage($_FILES['picture_file'])===FALSE) {  // function call to saveImage
                          ++$errorCount;
                          $ShowForm = TRUE;
                     }
                     else
                          $ShowForm = FALSE;
                }
                else
                     $ShowForm = TRUE;
                          
                if ($ShowForm == TRUE) {
                     if ($errorCount>0) // if there were errors
                          echo "<p>Please re-enter the form information below.</p>\n";
                     displayForm();
                } 
                else {
                     displayImage($_FILES['picture_file']['name']);
                }
                
                if (($ShowForm === FALSE) || ($errorCount>0)) {
                   echo "<p><a href='" . $_SERVER['SCRIPT_NAME'] . "'>Upload another file</a></p>\n";
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
