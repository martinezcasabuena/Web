//Crear un plugin
jQuery.fn.fill_or_clean = function () {
    this.each(function () {
        if ($("#name").val() == "") {
            $("#name").val("Introduce name");
            $("#name").focus(function () {
                if ($("#name").val() == "Introduce name") {
                    $("#name").val('');
                }
            });
        }
        $("#name").blur(function () { //Onblur se activa cuando el usuario retira el foco
            if ($("#name").val() == "") {
                $("#name").val("Introduce name");
            }
        });

        if ($("#last_name").val() == "") {
            $("#last_name").val("Introduce last name");
            $("#last_name").focus(function () {
                if ($("#last_name").val() == "Introduce last name") {
                    $("#last_name").val('');
                }
            });
        }
        $("#last_name").blur(function () {
            if ($("#last_name").val() == "") {
                $("#last_name").val("Introduce last name");
            }
        });
        if ($("#nif").val() == "") {
            $("#nif").val("Introduce nif");
            $("#nif").focus(function () {
                if ($("#nif").val() == "Introduce nif") {
                    $("#nif").val('');
                }
            });
        }
        $("#nif").blur(function () {
            if ($("#nif").val() == "") {
                $("#nif").val("Introduce nif");
            }
        });
        if ($("#address").val() == "") {
            $("#address").val("Introduce address");
            $("#address").focus(function () {
                if ($("#address").val() == "Introduce address") {
                    $("#address").val('');
                }
            });
        }
        $("#address").blur(function () {
            if ($("#address").val() == "") {
                $("#address").val("Introduce address");
            }
        });
        if ($("#email").val() == "") {
            $("#email").val("Introduce email");
            $("#email").focus(function () {
                if ($("#email").val() == "Introduce email") {
                    $("#email").val('');
                }
            });
        }
        $("#email").blur(function () {
            if ($("#email").val() == "") {
                $("#email").val("Introduce email");
            }
        });
        if ($("#bill_date").val() == "") {
            $("#bill_date").val("Introduce date of bill");
            $("#bill_date").focus(function () {
                if ($("#bill_date").val() == "Introduce date of bill") {
                    $("#bill_date").val('');
                }
            });
        }
        $("#bill_date").blur(function () {
            if ($("#bill_date").val() == "") {
                $("#bill_date").val("Introduce date of bill");
            }
        });
        if ($("#service_date").val() == "") {
            $("#service_date").val("Introduce date of service");
            $("#service_date").focus(function () {
                if ($("#service_date").val() == "Introduce date of service") {
                    $("#service_date").val('');
                }
            });
        }
        $("#service_date").blur(function () {
            if ($("#service_date").attr("value") == "") {
                $("#service_date").val("Introduce date of service");
            }
        });
    });//each
    return this;
};//function

