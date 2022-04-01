<footer>
    <div id="footertext">
        <?php
            $ProverbFileName = "proverbs.txt";
            $ProverbArray = file($ProverbFileName, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            if ($ProverbArray===FALSE)
                echo "There are no proverbs available.\n";
            else if (count($ProverbArray)==0)
                echo "There are no proverbs available.\n";
            else {
                $i = rand(0,count($ProverbArray)-1);
                echo "&ldquo;" . htmlentities(trim($ProverbArray[$i])) . "&rdquo;\n";
                } 
        ?>
        <nav>
            <a href="index.php?page=home_page">Home Page</a>
            <a href="index.php?page=site_layout">Site Layout</a>
            <a href="index.php?page=control_structures">Control Structures</a>
            <a href="index.php?page=string_functions">String Functions</a>
            <a href="index.php?page=web_forms">Web Forms</a>
            <a href="index.php?page=state_information">State Information</a>
        </nav>
    </div>
    <div id="footerimg"><img src="images/footerzodiac.jpg" alt="zodiac image" width="20%"></div>
    
</footer>