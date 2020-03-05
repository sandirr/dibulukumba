<?php

if (isset($_POST['submit'])) {
    include "classes/class.phpmailer.php";
    $nama = $_POST['name'];
    $email = $_POST['email'];
    $pesan = htmlspecialchars($_POST['pesan']);

    $mail = new PHPMailer;
    $mail->IsSMTP();
    $mail->SMTPSecure = ‘tls’;
    $mail->Host = "irsandi.id"; //hostname masing-masing provider email
    $mail->SMTPDebug = 2;
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = "admin@irsandi.id"; //user email
    $mail->Password = "wCkHQmhvd27Ptpi"; //password email
    $mail->SetFrom("$email", "$nama"); //set email pengirim
    $mail->Subject = "Pesan dari $email"; //subyek email
    $mail->AddAddress("admin@irsandi.id", "Andi Irsandi"); //tujuan email
    $mail->MsgHTML("$pesan");
    if ($mail->Send()) {
        echo "
        <script>
        alert('Email berhasil dikirim!');
        document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Email gagal dikirim!');
        document.location.href = 'index.php';
        </script>
        ";
    }
}
$_POST['judul'] = 'Hubungi';
$_POST['ceklink'] = true;
include 'partials/header.php';
?>
<section id="contact" class="contact">
    <div class="container">

        <div class="row">
            <div class="col m5 s12">
                <div class="card-panel blue accent-2 center white-text">
                    <i class="material-icons medium">email</i>

                    <p>Jika tidak bisa menggunakan form ini, langsung email ke <b>admin@irsandi.id</b></p>
                </div>
                <ul class="collection with-header">
                    <li class="collection-header">
                        <h4>Aturan</h4>
                    </li>
                    <li class="collection-item">Tanpa Sara</li>
                    <li class="collection-item">Tanpa intimidasi</li>
                    <li class="collection-item">Tanpa Pornografi</li>
                    <li class="collection-item">Tanpa Spam</li>
                </ul>
            </div>
            <div class="col m7 s12">
                <form action="" method="POST">
                    <div class="card-panel">
                        <h3 class="center">Contact</h3>
                        <div class="input-field">
                            <input type="text" name="name" id="name" required>
                            <label for="name">Nama</label>
                        </div>
                        <div class="input-field">
                            <input class="validate" type="email" name="email" id="email" required>
                            <label for="email">Email</label>
                        </div>
                        <div class="input-field">
                            <textarea class="materialize-textarea" name="pesan" id="pesan" required></textarea>
                            <label for="pesan">Pesan</label>
                        </div>
                        <button type="submit" name="submit" class="btn blue accent-2">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
include 'partials/fix-but.php';
include 'partials/t-nginap.php';
include 'partials/t-pesawat.php';
include 'partials/etiket.php';
include 'partials/footer.php';
?>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/my-js.js"></script>
</body>

</html>