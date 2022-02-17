<main id="dokumen" class="section_form">
    <div class="container">
        <div class="form">
            <h1 class="title text-center">Lengkapi Dokumen</h1>
            <h2 class="info_ text-center">Lengkapi profil dan dokumen untuk memverifikasi atas akreditasi anda.
                <br>Mohon unggah foto dan dokumen yang diperlukan</h2>
            <!-- <form action="">
                <p class="mt-5 text-center">
                <label for="attachment">
                    <a class="btn btn-primary text-light" role="button" aria-disabled="false">+ Add</a>
                </label>
                <input type="file" name="file" accept=".pdf" id="attachment" style="visibility: hidden; position: absolute;"/>   
                </p>
                <p id="files-area">
                    <span id="filesList">
                        <span id="files-names"></span>
                    </span>
                </p>
            </form> -->
            <form action="<?= site_url('KonselingController/dokumenKonselor') ?>" method="POST">
                <div class="form__file">
                    <label for="" class="label_dokumen">FotoPas (Wajib)</label>
                    <p class="label_d">Unggah FotoPas kamu dalam format jpg/jpeg dengan ukuran maksimal 2 MB</p>
                    <div class="button-wrap text-center">
                        <input type="file" id="real-file1" name="foto_pas" accept="image/*" hidden="hidden" required/>
                        <button type="button" class="custom-button" id="custom-button1">Pilih File</button>
                        <span id="custom-text1"  class="custom-text">No file chosen, yet.</span>
                    </div>
                </div>
                <div class="form__file">
                    <label for="" class="label_dokumen">FotoKTP (Wajib)</label>
                    <p class="label_d">Unggah FotoKTP kamu dalam format jpg/jpeg dengan ukuran maksimal 2 MB</p>
                    <div class="button-wrap text-center">
                        <input type="file" id="real-file2" name="foto_ktp" accept="image/*" hidden="hidden" required/>
                        <button type="button"  class="custom-button" id="custom-button2">Pilih File</button>
                        <span id="custom-text2"  class="custom-text">No file chosen, yet.</span>
                    </div>
                </div>
                <div class="form__file">
                    <label for="" class="label_dokumen">Foto Ijazah S1(Wajib)</label>
                    <p class="label_d">Unggah Foto Ijazah kamu dalam format pdf dengan ukuran maksimal 2 MB</p>
                    <div class="button-wrap text-center">
                        <input type="file" id="real-file3" name="foto_ijazah_s1" accept=".pdf" hidden="hidden" />
                        <button type="button"  class="custom-button" id="custom-button3">Pilih File</button>
                        <span id="custom-text3"  class="custom-text">No file chosen, yet.</span>
                    </div>
                </div>
                <div class="form__file">
                    <label for="" class="label_dokumen">Foto Ijazah S2(Wajib)</label>
                    <p class="label_d">Unggah Foto Ijazah kamu dalam format pdf dengan ukuran maksimal 2 MB</p>
                    <div class="button-wrap text-center">
                        <input type="file" id="real-file4" name="foto_ijazah_s2" accept=".pdf" hidden="hidden" />
                        <button type="button"  class="custom-button" id="custom-button4">Pilih File</button>
                        <span id="custom-text4"  class="custom-text">No file chosen, yet.</span>
                    </div>
                </div>
                <div class="form__file">
                    <label for="" class="label_dokumen">Curriculum Vitae (Wajib)</label>
                    <p class="label_d">Unggah Curriculum Vitae kamu dalam format pdf dengan ukuran maksimal 2 MB</p>
                    <div class="button-wrap text-center">
                        <input type="file" id="real-file5" name="cv" accept=".pdf" hidden="hidden" />
                        <button type="button"  class="custom-button" id="custom-button5">Pilih File</button>
                        <span id="custom-text5" class="custom-text">No file chosen, yet.</span>
                    </div>
                </div>
                <div class="form__file">
                    <label for="" class="label_dokumen">SKCK/SIP</label>
                    <p class="label_d">Unggah SKCK/SIP kamu dalam format pdf dengan ukuran maksimal 2 MB</p>
                    <div class="button-wrap text-center">
                        <input type="file" id="real-file6"  name="skck" accept=".pdf" hidden="hidden" />
                        <button type="button"  class="custom-button" id="custom-button6">Pilih File</button>
                        <span id="custom-text6"  class="custom-text">No file chosen, yet.</span>
                    </div>
                </div> 
                <div class="form__file">
                    <label for="" class="label_dokumen">NPWP</label>
                    <p class="label_d">Unggah NPWP kamu dalam format pdf dengan ukuran maksimal 2 MB</p>
                    <div class="button-wrap text-center">
                        <input type="file" id="real-file7" name="npwp" accept=".pdf" hidden="hidden" />
                        <button type="button"  class="custom-button" id="custom-button7">Pilih File</button>
                        <span id="custom-text7" class="custom-text">No file chosen, yet.</span>
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