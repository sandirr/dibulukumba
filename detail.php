<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include 'connect.php';
    include 'db.php';
    $q = mysqli_query($con, "SELECT * FROM oblib WHERE id=$id");
    $q2 = mysqli_query($con, "SELECT * FROM oblib ORDER BY RAND() LIMIT 4");
    $ke = mysqli_fetch_all($q, MYSQLI_ASSOC)[0];
    $ke2 = mysqli_fetch_all($q2, MYSQLI_ASSOC);
    // var_dump($ke2);
} else {
    header('Location:index.php');
}
$_POST['judul'] = $ke['nama'];
include 'partials/header.php';
?>

<?php
include 'partials/fix-but.php';
?>
<style>
    section.panduan {
        position: relative;
        margin-bottom: -20px;
        z-index: 1
    }

    section.etiket,
    footer {
        position: relative;
        z-index: 1;
    }
</style>
<div class="row">
    <div class="container">
        <div class="col l4">
            <div class="fix" style='position: fixed;'>
                <section>
                    <h5 class="center">Tak Kalah Keren</h5>
                    <ul class="collection">
                        <?php foreach ($ke2 as $key) : ?>
                            <?php if ($key['id'] != $ke['id']) : ?>

                                <li class="collection-item avatar">
                                    <img src="images/<?= $key['gambar'] ?>" width="100px" class="circle">
                                    <a href="detail.php?id=<?= $key['id'] ?>"><span class="title"><?= $key['nama'] ?></span></a>
                                    <p style="font-size: 12.5px;">
                                        <?php echo substr($key['cardkonten'], 0, 48) . "..." ?>
                                    </p>
                                </li>

                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </section>
            </div>
        </div>

        <div class="col l8 s12">
            <section class="detail scrollspy" id="konten-b">
                <div class="row">
                    <div class="col l12 s12">
                        <h3 class="center"><?= $ke['nama'] ?></h3>
                        <div class="konten"><?= $ke['konten'] ?></div>
                    </div>

                </div>
            </section>
        </div>
    </div>
</div>
<div class="row">
    <section id="konten-a" class="panduan scrollspy grey lighten-2">
        <div class="container panduan">
            <h4 class="center">Panduan ke <?= $ke['nama'] ?></h4>
            <blockquote class="center red-text text-darken-2">Peringatan! panduan ini hanya berlaku jika anda akan memulai perjalanan di kota Makassar / Bulukumba</blockquote>
            <ol>
                <li>Jika anda sedang di luar Sulawesi selatan, kamu mesti ke Sulawesi selatan dulu karena Bulukumba terletak di Sulawesi selatan bagian timur. Kamu bisa pesan tiket pesawat <a href="#fix-oi">di sini<i class="material-icons">airplanemode_active</i></a>.</li>
                <li>Setelah sampai di Bandara Internasional Sultan Hasanuddin, anda bisa menggunakan bis damri menuju ke lapangan Karebosi. Kemudian memesan layanan transportasi online menuju <a target="_blank" href="https://goo.gl/maps/WKUvuMwrjHozBstaA">terminal Mallengkeri<i class="material-icons">directions</i></a>. Atau bisa juga dari bandara, langsung memesan transportasi online menuju <a target="_blank" href="https://goo.gl/maps/WKUvuMwrjHozBstaA">terminal mallengkeri<i class="material-icons">directions</i></a>.</li>
                <li>Di terminal Mallengkeri, tersedia banyak sekali layanan minibus yang siap mengantar anda <strong>langsung</strong> menuju <a target="_blank" href="<?= $ke['lokasi'] ?>"><?= $ke['nama'] ?><i class="material-icons">directions</i></a> Bulukumba dengan transportasi yang sejauh 200km hanya berbiaya 80 hingga 150 ribu rupiah.</li>
                <li>Namun, jika anda memulai perjalanan dari kota Bulukumba, anda harus menuju <a target="_blank" href="https://goo.gl/maps/GGbyHht4DotfghFNA">terminal Bulukumba<i class="material-icons">directions</i></a> terlebih dahulu dengan menggunakan jasa ojek pangkalan, angkutan kota, atau berjalan kaki. Setelah sampai di terminal Bulukumba, gunakan jasa angkutan kota / pete-pete yang punya tujuan ke <a target="_blank" href="<?= $ke['lokasi'] ?>"><?= $ke['nama'] ?><i class="material-icons">directions</i></a> dengan biaya sekitar 25 hingga 50 ribu rupiah.</li>
                <li>Setalah sampai di <?= $ke['nama'] ?>, jangan lupa <a href="#fix-oe">pesan penginapan
                        <i class="material-icons">hotel</i></a> yah!</li>
            </ol>

        </div>
    </section>
</div>
<div class="row detail-responsive">
    <div class="col s12">

        <section>
            <h5 class="center">Tak Kalah Keren</h5>
            <ul class="collection">
                <?php foreach ($ke2 as $key) : ?>
                    <?php if ($key['id'] != $ke['id']) : ?>

                        <li class="collection-item avatar">
                            <img src="images/<?= $key['gambar'] ?>" width="100px" class="circle">
                            <a href="detail.php?id=<?= $key['id'] ?>"><span class="title"><?= $key['nama'] ?></span></a>
                            <p style="font-size: 12.5px;">
                                <?php echo substr($key['cardkonten'], 0, 48) . "..." ?>
                            </p>
                        </li>

                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </section>

    </div>
</div>
<?php
include 'partials/etiket.php';
include 'partials/footer.php';
include 'partials/t-nginap.php';
include 'partials/t-pesawat.php';
?>
<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/my-js.js"></script>
<script>
    var gambar = document.querySelectorAll('.detail img')

    gambar.forEach((g) => {
        g.classList.add('materialboxed');
        g.addEventListener('click', () => {
            g.style.margin = '0';
        })
    })

    var materialbox = document.querySelectorAll('.materialboxed');
    M.Materialbox.init(materialbox);
</script>
</body>

</html>