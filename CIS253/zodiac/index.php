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
                    if (isset($_GET['page'])) {
                        switch ($_GET['page']) {
                            case 'site_layout':
                                include('includes/inc_site_layout.php');
                                break;
                            case 'control_structures':
                                include('includes/inc_control_structures.php');
                                break;
                            case 'string_functions':
                                include('includes/inc_string_functions.php');
                                break;
                            case 'web_forms':
                                include('includes/inc_web_forms.php');
                                break;
                            case 'state_information':
                                include('includes/inc_state_information.php');
                                break;
                            case 'home_page'://A value of 'home_page' means to display the default page

                            default:
                                include('includes/inc_home.php');
                                break;
                        }
                    }
                    else {//If no nav link has been selected, then display the default page
                        include('includes/inc_home.php');
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