Dropzone.autoDiscover = false;
$(document).ready(function () {

  //Datepicker///////////////////////////
  $("#bill_date").datepicker({
      dateFormat: 'mm/dd/yy',
      defaultDate: 'today',
      changeMonth: true,
      changeYear: true,
      yearRange: '-110:-16'
  });
  $("#service_date").datepicker({
      dateFormat: 'mm/dd/yy',
      defaultDate: 'today',
      changeMonth: true,
      changeYear: true,
      maxDate: 'today',
      yearRange: '-110:-16'
  });

  //Valida bills /////////////////////////
  $('#submit_bill').click(function () {
      validate_bill();
  });

  //Control de seguridad para evitar que al volver atrás de la pantalla results a create, no nos imprima los datos
  $.get("modules/bills/controller/controller_bills.class.php?load_data=true",
          function (response) {
              //alert(response.bill);
              if (response.bill === "") {
                  $("#name").val('');
                  $("#last_name").val('');
                  $("#bill_date").val('');
                  $("#service_date").val('');
                  $("#address").val('');
                  $("#nif").val('');
                  $("#email").val('');
                  $("#paid_form").val('Selecciona la forma de pago');
                  $("#country").val('Selecciona el pais');
                  $("#province").val('Selecciona la provincia');
                  $("#city").val('Selecciona la ciudad');
                  var inputElements = document.getElementsByClassName('service');
                  for (var i = 0; i < inputElements.length; i++) {
                      if (inputElements[i].checked) {
                          inputElements[i].checked = false;
                      }
                  }


    $(this).fill_or_clean(); //siempre que creemos un plugin debemos llamarlo, sino no funcionará

  } else {
      $("#name").val( response.bill.name);
      $("#last_name").val( response.bill.last_name);
      $("#bill_date").val( response.bill.bill_date);
      $("#service_date").val( response.bill.service_date);
      $("#address").val( response.bill.address);
      $("#nif").val( response.bill.nif);
      $("#email").val( response.bill.email);
      $("#paid_form").val( response.bill.paid_form);
      $("#country").val(response.bill.country);
      $("#province").val(response.bill.province);
      $("#city").val(response.bill.city);
      var service = response.bill.service;
      var inputElements = document.getElementsByClassName('service');
      for (var i = 0; i < inputElements.length; i++) {
          for (var j = 0; j < inputElements.length; j++) {
              if(inputElements[i] ===inputElements[j] )
                  inputElements[j].checked = true;
          }
      }
  }
  }, "json");

  //Dropzone function //////////////////////////////////
  $("#dropzone").dropzone({
      url: "modules/bills/controller/controller_bills.class.php?upload=true",
      addRemoveLinks: true,
      maxFileSize: 1000,
      dictResponseError: "Ha ocurrido un error en el server",
      acceptedFiles: 'image/*,.jpeg,.jpg,.png,.gif,.JPEG,.JPG,.PNG,.GIF,.rar,application/pdf,.psd',
      init: function () {
          this.on("success", function (file, response) {
              //alert(response);
              $("#progress").show();
              $("#bar").width('100%');
              $("#percent").html('100%');
              $('.msg').text('').removeClass('msg_error');
              $('.msg').text('Success Upload image!!').addClass('msg_ok').animate({'right': '300px'}, 300);
          });
      },
      complete: function (file) {
          //if(file.status == "success"){
          //alert("El archivo se ha subido correctamente: " + file.name);
          //}
      },
      error: function (file) {
          //alert("Error subiendo el archivo " + file.name);
      },
      removedfile: function (file, serverFileName) {
          var name = file.name;
          $.ajax({
              type: "POST",
              url: "modules/bills/controller/controller_bills.class.php?delete=true",
              data: "filename=" + name,
              success: function (data) {
                  $("#progress").hide();
                  $('.msg').text('').removeClass('msg_ok');
                  $('.msg').text('').removeClass('msg_error');
                  $("#e_avatar").html("");

                  var json = JSON.parse(data);
                  if (json.res === true) {
                      var element;
                      if ((element = file.previewElement) != null) {
                          element.parentNode.removeChild(file.previewElement);
                          //alert("Imagen eliminada: " + name);
                      } else {
                          false;
                      }
                  } else { //json.res == false, elimino la imagen también
                      var element;
                      if ((element = file.previewElement) != null) {
                          element.parentNode.removeChild(file.previewElement);
                      } else {
                          false;
                      }
                  }
              }
          });
      }
  });

    var email_reg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
    var date_reg = /^(0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](19|20)\d\d$/;
    var address_reg = /^[a-z0-9- -.]+$/i;
    var string_reg = /^[A-Za-z]{2,30}$/;
    var nif_reg = /^(\d{8})([A-Z])$/;

    $("#name, #last_name").keyup(function () {
        if ($(this).val() != "" && string_reg.test($(this).val())) {
            $(".error").fadeOut();
            return false;
        }
    });

    $("#nif").keyup(function () {
        if ($(this).val() != "" && nif_reg.test($(this).val())) {
            $(".error").fadeOut();
            return false;
        }
    });

    $("#service_date, #bill_date").keyup(function () {
        if ($(this).val() != "" && date_reg.test($(this).val())) {
            $(".error").fadeOut();
            return false;
        }
    });

    $("#address").keyup(function () {
        if ($(this).val() != "" && address_reg.test($(this).val())) {
            $(".error").fadeOut();
            return false;
        }
    });

    $("#email").keyup(function () {
        if ($(this).val() != "" && email_reg.test($(this).val())) {
            $(".error").fadeOut();
            return false;
        }
    });

        //Dependent combos //////////////////////////////////
        load_countries_v1();
        //load_countries_v2("resources/ListOfCountryNamesByName.json");


        $("#province").empty();
        $("#province").append('<option value="" selected="selected">Seleciona la provincia</option>');
        $("#province").prop('disabled', true);
        $("#city").empty();
        $("#city").append('<option value="" selected="selected">Selecciona la ciudad</option>');
        $("#city").prop('disabled', true);

        $("#country").change(function() {
    		var country = $(this).val();
    		var province = $("#province");
    		var city = $("#city");

    		if(country !== 'ES'){
    	         province.prop('disabled', true);
    	         city.prop('disabled', true);
    	         $("#province").empty();
    		     $("#city").empty();
    		}else{
    	         province.prop('disabled', false);
    	         city.prop('disabled', false);
    	         load_provinces_v2();
    		}//fi else
    	});

    	$("#province").change(function() {
    		var prov = $(this).val();
    		if(prov > 0){
    			load_cities_v2(prov);
    		}else{
    			$("#city").prop('disabled', false);
    		}
    });
});

