<?php
$twhere ="";
if($_SESSION['login_type'] != 1)
  $twhere = "  ";
?>

<?php 
    // switch between admin(1) and user(2)
    $where = "";
    if($_SESSION['login_type'] == 0){
        $where = " where id = '{$_SESSION['login_id']}' ";
    }elseif($_SESSION['login_type'] == 2){
        $where = " where user_id = '{$_SESSION['login_user_id']}' ";
    }
    
?>
<?php if($_SESSION['login_type'] == 2) { ?>
<?php 
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM accounts a INNER JOIN users u ON(a.user_id = u.id) where a.user_id = ".$_GET['id'])->fetch_array();
	foreach($qry as $k => $v){
		$$k = $v;
	}
}
?>    
<!-- For Users with Account Registered and have Funds to Raise -->
<section class="py-5 my-5">
    <div class="overlay overlay-bg bg-aquamarine"></div>
    <div class="container">
        <div class="row">
            <div class="col-12 align-right pt-4 pb-2">
                <a href="./index.php?page=profile_list" type="button" class="btn btn-lavander px-3 py-2">
                    <i class="fa fa-users pe-1 text-aquamarine"></i>  View Other Donees 
                </a>
            </div>
        </div>
        <hr class="mt-0"/>
        <?php
            $user_id = $_SESSION['login_id'];
            $acct_id = $_GET['id'];
            $qry = $conn->query("SELECT * FROM accounts a INNER JOIN users u ON(a.user_id = u.id) where a.id =" .$acct_id);
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
                        
                        <form action="" id="manage_user_gcash_donation" >
                        <?php 
                        $account_id = $_GET['id'];
                        ?>
                        <input type="hidden" name="account_id" id="account_id" value="<?php echo $account_id ?>">
                        <input type="hidden" name="user_type" id="user_type" value="2">
                        <input type="hidden" name="gcash_fee" id="gcash_fee" value="0.02">
                        <input type="hidden" name="gcash_abuloy_fee" id="gcash_abuloy_fee" value="0.03">
                        <label for="amount" class="d-flex text-lavander fw-800 justify-content-center fs-larger">Enter Amount</label>
                        <p for="amount" class="text-black fs-small hide">A minimum of ₱ 25.00 and above is appreciated.</p>
                        <div class="input-group mb-3 mt-3">
                            <span class="input-group-text fw-bold fs-larger px-auto px-4">₱</span>
                            <input type="number" name="gcash_amount" id="gcash_amount" class="form-control text-blackish amount-input fw-bold fs-larger py-0 px-auto text-center" aria-label="Amount (to the nearest peso)" style="height:60px;font-size:50px" required>
                            <span class="input-group-text fw-bold fs-larger px-auto px-4">.00</span>
                            <small id="msg"></small>
                        </div>
                        <div class="form-check py-2">
                            <input type="checkbox" class="form-check-input" name="agreement" id="agreement" required>
                            <label class="form-check-label pt-1 ps-2" for="agreement">I agree to <a href="./index.php?page=terms-and-conditions">Terms & Conditions</a></label>
                        </div>
                        <a id="user_acct_id_link" href="index.php?page=donate-confirmation&id=<?php echo $account_id ?>" class="hide"></a>
                        <button type="submit" class="btn btn-lavander col-12 fs-larger text-uppercase p-2 align-center" >
                            DONATE
                        </button>
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
                        <?php if(isset($row['d_summary'])){ printf('%s', $row['d_summary']); } ?>
                    </div>
                    </div>
                </div>
            </div>                                  
        </div>
        <?php endif ?>
    </div>
