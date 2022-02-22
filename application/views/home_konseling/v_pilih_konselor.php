<main id="pilih_konselor" class="section_form">
    <div class="container">
        <div class="form">
            <h1 class="title_pl">Pilih untuk konselor anda</h1>
            <p class="txt_pl">Pilih kategori untuk materi Konseling anda, sesuai kemampuan</p>
            <form action="<?= site_url('KonselingController/storePilihKategori') ?>" method="POST">
                <div class="row align-items-center mb-5">
                    <div class="col-md-3">
                        <label class="label_kategori" for="">Chat</label>
                    </div>
                    <div class="col-md-9">
                        <input type="hidden" name="chat_id" value="<?php echo $kategori_konseling[0]['id']?>">
                        <select class="js-select2" name="chat[]" multiple="multiple">
                            <option value="1" data-badge="">Psikologi</option>
                            <option value="2" data-badge="">Hipnoterapis</option>
                            <option value="3" data-badge="">Healing</option>
                        </select>
                    </div>
                </div>
                <div class="row align-items-center mb-5">
                    <div class="col-md-3">
                        <label class="label_kategori" for="">Call</label>
                    </div>
                    <div class="col-md-9">
                        <input type="hidden" name="call_id" value="<?php echo $kategori_konseling[1]['id']?>">
                        <select class="js-select2" name="call[]" multiple="multiple">
                            <option value="1" data-badge="">Psikologi</option>
                            <option value="2" data-badge="">Hipnoterapis</option>
                            <option value="3" data-badge="">Healing</option>
                        </select>
                    </div>
                </div>
                <div class="row align-items-center mb-5">
                    <div class="col-md-3">
                        <label class="label_kategori" for="">Video Call</label>
                    </div>
                    <div class="col-md-9">
                        <input type="hidden" name="vc_id" value="<?php echo $kategori_konseling[2]['id']?>">
                        <select class="js-select2" name="vc[]" multiple="multiple">
                            <option value="1" data-badge="">Psikologi</option>
                            <option value="2" data-badge="">Hipnoterapis</option>
                            <option value="3" data-badge="">Healing</option>
                        </select>
                    </div>
                </div>
                <div style="overflow: auto">
                    <div style="float: right">
                        <button type="submit" class="btn_next">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>