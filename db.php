<?php
function tambah($dat)
{
    global $con;
    $nama = htmlspecialchars($dat["nama"]);
    $konten = $dat["konten"];
    $lokasi = $dat["lokasi"];
    $ckonten = htmlspecialchars($dat["card-konten"]);

    $gambar =
        upload();
    if (!$gambar) {
        return false;
    }
    $quer = "INSERT INTO oblib VALUES('', '$nama', '$konten', '$gambar', '$ckonten','$lokasi')";
    mysqli_query($con, $quer);
    return mysqli_affected_rows($con);
}


function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //cek gambar apakah diupload
    if ($error === 4) {
        echo "<script> 
			alert('Pilih Gambar dulu');
		</script>";
        return false;
    }

    //benarkah yg diupload upload gambar
    $ekstensiValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiValid)) {
        echo "<script> 
			alert('Anda bukan mengupload gambar');
		</script>";
        return false;
    }

    //cek ukuran gambar
    if ($ukuranFile > 1024000) {
        echo "<script> 
			alert('Ukuran gambar tidak boleh melebihi 1 MB');
		</script>";
        return false;
    }

    //lolos upload
    //generate nama_file
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, 'images/' . $namaFileBaru);
    return $namaFileBaru;
}

function ubah($dat)
{
    global $con;
    $id = $dat["id"];
    $nama = htmlspecialchars($dat["nama"]);
    $lokasi = $dat["lokasi"];
    $konten = $dat["konten"];
    $ckonten = $dat['card-konten'];
    $gambarLama = htmlspecialchars($dat["gambarLama"]);


    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }
    $query = "UPDATE oblib SET nama = '$nama', konten = '$konten', gambar= '$gambar', 
    cardkonten='$ckonten', lokasi='$lokasi'
	WHERE id= $id";
    mysqli_query($con, $query);
    return mysqli_affected_rows($con);
}
