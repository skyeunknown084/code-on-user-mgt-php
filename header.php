<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php 
    date_default_timezone_set("Asia/Manila");
    
    ob_start();
    $title = isset($_GET['page']) ? ucwords(str_replace("_", ' ', $_GET['page'])) : "Login";
    ?>
    <title><?php echo $title ?> | <?php echo $_SESSION['system']['name'] ?></title>
    <?php ob_end_flush() ?>
    <meta name="Description" content="Abuloy Philippines raise a fund to honor your love ones"/>
    <!-- Google Fonts (Poppins) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Fonts Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="assets/plugins/toastr/toastr.min.css">
    <!-- DateTimePicker -->
    <link rel="stylesheet" href="assets/dist/css/jquery.datetimepicker.min.css">
    <!-- Theme style -->
    <!-- <link rel="stylesheet" href="assets/dist/css/bs/bootstrap.css"> -->
    <link rel="stylesheet" href="assets/dist/css/custom.css">
    <link rel="stylesheet" href="assets/dist/css/main.css">
    <link rel="stylesheet" href="assets/dist/css/style.css">    
    <link rel="stylesheet" href="assets/dist/css/scrollbar.css">    
    <!-- JQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    
    
    <title>Abuloy PH</title>
</head>