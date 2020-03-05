<?php

session_start();
// cek remember me
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    //cek cookie
    if ($key === base64_encode('kunci')) {
        $_SESSION['masuk'] = true;
    }
}
include 'connect.php';
$_POST['judul'] = "Beranda";
include 'partials/header.php';
include 'partials/fix-but.php';
?>

<!-- slider -->
<div class="slider">
    <ul class="slides">
        <li>
            <img src="images/bulukumba1.jpg">
            <div class="caption center-align">
                <h3>Kapal Pinisi</h3>
                <h5 class="light grey-text text-lighten-3">Icon Bulukumba yang punya banyak makna.</h5>
            </div>
        </li>
        <li>
            <img src="images/bulukumba2.jpg">
            <div class="caption left-align">
                <h3>Ayo ke Tebing Apparalang!</h3>
                <h5 class="light grey-text text-lighten-3">Clif diving, lompat indah, dan berenang bisa kamu lakukan
                    di sini.</h5>
            </div>
        </li>
        <li>
            <img src="images/bulukumba3.jpg">
            <div class="caption right-align">
                <h3>Kawasan Adat Ammatoa</h3>
                <h5 class="light grey-text text-lighten-3">Terletak di Kajang Bulukumba. Warna hitam melekat dengan
                    penduduk di desa ini. Bagi mereka, warna tersebut merupakan filosofi hidup.</h5>
            </div>
        </li>
    </ul>
</div>

<!-- konten -->
<section class="konten-a grey lighten-3 scrollspy" id="konten-a">
    <div class="row">
        <h4 class="center">Yuk Liburan di Bulukumba !</h4>
        <div class="container">
            <div class="col l8">
                <div class="bulukumba light" style="text-align: justify;">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kabupaten Bulukumba (Bugis: ᨀᨅᨘᨄᨈᨛ ᨅᨘᨒᨘᨀᨘᨅ) adalah salah satu
                    Daerah Tingkat II di provinsi Sulawesi Selatan, Indonesia. Ibu kota kabupaten ini terletak
                    di
                    Kota Bulukumba. Kabupaten ini memiliki luas wilayah 1.154,67 km² dan berpenduduk sebanyak
                    394.757 jiwa (berdasarkan sensus penduduk 2010). Kabupaten Bulukumba mempunyai 10 kecamatan,
                    27
                    kelurahan, serta 109 desa. Pariwisata di Bulukumba pun sangat beragam. Mulai dari wisata
                    bahari,
                    alam, sejarah, budaya, maupun religi.
                </div>
            </div>
            <div class="col l4 s12" id="lokasi-bul" class="scrollspy">
                <div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d254179.72349901672!2d120.07718560911037!3d-5.483765872960843!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbc017ea85a2b0b%3A0x3030bfbcaf76fb0!2sBulukumba%20Regency%2C%20South%20Sulawesi!5e0!3m2!1sen!2sid!4v1575851313255!5m2!1sen!2sid" width="100%" height="240" frameborder="0" style="border:0;" allowfullscreen="on"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'partials/etiket.php'; ?>

<style>

</style>

<!-- Objek wisata -->
<section class="konten-b scrollspy grey lighten-3" id="konten-b">
    <h4 class="center">Objek Liburan Populer</h4>
    <div class="row">

        <?php
        $q = mysqli_query($con, "SELECT * FROM oblib order by id desc");
        ?>
        <?php foreach ($q as $key) : ?>

            <div class="col s12 m6 l4">
                <div class="card grey lighten-3">
                    <div class="card-image">
                        <img src="images/<?= $key['gambar'] ?>" height="220px">
                    </div>
                    <div class="card-content">
                        <span class="card-title"><?= $key['nama'] ?></span>
                        <p><?= $key['cardkonten'] ?></p>
                    </div>
                    <div class="card-action">
                        <a href="detail.php?id=<?= $key['id'] ?>" class="blue white-text accent-2">Lebih Lanjut!</a>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
    </div>
</section>

<?php
include 'partials/t-pesawat.php';
include 'partials/t-nginap.php';
include 'partials/footer.php';
?>

<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/my-js.js"></script>
</body>

</html>