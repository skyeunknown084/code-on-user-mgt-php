<?php
function success(){
    // session_destroy();
    alert("Thank You for your kind donation");
    header("location:index.php?page=project_list");
}
success();
?>