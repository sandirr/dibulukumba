<?php
if (isset($_SESSION["masuk"])) {
    $link = 'logout.php';
    $class = 'material-icons left';
    $pe = 'Logout';
    $admi = '<li><a href="admin.php"><i class="material-icons left">account_circle</i>Dash-Admin</a></li>';
} else {
    $link = 'login.php';
    $class = 'material-icons left login-icon';
    $pe = 'Login';
    $admi = '';
}
?>

<!DOCTYPE html>
<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.css" media="screen,projection" />
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Dicoding Indonesia meta -->
    <meta name="dicoding:email" content="Andi.irsandi765@gmail.com">
    <!-- Import style ku -->
    <link rel="stylesheet" href="css/style-ku.css">
    <!-- web icon -->
    <link rel="icon" type="image/png" href="images/icons/irsandi-01.png">
    <title>DIBULUKUMBA - <?php echo $_POST['judul']; ?></title>
</head>

<body>
    <!-- navbar untuk desktop -->
    <div class="navbar-fixed">
        <nav class="white">
            <div class="container">
                <div class="nav-wrapper">

                    <a href="index.php" class="brand-logo"><img src="images/icons/irsandi.svg" width="120px"><img></a>
                    <a href="" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons blue-text text-accent-2">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <?= $admi; ?>
                        <?php if(isset($_POST['ceklink'])) : ?>
                        <li><a href="index.php#konten-a"><i class="material-icons left">location_on</i>Bulukumba</a></li>
                        <li><a href="index.php#konten-b"><i class="material-icons left">photo_camera</i>Objek Liburan</a></li>
                        <?php else : ?>
                        <li><a href="#konten-a"><i class="material-icons left">location_on</i>Bulukumba</a></li>
                        <li><a href="#konten-b"><i class="material-icons left">photo_camera</i>Objek Liburan</a></li>
                        <?php endif; ?>
                        <li><a href="<?= $link ?>"><i class="<?= $class ?>">power_settings_new</i><?= $pe ?></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <!-- sidenav utk mobile -->
    <ul class="sidenav" id="mobile-nav">
        <li>
            <div class="user-view">
                <div class="background">
                    <img src="images/5df23cc6cfc7f.jpg">
                </div>
                <img class="circle" src="images/icons/irsandi-01.png">
                <span class="white-text name">DIBULUKUMBA</span>
                <a href="#email"><span class="white-text email">admin@irsandi.id</span></a>
            </div>
        </li>
        <?= $admi; ?>
        <?php if(isset($_POST['ceklink'])) : ?>
        <li><a href="index.php#konten-a"><i class="material-icons left">location_on</i>Bulukumba</a></li>
        <li><a href="index.php#konten-b"><i class="material-icons left">photo_camera</i>Objek Liburan</a></li>
        <?php else : ?>
        <li><a href="#konten-a"><i class="material-icons left">location_on</i>Bulukumba</a></li>
        <li><a href="#konten-b"><i class="material-icons left">photo_camera</i>Objek Liburan</a></li>
        <?php endif; ?>
        <li><a href="#fix-oi"><i class="material-icons left">airplanemode_active</i>Tiket Pesawat</a></li>
        <li><a href="#fix-oe"><i class="material-icons left">hotel</i>Penginapan</a></li>
        <li><a href="https://api.whatsapp.com/send?phone=+6282290001995"><i class="material-icons left">record_voice_over</i>Tour Guide</a></li>
        <li><a href="hubungi.php"><i class="material-icons left">message</i>Hubungi Saya</a></li>
        <li><a href="<?= $link ?>"><i class="<?= $class ?>">power_settings_new</i><?= $pe ?></a></li>

    </ul>