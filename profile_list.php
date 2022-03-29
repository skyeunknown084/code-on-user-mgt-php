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
        <div class="container pt-4">
            <legend class="align-right pt-4 pb-4 text-lavander">
                <a href="./index.php?page=startnewfund" class="btn btn-lavander px-3 py-1"> <i class="fas fa-plus"></i> Create New Fund</a>
            </legend>
            <div class="align-center col-lg-12 py-1">
                <div class="col-lg-8 align-left">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                        <label class="btn btn-outline-primary" for="btnradio1">Oldest</label>
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                        <label class="btn btn-outline-primary" for="btnradio2">Newest</label>
                    </div>
                </div>                
                <div class="align-right col-lg-4 me-5">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search Name" aria-label="Search Name" aria-describedby="button-addon2">
                        <button class="btn btn-outline-primary" type="button" id="button-addon2"><i class="bi bi-search-heart"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search-heart" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg></i></button>
                    </div>
                    <!-- <input type="search" name="search-donees" class="form-control text-center" id="search-donees" placeholder="Search Name">
                    <a type="button" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search-heart" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
                    </a> -->
                </div>                
            </div>
            <hr class="mt-0"/>
            <div class="row d-flex p-0">
                <?php
                    $id = $_SESSION['login_id'];
                    
                    $qry = $conn->query("SELECT *,concat(d_firstname,' ',d_lastname) as name FROM accounts a INNER JOIN users u on u.id = a.user_id where a.user_id = '$id'");
                    while($row= $qry->fetch_assoc()):
                        $_SESSION['user_id'] = $row['user_id'];
                        $_SESSION['acct_id'] = $row['id'];
                    $bdate = $row['d_birthdate'];
                    $dod = $row['d_date_of_death'];
                    $goal_amount = $row['d_goal_amount'];
                    $profile = $row['avatar'];
                ?>
                <div class="col-md-3 p-0 ps-0 pe-5 pb-4">
                    <div class="card p-0 ">
                        <div class="card-body p-0 donee-photo">
                            <a target="_blank" href="./index.php?page=profile&id=<?php echo $_SESSION['user_id'] ?>" data-id="<?php echo $_SESSION['user_id'] ?>"><img src="assets/uploads/<?php echo $row['avatar'] ?>" alt="" style="width:100%; height: 300px;"></a>
                        </div>
                        <div class="card-footer pb-3 text-center">
                            <div class="desc p-0"><b><?php echo ucwords($row['name']) ?></b><br><?php echo date("M d, Y",strtotime($bdate)) ?> - <?php echo date("M d, Y",strtotime($dod)) ?></div>
                            <div class="desc p-0"><a href="./index.php?page=donate&id=<?php echo $_SESSION['acct_id'] ?>" data-id="<?php echo $_SESSION['acct_id'] ?>" class="align-center btn btn-lavander p-2">Donate Now</a></div>
                        </div>
                        <h6 class="price-raised text-center text-purple"><b>₱100.00</b> raised over <b>₱<?php echo number_format($goal_amount, 2, '.', ',');?></b></h6>
                        <div class="progress">
                            <div class="progress__fill"></div>
                            <span class="progress__text text-center text-lavander">1%</span>
                        </div>
                    </div>                      
                    </div>
                <?php endwhile; ?> 
            </div>
        </div>
        <div class="clearfix"></div>
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
                    <a href="./index.php?page=startnewfund" class="btn btn-lavander btn-round text-uppercase" id="showFundForm">Start A Fund Now <i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i> </a>
                </div>                             
            </div>
            <div class="banner-img-container row align-items-center col-lg-5 col-md-6 col-sm-12 pt-5 pb-100 m-0" id="fundForm">
                <div class="col-lg-12 img-banner img-fluid pb-5 m-0 bg-white">
                    <img src="<?php echo $row['avatar']; ?>" alt="" style="height:55vh !important;">
                </div>
            </div> 
        </div>
    </div>
</section>

<?php } ?>

