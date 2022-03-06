<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="<?php echo base_url() ?>asset/node_modules/jquery/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<!-- ICON -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<script src="<?php echo base_url() ?>asset/node_modules/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url() ?>asset/node_modules/selectric/public/jquery.selectric.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
<script src="<?php echo base_url()?>assets_home_konseling/js/multi-form.js"></script>
<script src="<?php echo base_url()?>assets_home_konseling/js/jquery.slicknav.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.2.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?php echo base_url() ?>assets_home_konseling/js/PAcalendar.min.js"></script>


<script>
  $(document).ready (function() {
  
  $('#cityName').click(function() {
     var from = $('#from').val();
     var to = $('#to').val();
     var res = from.split("-");
     var res2 = to.split("-"); // turn the date into a list format (Split by / if needed)
     var months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "December"]; // empty first value because it starts at 0
     var month = months[res[1]-1];
     var day = res[0];
     var year = res[2];
     var month2 = months[res2[1]-1];
     var day2 = res2[0];
     var year2 = res2[2];
     var awl = $('.awl').val();
     var akh = $('.akh').val();
     $('.location').append("<span>" + day + ' ' + month + ' '+ year +"</span> - <span>" + day2 + ' ' + month2 + ' '+ year2 +"</span>"+
                  "<span>" + awl + '-' + akh +"</span>");
  });
});
</script>

<script>
  $('#demo').PACalendar({

    from: {
      element: $('#from')
    }, 

    to: {
      element: $('#to')
    }, 

    mode: 'range',
    format:'DD-MM-YYYY'


    });
</script>

<script>
  $(document).ready(function() {

  // mobile_menu
  var menu = $('ul#navigation');
  if (menu.length) {
      menu.slicknav({
          prependTo: ".mobile_menu",
          closedSymbol: '+',
          openedSymbol: '-'
      });
  };
  });
</script>
<script>
  $(document).ready(function () {
    $.validator.addMethod(
      'date',
      function (value, element, param) {
        return value != 0 && value <= 31 && value == parseInt(value, 10);
      },
      'Please enter a valid date!'
    );
    $.validator.addMethod(
      'month',
      function (value, element, param) {
        return value != 0 && value <= 12 && value == parseInt(value, 10);
      },
      'Please enter a valid month!'
    );
    $.validator.addMethod(
      'year',
      function (value, element, param) {
        return value != 0 && value >= 1900 && value == parseInt(value, 10);
      },
      'Please enter a valid year not less than 1900!'
    );
    $.validator.addMethod(
      'username',
      function (value, element, param) {
        var nameRegex = /^[a-zA-Z0-9]+$/;
        return value.match(nameRegex);
      },
      'Only a-z, A-Z, 0-9 characters are allowed'
    );

    var val = {
      // Specify validation rules
      rules: {
        fname: 'required',
        lname: 'required',
        email: {
          required: true,
          email: true,
        },
        phone: {
          required: true,
          minlength: 10,
          maxlength: 10,
          digits: true,
        },
        date: {
          date: true,
          required: true,
          minlength: 2,
          maxlength: 2,
          digits: true,
        },
        month: {
          month: true,
          required: true,
          minlength: 2,
          maxlength: 2,
          digits: true,
        },
        year: {
          year: true,
          required: true,
          minlength: 4,
          maxlength: 4,
          digits: true,
        },
        username: {
          username: true,
          required: true,
          minlength: 4,
          maxlength: 16,
        },
        password: {
          required: true,
          minlength: 8,
          maxlength: 16,
        },
      },
      // Specify validation error messages
      messages: {
        fname: 'First name is required',
        lname: 'Last name is required',
        email: {
          required: 'Email is required',
          email: 'Please enter a valid e-mail',
        },
        phone: {
          required: 'Phone number is requied',
          minlength: 'Please enter 10 digit mobile number',
          maxlength: 'Please enter 10 digit mobile number',
          digits: 'Only numbers are allowed in this field',
        },
        date: {
          required: 'Date is required',
          minlength: 'Date should be a 2 digit number, e.i., 01 or 20',
          maxlength: 'Date should be a 2 digit number, e.i., 01 or 20',
          digits: 'Date should be a number',
        },
        month: {
          required: 'Month is required',
          minlength: 'Month should be a 2 digit number, e.i., 01 or 12',
          maxlength: 'Month should be a 2 digit number, e.i., 01 or 12',
          digits: 'Only numbers are allowed in this field',
        },
        year: {
          required: 'Year is required',
          minlength: 'Year should be a 4 digit number, e.i., 2018 or 1990',
          maxlength: 'Year should be a 4 digit number, e.i., 2018 or 1990',
          digits: 'Only numbers are allowed in this field',
        },
        username: {
          required: 'Username is required',
          minlength: 'Username should be minimum 4 characters',
          maxlength: 'Username should be maximum 16 characters',
        },
        password: {
          required: 'Password is required',
          minlength: 'Password should be minimum 8 characters',
          maxlength: 'Password should be maximum 16 characters',
        },
      },
    };
    $('#myForm')
      .multiStepForm({
        // defaultStep:0,
        beforeSubmit: function (form, submit) {
          console.log('called before submiting the form');
          console.log(form);
          console.log(submit);
        },
        validations: val,
      })
      .navigateTo(0);
  });
