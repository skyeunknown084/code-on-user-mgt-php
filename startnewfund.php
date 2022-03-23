<?php
// session_start();
// include 'db_connect.php';
//     $system = $conn->query("SELECT * FROM users")->fetch_array();
//     foreach($system as $k => $v){
//     $_SESSION['login_type'][$k] = $v;
//     }
// $twhere ="";
// if($_SESSION['login_type'] != 1)
//   $twhere = "  ";


// if(isset($_GET['id'])){
// 	$qry = $conn->query("SELECT * FROM users where id = ".$_GET['id'])->fetch_array();
// 	foreach($qry as $k => $v){
// 		$$k = $v;
// 	}
// }
?>
<section id="register pt-0" class="py-5">    
    <legend class="text-lavander text-center fw-bold mt-5 pt-0">Create an Account</legend>
    <div class="d-flex justify-content-center px-3 py-0">
        <div class="col-lg-12 container">
            <div class="card card-outline card-success">
                <div class="form-row hide">
                <?php
                    if(isset($_SESSION['messages']))
                    {
                        ?>                            
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong><?php echo $_SESSION['messages']; ?></strong>
                        <button type="button" class="btn-close" id="clear-btn" data-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                        unset($_SESSION['messages']);
                    }
                ?>
                </div>
                <div class="card-body">
                    <form action="" id="create_new_account" class="lavander-form">
                        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
                        <div class="form-row col-md-12 mx-auto">
                            <input type="hidden" name="user_id" value="1">
                             
                            <div class="col-lg-4 col-md-6 col-sm-12 mx-auto">
                                <div class="form-group hide">
                                    <label for="" class="control-label hide">User Role</label>
                                    <input type="hidden" name="type" value="2">                                    
                                </div> 
                                <div class="form-group d-flex justify-content-center align-items-center">
                                    <img src="<?php echo isset($avatar) ? 'assets/uploads/'.$avatar :'assets/img/no-logo.png' ?>" id="cimg" class="img-fluid img-thumbnail p-2">
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label hide">Avatar</label>
                                    <div class="">
                                    <input type="file" class="custom-file-input" id="" name="img" onchange="displayImg(this,$(this))">
                                    <label class="custom-file-label hide" for="">Choose file</label>
                                    </div>
                                </div>
                                
                                <div class="form-group py-3">
                                    <label class="control-label hide">FirstName</label>
                                    <input type="text" class="form-control form-control text-center" name="d_firstname" required value="<?php echo isset($d_firstname) ? $d_firstname : '' ?>" placeholder="First Name*">
                                    <small id="#msg"></small>
                                </div>
                                <div class="form-group py-3">
                                    <label class="control-label hide">MiddleName</label>
                                    <input type="text" class="form-control form-control text-center" name="d_middlename" value="<?php echo isset($d_middlename) ? $d_middlename : '' ?>" placeholder="Middle Name*">
                                    <small id="#mn_msg"></small>
                                </div>
                                <div class="form-group py-3">
                                    <label class="control-label hide">LastName</label>
                                    <input type="text" class="form-control form-control text-center" name="d_lastname" required value="<?php echo isset($d_lastname) ? $d_lastname : '' ?>" placeholder="Last Name*">
                                    <small id="#ln_msg"></small>
                                </div>
                                <div class="form-group py-3">
                                    <label class="control-label hide">BirthDate</label>
                                    <input type="date" class="form-control form-control text-center" name="d_birthdate" required value="<?php echo isset($d_birthdate) ? $d_birthdate : '' ?>" placeholder="Birth Date*">
                                    
                                </div>
                                <div class="form-group py-3">
                                    <label class="control-label hide">Date of Death</label>
                                    <input type="date" class="form-control form-control text-center" name="d_date_of_death" required value="<?php echo isset($d_date_of_death) ? $d_date_of_death : '' ?>" placeholder="Date of Death*">
                                    
                                </div>
                                <div class="form-group py-3">
                                    <label class="control-label">Tell his/her story. What happened?</label>
                                    <textarea cols="30" rows="10" class="form-control form-control text-center" name="d_summary" required value="<?php echo isset($d_summary) ? $d_summary : '' ?>" placeholder=""></textarea>
                                    
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 mx-auto py-3">
                                <div class="form-group  py-3">
                                    <label class="control-label text-center">Goal Amount</label>
                                    <input type="number" class="form-control form-control text-center" name="d_goal_amount" required value="<?php echo isset($d_goal_amount) ? $d_goal_amount : '' ?>" placeholder="0.00">
                                    
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="col-12 text-right justify-content-center d-flex">
                            <button type="submit" class="btn btn-primary me-2">Save</button>
                            <button class="btn btn-secondary" type="button" onclick="location.href = '<?php base() ?>home'">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</section>
<style>
	img#cimg{
		height: 25vh;
        width: 25vh;
        object-fit: fill;
        /* background: url('assets/img/no-logo.png');
        background-repeat: no-repeat;
        background-size: cover; */
		/* border-radius: 100% 100%; */
	}
</style>
<script>
	function displayImg(input,_this) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$('#cimg').attr('src', e.target.result);
	        }
	        reader.readAsDataURL(input.files[0]);
	    }
	}
	$('#create_new_account').submit(function(e){
		e.preventDefault()
		$('input').removeClass("border-danger")
		start_load()
		$.ajax({
			url:'ajax.php?action=save_account',
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
						location.replace('login')
					},750)
				}else if(resp == 2){
					$('#msg').html("<div class='alert alert-danger'>First Name already exist.</div>");
					$('[name="d_firstname"]').addClass("border-danger")
					end_load()
				}
			}
		})
	})
</script>