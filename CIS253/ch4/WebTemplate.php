<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Web Template</title>
        <meta http-equiv= "content-type" content= "text/html; charset=iso-8859-1"/>
    </head>
    <body>
        <?php include("inc_header.html");?>
        <div style = "width:20%; text-align: center; float: left">
        <?php include("inc_buttonnav.html");?>
        </div>
        <!--Start of Dynamic Content section -->
        <?php
            if (isset($_GET['content'])) {
                switch ($_GET['content']) {
                    case 'About Me':
                        include('inc_about.html');
                        break;
                    case 'Contact Me':
                        include('inc_contact.html');
                        break;
                    case 'Home':
                        // A value of 'Home' means to
                        // display the default page
                    default:
                        include('inc_home.html');
                        break;
                }
            } else { //No button has been selected
                include('inc_home.html');
            }
        ?>
            
    </body>
</html>