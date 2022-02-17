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
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.2.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>


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
                $('.kabupaten_kota').selectric('refresh');
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
			placeholder : "Placeholder",
			// allowHtml: true,
			allowClear: true,
			tags: true
		});
</script>

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
</body>
</html>