<?php
$twhere ="";
if($_SESSION['login_type'] != 1)
  $twhere = "  ";
?>
<?php 
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM accounts where id = ".$_GET['id'])->fetch_array();
	foreach($qry as $k => $v){
		$$k = $v;
	}
}
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
        $qry = $conn->query("SELECT * FROM accounts $where order by id asc");
        $row= $qry->fetch_assoc()
    ?>
    <div class="container pb-5">
        <div class="row banner-content fullscreen align-items-center justify-content-start pb-4">
            <div class=" col-lg-7 col-md-6 col-sm-12 p-0 mb-4">
                <div class="col-lg-12 pt-5 ps-5">
                    <h3 class="text-blackish fw-700 block pt-5 pe-2">
                        <i>Hi <span class="text-lavander">
                        <?php echo ucwords($row['d_firstname']) ?> 
                        <?php if($row['d_middlename']!=''): ?><?php echo $row['d_middlename']; ?>.<?php endif ?> <?php echo ucwords($row['d_lastname']) ?>!</span></i>
                    </h3><br/>
                    <h2>Welcome to <div class="text-aquamarine text-underline fw-900 pb-4"><span class="text-lavander">Abuloy</span></div></h2>
                    <div class="pe-5 pt-0"><h4 class="pe-5 pt-0 mt-0">Your can now help your love ones to raised a fund.</h4></div>
                    <a href="<?php base() ?>profile_list" class="btn btn-lavander btn-round text-uppercase" id="showFundForm">Go to Fund <i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i> </a>
                </div>                             
            </div>
            <div class="banner-img-container row align-items-center col-lg-5 col-md-6 col-sm-12 pt-5 pb-100 m-0" id="fundForm">
                <div class="col-lg-12 img-banner img-fluid pb-5 m-0 bg-white">
                    <img src="<?php base() ?>assets/img/banner-illustration-php.png" alt="" style="height:55vh !important;">
                </div>
            </div> 
        </div>
    </div>
</section>
<?php } else { ?>
    
    <section class="py-5 mt-5" id="">
    <?php
        $qry = $conn->query("SELECT * FROM accounts $where order by id asc");
        $row= $qry->fetch_assoc()
    ?>
    <div class="container py-5">
        <div class="row banner-content fullscreen align-items-center justify-content-start pb-4">
            <div class=" col-lg-7 col-md-6 col-sm-12 p-0 mb-4">
                <div class="col-lg-12 pt-5 ps-5">
                    <h2>Welcome to <div class="text-aquamarine text-underline fw-900 pb-4"><span class="text-lavander">Abuloy</span></div></h2>
                    <div class="pe-5 pt-0"><h4 class="pe-5 pt-0 mt-0">Your can now help your love ones to raised a fund.</h4></div>
                    <a href="<?php base() ?>profile_list" class="btn btn-lavander btn-round text-uppercase" id="showFundForm">Start A Fund Now <i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i> </a>
                </div>                             
            </div>
            <div class="banner-img-container row align-items-center col-lg-5 col-md-6 col-sm-12 pt-5 pb-100 m-0" id="fundForm">
                <div class="col-lg-12 img-banner img-fluid pb-5 m-0 bg-white">
                    <img src="<?php base() ?>assets/img/banner-illustration-php.png" alt="" style="height:55vh !important;">
                </div>
            </div> 
        </div>
    </div>
</section>

<?php } ?>