</script>

<script>
    if (jQuery().daterangepicker) {
    if ($(".datepickerr").length) {
        $('.datepickerr').daterangepicker({
            locale: {
                format: 'DD-MM-YYYY'
            },
            minViewMode: "years",
            singleDatePicker: true,
            showDropdowns: true,
            minYear: 1901,
        });
    }
    if ($(".datepickerProfil").length) {
        $('.datepickerProfil').daterangepicker({
            locale: {
                format: 'MM-YYYY'
            },
            minViewMode: "years",
            singleDatePicker: true,
            showDropdowns: true,
            minYear: 1901,
        });
    }
    if ($(".datetimepicker").length) {
        $('.datetimepicker').daterangepicker({
            locale: {
                format: 'YYYY-MM-DD hh:mm'
            },
            singleDatePicker: true,
            timePicker: true,
            timePicker24Hour: true,
        });
    }
    if ($(".daterange").length) {
        $('.daterange').daterangepicker({
            locale: {
                format: 'YYYY-MM-DD'
            },
            drops: 'down',
            opens: 'right'
        });
    }
}
</script>

<!-- <script>
  $('input[name="tanggal_lahir"]').daterangepicker({
    locale: {
                format: 'DD-MM-YYYY'
            },
            minViewMode: "years",
    singleDatePicker: true,
    showDropdowns: true,
    minYear: 1901 
  });

   $('input[name="tanggal_lahir]').val('');
   $('input[name="tanggal_lahir"]').attr("placeholder","Check In");
</script> -->

<script>
$(document).ready(function() {

    $("#provinsi").change(function() { // Ketika user mengganti atau memilih data provinsi

        $.ajax({
            type: "POST", // Method pengiriman data bisa dengan GET atau POST
            url: "<?php echo base_url(); ?>konselingcontroller/get_kab_kota", // Isi dengan url/path file php yang dituju
            data: {
                id_provinsi: $("#provinsi").val()
            }, // data yang akan dikirim ke file yang dituju
            dataType: "json",
            beforeSend: function(e) {
                if (e && e.overrideMimeType) {
                    e.overrideMimeType("application/json;charset=UTF-8");
                }
            },
            success: function(response) { // Ketika proses pengiriman berhasil

                console.log(response);
                // set isi dari combobox kota
                // lalu munculkan kembali combobox kotanya
                $(".kabupaten_kota").html(response.list_kota);
                // $('select.wide').niceSelect('update');
                // $('.kabupaten_kota').selectric('refresh');
            },
            error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                alert(xhr.status + "\n" + xhr.responseText + "\n" +
                    thrownError); // Munculkan alert error
            }
        });
    });
});
</script>

<!-- <script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
</script> -->

<script>
  $(document).on('click', '.panel-heading span.clickable', function(e){
    var $this = $(this);
	if(!$this.hasClass('panel-collapsed')) {
		$this.parents('.panel').find('.panel-body').slideUp();
		$this.addClass('panel-collapsed');
		$this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
		
	} else {
		$this.parents('.panel').find('.panel-body').slideDown();
		$this.removeClass('panel-collapsed');
		$this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
		
	}
})
</script>
<script>
  const dt = new DataTransfer(); // Permet de manipuler les fichiers de l'input file

