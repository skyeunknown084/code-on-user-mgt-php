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
<section class="pt-3" id="">
    
    <div class="collapse navbar-collapse" id="toggleNavbar">
    
        <ul class="navbar-nav ms-auto me-3 flex-right uppercase">
            <?php if($_SESSION['login_type'] != 2) { ?>                                             
            <li class="nav-item">
                <a class="text-blackish-lavander btn-r-square px-3 nav-link" href="<?php base()?>login">Sign In <span class="sr-only">(Sign In)</span></a>
            </li>           
            <li class="nav-item">
                <a class="text-blackish-lavander btn-r-square px-3 nav-link" href="<?php base()?>register">Start A Fund <span class="sr-only">(Start A Fund)</span></a>
            </li>
            <?php } else { ?>         
                <li class="nav-item">
                    <a class="text-blackish-lavander btn-r-square px-3 nav-link" href="<?php base()?>startnewfund">Start A New Fund <span class="sr-only">(Start A Fund)</span></a>
                </li>
            <?php } ?>
            <li class="nav-item">
                <a class="text-blackish-lavander btn-r-square px-3 nav-link" href="<?php base()?>donees">Donate <span class="sr-only">(Donate)</span></a>
            </li>
            <li class="nav-item">
                <a class="text-blackish-lavander btn-r-square px-3 nav-link" href="<?php base()?>contact">Contact <span class="sr-only">(Contact)</span></a>
            </li>
            <li class="nav-item">
            <?php if($_SESSION['login_type'] == 2) { ?>
            <div class="btn-group btn-lg pt-1">
                <?php
                    $qry = $conn->query("SELECT * FROM accounts $where order by id asc");
                    $row= $qry->fetch_assoc()
                ?>
                <button type="button" class="btn btn-lavander btn-round btn-sm py-1 px-3 dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="text-aquamarine" style="font-size:16px"><?php echo ucwords($row['reg_firstname']) ?></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end mt-5">
                    <li><a class="dropdown-item" type="button" href="<?php base() ?>profile_list">My Abuloys</a></li>
                    <hr class="py-0 my-0"/>
                    <li><a class="dropdown-item" type="button" href="<?php base() ?>account_settings"><i class="fa fa-cog pe-2"></i> Account Settings</a></li>
                    <li><a class="dropdown-item" type="button" href="ajax.php?action=logout"><i class="fa fa-power-off pe-2"></i> Logout</a></li>
                </ul>
            </div>
            <li class="hide">
                <span class="text-lavander hide"><?php echo ucwords($_SESSION['login_firstname']) ?></span><a class="dropdown-item" href="ajax.php?action=logout"><i class="fa fa-power-off"></i> Logout</a>
            </li>
            <?php } ?>
            </li>
        </ul>
    </div>
</section>