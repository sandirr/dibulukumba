<?php
include 'connect.php';
$data = mysqli_query($con, "SELECT * FROM bandara WHERE pulau='Bali & Nusa Tenggara'");
$data1 = mysqli_query($con, "SELECT * FROM bandara WHERE pulau='Jawa'");
$data2 = mysqli_query($con, "SELECT * FROM bandara WHERE pulau='Kalimantan'");
$data3 = mysqli_query($con, "SELECT * FROM bandara WHERE pulau='Maluku'");
$data4 = mysqli_query($con, "SELECT * FROM bandara WHERE pulau='Papua'");
$data5 = mysqli_query($con, "SELECT * FROM bandara WHERE pulau='Sumatera'");
$data6 = mysqli_query($con, "SELECT * FROM bandara WHERE pulau='Sulawesi'");
?>

<div class="fix-toh" id="fix-oi">
    <div class="row">
        <h4 class="center white-text">Pesan Tiket Pesawat <i class="material-icons small">airplanemode_active</i> </h4>
        <div class="container">
            <section class="t-pesawat white">
                <p class="ket1 center blue accent-2 white-text">
                    Mau liburan di Bulukumba tapi kamu masih di luar Sul-sel? Yuk pesan tiket pesawat dulu !
                </p>

                <form action="redirect-tp.php" method="POST">
                    <div class="col l3 s6">
                        <label for="dari">Dari</label>
                        <select name="dari" id="dari">
                            <optgroup label="<?php echo 'Bali & Nusa Tenggara'; ?>">
                                <?php foreach ($data as $key) : ?>
                                    <option value="<?= $key['id'] ?>"><?= $key['kota'] . " " . "(" . $key['id'] . ")"; ?></option>
                                <?php endforeach; ?>
                            </optgroup>
                            <optgroup label="<?php echo 'Jawa'; ?>">
                                <?php foreach ($data1 as $key) : ?>
                                    <option value="<?= $key['id']; ?>" <?php if ($key['kota'] == 'Jakarta') echo 'selected' ?>><?= $key['kota'] . " " . "(" . $key['id'] . ")"; ?></option>
                                <?php endforeach; ?>
                            </optgroup>
                            <optgroup label="<?php echo 'Kalimantan'; ?>">
                                <?php foreach ($data2 as $key) : ?>
                                    <option value="<?= $key['id'] ?>"><?= $key['kota'] . " " . "(" . $key['id'] . ")"; ?></option>
                                <?php endforeach; ?>
                            </optgroup>
                            <optgroup label="<?php echo 'Maluku'; ?>">
                                <?php foreach ($data3 as $key) : ?>
                                    <option value="<?= $key['id'] ?>"><?= $key['kota'] . " " . "(" . $key['id'] . ")"; ?></option>
                                <?php endforeach; ?>
                            </optgroup>
                            <optgroup label="<?php echo 'Papua'; ?>">
                                <?php foreach ($data4 as $key) : ?>
                                    <option value="<?= $key['id'] ?>"><?= $key['kota'] . " " . "(" . $key['id'] . ")"; ?></option>
                                <?php endforeach; ?>
                            </optgroup>
                            <optgroup label="<?php echo 'Sumatera'; ?>">
                                <?php foreach ($data5 as $key) : ?>
                                    <option value="<?= $key['id'] ?>"><?= $key['kota'] . " " . "(" . $key['id'] . ")"; ?></option>
                                <?php endforeach; ?>
                            </optgroup>
                            <optgroup label="<?php echo 'Sulawesi'; ?>">
                                <?php foreach ($data6 as $key) : ?>
                                    <option value="<?= $key['id'] ?>"><?= $key['kota'] . " " . "(" . $key['id'] . ")"; ?></option>
                                <?php endforeach; ?>
                            </optgroup>

                        </select>

                    </div>
                    <div class="col l3 s6">
                        <label>Menuju</label>
                        <input type="hidden" value="UPG" name="menuju">
                        <input type="text" value="Makassar (UPG)" disabled />
                    </div>

                    <div class="col l2 s4">
                        <label>Dewasa</label>
                        <select class="browser-default" name="pDewasa">
                            <option value="1" selected>1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                    <div class="col l2 s4">
                        <label>Anak-anak</label>
                        <select class="browser-default" name="pAnak">
                            <option value="0" selected>0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                    <div class="col l2 s4">
                        <label>Bayi</label>
                        <select class="browser-default" name="pBayi">
                            <option value="0" selected>0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>

                    <div class="col l12 s12"></div>

                    <div class="col l3 s6">
                        <label for="tb">Tanggal Berangkat</label>
                        <input class="tb" type="date" id="tb" name="tglB" required value=<?php echo date('Y-m-d'); ?>>
                    </div>

                    <div class=" col l3 s6">
                        <label>
                            <input type="checkbox" class="tp1" name="tglP" />
                            <span style="font-size: 12px" class="tp1">Tanggal Pulang</span>
                        </label>
                        <input type="date" class="tp" id="tp" style="display: none" name="tglPP" value="<?php echo date('Y-m-d', time() + (48 * 60 * 60)); ?>">
                    </div>


                    <div class="col l6 s12">
                        <label>Kelas Penerbangan</label>
                        <select class="browser-default" name="kelasP">
                            <option value="ECONOMY" selected>Economy</option>
                            <option value="PREMIUM_ECONOMY">Premium Economy</option>
                            <option value="BUSINESS">Business</option>
                            <option value="FIRST">First Class</option>
                        </select>
                    </div>

                    <div class="col l12 s12"></div>

                    <div class="col l8 s12">
                        <label>Fleksibilitas</label>
                        <select class="browser-default" name="fleks">
                            <option value="0" selected>Reguler</option>
                            <option value="1">Fleksibel & Reguler</option>
                        </select>
                    </div>
                    <div class="col l12 s12" style="margin-top: 12px">
                        <button blank type="submit" class="orange darken-1 btn right cariP" name="cariP">
                            <i class="material-icons left">search</i>
                            Cari Penerbangan
                        </button>
                    </div>
                </form>

                <a class="blue accent-2 btn-small close" onclick="return confirm('Yakin ingin keluar?')" href="#">
                    <i class="material-icons left">close</i>Close
                </a>

            </section>
        </div>
    </div>
</div>