$("#attachment").on('change', function(e){
	for(var i = 0; i < this.files.length; i++){
		let fileBloc = $('<span/>', {class: 'file-block'}),
			 fileName = $('<span/>', {class: 'name', text: this.files.item(i).name});
		fileBloc.append('<span class="file-delete"><span>+</span></span>')
			.append(fileName);
		$("#filesList > #files-names").append(fileBloc);
	};
	// Ajout des fichiers dans l'objet DataTransfer
	for (let file of this.files) {
		dt.items.add(file);
	}
	// Mise à jour des fichiers de l'input file après ajout
	this.files = dt.files;

	// EventListener pour le bouton de suppression créé
	$('span.file-delete').click(function(){
		let name = $(this).next('span.name').text();
		// Supprimer l'affichage du nom de fichier
		$(this).parent().remove();
		for(let i = 0; i < dt.items.length; i++){
			// Correspondance du fichier et du nom
			if(name === dt.items[i].getAsFile().name){
				// Suppression du fichier dans l'objet DataTransfer
				dt.items.remove(i);
				continue;
			}
		}
		// Mise à jour des fichiers de l'input file après suppression
		document.getElementById('attachment').files = dt.files;
	});
});
</script>

<script>
  $(".js-select2").select2({
			closeOnSelect : false,
			placeholder : "Pilih Kategori",
			// allowHtml: true,
			allowClear: true,
			tags: true
		});
</script>


