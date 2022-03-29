<?php
$twhere ="";
if($_SESSION['login_type'] != 1)
  $twhere = "  ";
?>
<?php 
if(isset($_GET['account_id'])){
	$qry = $conn->query("SELECT * FROM accounts where id = ".$_GET['account_id'])->fetch_array();
	foreach($qry as $k => $v){
		$$k = $v;
	}
}
if(isset($_GET['acct_id'])){
	$qry = $conn->query("SELECT * FROM accounts where id = ".$_GET['acct_id'])->fetch_array();
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
    

<section class="py-5 my-5">
    <div class="overlay overlay-bg bg-aquamarine"></div>
    <div class="container">
        <div class="row">
            <div class="col-12 align-right pt-4 pb-2">
                <a href="./index.php?page=profile_list" type="button" class="btn btn-lavander px-3 py-2">
                    <i class="fa fa-users pe-1 text-aquamarine"></i>  View Other Funds 
                </a>
            </div>
        </div>
        <hr class="mt-0"/>
        <?php
            $account_id = $_GET['id'];
            $qry = $conn->query("SELECT * FROM accounts where id = '$account_id'" );
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
                    <a target="_blank" class="mx-auto"><img class="img-fluid avatar-profile" src="./index.php?page=/assets/uploads/<?php echo $row['avatar'] ?>" alt=""> </a>
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
                <div class="card align-m p-10" style="padding:40px;">
                    <div class="card-body">
                        <form action="" id="manage_my_donation"></form>
                        <label for="amount" class="d-flex text-lavander fw-800 justify-content-center fs-larger">Enter Amount</label>
                        <p for="amount" class="text-black fs-small hide">A minimum of ₱ 25.00 and above is appreciated.</p>
                        <div class="input-group mb-3 mt-3">
                        <span class="input-group-text fw-bold fs-larger px-auto px-4">₱</span>
                        <input type="number" name="amount" id="amount" class="form-control text-blackish amount-input fw-bold fs-larger py-0 px-auto text-center" aria-label="Amount (to the nearest peso)" style="height:60px;font-size:50px">
                        <span class="input-group-text fw-bold fs-larger px-auto px-4">.00</span>
                        <small id="msg"></small>
                        </div>
                        <a data-expiry="6" data-description="Payment for services rendered" data-href="https://getpaid.gcash.com/paynow" data-public-key="pk_d1def7eb7d0a89ba8df6b1a2aad5ca87" 
                            onclick="this.href = this.getAttribute('data-href') 
                                +'?public_key=' + this.getAttribute('data-public-key')
                                +'&amp;amount=' + document.getElementById('amount').value
                                +'&amp;fee=' + document.getElementById('amount').value * 0
                                +'&amp;expiry='+this.getAttribute('data-expiry')
                                +'&amp;description=' + this.getAttribute('data-description');" href="https://getpaid.gcash.com/paynow?public_key=pk_d1def7eb7d0a89ba8df6b1a2aad5ca87&amp;amount=100&amp;fee=0&amp;expiry=6&amp;description=Payment for services rendered" target="_blank" 
                                class="btn btn-lavander  fs-larger text-uppercase p-2 align-center" >
                            DONATE
                        </a>
                    </div>
                    <div class="card-body align-m p-5 hide" style="padding:40px;">
                        <form action="">
                            <label for="amount"><h5>Enter Amount</h5></label>
                            <input type="text" name="amount" class="form-control col-md-p-2"><br>
                            <a href="#" class="btn btn-lavander text-uppercase p-1 align-center" ><h5>Donate</h5></a>
                        </form>
                    </div>
                </div>
                <div class="col-lg-2 mx-auto align-center py-1 px-1 col-lg-12 col-md-12 col-sm-12 mt-4 mb-0 fw-bold" style="height:20px"><p>OR</p></div>
                <div class="col-lg-8 col-md-8 col-sm-5 mx-auto align-center py-1 px-1 mt-4 mb-2">
                    <a target="_blank" class="text-lavander col-lg-8 col-md-10 col-sm-12 py-1 no-style d-flex align-items-center align-left" style="font-size:24px;border-radius:25px;width:100%" id="shareBtn" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fabuloy.ph%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"><i class="fab fa-facebook fa-2x px-3"></i><span class="pt-2">Share to Facebook</span></a>
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
    
<section class="py-5 my-5">
    <div class="overlay overlay-bg bg-aquamarine"></div>
    <div class="container">
        <div class="row">
            <div class="col-12 align-right pt-4 pb-2">
                <a href="./index.php?page=donees" type="button" class="btn btn-lavander px-3 py-2">
                    <i class="fa fa-users pe-1 text-aquamarine"></i>  View Other Funds 
                </a>
            </div>
        </div>
        <hr class="mt-0"/>
        <?php
            $account_id = $_GET['id'];
            $qry = $conn->query("SELECT * FROM accounts where id =".$account_id);
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
                    <a target="_blank" class="mx-auto"><img class="img-fluid avatar-profile" src="assets/uploads/<?php echo $row['avatar'] ?>" alt=""> </a>
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
                <div class="card align-m p-10" style="padding:40px;">
                    <div class="card-body">
                        <form action="" id="manage_my_donation"></form>
                        <label for="amount" class="d-flex text-lavander fw-800 justify-content-center fs-larger">Enter Amount</label>
                        <p for="amount" class="text-black fs-small hide">A minimum of ₱ 25.00 and above is appreciated.</p>
                        <div class="input-group mb-3 mt-3">
                        <span class="input-group-text fw-bold fs-larger px-auto px-4">₱</span>
                        <input type="number" name="amount" id="amount" class="form-control text-blackish amount-input fw-bold fs-larger py-0 px-auto text-center" aria-label="Amount (to the nearest peso)" style="height:60px;font-size:50px">
                        <span class="input-group-text fw-bold fs-larger px-auto px-4">.00</span>
                        <small id="msg"></small>
                        </div>
                        <a data-expiry="6" data-description="Payment for services rendered" data-href="https://getpaid.gcash.com/paynow" data-public-key="pk_d1def7eb7d0a89ba8df6b1a2aad5ca87" 
                            onclick="this.href = this.getAttribute('data-href') 
                                +'?public_key=' + this.getAttribute('data-public-key')
                                +'&amp;amount=' + document.getElementById('amount').value
                                +'&amp;fee=' + document.getElementById('amount').value * 0
                                +'&amp;expiry='+this.getAttribute('data-expiry')
                                +'&amp;description=' + this.getAttribute('data-description');" href="https://getpaid.gcash.com/paynow?public_key=pk_d1def7eb7d0a89ba8df6b1a2aad5ca87&amp;amount=100&amp;fee=0&amp;expiry=6&amp;description=Payment for services rendered" target="_blank" 
                                class="btn btn-lavander  fs-larger text-uppercase p-2 align-center" >
                            DONATE
                        </a>
                    </div>
                    <div class="card-body align-m p-5 hide" style="padding:40px;">
                        <form action="">
                            <label for="amount"><h5>Enter Amount</h5></label>
                            <input type="text" name="amount" class="form-control col-md-p-2"><br>
                            <a href="#" class="btn btn-lavander text-uppercase p-1 align-center" ><h5>Donate</h5></a>
                        </form>
                    </div>
                </div>
                <div class="col-lg-2 mx-auto align-center py-1 px-1 col-lg-12 col-md-12 col-sm-12 mt-4 mb-0 fw-bold" style="height:20px"><p>OR</p></div>
                <div class="col-lg-8 col-md-8 col-sm-5 mx-auto align-center py-1 px-1 mt-4 mb-2">
                    <a target="_blank" class="text-lavander col-lg-8 col-md-10 col-sm-12 py-1 no-style d-flex align-items-center align-left" style="font-size:24px;border-radius:25px;width:100%" id="shareBtn" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fabuloy.ph%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"><i class="fab fa-facebook fa-2x px-3"></i><span class="pt-2">Share to Facebook</span></a>
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

<?php } ?>

