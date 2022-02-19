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

<script>
const realFileBtn1 = document.getElementById("real-file1");
const customBtn1 = document.getElementById("custom-button1");
const customTxt1 = document.getElementById("custom-text1");

const realFileBtn2 = document.getElementById("real-file2");
const customBtn2 = document.getElementById("custom-button2");
const customTxt2 = document.getElementById("custom-text2");

const realFileBtn3 = document.getElementById("real-file3");
const customBtn3 = document.getElementById("custom-button3");
const customTxt3 = document.getElementById("custom-text3");

const realFileBtn4 = document.getElementById("real-file4");
const customBtn4 = document.getElementById("custom-button4");
const customTxt4 = document.getElementById("custom-text4");

const realFileBtn5 = document.getElementById("real-file5");
const customBtn5 = document.getElementById("custom-button5");
const customTxt5 = document.getElementById("custom-text5");

const realFileBtn6 = document.getElementById("real-file6");
const customBtn6 = document.getElementById("custom-button6");
const customTxt6 = document.getElementById("custom-text6");

const realFileBtn7 = document.getElementById("real-file7");
const customBtn7 = document.getElementById("custom-button7");
const customTxt7 = document.getElementById("custom-text7");

customBtn1.addEventListener("click", function() {
  realFileBtn1.click();
});
customBtn2.addEventListener("click", function() {
  realFileBtn2.click();
});
customBtn3.addEventListener("click", function() {
  realFileBtn3.click();
});
customBtn4.addEventListener("click", function() {
  realFileBtn4.click();
});
customBtn5.addEventListener("click", function() {
  realFileBtn5.click();
});
customBtn6.addEventListener("click", function() {
  realFileBtn6.click();
});
customBtn7.addEventListener("click", function() {
  realFileBtn7.click();
});

realFileBtn1.addEventListener("change", function() {
  if (realFileBtn1.value) {
    customTxt1.innerHTML = realFileBtn1.value.match(
      /[\/\\]([\w\d\s\.\-\(\)]+)$/
    )[1];
  } else {
    customTxt1.innerHTML = "No file chosen, yet.";
  }
});
realFileBtn2.addEventListener("change", function() {
  if (realFileBtn2.value) {
    customTxt2.innerHTML = realFileBtn2.value.match(
      /[\/\\]([\w\d\s\.\-\(\)]+)$/
    )[1];
  } else {
    customTxt2.innerHTML = "No file chosen, yet.";
  }
});
realFileBtn3.addEventListener("change", function() {
  if (realFileBtn1.value) {
    customTxt3.innerHTML = realFileBtn3.value.match(
      /[\/\\]([\w\d\s\.\-\(\)]+)$/
    )[1];
  } else {
    customTxt3.innerHTML = "No file chosen, yet.";
  }
});
realFileBtn4.addEventListener("change", function() {
  if (realFileBtn4.value) {
    customTxt4.innerHTML = realFileBtn4.value.match(
      /[\/\\]([\w\d\s\.\-\(\)]+)$/
    )[1];
  } else {
    customTxt4.innerHTML = "No file chosen, yet.";
  }
});
realFileBtn5.addEventListener("change", function() {
  if (realFileBtn5.value) {
    customTxt5.innerHTML = realFileBtn5.value.match(
      /[\/\\]([\w\d\s\.\-\(\)]+)$/
    )[1];
  } else {
    customTxt5.innerHTML = "No file chosen, yet.";
  }
});
realFileBtn6.addEventListener("change", function() {
  if (realFileBtn6.value) {
    customTxt6.innerHTML = realFileBtn6.value.match(
      /[\/\\]([\w\d\s\.\-\(\)]+)$/
    )[1];
  } else {
    customTxt6.innerHTML = "No file chosen, yet.";
  }
});
realFileBtn7.addEventListener("change", function() {
  if (realFileBtn7.value) {
    customTxt7.innerHTML = realFileBtn7.value.match(
      /[\/\\]([\w\d\s\.\-\(\)]+)$/
    )[1];
  } else {
    customTxt7.innerHTML = "No file chosen, yet.";
  }
});
</script>