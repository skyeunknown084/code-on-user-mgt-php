<?php
$twhere ="";
if($_SESSION['login_type'] != 1)
  $twhere = "  ";
?>
<?php 
// if(isset($_GET['id'])){
// 	$qry = $conn->query("SELECT users.*, accounts.* FROM users LEFT JOIN accounts where users.id = accounts.id".$_GET['id'])->fetch_array();
// 	foreach($qry as $k => $v){
// 		$$k = $v;
// 	}
// }
?>
<?php 
    // switch between admin(1) and user(2)
    $where = "";
    if($_SESSION['login_type'] == 1){
        $where = " where id = '{$_SESSION['login_id']}' ";
    }elseif($_SESSION['login_type'] == 2){
        $where = " where id = '{$_SESSION['login_id']}' ";
    }
?>
<?php if($_SESSION['login_type'] == 2) { ?>
    
<section class="py-5" id="">
    <?php
        $id = $_SESSION['login_id'];
        $qry = $conn->query("SELECT * FROM users u INNER JOIN accounts a on u.id = a.user_id where a.user_id = '$id'");
        $row= $qry->fetch_assoc()
    ?>
    <div class="container py-5">
        <div class="row banner-content fullscreen align-items-center justify-content-start pb-4">
            <div class=" col-lg-7 col-md-6 col-sm-12 p-0 mb-4">
                <div class="col-lg-12 pt-5 ps-5">
                    <h3 class="text-blackish fw-700 block pt-5 pe-2">
                        <i>Hi <span class="text-lavander">
                        <?php echo ucwords($row['firstname']) ?>! </span></i>
                        <div class="pe-5 pt-0"><h4 class="pe-5 pt-0 mt-0 text-blackish">You successfully raised <br/>your first fund for</h4></div>
                        <span class="text-aquamarine text-underline"><span class="text-lavander"><?php echo ucwords($row['d_firstname']) ?> <?php if($row['d_middlename']!=''): ?><?php echo $row['d_middlename']; ?>.<?php endif ?> <?php echo ucwords($row['d_lastname']) ?></span></span>
                    </h3><br/>
                    
                    <div class="pe-5 pt-0"><h5 class="pe-5 pt-0 mt-0">Click button below to see your funds now! </h5></div>
                    <a href="./index.php?page=profile_list" class="btn btn-lavander btn-round text-uppercase" id="showFundForm">Go To My Fund <i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i> </a>
                </div>                             
            </div>
            <div class="banner-img-container row align-items-center col-lg-5 col-md-6 col-sm-12 pt-5 pb-100 m-0 px-0 mx-0" id="fundForm">                
                <a href="./index.php?page=profile_list" class="donate-btn btn btn-aquamarine btn-lg-round text-lavander fw-700 fs-larger text-uppercase col-lg-6 col-md-6 col-sm-4 mx-auto my-0  px-0 mx-0" style="position:relative;bottom:-40vh;border-radius:25px;cursor:pointer;box-shadow:2px 2px 2px 2px" id="showFundForm">Donate Now <i class="fas fa-donate ps-2"></i> </a>
                <a href="./index.php?page=donees" class="col-lg-12 img-banner img-fluid m-0 bg-white  px-0 mx-0">
                    <img src="assets/img/banner-illustration-php.png" alt="" class="img-fluid col-lg-12 my-0  px-0 mx-0" style="height:55vh !important;">
                </a>                
            </div>  
        </div>
    </div>
</section>
<?php } else { ?>
    
    <section class="py-5" id="">
    <div class="container py-5">
        <div class="row banner-content fullscreen align-items-center justify-content-start pb-4">
            <div class=" col-lg-7 col-md-6 col-sm-12 p-0 mb-4">
                <div class="col-lg-12 pt-5 ps-5">
                    <h2>Welcome to <div class="text-aquamarine text-underline fw-900 pb-4"><span class="text-lavander">Abuloy</span></div></h2>
                    <div class="pe-5 pt-0"><h4 class="pe-5 pt-0 mt-0">Your can now help your love ones to raised a fund.</h4></div>
                    <a href="./index.php?page=register" class="btn btn-lavander btn-round text-uppercase" id="showFundForm">Start A Fund Now <i class="fas fa-hand-holding-heart ps-2"></i> </a>
                    
                </div>                             
            </div>
            <div class="banner-img-container row align-items-center col-lg-5 col-md-6 col-sm-12 pt-5 pb-100 m-0 px-0 mx-0" id="fundForm">                
                <a href="./index.php?page=profile_list" class="donate-btn btn btn-aquamarine btn-lg-round text-lavander fw-700 fs-larger text-uppercase col-lg-6 col-md-6 col-sm-4 mx-auto my-0  px-0 mx-0" style="position:relative;bottom:-40vh;border-radius:25px;cursor:pointer;box-shadow:2px 2px 2px 2px" id="showFundForm">Donate Now <i class="fas fa-donate ps-2"></i> </a>
                <a href="./index.php?page=donees" class="col-lg-12 img-banner img-fluid m-0 bg-white  px-0 mx-0">
                    <img src="assets/img/banner-illustration-php.png" alt="" class="img-fluid col-lg-12 my-0  px-0 mx-0" style="height:55vh !important;">
                </a>                
            </div> 
        </div>
    </div>
</section>

<?php } ?>

