<?php
    if(!isset($_SESSION)) { 
        ob_start();
        session_start(); 
    }
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    $server = $_SERVER['SERVER_NAME'];
    $uriArray = explode('/', $_SERVER['REQUEST_URI']);
    if($server === 'localhost') {
        $folder = $uriArray[2]; // Folder name
        if($folder === "admin") {
            $path = '../';
        } else {
            $path = './';
        }
    } else {
        $folder = $uriArray[1]; // Folder name
        if($folder === "admin") {
            $path = '../';
        } else {
            $path = './';
        }
    }
    // Load Classes and functions
    include $path.'Classes/Server.php';


    $server = new Server();
    $s = $server->get_server_data();
    include $s['rel_path'].'partials/functions.php';
    include $s['rel_path'].'Classes/Db.php';
    include $s['rel_path'].'Classes/Request.php';
    include $s['rel_path'].'Classes/Bid.php';
    include $s['rel_path'].'Classes/User.php';
    include $s['rel_path'].'Classes/Review.php';

    
    // Add titles and meta tags here
    if($s['pagename'] == 'index') {
        // Home page
        $title = 'New Site | Lorem Ipsum Dolor'; 
        $meta_tags = '<meta name="description" content="Website will be live soon">'; 
    } else {
        // Default
        $title = 'New Site | Lorem Ipsum Dolor'; 
        $meta_tags = '<meta name="description" content="Website will be live soon">'; 
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- GA Code goes here -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= $meta_tags ?>
    <title><?= $title ?></title>

    <link rel="icon" href="<?= $path; ?>img/browser-icon.png?v=22" type="image/icon type">
    <!-- JQUERY -->
    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Preload fonts -->
    <link rel="preload" as="font" href="<?= $s['rel_path']; ?>font/OpenSans-Regular.woff" type="font/woff" crossorigin="anonymous">
    <link rel="preload" as="font" href="<?= $s['rel_path']; ?>font/OpenSans-SemiBold.woff" type="font/woff" crossorigin="anonymous">
    <link rel="preload" as="font" href="<?= $s['rel_path']; ?>font/OpenSans-Bold.woff" type="font/woff" crossorigin="anonymous">
    
    <!-- STYLE -->
    <link rel="stylesheet" href="<?= $s['rel_path']; ?>css/__base.css?v=22">
    <link rel="stylesheet" href="<?= $s['rel_path']; ?>css/style.css?v=22">
    <link rel="stylesheet" href="<?= $s['rel_path']; ?>css/selectors.css?v=22">
    <link rel="stylesheet" href="<?= $s['rel_path']; ?>css/nav.css?v=22">
    <link rel="stylesheet" href="<?= $s['rel_path']; ?>css/hero.css?v=22">
    <link rel="stylesheet" href="<?= $s['rel_path']; ?>css/footer.css?v=22">
    <link rel="stylesheet" href="<?= $s['rel_path']; ?>css/signup.css?v=22">
    <link rel="stylesheet" href="<?= $s['rel_path']; ?>css/info-cards.css?v=22">
    <link rel="stylesheet" href="<?= $s['rel_path']; ?>css/bg-section.css?v=22">
    <link rel="stylesheet" href="<?= $s['rel_path']; ?>css/logos.css?v=22">
    <link rel="stylesheet" href="<?= $s['rel_path']; ?>css/slider.css?v=22">
    <link rel="stylesheet" href="<?= $s['rel_path']; ?>css/login.css?v=22">
    <link rel="stylesheet" href="<?= $s['rel_path']; ?>css/requests.css?v=22">
    <link rel="stylesheet" href="<?= $s['rel_path']; ?>css/contact.css?v=22">
    <link rel="stylesheet" href="<?= $s['rel_path']; ?>css/faq.css?v=22">
    <link rel="stylesheet" href="<?= $s['rel_path']; ?>css/popup.css?v=22">
    <link rel="stylesheet" href="<?= $s['rel_path']; ?>css/filters.css?v=22">
    <link rel="stylesheet" href="<?= $s['rel_path']; ?>css/review.css?v=22">
    <?php
        if($folder === "admin") {
            echo "<link rel='stylesheet' href='./style.css?v=22'>";
        }
    ?>

    
    <!-- JS -->
    <script src="https://kit.fontawesome.com/bf13f55ede.js" crossorigin="anonymous"></script>
    <script src="<?= $s['rel_path']; ?>js/functions.js?v=22" defer></script>
    <script src="<?= $s['rel_path']; ?>js/main.js?v=22" defer></script>
    <script src="<?= $s['rel_path']; ?>js/popup.js?v=22" defer></script>
    <script src="<?= $s['rel_path']; ?>js/filters.js?v=22" defer></script>
    <script src="<?= $s['rel_path']; ?>js/msg.js?v=22" defer></script>
    <script src="<?= $s['rel_path']; ?>js/request.js?v=22" defer></script>
    
    <?php
        if($folder == "admin") {
            echo "<link rel='stylesheet' href='./style.css?v=22'>";
            echo "<script src='./admin.js?v=22' defer></script>";
        } else {
            echo "<script src='./js/review.js?v=22' defer></script>";
        }
    ?>
   
</head>
<body>
<!-- Admin Check -->
<?php
    $user = new User();
    // $user->check_user_cookie();
    $user->check_user_session();
?>
