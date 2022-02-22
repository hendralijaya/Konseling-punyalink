<main id="test_konselor" class="section_form">
    <div class="container">
        <div class="form">
            <h1 class="title text-center">Test Dasar Konselor</h1>
            <h2 class="info_ text-center">Mohon jawab pertanyaan ini dengan apa yang anda kuasai</h2>
            <form action="<?= site_url('KonselingController/storeSkillKonselor') ?>" method="POST">
                <div class="row">
                    <div class="col-12">
                    <?php foreach ($kategori as $data) :?>
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title"><?php echo $data['nama'] ?></h3>
                                <span class="pull-right clickable panel-collapsed">
                                    <i class="glyphicon glyphicon-chevron-up"></i>
                                </span>
                            </div>
                            <?php $coba = $this->Konseling_model->getAllSubkategoriTestDasar($data['id']); ?>
                            <div class="panel-body" style="display: none;">
                            <?php foreach ($coba as $data_1) :?>
                                <input type="checkbox" name="subkategori_id[]" value="<?php echo $data_1['id']?>" multiple>
                                <label for=""><?php echo $data_1['nama'] ?></label><br>
                            <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
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