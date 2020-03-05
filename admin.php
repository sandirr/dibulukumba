<?php
session_start();
$_POST['judul'] = 'Dash Admin';
$_POST['ceklink'] = true;
include 'partials/header.php';
if (!isset($_SESSION["masuk"])) {
    header('Location:index.php');
}
include 'connect.php';
require('db.php');
if (isset($_GET['key'])) {
    $id = $_GET['key'];
    mysqli_query($con, "DELETE FROM oblib WHERE id=$id");
    header('Location:admin.php');
}
$query = mysqli_query($con, "SELECT * FROM oblib ORDER BY id DESC");

if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "
				<script>
					alert('Data berhasil ditambahkan!');
					document.location.href = 'admin.php';
				</script>
							";
    } else {
        echo "<script>
					alert('Data gagal ditambahkan!');
					document.location.href = 'admin.php';
				</script>";
    }
}

?>

<!-- Read and Delete -->
<div class="container default">
    <table>
        <tr>
            <td colspan="3"><a href="#" class="tambah">+ Tambah Objek Liburan</a></td>
        </tr>
        <?php foreach ($query as $dat) : ?>
            <tr>
                <td><img src="images/<?php echo $dat["gambar"]; ?>" alt="" width="50px"></td>
                <td><?php echo $dat["nama"]; ?></td>
                <td>
                    <a href="?key=<?php echo $dat["id"]; ?>" onclick="return confirm('Yakin nih mau hapus?')">Hapus </a> |
                    <a href="update.php?update=<?php echo $dat["id"]; ?>" class="update"> Edit</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>



<!-- Create -->
<div class="container tambahdata" id="tambah">
    <a href="admin.php" class="sebelum" style="display:inline-block; padding: 20px; ">&laquo; Kembali</a>
    <h4 class="center">Tambah Data</h4>
    <form action="" method="post" enctype="multipart/form-data">
        <table border="0">
            <tr>
                <td><label for="nama">Nama </label></td>
                <td> : </td>
                <td><input id="nama" type="text" name="nama" required></td>
            </tr>
            <tr>
                <td><label for="lokasi">Lokasi </label></td>
                <td> : </td>
                <td><input id="lokasi" type="text" name="lokasi" required></td>
            </tr>

            <tr>
                <td><label>Konten </label></td>
                <td> : </td>
                <td><textarea name="konten" class="ckeditor" id="editor1" cols="30" rows="10"></textarea></td>
                <script>
                    CKEDITOR.replace('editor1');
                </script>
            </tr>

            <tr>
                <td><label for="card-konten">Card-konten </label></td>
                <td> : </td>
                <td><textarea name="card-konten" id="card-konten" cols="30" rows="10"></textarea></td>
            </tr>

            <tr>
                <td><label for="gambar">Gambar </label></td>
                <td> : </td>
                <td><input id="gambar" type="file" name="gambar"></td>
            </tr>
            <tr>
                <td colspan="3">
                    <button class="blue accent-2 white-text" type="submit" name="submit">KIRIM!</button>
                </td>
            </tr>

        </table>
    </form>
    <br><br>
    <br><br>
</div>

<script src="js/ckeditor/ckeditor.js"></script>

<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/my-js.js"></script>
<script>
    var tambah = document.querySelector('.tambah');
    var sebelum = document.querySelector('.sebelum');

    tambah.addEventListener('click', () => {
        sebelum.parentElement.style.display = 'block';
        tambah.parentElement.parentElement.parentElement.parentElement.style.display = 'none';
    })
</script>
</body>

</html>