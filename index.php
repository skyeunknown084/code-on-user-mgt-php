<?php session_start(); error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">
<?php include 'header.php' ?>
<body>
    <!-- start header Area -->
    <header class="default-header">
        <nav class="navbar navbar-expand-lg navbar-light bg-white bb-aquamarine d-flex fixed-top nav-shadow">
            <div class="container-fluid">
                <a class="navbar-brand nav-brand-box ms-3" href="<?php base() ?>home"><span class="text-aquamarine text-underline fw-700 fs-larger ms-2"></span></a>
                <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#toggleNavbar" aria-controls="toggleNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button> -->
                <?php include 'navbar.php' ?>
            </div>
        </nav>
    </header>
    <!-- end header Area -->
    <!-- start section Area -->    
    <?php
        // get base folder and index
        function base() {
            echo str_replace("index.php","", $_SERVER['PHP_SELF']);
        }
        $URL = explode("/", $_SERVER['QUERY_STRING']);
        // echo '<pre>';
        // print_r($URL);
        // print_r(str_replace("index.php","", $_SERVER['PHP_SELF']).$URL[0]);
        if(file_exists($URL[0] . ".php")){
            
            include($URL[0] . ".php");
        }
        elseif('/') {
            include("home.php");
        }
        elseif('') {
            include("home.php");
        }
        else {
            include("404.php");
        }
    ?>
    <!-- end section Area -->
    
    
    <!-- start Footer Area -->
    <?php include 'footer.php' ?>    
    <!-- end Footer Area -->
</body>
</html>