<?php include('db_connect.php') ?>
<?php
$twhere ="";
if($_SESSION['login_type'] != 1)
  $twhere = "  ";
?>
<?php 
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM users where id = ".$_GET['id'])->fetch_array();
	foreach($qry as $k => $v){
		$$k = $v;
	}
}
?>

<?php 
    // switch between admin(1) and user(2)
    $where = "";
    if($_SESSION['login_type'] == 1){
        $where = " where user_id = '{$_SESSION['login_id']}' ";
    }elseif($_SESSION['login_type'] == 2){
        $where = " where user_id = '{$_SESSION['login_id']}' ";
    }
     
    

?>
<section>
    <?php
        $qry = $conn->query("SELECT * FROM accounts $where order by id asc");
        while($row= $qry->fetch_assoc()):
    ?>
    <div class="row">
        <div class="col">
            <h3><?php echo ucwords($row['reg_firstname']) ?></h3>
            <h3><?php echo ucwords($row['reg_lastname']) ?></h3>
            <h3><?php echo ucwords($row['email_add']) ?></h3>
            <h3><?php echo date("Y-m-d",strtotime($row['date_created'])) ?></h3>
        </div>
    </div>
    <?php endwhile ?>
</section>