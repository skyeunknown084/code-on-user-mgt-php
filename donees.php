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
    <div class="container pt-4">
        <legend class="align-center pt-4 pb-4 text-lavander">
            Our Campaign Donees
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
        <div class="row d-flex p-0">
            <?php
                $id = $_SESSION['login_id'];
                $qry = $conn->query("SELECT *,concat(d_firstname,' ',d_lastname) as name FROM users u INNER JOIN accounts a on u.id = a.user_id where a.user_id = '$id'");
                while($row= $qry->fetch_assoc()):
                    $_SESSION['account_id'] = $row['id'];
                $bdate = $row['d_birthdate'];
                $dod = $row['d_date_of_death'];
                $goal_amount = $row['d_goal_amount'];
            ?>
            <div class="col-md-3 p-0 ps-0 pe-5 pb-4">
                <div class="card p-0 ">
                    <div class="card-body p-0 donee-photo">
                        <a target="_blank" href="#"><img src="assets/uploads/<?php echo $row['avatar'] ?>" alt="" style="width:100%; height: 300px;"></a>
                    </div>
                    <div class="card-footer pb-3 text-center">
                        <div class="desc p-0"><b><?php echo ucwords($row['name']) ?></b><br><?php echo date("M d, Y",strtotime($bdate)) ?> - <?php echo date("M d, Y",strtotime($dod)) ?></div>
                        <div class="desc p-0"><a href="./index.php?page=donate&id=<?php echo $row['id'] ?>" data-id="<?php echo $row['id'] ?>" class="align-center btn btn-lavander p-2">Donate Now</a></div>
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
    <section class="py-5" id="">
    <div class="container pt-4">
        <legend class="align-center pt-4 pb-4 text-lavander">
            Our Campaign Donees
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
        <div class="row d-flex p-0">
            <?php
                $id = $_SESSION['login_id'];
                $qry = $conn->query("SELECT *,concat(d_firstname,' ',d_lastname) as name FROM users u INNER JOIN accounts a on u.id = a.user_id");
                while($row= $qry->fetch_assoc()):
                    $_SESSION['account_id'] = $row['id'];
                $bdate = $row['d_birthdate'];
                $dod = $row['d_date_of_death'];
                $goal_amount = $row['d_goal_amount'];
            ?>
            <div class="col-md-3 p-0 ps-0 pe-5 pb-4">
                <div class="card p-0 ">
                    <div class="card-body p-0 donee-photo">
                        <a target="_blank" href="#"><img src="assets/uploads/<?php echo $row['avatar'] ?>" alt="" style="width:100%; height: 300px;"></a>
                    </div>
                    <div class="card-footer pb-3 text-center">
                        <div class="desc p-0"><b><?php echo ucwords($row['name']) ?></b><br><?php echo date("M d, Y",strtotime($bdate)) ?> - <?php echo date("M d, Y",strtotime($dod)) ?></div>
                        <div class="desc p-0"><a href="./index.php?page=donate&id=<?php echo $row['id'] ?>" data-id="<?php echo $row['id'] ?>" class="align-center btn btn-lavander p-2">Donate Now</a></div>
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
<?php } ?>