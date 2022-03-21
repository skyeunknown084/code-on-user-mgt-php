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

<section class="pb-5" id="home startafund" style="padding-top:50px;height:100%">
    <div class="overlay overlay-bg bg-aquamarine"></div>
    <div class="container">
        <div class="row fullscreen align-items-center justify-content-start">
            <div class="col-lg-8 pt-5">
                <div class="col-lg-12 col-sm-12 p-0 ps-0 pe-5">
                    <?php
                        $qry = $conn->query("SELECT *,concat(d_firstname,' ',d_lastname) as name FROM accounts $where order by id asc");
                        if($row= $qry->fetch_assoc()):
                        $bdate = $row['d_birthdate'];
                        $dod = $row['d_date_of_death'];
                        $goal_amount = $row['d_goal_amount'];
                    ?>
                    <div class="card p-0 ">
                        <div class="card-body p-0 donee-photo">
                            <a target="_blank" href=""><img src="<?php base() ?>/assets/uploads/<?php echo $row['avatar'] ?>" alt=""></a>
                        </div>
                        <div class="card-footer pb-3">
                            <div class="p-0"><?php echo $row['d_firstname']?> <?php echo $row['d_lastname']?> <br><?php echo date("M d, Y",strtotime($bdate)) ?> - <?php echo date("M d, Y",strtotime($dod)) ?></div>
                            <div  class="fb-share-button" data-href="https://abuloy.ph/" data-layout="button_count" data-size="small">
                                
                                <a target="_blank" id="shareBtn" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fabuloy.ph%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a>
                            </div>
                        </div>
                    </div>
                    <?php endif ?>
                </div>
                <div class="main-content-header col-lg-12 col-md-12 p-0 mt-5">
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                Description Here:
                            </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                            </div>
                        </div>
                    </div>                                    
                </div>
            </div>
            <div class="col-lg-4">
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
            </div>
        </div>
    </div>        
</section>

<?php } else { ?>

<section class="pb-5" id="home startafund" style="padding-top:50px;height:100%">
    <div class="overlay overlay-bg bg-aquamarine"></div>
    <div class="container">
        <div class="row fullscreen align-items-center justify-content-start">
            <div class="col-lg-8 pt-5">
                <div class="col-lg-12 col-sm-12 p-0 ps-0 pe-5">
                    <div class="card p-0 ">
                        <div class="card-body p-0 donee-photo">
                            <a target="_blank" href="img_lights.jpg"></a>
                        </div>
                        <div class="card-footer pb-3">
                            <div class="p-0">Jose Rizal<br>01/19/880 - 01/20/1895</div>
                            <div  class="fb-share-button" data-href="https://abuloy.ph/" data-layout="button_count" data-size="small">
                                
                                <a target="_blank" id="shareBtn" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fabuloy.ph%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-content-header col-lg-12 col-md-12 p-0 mt-5">
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                Description Here:
                            </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                            </div>
                        </div>
                    </div>                                    
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card align-m p-10" style="padding:40px;">
                    <div class="card-body">
                        <form action="" id="manage_gcash_donation"></form>
                        <label for="amount" class="d-flex text-lavander justify-content-center fs-larger">Enter Amount</label>
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
            </div>
        </div>
    </div>        
</section>

<?php } ?>
<script>
	function computeGCashPayment(input,_this) {
        // compute gcash payment transaction
        // manipulate data to save on database
	}
	$('#manage_my_donation').submit(function(e){
        
		e.preventDefault()
		$('input').removeClass("border-danger")
		start_load()
		$('#msg').html('')
        
		$.ajax({
			url:'ajax.php?action=save_my_donate',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp == 1){
					alert_toast('Data successfully saved.',"success");
					setTimeout(function(){
						location.replace('profile')
					},750)
				}else if(resp == 2){
					$('#msg').html("<div class='alert alert-danger' role='alert'>Email already exist.</div>");
					$('[name="email_add"]').addClass("border-danger");
					end_load()
				}
			}
		})
	});
    $('#manage_gcash_donation').submit(function(e){
        
		e.preventDefault()
		$('input').removeClass("border-danger")
		start_load()
		$('#msg').html('')
        
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
					alert_toast('Data successfully saved.',"success");
					setTimeout(function(){
						location.replace('profile')
					},750)
				}else if(resp == 2){
					$('#msg').html("<div class='alert alert-danger' role='alert'>Email already exist.</div>");
					$('[name="email_add"]').addClass("border-danger");
					end_load()
				}
			}
		})
	})
</script>