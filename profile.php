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
    

<?php
// query data
// $user = array();
// if(isset($_SESSION['id'])){
//     echo $_SESSION['id'];
//     $user = get_user_info($conn, $_SESSION['id']);
//     print_r($user['firstname']);
//     print_r($user['lastname']);
// }
?>

<section class="py-5 my-5">
    <div class="overlay overlay-bg bg-aquamarine"></div>
    <div class="container">
        <div class="row">
            <div class="col-12 align-right pt-4 pb-2">
                <a href="profile_list" type="button" class="btn btn-lavander px-3 py-2">
                    <i class="fa fa-users pe-1 text-aquamarine"></i>  View Other Fund 
                </a>
            </div>
        </div>
        <hr class="mt-0"/>
        <?php
            $qry = $conn->query("SELECT *,concat(d_firstname,' ',d_lastname) as name FROM accounts $where order by id asc");
            if($row= $qry->fetch_assoc()):
            $bdate = $row['d_birthdate'];
            $dod = $row['d_date_of_death'];
            $goal_amount = $row['d_goal_amount'];
        ?>
        <div class="row">
            <div class="col-lg-7">
                
                <legend for="" class="fw-bold text-lavander text-center">
                    <?php if(isset($row['d_firstname'])){ printf('%s %s', $row['d_firstname'], $row['d_lastname']); } ?>
                </legend>
                <p for="" class="fw-bold text-blackish text-center fs-larger">
                <?php echo date("M d, Y",strtotime($bdate)) ?> - <?php echo date("M d, Y",strtotime($dod)) ?>
                </p>
                <div class="card p-0 bg-solid-silver">
                    <a target="_blank" class="mx-auto"><img class="img-fluid avatar-profile" src="<?php base() ?>/assets/uploads/<?php echo $row['avatar'] ?>" alt=""> </a>
                </div>
                <div class="col-lg-12 py-3 px-2">
                    <label for="goal-raised-progress" class="fs-larger"><span class="larger fw-700">₱5000.00</span> raised over ₱<?php echo number_format($goal_amount, 2, '.', ',');?> goal</label>
                    <div class="col-lg-12 align-center mx-auto p-0">                    
                        <div style="height: 25px; width:100%; background-color: rgba(148,247,207,0.55);border-radius:25px;">
                            <div class="mh-100 px-5 text-aquamarine text-center" style="width: 50%; height: 100px; background-color: rgba(162,101,230,0.8);border-radius:25px;font-size:17px;"> 50% </div>
                        </div>
                    </div> 
                </div>
                
            </div>
            
            <div class="col-lg-5 mt-lg-5 pt-lg-5">
                <div class="col-lg-11 col-md-8 col-sm-5 mx-auto align-center py-1 px-1 mb-2">
                    <a target="_blank" class="text-lavander col-lg-8 col-md-10 col-sm-12 py-1 no-style d-flex align-items-center align-left" style="font-size:24px;border-radius:25px;width:100%" id="shareBtn" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fabuloy.ph%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"><i class="fab fa-facebook fa-2x px-3"></i><span class="pt-2">Share to Facebook</span></a>
                    <!-- <a href="donees.php" class="btn btn-lavander p-1">Share to Facebook </a> -->
                </div>
                <div class="col-lg-2 mx-auto align-center py-1 px-1 col-lg-12 col-md-12 col-sm-12 mb-0" style="height:20px"><p>OR</p></div>
                <div class="col-lg-11 col-md-8 col-sm-5 mx-auto align-center py-2 px-1">
                    <a target="_blank" class="text-lavander py-1 col-lg-12 col-md-12 col-sm-12 no-style d-flex align-items-center align-left" style="font-size:24px;border-radius:25px;width:100%" ><i class="fas fa-donate fa-2x  px-3"></i><span class="pt-2">Add Donation Now</span></a>
                    <!-- <a href="donees.php" class="btn btn-lavander p-1">Share to Facebook </a> -->
                </div>
                
                               
            </div>
        </div>        
        <div class="row">
            <div class="accordion col-12" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h2 class="accordion-header bg-aquamarine text-blackish" id="panelsStayOpen-headingOne">
                    <button class="accordion-button text-purple" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                        Who is <?php if(isset($row['d_firstname'])){ printf('%s %s', $row['d_firstname'], $row['d_lastname']); } ?>?
                    </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body">
                    <?php if(isset($row['d_summary'])){ printf('%s %s', $row['d_summary'], $row['d_summary']); } ?>
                    </div>
                    </div>
                </div>
            </div>                                  
        </div>
        <?php endif ?>
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
                    <a href="<?php base() ?>startnewfund" class="btn btn-lavander btn-round text-uppercase" id="showFundForm">Start A Fund Now <i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i> </a>
                </div>                             
            </div>
            <div class="banner-img-container row align-items-center col-lg-5 col-md-6 col-sm-12 pt-5 pb-100 m-0" id="fundForm">
                <div class="col-lg-12 img-banner img-fluid pb-5 m-0 bg-white">
                    <img src="<?php base() ?><?php echo $row['avatar']; ?>" alt="" style="height:55vh !important;">
                </div>
            </div> 
        </div>
    </div>
</section>

<?php } ?>

