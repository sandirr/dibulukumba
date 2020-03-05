<?php
session_start();
//cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    //cek cookie
    if ($key === base64_encode('kunci')) {
        $_SESSION['masuk'] = true;
    }
}

if (isset($_SESSION["masuk"])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST["masuk"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    //cek usernam
    if (htmlspecialchars($username) === 'irsandi' && $password === 'rahasiasekali') {
        $_SESSION["masuk"] = true;

        //check remember me
        if (isset($_POST["remember"]))
        //buat cookie
        {
            setcookie('id', 'benar', (time() + (24 * 60 * 60)));
            setcookie('key', base64_encode('kunci'), (time() + (24 * 60 * 60)));
        }
        header("Location: index.php");
        exit;
    }
    $error = true;
}
$_POST['judul'] = 'Login';
$_POST['ceklink'] = true;
include 'partials/header.php';

?>

<div class="container bagian-masuk">
    <h3 class="center">Halaman Masuk</h3>

    <?php if (isset($error)) : ?>
        <p style="color: red; font-style: italic">Username/Password Salah</p>
    <?php endif; ?>
    <form method="post" action="">
        <ul>
            <li>
                <label for="user">Username :</label>
                <input type="text" name="username" id="user">
            </li>
            <li>
                <label for="pass">Password :</label>
                <input type="password" name="password" id="pass">
            </li>
            <li>
                <label>
                    <input class="remember" type="checkbox" name="remember" id="remember">
                    <span class="remember"> Ingat Saya</span>
                </label>

            </li>
            <li class=center>
                <button type="submit" name="masuk" class="blue accent-2 white-text" style="padding: 12px 14px; border-radius:8px; margin-top:5%">Masuk</button>
            </li>
        </ul>
    </form>
<?php
include 'partials/t-pesawat.php';
include 'partials/t-nginap.php';
?>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/my-js.js"></script>
</div>
</body>

</html>