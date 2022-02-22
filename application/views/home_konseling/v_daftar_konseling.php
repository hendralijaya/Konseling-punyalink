<main id="daftar_konseling" class="section_form">
    <div class="container">
        <div class="form">
            <form action="<?= site_url('KonselingController/daftarKonseling') ?>" method="POST">
                <div class="row">
                    <div class="col-md-5 pr-5">
                        <h1 class="list_ctgr">Psikologi</h1>
                        <h2 class="descr">Deskripsi</h2>
                        <ol>
                            <li>Layanan konseling psikologi, PunyaLink siap mmendengarkan semua cerita mu disini.</li>
                            <li>Psikiater di PunyaLink merupakan Lulusan mahasiswa Psikologi yang sudah mendapatkan materi dan pelatihan dasar konseling</li>
                        </ol>
                        <!-- <p>1. Layanan konseling psikologi, PunyaLink siap mmendengarkan semua cerita mu disini.</p>
                        <p>2. Psikiater di PunyaLink merupakan Lulusan mahasiswa Psikologi yang sudah mendapatkan materi dan pelatihan dasar konseling</p> -->
                    </div>
                
                    <div class="col-md-7">
                        <h1 class="list_ctgr">Daftar Konseling</h1>
                        <div class="from-group">
                            <label class="label__k">Nama*</label>
                            <input id="nama" type="text" name="nama" class="form-control" required></input>
                        </div>
                        <div class="from-group">
                            <label class="label__k">Email*</label>
                            <input id="email" type="email" name="email" class="form-control" required></input>
                        </div>
                        <div class="from-group">
                            <label class="label__k">No. Whatsapp*</label>
                            <input id="no_wa" type="text" name="no_wa" class="form-control" required></input>
                        </div>
                        <div class="from-group">
                            <label class="label__k">Jenis Kelamin*</label>
                            <input id="jenis_kelamin" type="text" name="jenis_kelamin" class="form-control" required></input>
                        </div>
                        <div class="from-group">
                            <label class="label__k">Usia*</label>
                            <input id="usia" type="text" name="usia" class="form-control" required></input>
                        </div>
                        <div class="from-group">
                            <label class="label__k">Domisili*</label>
                            <input id="domisili" type="text" name="domisili" class="form-control" required></input>
                        </div>
                        <div class="from-group">
                            <label class="label__k">Pendidikan Terakhir*</label>
                            <input id="pendidikan_terakhir" type="text" name="pendidikan_terakhir" class="form-control" required></input>
                        </div>
                        <div class="from-group">
                            <label class="label__k">Keluhan Anda*</label>
                            <input id="keluhan" type="text" name="keluhan" class="form-control" required></input>
                        </div>
                    </div>
                </div>
                <div style="overflow: auto; margin-top:30px">
                    <div style="float: right">
                        <button type="submit" class="btn_next">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>