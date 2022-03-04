<main id="daftar_konselor" class="section_form">
    <div class="container">
        <div class="form">
            <h1 class="title text-center">Daftar Menjadi Konselor</h1>
            <form id="myForm" action="<?= site_url('KonselingController/storeDaftarKonselor') ?>" method="POST">
                <div class="row">
                    <div class="col-12">
                        <div class="steps" style="margin-top:100px">
                            <div class="step active">
                                1. Informasi Pribadi
                            </div>
                            <div class="step">
                                2. Pendidikan Pengalaman
                            </div>
                            <div class="step">
                                3. Informasi Rekening Bank
                            </div>
                        </div>
                    </div>
                </div>
                <!-- One "tab" for each step in the form: -->
                <div class="tab">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="label_dftr">Nama</label>
                            <input id="nama" type="text" name="nama" class="form-control" required></input>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="label_dftr">Email</label>
                            <input id="email" type="email" name="email" class="form-control" required></input>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="label_dftr">Tanggal Lahir</label>
                            <input id="tanggal_lahir" name="tanggal_lahir" class="form-control datepickerr" placeholder="Check In"  required></input>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="label_dftr">Jenis Kelamin</label>
                            <select id="jenis_kelamin" name="jenis_kelamin" class="form-control selectric" required>
                                <option value=""><?php echo "Pilih Jenis Kelamin" ?></option>
                                <option value="Pria">
                                    <?php echo "Pria" ?? '-' ?></option>
                                <option value="Wanita">
                                    <?php echo "Wanita" ?? '-' ?></option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="label_dftr">No. Handphone</label>
                            <input id="no_hp" type="number" name="no_hp" class="form-control" value="" required></input>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="label_dftr">No. KTP</label>
                            <input id="no_ktp" type="number" name="no_ktp" class="form-control" value="" required></input>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="label_dftr">Provinsi</label>
                            <select id="provinsi" name="provinsi" class="form-control selectric" required>
                                <option value=""><?php echo "Pilih Provinsi"; ?></option>
                                <?php foreach ($provinsi as $item) : ?>
                                <option value="<?php echo $item->id_prov; ?>"><?php echo $item->nama ?? '-'; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="label_dftr">Kab/Kota</label>
                            <select id="kabupaten_kota" name="kabupaten_kota" class="form-control selectric kabupaten_kota" required>
                                <option value="0"><?php echo "Pilih Kab/Kota" ?></option>
                                <?php foreach ($kabupaten as $item) : ?>
                                <option> <?php echo $item->nama ?? '-'; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-12">
                            <label class="label_dftr">Alamat</label>
                            <textarea id="alamat" name="alamat" class="form-control" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="tab">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="label_dftr">Gelar Pendidikan S1</label>
                            <input id="gelar_S1" type="text" name="gelar_S1" class="form-control" required></input>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="label_dftr">Universitas</label>
                            <input id="universitas_S1" type="text" name="universitas_S1" class="form-control" required></input>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="label_dftr">Jurusan</label>
                            <input id="jurusan_S1" type="text" name="jurusan_S1" class="form-control" required></input>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="label_dftr">Angkatan</label>
                            <input id="angkatan_S1" type="text" name="angkatan_S1" class="form-control" required></input>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="label_dftr">Dari</label>
                            <input id="dari_S1" type="text" name="dari_S1" class="form-control datepickerr" required></input>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="label_dftr">Sampai</label>
                            <input id="sampai_S1" type="text" name="sampai_S1" class="form-control datepickerr" required></input>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="label_dftr">Gelar Pendidikan S2<span>&nbsp;(bisa dikosongkan bila belum ada)</span></label>
                            <input id="gelar_S2" type="text" name="gelar_S2" class="form-control"></input>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="label_dftr">Universitas</label>
                            <input id="universitas_S2" type="text" name="universitas_S2" class="form-control"></input>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="label_dftr">Jurusan</label>
                            <input id="jurusan_S2" type="text" name="jurusan_S2" class="form-control"></input>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="label_dftr">Angkatan</label>
                            <input id="angkatan_S2" type="text" name="angkatan_S2" class="form-control"></input>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="label_dftr">Dari</label>
                            <input id="dari_S2" type="text" name="dari_S2" class="form-control datepickerr"></input>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="label_dftr">Sampai</label>
                            <input id="sampai_S2" type="text" name="sampai_S2" class="form-control datepickerr"></input>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="label_dftr">Pekerjaan Saat ini</label>
                            <input id="pekerjaan" type="text" name="pekerjaan" class="form-control"></input>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="label_dftr">Organisasi</label>
                            <input id="organisasi" type="text" name="organisasi" class="form-control"></input>
                        </div>
                    </div>
                </div>
                <div class="tab">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="label_dftr">Nama Bank</label>
                            <input id="nama_bank" type="text" name="nama_bank" class="form-control" required></input>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="label_dftr">Alamat Cabang Bank</label>
                            <input id="alamat_cabang" type="text" name="alamat_cabang" class="form-control" required></input>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="label_dftr">Nomor Rekening</label>
                            <input id="nomor_rekening" type="number" name="nomor_rekening" class="form-control" required></input>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="label_dftr">Nama Pemilik Rekening</label>
                            <input id="nama_rekening" type="text" name="nama_rekening" class="form-control" required></input>
                        </div>
                    </div>
                </div>
                <div style="overflow: auto">
                    <div style="float: right">
                    <button type="button" class="previous">Previous</button>
                    <button type="button" class="next btn_next">Next</button>
                    <button type="button" class="submit btn_next">Submit</button>
                    </div>
                </div>
                <!-- Circles which indicates the steps of the form: -->
            </form>
        </div>
    </div>
</main>