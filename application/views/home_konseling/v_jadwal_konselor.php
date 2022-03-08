<main id="jadwal_konselor" class="section_form">
    <div class="container">
        <div class="form">
            <h1 class="title">Pilih untuk konselor anda</h1>
            <p>Pilih kategori untuk materi Konseling anda, sesuai kemampuan</p>
            <form id="jadwal" action="<?= site_url('KonselingController/simpan_jadwal') ?>" method="POST">
                <div class="row align-items-center mb-5">
                    <div class="col-3">
                        <input type="checkbox" name="" id=""> <span>SUN</span>
                    </div>
                    <div class="col-9">
                        <div class="row boxed_input">
                            <div class="col-11 input_wrap" id="input_sun"></div>
                            <div class="col-1 d-flex align-items-center justify-content-center">
                                <a class="add_field_button" id="add_sun">+</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center mb-5">
                    <div class="col-3">
                        <input type="checkbox" name="" id=""> <span>MON</span>
                    </div>
                    <div class="col-9">
                        <div class="row boxed_input">
                            <div class="col-11 input_wrap" id="input_mon"></div>
                            <div class="col-1 d-flex align-items-center justify-content-center">
                                <a class="add_field_button" id="add_mon">+</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center mb-5">
                    <div class="col-3">
                        <input type="checkbox" name="" id=""> <span>TUE</span>
                    </div>
                    <div class="col-9">
                        <div class="row boxed_input">
                            <div class="col-11 input_wrap" id="input_tue"></div>
                            <div class="col-1 d-flex align-items-center justify-content-center">
                                <a class="add_field_button" id="add_tue">+</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center mb-5">
                    <div class="col-3">
                        <input type="checkbox" name="" id=""> <span>WED</span>
                    </div>
                    <div class="col-9">
                        <div class="row boxed_input">
                            <div class="col-11 input_wrap" id="input_wed"></div>
                            <div class="col-1 d-flex align-items-center justify-content-center">
                                <a class="add_field_button" id="add_wed">+</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center mb-5">
                    <div class="col-3">
                        <input type="checkbox" name="" id=""> <span>THU</span>
                    </div>
                    <div class="col-9">
                        <div class="row boxed_input">
                            <div class="col-11 input_wrap" id="input_thu"></div>
                            <div class="col-1 d-flex align-items-center justify-content-center">
                                <a class="add_field_button" id="add_thu">+</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center mb-5">
                    <div class="col-3">
                        <input type="checkbox" name="" id=""> <span>FRI</span>
                    </div>
                    <div class="col-9">
                        <div class="row boxed_input">
                            <div class="col-11 input_wrap" id="input_fri"></div>
                            <div class="col-1 d-flex align-items-center justify-content-center">
                                <a class="add_field_button" id="add_fri">+</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center mb-5">
                    <div class="col-3">
                        <input type="checkbox" name="" id=""> <span>SAT</span>
                    </div>
                    <div class="col-9">
                        <div class="row boxed_input">
                            <div class="col-11 input_wrap" id="input_sat"></div>
                            <div class="col-1 d-flex align-items-center justify-content-center">
                                <a class="add_field_button" id="add_sat">+</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="row mb-5">
                    <div class="col-9 offset-3">
                        <p>to set a more specific day and time, use this feature</p>
                        <button type="button" class="btn_jadwal mb-5" data-toggle="modal" data-target="#changeCity">Add a date override</button>
                        <div class="location"></div>
                    </div>
                </div> -->

                <!-- <div class="modal" id="changeCity" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <form class="form-inline">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="form-group search-calendar">
                                                <div class="dates">
  
                                                        <label for="from">From</label>
                                                        <input type="text" id="from">
                                                        
                                                        <label for="to">To</label>
                                                        <input type="text" id="to">
                                                    
                                                    </div>
                                                <div id="demo"></div>
                                                <div class="row justify-content-center mt-5">
                                                    <div class="col-7 input_wrap" id="input_time">
                                                        <div>
                                                            <input type="hidden" name="tanggal[]" value="Sunday"></input>
                                                            <input type="time" onfocus="clearError(this)" name="jam_mulai[]" class="vTimeStart sp_wrap awl"/>
                                                             - <input type="time" onfocus="clearError(this)" name="jam_selesai[]" class="vTimeEnd sp_wrap akh"/>
                                                             <a href="#" class="remove_field"><ion-icon name="trash-outline"></ion-icon></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-1 d-flex align-items-center justify-content-center">
                                                        <a class="add_field_button" id="add_time">+</a>
                                                    </div>
                                                </div>
                                             </div>
                                        </div>
                                    </div>
                                    <div class="pl-5 pr-5">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button id="cityName" type="button" class="btn btn-primary" data-dismiss="modal">Update Me!</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> -->

                <div style="overflow: auto">
                    <div style="float: right">
                        <button type="submit" class="btn_next">Submit</button>
                    </div>
                </div>
            </form>
            <!-- <div class="input_fields_wrap">
                <button class="add_field_button">+</button>
                
            </div> -->
        </div>
    </div>  
</main>