</section>

    
<?php } else { ?> 
<!-- For Donators with No Account or Fund to Raise -->
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
            $accnt_id = $_GET['id'];
            $qry = $conn->query("SELECT * FROM accounts WHERE id = ".$accnt_id);
            if($row= $qry->fetch_assoc()):
                $act_id = $row['id'];
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
                
                
            </div>
            
            <div class="col-lg-5 mt-lg-5 pt-lg-5">
                <div class="card align-m p-10" style="padding:40px;">
                    <div class="card-body">
                        <form action="" id="manage_gcash_donation" >
                        <input type="hidden" name="account_id" id="account_id" value="<?php echo $act_id ?>">
                        <input type="hidden" name="user_type" id="user_type" value="2">
                        <input type="hidden" name="gcash_fee" id="gcash_fee" value="0.02">
                        <input type="hidden" name="gcash_abuloy_fee" id="gcash_abuloy_fee" value="0.03">
                        <label for="amount" class="d-flex text-lavander fw-800 justify-content-center fs-larger">Enter Amount</label>
                        <p for="amount" class="text-black fs-small hide">A minimum of ₱ 25.00 and above is appreciated.</p>
                        <div class="input-group mb-3 mt-3">
                            <span class="input-group-text fw-bold fs-larger px-auto px-4">₱</span>
                            <input type="number" name="gcash_amount" id="gcash_amount" class="form-control text-blackish amount-input fw-bold fs-larger py-0 px-auto text-center" aria-label="Amount (to the nearest peso)" style="height:60px;font-size:50px" required>
                            <span class="input-group-text fw-bold fs-larger px-auto px-4">.00</span>
                            <small id="msg"></small>
                        </div>
                        <div class="form-check py-2">
                            <input type="checkbox" class="form-check-input" name="agreement" id="agreement" required>
                            <label class="form-check-label pt-1 ps-2" for="agreement">I agree to <a href="./index.php?page=terms-and-conditions">Terms & Conditions</a></label>
                        </div>
                        <a id="acct_id_lnk" href="index.php?page=donate-confirmation&id=<?php echo $act_id ?>" class="hide"></a>
                        <button type="submit" class="btn btn-lavander col-12 fs-larger text-uppercase p-2 align-center" >
                            DONATE
                        </button>
                    </div>
                </div>
                <div class="col-lg-2 mx-auto align-center py-1 px-1 col-lg-12 col-md-12 col-sm-12 mt-4 mb-0 fw-bold" style="height:20px"><p>OR</p></div>
                <div class="col-lg-8 col-md-8 col-sm-5 mx-auto align-center py-1 px-1 mt-4 mb-2">
                    <a target="_blank" class="text-lavander col-lg-8 col-md-10 col-sm-12 py-1 no-style d-flex align-items-center align-left" style="font-size:24px;border-radius:25px;width:100%" id="shareBtn" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fabuloy.ph%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"><i class="fab fa-facebook fa-2x px-3"></i><span class="pt-2">Share to Facebook</span></a>
                    <!-- <a href="donees.php" class="btn btn-lavander p-1">Share to Facebook </a> -->
                </div>
                               
            </div>
        </div> 
        <?php endif ?>
         
        <div class="col-lg-7 py-3 px-2">
            <?php
                $account_id = $_GET['id'];
                $qry = $conn->query("SELECT *,SUM(g.gcash_amount) as total_raised FROM gcash_payments g INNER JOIN accounts a ON a.id = g.account_id where a.id =".$account_id);            
                if($row= $qry->fetch_assoc()): $goal_amount = $row['d_goal_amount'];
            ?> 
            <label for="goal-raised-progress" class="fs-larger">
                <span class="larger fw-700">₱<?php echo number_format($row['total_raised'],2, '.', ',') ?></span>
                 raised over ₱<?php echo number_format($goal_amount, 2, '.', ',');?> goal
            </label>
            <?php endif ?>
            <?php
                $account_id = $_GET['id'];
                $total_gcash_amount = $conn->query("SELECT SUM(g.gcash_amount) as total_raised FROM gcash_payments g INNER JOIN accounts a ON a.id = g.account_id where a.id =".$account_id)->fetch_array();
                foreach($total_gcash_amount as $key => $raised){
                    $$key = $raised;
                }
                $the_goal_amount = $conn->query("SELECT d_goal_amount as the_goal_amount FROM accounts WHERE id =".$account_id)->fetch_array();
                foreach($the_goal_amount as $k => $goal){
                    $$k = $goal;
                }
                $raised_percent = $goal > 0 ? ($raised / $goal ) * 100 : 0;
            ?> 
            <div class="col-lg-12 align-center mx-auto p-0">          
                <div style="height: 25px; width:100%; background-color: rgba(148,247,207,0.55);border-radius:25px;">
                    <div class="mh-100 px-5 text-aquamarine text-center" style="width: <?php echo $raised_percent ?>%; height: 100px; background-color: rgba(162,101,230,0.8);border-radius:25px;font-size:17px;"> <?php echo $raised_percent ?>% </div>
                </div>
            </div> 
        </div>
        
        <?php
            $account_id = $_GET['id'];
            $qry = $conn->query("SELECT * FROM accounts where id =".$account_id);
            if($row= $qry->fetch_assoc()):
                
            $bdate = $row['d_birthdate'];
            $dod = $row['d_date_of_death'];
            $goal_amount = $row['d_goal_amount'];
        ?>       
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
                    <?php if(isset($row['d_summary'])){ printf('%s', $row['d_summary']); } ?>
                    </div>
                    </div>
                </div>
            </div>                                  
        </div>
        <?php endif ?>
        
    </div>
</section>

<?php } ?>

<script>
//  data-toggle="modal" data-target="#manage_user_gcash"
// $('#manage_user_donation').click(function(){
//     uni_modal('Donation','donate-confirmation.php?id=')
// })     

$('#manage_user_gcash_donation').submit(function(e){
    e.preventDefault()
    $('input').removeClass("border-danger")
    start_load()
    $.ajax({
        url:'ajax.php?action=save_user_gcash_donate',
        data: new FormData($(this)[0]),
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST',
        success:function(resp){
            if(resp == 1){
                var user_acct_id_link = $("#user_acct_id_link").attr("href");
                console.log(user_acct_id_link);
                // alert_toast('Preview your donation',"info");
                setTimeout(function(){
                    location.replace(user_acct_id_link);
                },1250)
            }else if(resp == 2){
                end_load()
            }
        }
    })
})

$('#manage_gcash_donation').submit(function(e){
    e.preventDefault()
    $('input').removeClass("border-danger")
    start_load()
    $.ajax({
        url:'ajax.php?action=save_gcash_donate',
        data: new FormData($(this)[0]),
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST',
        success:function(resp){
            if(resp == 1){
                var acct_id_lnk = $("#acct_id_lnk").attr("href");
                // alert_toast('Preview your donation',"info");
                setTimeout(function(){
                    location.replace(acct_id_lnk);
                },1250)
            }else if(resp == 2){
                // end_load()
            }
        }
    })
})
</script>