<div class="fix-toh1" id="fix-oe">
    <div class="row">
        <h4 class="center white-text">Pesan Penginapan <i class="material-icons small">hotel</i></h4>
        <div class="container">
            <section class="t-nginap white">
                <p class="ket1 center blue accent-2 white-text">
                    Mau liburan di Bulukumba dan kamu butuh penginapan? Yuk pesan penginapan dulu !
                </p>

                <form action="redirect-tn.php" method="POST">
                    <div class="col l12 s12">
                        <label for="">Tujuan</label>
                        <input type="text" disabled value="Bulukumba, Sulawesi Selatan, Indonesia">
                    </div>

                    <div class="col l6 s12">
                        <label for="cekin">Check-in</label>
                        <input type="date" name="cekin" id="cekin" value="<?php echo date('Y-m-d'); ?>">
                    </div>

                    <div class="col l6 s12">
                        <label for="durasi">Durasi</label>
                        <select class="browser-default" name="durasi" id="durasi">
                            <option value="1" selected>1 Malam</option>
                            <?php for ($i = 2; $i <= 15; $i++) : ?>
                                <option value="<?= $i ?>"><?= $i ?> Malam</option>
                            <?php endfor; ?>
                        </select>
                    </div>

                    <div class="col s12"></div>

                    <div class="col l4 s6">
                        <label for="tamu">Tamu</label>
                        <select class="browser-default tamu" name="tamu" id="tamu" onchange="getval(this);">
                            <option value="1" selected>1 Orang</option>
                            <?php for ($i = 2; $i <= 15; $i++) : ?>
                                <option value="<?= $i ?>"><?= $i ?> Orang</option>
                            <?php endfor; ?>
                        </select>
                    </div>

                    <div class="col l4 s6">
                        <label for="kamar">Kamar</label>
                        <select class="browser-default kamar" name="kamar" id="kamar">
                            <option value="1" selected>1 Kamar</option>
                        </select>
                    </div>

                    <div class="col l12 s12" style="margin-top: 12px">
                        <button blank type="submit" class="orange darken-1 btn right" name="cariP">
                            <i class="material-icons left">search</i>
                            Cari Penginapan
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

<script type="text/javascript">
    function getval(sel) {
        var Ntamu = sel.value;
        var kamar = document.querySelector('.kamar');
        if (Ntamu > 8) Ntamu = 8;
        for (var i = 1; i <= Ntamu; i++) {
            if (i == 1)
                kamar.innerHTML = `<option value="` + i + `">` + i + ` Kamar</option>`;
            else
                kamar.innerHTML += `<option value="` + i + `">` + i + ` Kamar</option>`;
        }
    }
</script>