function validate_bill() {
    var result = true;

    var name = document.getElementById('name').value;
    var last_name = document.getElementById('last_name').value;
    var bill_date = document.getElementById('bill_date').value;
    var service_date = document.getElementById('service_date').value;
    var address = document.getElementById('address').value;
    var country = document.getElementById('country').value;
    var province = document.getElementById('province').value;
    var city = document.getElementById('city').value;
    var paid_form = document.getElementById('paid_form').value;
    var nif = document.getElementById('nif').value;
    var email = document.getElementById('email').value;
    var service = [];
    var inputElements = document.getElementsByClassName('service');
    var j = 0;
    for (var i = 0; i < inputElements.length; i++) {
        if (inputElements[i].checked) {
            service[j] = inputElements[i].value;
            j++;
        }
    }

    //Utilizamos las expresiones regulares para la validación de errores JS
    var email_reg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
    var date_reg = /^(0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](19|20)\d\d$/;
    var address_reg = /^[a-z0-9- -.]+$/i;
    var string_reg = /^[A-Za-z]{2,30}$/;
    var nif_reg = /^(\d{8})([A-Z])$/;

    $(".error").remove();
    console.log("SUBMIT");

    if ($("#name").val() == "" || $("#name").val() == "Introduce name") {
        $("#name").focus().after("<span class='error'>Introduce name</span>");
        result = false;
        return false;
    } else if (!string_reg.test($("#name").val())) {
        $("#name").focus().after("<span class='error'>Name must be 2 to 30 letters</span>");
        result = false;
        return false;
    }

    if ($("#last_name").val() == "" || $("#last_name").val() == "Introduce last name") {
        $("#last_name").focus().after("<span class='error'>Introduce last name</span>");
        result = false;
        return false;
    } else if (!string_reg.test($("#last_name").val())) {
        $("#last_name").focus().after("<span class='error'>Last name must be 2 to 30 letters</span>");
        result = false;
        return false;
    }

    if ($("#bill_date").val() == "" || $("#bill_date").val() == "Introduce date of bill") {
        $("#bill_date").focus().after("<span class='error'>Introduce date of bill</span>");
        result = false;
        return false;
    } else if (!date_reg.test($("#bill_date").val())) {
        $("#bill_date").focus().after("<span class='error'>error format date (mm/dd/yyyy)</span>");
        result = false;
        return false;
    }

    if ($("#service_date").val() == "" || $("#service_date").val() == "Introduce date of service") {
        $("#service_date").focus().after("<span class='error'>Introduce date of service</span>");
        result = false;
        return false;
    } else if (!date_reg.test($("#service_date").val())) {
        $("#service_date").focus().after("<span class='error'>error format date (mm/dd/yyyy)</span>");
        result = false;
        return false;
    }

    if ($("#address").val() == "" || $("#address").val() == "Introduce address") {
        $("#address").focus().after("<span class='error'>Introduce address</span>");
        result = false;
        return false;
    } else if (!address_reg.test($("#address").val())) {
        $("#address").focus().after("<span class='error'>Address don't have  symbols.</span>");
        result = false;
        return false;
    }

    if ($("#nif").val() == "" || $("#nif").val() == "Introduce nif") {
        $("#nif").focus().after("<span class='error'>Introduce nif</span>");
        result = false;
        return false;
    } else if (!nif_reg.test($("#nif").val())) {
        $("#nif").focus().after("<span class='error'>Introduce a valid nif.</span>");
        result = false;
        return false;
    }

    if ($("#email").val() == "" || $("#email").val() == "Introduce email") {
        $("#email").focus().after("<span class='error'>Introduce email</span>");
        result = false;
        return false;
    } else if (!email_reg.test($("#email").val())) {
        $("#email").focus().after("<span class='error'>Error format email (example@example.com).</span>");
        result = false;
        return false;
    }

    if ($("#country").val() === "" || $("#country").val() == "Selecciona el pais" || $("#country").val() === null) {
        $("#country").focus().after("<span class='error'>Seleciona un pais</span>");
        return false;
    }

    if ($("#province").val() === "" || $("#province").val() == "Selecciona la provincia") {
        $("#province").focus().after("<span class='error'>Selecciona una provincia</span>");
        return false;
    }

    if ($("#city").val() === "" || $("#city").val() == "Seleciona la ciudad") {
        $("#city").focus().after("<span class='error'>Selecciona una ciudad</span>");
        return false;
    }

    //Si ha ido todo bien, se envian los datos al servidor
    if (result) {

      if (province === null) {
          province = 'default_province';
      }else if (province.length === 0) {
          province = 'default_province';
      }else if (province === 'Select province') {
          return 'default_province';
      }

      if (city === null) {
          city = 'default_city';
      }else if (city.length === 0) {
          city = 'default_city';
      }else if (city === 'Select city') {
          return 'default_city';
      }

        var data = {"name": name, "last_name": last_name, "bill_date": bill_date, "service_date": service_date, "address": address, "paid_form": paid_form, "nif": nif,
        "email": email, "service": service,"country": country, "province": province, "city": city};

        var data_bills_JSON = JSON.stringify(data);

        $.post('modules/bills/controller/controller_bills.class.php',
                {alta_bills_json: data_bills_JSON},
        function (response) {
            if (response.success) {
                window.location.href = response.redirect;
            }
            //alert(response);  //para debuguear
            //}); //para debuguear
        //}, "json").fail(function (xhr) {

        }, "json").fail(function(xhr, status, error) {
            console.log("1" + xhr.responseText);
            console.log("2" + xhr.responseJSON);

            if (xhr.responseJSON.error.name)
                $("#name").focus().after("<span  class='error1'>" + xhr.responseJSON.error.name + "</span>");

            if (xhr.responseJSON.error.last_name)
                $("#last_name").focus().after("<span  class='error1'>" + xhr.responseJSON.error.last_name + "</span>");

            if (xhr.responseJSON.error.bill_date)
                $("#bill_date").focus().after("<span  class='error1'>" + xhr.responseJSON.error.bill_date + "</span>");

            if (xhr.responseJSON.error.service_date)
                $("#service_date").focus().after("<span  class='error1'>" + xhr.responseJSON.error.service_date + "</span>");

            if (xhr.responseJSON.error.address)
                $("#address").focus().after("<span  class='error1'>" + xhr.responseJSON.error.address + "</span>");

            if (xhr.responseJSON.error.nif)
                $("#nif").focus().after("<span  class='error1'>" + xhr.responseJSON.error.nif + "</span>");

            if (xhr.responseJSON.error.email)
                $("#email").focus().after("<span  class='error1'>" + xhr.responseJSON.error.email + "</span>");

            if (xhr.responseJSON.error.paid_form)
                $("#paid_form").focus().after("<span  class='error1'>" + xhr.responseJSON.error.paid_form + "</span>");

            if (xhr.responseJSON.error.service)
                $("#e_service").focus().after("<span  class='error1'>" + xhr.responseJSON.error.service + "</span>");

            if (xhr.responseJSON.error_avatar)
                $("#dropzone").focus().after("<span  class='error1'>" + xhr.responseJSON.error_avatar + "</span>");

            if(xhr.responseJSON.error.country)
              $("#error_country").focus().after("<span  class='error1'>" + xhr.responseJSON.error.country + "</span>");

            if(xhr.responseJSON.error.province)
              $("#error_province").focus().after("<span  class='error1'>" + xhr.responseJSON.error.province + "</span>");

            if(xhr.responseJSON.error.city)
              $("#error_city").focus().after("<span  class='error1'>" + xhr.responseJSON.error.city + "</span>");

            if (xhr.responseJSON.success1) {
                if (xhr.responseJSON.img_avatar !== "/web/media/default-avatar.png") {
                    //$("#progress").show();
                    //$("#bar").width('100%');
                    //$("#percent").html('100%');
                    //$('.msg').text('').removeClass('msg_error');
                    //$('.msg').text('Success Upload image!!').addClass('msg_ok').animate({ 'right' : '300px' }, 300);
                }
            } else {
                $("#progress").hide();
                $('.msg').text('').removeClass('msg_ok');
                $('.msg').text('Error Upload image!!').addClass('msg_error').animate({'right': '300px'}, 300);
            }
        });
    }
}
    function load_countries_v2(cad) {
        $.getJSON( cad, function(data) {
          $("#country").empty();
          $("#country").append('<option value="" selected="selected">Selecciona el pais</option>');

          $.each(data, function (i, valor) {
            $("#country").append("<option value='" + valor.sISOCode + "'>" + valor.sName + "</option>");
          });
        })
        .fail(function() {
            alert( "error load_countries" );
        });
    }

  /*  function load_countries_v1() {
        $.get( "modules/bills/controller/controller_bills.class.php?load_country=true",
            function( response ) {
                //console.log(response);
                if(response === 'error'){
                    load_countries_v2("resources/ListOfCountryNamesByName.json");
                }else{
                    load_countries_v2("modules/bills/controller/controller_bills.class.php?load_country=true"); //oorsprong.org
                }
        })
        .fail(function(response) {
            load_countries_v2("resources/ListOfCountryNamesByName.json");
        });
    }*/

    function load_countries_v1() {
        //"index.php?module=users&function=load_countries_users&load_country=true"
        console.log("load v1");
        $.post("../bills/load_countries_bills/",{'load_country':true},
                function (response) {
                    //console.log(response);
                    if (response === 'error') {
                        load_countries_v2("../resources/ListOfCountryNamesByName.json");
                    } else {
                        //"index.php?module=users&function=load_countries_users&load_country=true"
                        load_countries_v2("../bills/load_countries_users/",{'load_country':true}); //oorsprong.org
                    }
                })
                .fail(function (response) {
                    load_countries_v2("../../resources/ListOfCountryNamesByName.json");
                });
    }

    function load_provinces_v2() {
        $.get("resources/provinciasypoblaciones.xml", function (xml) {
    	    $("#province").empty();
    	    $("#province").append('<option value="" selected="selected">Selecciona la provincia</option>');

            $(xml).find("provincia").each(function () {
                var id = $(this).attr('id');
                var name = $(this).find('nombre').text();
                $("#province").append("<option value='" + id + "'>" + name + "</option>");
            });
        })
        .fail(function() {
            alert( "error load_provinces" );
        });
    }

    function load_provinces_v1() { //provinciasypoblaciones.xml - xpath
        $.get( "modules/bills/controller/controller_bills.class.php?load_provinces=true",
            function( response ) {
              $("#province").empty();
    	        $("#province").append('<option value="" selected="selected">Selecciona la provincia</option>');

                //alert(response);
            var json = JSON.parse(response);
    		    var provinces=json.provinces;
    		    //alert(provinces);
    		    //console.log(provinces);

    		    //alert(provinces[0].id);
    		    //alert(provinces[0].nombre);

                if(provinces === 'error'){
                    load_provinces_v2();
                }else{
                    for (var i = 0; i < provinces.length; i++) {
            		    $("#province").append("<option value='" + provinces[i].id + "'>" + provinces[i].nombre + "</option>");
        		    }
                }
        })
        .fail(function(response) {
            load_provinces_v2();
        });
    }

    function load_cities_v2(prov) {
        $.get("resources/provinciasypoblaciones.xml", function (xml) {
    		$("#city").empty();
    	    $("#city").append('<option value="" selected="selected">Selecciona la ciudad</option>');

    		$(xml).find('provincia[id=' + prov + ']').each(function(){
        		$(this).find('localidad').each(function(){
        			 $("#city").append("<option value='" + $(this).text() + "'>" + $(this).text() + "</option>");
        		});
            });
    	})
    	.fail(function() {
            alert( "error load_cities" );
        });
    }

    function load_cities_v1(prov) { //provinciasypoblaciones.xml - xpath
        var datos = { idPoblac : prov  };
    	$.post("modules/bills/controller/controller_bills.class.php", datos, function(response) {
    	    //alert(response);
            var json = JSON.parse(response);
    		var cities=json.cities;
    		//alert(poblaciones);
    		//console.log(poblaciones);
    		//alert(poblaciones[0].poblacion);

    		$("#city").empty();
    	    $("#city").append('<option value="" selected="selected">Selecciona la ciudad</option>');

            if(cities === 'error'){
                load_cities_v2(prov);
            }else{
                for (var i = 0; i < cities.length; i++) {
            		$("#city").append("<option value='" + cities[i].poblacion + "'>" + cities[i].poblacion + "</option>");
        		}
            }
    	})
    	.fail(function() {
            load_cities_v2(prov);
        });
    }
