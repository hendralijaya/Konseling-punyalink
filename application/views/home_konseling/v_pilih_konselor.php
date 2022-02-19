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
                        <select class="js-select2" name="chat[]" multiple="multiple" required>
                            <option value="Psikologi" data-badge="">Psikologi</option>
                            <option value="Hipnoterapis" data-badge="">Hipnoterapis</option>
                            <option value="Healing" data-badge="">Healing</option>
                        </select>
                        <input type="hidden" name="id_chat">
                    </div>
                </div>
                <div class="row align-items-center mb-5">
                    <div class="col-md-3">
                        <label class="label_kategori" for="">Call</label>
                    </div>
                    <div class="col-md-9">
                        <select class="js-select2" name="call[]" multiple="multiple">
                            <option value="Psikologi" data-badge="">Psikologi</option>
                            <option value="Hipnoterapis" data-badge="">Hipnoterapis</option>
                            <option value="Healing" data-badge="">Healing</option>
                        </select>
                        <input type="hidden" name="id_call">
                    </div>
                </div>
                <div class="row align-items-center mb-5">
                    <div class="col-md-3">
                        <label class="label_kategori" for="">Video Call</label>
                    </div>
                    <div class="col-md-9">
                        <select class="js-select2" name="vc[]" multiple="multiple">
                            <option value="Psikologi" data-badge="">Psikologi</option>
                            <option value="Hipnoterapis" data-badge="">Hipnoterapis</option>
                            <option value="Healing" data-badge="">Healing</option>
                        </select>
                        <input type="hidden" name="id_vc">
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