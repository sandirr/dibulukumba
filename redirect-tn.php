<?php
if (isset($_POST['cariP'])) {
    $cekin = $_POST['cekin'];
    $durasi = $_POST['durasi'];
    $tamu = $_POST['tamu'];
    $kamar = $_POST['kamar'];
    $dtArray2 = explode("-", $cekin);
    // var_dump($dtArray2);
    $a = mktime(0, 0, 0, $dtArray2[1], $dtArray2[2], $dtArray2[0]);
    $cekout = date('d-m-Y', $a + (24 * 60 * 60 * $durasi));
    $dt = $dtArray2[2] . "-" . $dtArray2[1] . "-" . $dtArray2[0] . "." . $cekout;
} else {
    header('Location:index.php');
}
?>
<!DOCTYPE html>
<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.css" media="screen,projection" />
    <!-- dicoding meta -->
    <meta name="dicoding:email" content="Andi.irsandi765@gmail.com">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Import style ku -->
    <link rel="stylesheet" href="css/style-ku.css">
    <title>Redirect</title>
</head>

<body>
    <!-- navbar untuk desktop -->
    <div class="navbar-fixed">
        <nav class="white">
            <div class="container">
                <div class="nav-wrapper">
                    <a href="index.php#" class="brand-logo"><img src="images/icons/irsandi.svg" width="120px"><img></a>
                </div>
            </div>
        </nav>
    </div>


    <div class="redirect-info center">
        <h3>Anda Sedang diarahkan ke</h3>
        <img src="images/icons/Traveloka_Primary_Logo.png" alt="Traveloka-Primary_Logo" width="50%">
        <h4 class="waktu">Loading</h4>
    </div>

    <script>
        var waktu = document.querySelector('.waktu')
        var hMundur = ["3", "2", "1", "0"];
        var i = 0;
        setInterval(function() {
            waktu.innerHTML = hMundur[i++];
        }, 1000)
        setTimeout(function() {
            <?php echo
                "window.open('https://www.traveloka.com/id-id/hotel/search?spec=$dt.$durasi.$kamar.HOTEL_GEO.100696.Bulukumba%20Regency..$tamu')" ?>
        }, 3000)
        setTimeout(function() {
            window.location = "index.php";
        }, 3001)
    </script>
</body>

</html>