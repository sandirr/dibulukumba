<?php
session_start();
if (!isset($_SESSION['masuk']) || !isset($_GET['update'])) {
    header('Location:index.php');
}
include 'connect.php';
include 'db.php';
$id = $_GET['update'];
$quer1 = mysqli_query($con, "SELECT * FROM oblib WHERE id=$id");
$ery = mysqli_fetch_assoc($quer1);
if (isset($_POST["submit"])) {
    if (ubah($_POST) > 0) {
        echo "<script>
					alert('Data berhasil diubah!');
					document.location.href = 'admin.php';
				</script>
			";
    } else {
        echo "<script>
					alert('Data gagal diubah!');
					document.location.href = 'admin.php';
				</script>";
    }
}
$_POST['judul'] = 'Update';
$_POST['ceklink'] = true;
include 'partials/header.php';
?>

<div class="container">
    <h4 class="center">Update Data</h4>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $id; ?>">
        <table border="0">
            <tr>
                <td><label for="nama">Nama </label></td>
                <td> : </td>
                <td><input id="nama" type="text" name="nama" value="<?= $ery['nama']; ?>" required></td>
            </tr>
            <tr>
                <td><label for="lokasi">Lokasi </label></td>
                <td> : </td>
                <td><input id="lokasi" type="text" name="lokasi" value="<?= $ery['lokasi']; ?>" required></td>
            </tr>

            <tr>
                <td><label>Konten </label></td>
                <td> : </td>
                <td><textarea name="konten" class="ckeditor" id="editor1" cols="30" rows="10"><?= $ery['konten']; ?></textarea></td>
                <script>
                    CKEDITOR.replace('editor1');
                </script>
            </tr>

            <tr>
                <td><label for="card-konten">Card-konten </label></td>
                <td> : </td>
                <td><textarea name="card-konten" id="card-konten"><?= $ery['cardkonten']; ?></textarea></td>
            </tr>
            <input type="hidden" name="gambarLama" value="<?= $ery['gambar']; ?>">
            <tr>
                <td><label for="gambar">Gambar </label></td>
                <td> : </td>
                <td><img src="images/<?= $ery['gambar']; ?>" alt="" width="200px"></td>
            </tr>
            <tr>
                <td><label for="gambar"> Ubah Gambar </label></td>
                <td> : </td>
                <td><input type="file" name="gambar"></td>
            </tr>
            <tr>
                <td colspan="3">
                    <button class="blue accent-2 white-text" type="submit" name="submit" style="padding: 12px;">KIRIM!</button>
                </td>
            </tr>

        </table>
    </form>
    <br><br>
    <br><br>
</div>

<!--JavaScript at end of body for optimized loading-->
<script src="js/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/my-js.js"></script>
</body>

</html>