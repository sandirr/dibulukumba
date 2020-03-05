<?php
if (isset($_POST['cariP'])) {
    $ap = $_POST['dari'] . "." . "UPG";
    $tombol = $_POST['cariP'];

    if (isset($_POST['tglP'])) {
        $dtArray1 = explode("-", $_POST['tglPP']);
        $dtArray2 = explode("-", $_POST['tglB']);
        $dt = $dtArray2[2] . "-" . $dtArray2[1] . "-" . $dtArray2[0] . "." . $dtArray1[2] . "-" . $dtArray1[1] . "-" . $dtArray1[0];
        $search = "fulltwosearch";
        // $dt = $_POST['tglB'] . "." . $_POST['tglPP'];
        // 
    } else {
        $dtArray2 = explode("-", $_POST['tglB']);
        $dt = $dtArray2[2] . "-" . $dtArray2[1] . "-" . $dtArray2[0] . "." . "NA";
        $search = "fullsearch";
    }
    $ps = $_POST['pDewasa'] . "." . $_POST['pAnak'] . "." . $_POST['pBayi'];
    $sc = $_POST['kelasP'];
    $ft = $_POST['fleks'];
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
        <img src="images/icons/Traveloka_Primary_Logo.png" alt="Traveloka-Primary_Logo" width="45%">
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
            <?php
            if ($ft == 1) {
                echo "window.open('https://www.traveloka.com/id-id/flight/$search?ap=$ap&dt=$dt&ps=$ps&sc=$sc&ft=1')";
            } else {
                echo "window.open('https://www.traveloka.com/id-id/flight/$search?ap=$ap&dt=$dt&ps=$ps&sc=$sc')";
            }
            ?>
        }, 3000)
        setTimeout(function() {
            window.location = "index.php";
        }, 3001)
    </script>
</body>

</html>