<script>  
 $(document).ready(function() {
	var max_fields      = 10;
 //maximum input boxes allowed
	var wrapper   	  	= $("#input_sun"); //Fields wrapper
	var add_button      = $("#add_sun"); //Add button ID
  var wrapper_mon  		= $("#input_mon"); //Fields wrapper
	var add_mon         = $("#add_mon"); //Add button ID
  var wrapper_tue   	= $("#input_tue"); //Fields wrapper
	var add_tue         = $("#add_tue"); //Add button ID
  var wrapper_wed  		= $("#input_wed"); //Fields wrapper
	var add_wed         = $("#add_wed"); //Add button ID
  var wrapper_thu  		= $("#input_thu"); //Fields wrapper
	var add_thu         = $("#add_thu"); //Add button ID
  var wrapper_fri   	= $("#input_fri"); //Fields wrapper
	var add_fri         = $("#add_fri"); //Add button ID
  var wrapper_sat  		= $("#input_sat"); //Fields wrapper
	var add_sat         = $("#add_sat");
  var wrapper_time  	= $("#input_time"); //Fields wrapper
	var add_time        = $("#add_time");
	
	var x = 0; //initlal text box count
  var y = 0;
  var v = 0;
  var a = 0;
  var b = 0;
  var c = 0;
  var d = 0;
  var t = 0;
  // sunday
	$(add_button).click(function(e){ //on add input button click
		e.preventDefault();
		if(x < max_fields){ //max input box allowed
			x++; //text box increment
			$(wrapper).append('<span><input type="hidden" name="tanggal[]" value="Sunday"></input><input type="time" onfocus="clearError(this)" name="jam_mulai[]" class="vTimeStart sp_wrap"/> - <input type="time" onfocus="clearError(this)" name="jam_selesai[]" class="vTimeEnd sp_wrap"/><a href="#" class="remove_field"><ion-icon name="trash-outline"></ion-icon></a></span>'); //add input box
		}
	});
	
	$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); $(this).parent('span').remove(); x--;
	})

  // monday
  $(add_mon).click(function(e){ //on add input button click
		e.preventDefault();
		if(y < max_fields){ //max input box allowed
			y++; //text box increment
			$(wrapper_mon).append('<span><input type="hidden" name="tanggal[]" value="Monday"></input><input type="time" onfocus="clearError(this)" name="jam_mulai[]" class="vTimeStart sp_wrap"/> - <input type="time" onfocus="clearError(this)" name="jam_selesai[]" class="vTimeEnd sp_wrap"/><a href="#" class="remove_field"><ion-icon name="trash-outline"></ion-icon></a></span>'); //add input box
		}
	});
	
	$(wrapper_mon).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); $(this).parent('span').remove(); y--;
	})

  // tue
  $(add_tue).click(function(e){ //on add input button click
		e.preventDefault();
		if(v < max_fields){ //max input box allowed
			v++; //text box increment
			$(wrapper_tue).append('<span><input type="hidden" name="tanggal[]" value="Tuesday"></input><input type="time" onfocus="clearError(this)" name="jam_mulai[]" class="vTimeStart sp_wrap"/> - <input type="time" onfocus="clearError(this)" name="jam_selesai[]" class="vTimeEnd sp_wrap"/><a href="#" class="remove_field"><ion-icon name="trash-outline"></ion-icon></a></span>'); //add input box
		}
	});
	
	$(wrapper_tue).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); $(this).parent('span').remove(); v--;
	})

  // wed
  $(add_wed).click(function(e){ //on add input button click
		e.preventDefault();
		if(a < max_fields){ //max input box allowed
			a++; //text box increment
			$(wrapper_wed).append('<span><input type="hidden" name="tanggal[]" value="Sunday"></input><input type="time" onfocus="clearError(this)" name="jam_mulai[]" class="vTimeStart sp_wrap"/> - <input type="time" onfocus="clearError(this)" name="jam_selesai[]" class="vTimeEnd sp_wrap"/><a href="#" class="remove_field"><ion-icon name="trash-outline"></ion-icon></a></span>'); //add input box
		}
	});
	
	$(wrapper_wed).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); $(this).parent('span').remove(); a--;
	})

  // thu
  $(add_thu).click(function(e){ //on add input button click
		e.preventDefault();
		if(b < max_fields){ //max input box allowed
			b++; //text box increment
			$(wrapper_thu).append('<span><input type="hidden" name="tanggal[]" value="Sunday"></input><input type="time" onfocus="clearError(this)" name="jam_mulai[]" class="vTimeStart sp_wrap"/> - <input type="time" onfocus="clearError(this)" name="jam_selesai[]" class="vTimeEnd sp_wrap"/><a href="#" class="remove_field"><ion-icon name="trash-outline"></ion-icon></a></span>'); //add input box
		}
	});
	
	$(wrapper_thu).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); $(this).parent('span').remove(); b--;
	})

  // fri
  $(add_fri).click(function(e){ //on add input button click
		e.preventDefault();
		if(c < max_fields){ //max input box allowed
			c++; //text box increment
			$(wrapper_fri).append('<span><input type="hidden" name="tanggal[]" value="Sunday"></input><input type="time" onfocus="clearError(this)" name="jam_mulai[]" class="vTimeStart sp_wrap"/> - <input type="time" onfocus="clearError(this)" name="jam_selesai[]" class="vTimeEnd sp_wrap"/><a href="#" class="remove_field"><ion-icon name="trash-outline"></ion-icon></a></span>'); //add input box
		}
	});
	
	$(wrapper_fri).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); $(this).parent('span').remove(); c--;
	})

  // sat
  $(add_sat).click(function(e){ //on add input button click
		e.preventDefault();
		if(d < max_fields){ //max input box allowed
			d++; //text box increment
			$(wrapper_sat).append('<span><input type="hidden" name="tanggal[]" value="Sunday"></input><input type="time" onfocus="clearError(this)" name="jam_mulai[]" class="vTimeStart sp_wrap"/> - <input type="time" onfocus="clearError(this)" name="jam_selesai[]" class="vTimeEnd sp_wrap"/><a href="#" class="remove_field"><ion-icon name="trash-outline"></ion-icon></a></span>'); //add input box
		}
	});
	
	$(wrapper_sat).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); $(this).parent('span').remove(); d--;
	})

  $(add_time).click(function(e){ //on add input button click
		e.preventDefault();
		if(t < max_fields){ //max input box allowed
			t++; //text box increment
			$(wrapper_time).append('<div><input type="hidden" name="tanggal[]" value="Sunday"></input><input type="time" onfocus="clearError(this)" name="jam_mulai[]" class="vTimeStart sp_wrap awl"/> - <input type="time" onfocus="clearError(this)" name="jam_selesai[]" class="vTimeEnd sp_wrap akh"/><a href="#" class="remove_field"><ion-icon name="trash-outline"></ion-icon></a></div>'); //add input box
		}
	});
	
	$(wrapper_time).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); $(this).parent('div').remove(); t--;
	})
}); 
 </script>
</body>
</html>