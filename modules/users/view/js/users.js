//Crear un plugin
jQuery.fn.fill_or_clean = function () {
    this.each(function () {
        //if ($("#name").val() == "") {
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
        if ($("#birth_date").val()== "") {
            $("#birth_date").val("Introduce date of birth");
            $("#birth_date").focus(function () {
                if ($("#birth_date").val() == "Introduce date of birth") {
                    $("#birth_date").val('');
                }
            });
        }
        $("#birth_date").blur(function () {
            if ($("#birth_date").val() == "") {
                $("#birth_date").val("Introduce date of birth");
            }
        });
        if ($("#title_date").val() == "") {
            $("#title_date").val( "Introduce date of title");
            $("#title_date").focus(function () {
                if ($("#title_date").val() == "Introduce date of title") {
                    $("#title_date").val('');
                }
            });
        }
        $("#title_date").blur(function () {
            if ($("#title_date").val() == "") {
                $("#title_date").val( "Introduce date of title");
            }
        });
        if ($("#address").val() == "") {
            $("#address").val( "Introduce address");
            $("#address").focus(function () {
                if ($("#address").val() == "Introduce address") {
                    $("#address").val( "");
                }
            });
        }
        $("#address").blur(function () {
            if ($("#address").val() == "") {
                $("#address").val( "Introduce address");
            }
        });
        if ($("#user").val() == "") {
            $("#user").val( "Introduce user");
            $("#user").focus(function () {
                if ($("#user").val() == "Introduce user") {
                    $("#user").val( "");
                }
            });
        }
        $("#user").blur(function () {
            if ($("#user").val() == "") {
                $("#user").val( "Introduce user");
            }
        });
        if ($("#pass").val() == "") {
            $("#pass").val( "password");
            $("#pass").focus(function () {
                if ($("#pass").val() == "password") {
                    $("#pass").val( "");
                }
            });
        }
        $("#pass").blur(function () {
            if ($("#pass").val() == "") {
                $("#pass").val( "password");
            }
        });
        if ($("#conf_pass").val() == "") {
            $("#conf_pass").val( "password");
            $("#conf_pass").focus(function () {
                if ($("#conf_pass").val() == "password") {
                    $("#conf_pass").val( "");
                }
            });
        }
        $("#conf_pass").blur(function () {
            if ($("#conf_pass").val() == "") {
                $("#conf_pass").val( "password");
            }
        });
        if ($("#email").val() == "") {
            $("#email").val( "Introduce email");
            $("#email").focus(function () {
                if ($("#email").val() == "Introduce email") {
                    $("#email").val( "");
                }
            });
        }
        $("#email").blur(function () {
            if ($("#email").val() == "") {
                $("#email").val( "Introduce email");
            }
        });
        if ($("#conf_email").val() == "") {
            $("#conf_email").val( "Repeat email");
            $("#conf_email").focus(function () {
                if ($("#conf_email").val() == "Repeat email") {
                    $("#conf_email").val( "");
                }
            });
        }
        $("#conf_email").blur(function () {
            if ($("#conf_email").val() == "") {
                $("#conf_email").val( "Repeat email");
            }
        });
    });//each
    return this;
};//function

//Solution to : "Uncaught Error: Dropzone already attached."
Dropzone.autoDiscover = false;
$(document).ready(function () {

    //Datepicker///////////////////////////
    $("#birth_date").datepicker({
        dateFormat: 'mm/dd/yy',
        defaultDate: '05/05/1999',
        changeMonth: true,
        changeYear: true,
        yearRange: '-110:-16'
    });
    $("#title_date").datepicker({
        maxDate: 'today',
        dateFormat: 'mm/dd/yy',
        defaultDate: 'today',
        changeMonth: true,
        changeYear: true
    });

    //Valida users /////////////////////////
    $('#submit_user').click(function () {
        validate_user();
    });

    //Control de seguridad para evitar que al volver atrás de la pantalla results a create, no nos imprima los datos
    $.get("modules/users/controller/controller_users.class.php?load_data=true",
            function (response) {
                //alert(response.user);
                if (response.user === "") {
                    $("#name").val('');
                    $("#last_name").val('');
                    $("#birth_date").val('');
                    $("#title_date").val('');
                    $("#address").val('');
                    $("#user").val('');
                    $("#pass").val('');
                    $("#conf_pass").val('');
                    $("#email").val('');
                    $("#conf_email").val('');
                    $("#en_lvl").val('Select level');
                    var inputElements = document.getElementsByClassName('messageCheckbox');
                    for (var i = 0; i < inputElements.length; i++) {
                        if (inputElements[i].checked) {
                            inputElements[i].checked = false;
                        }
                    }
                    //siempre que creemos un plugin debemos llamarlo, sino no funcionará
    $(this).fill_or_clean();
                } else {
                    $("#name").val( response.user.name);
                    $("#last_name").val( response.user.last_name);
                    $("#birth_date").val( response.user.birth_date);
                    $("#title_date").val( response.user.title_date);
                    $("#address").val( response.user.address);
                    $("#user").val( response.user.user);
                    $("#pass").val( response.user.pass);
                    $("#conf_pass").val( response.user.conf_pass);
                    $("#email").val( response.user.email);
                    $("#conf_email").val( response.user.conf_email);
                    $("#en_lvl").val( response.user.en_lvl);
                    var interests = response.user.interests;
                    var inputElements = document.getElementsByClassName('messageCheckbox');
                    for (var i = 0; i < interests.length; i++) {
                        for (var j = 0; j < inputElements.length; j++) {
                            if(interests[i] ===inputElements[j] )
                                inputElements[j].checked = true;
                        }
                    }
                }
            }, "json");

    //Dropzone function //////////////////////////////////
    $("#dropzone").dropzone({
        url: "modules/users/controller/controller_users.class.php?upload=true",
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
                url: "modules/users/controller/controller_users.class.php?delete=true",
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

    //Utilizamos las expresiones regulares para las funciones de  fadeout
    var email_reg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
    var date_reg = /^(0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](19|20)\d\d$/;
    var address_reg = /^[a-z0-9- -.]+$/i;
    var pass_reg = /^[0-9a-zA-Z]{6,32}$/;
    var string_reg = /^[A-Za-z]{2,30}$/;
    var usr_reg = /^[0-9a-zA-Z]{2,20}$/;

    //realizamos funciones para que sea más práctico nuestro formulario
    $("#name, #last_name").keyup(function () {
        if ($(this).val() != "" && string_reg.test($(this).val())) {
            $(".error").fadeOut();
            return false;
        }
    });

    $("#conf_email").keyup(function () {
        if ($(this).val() != "" && $(this).val() == $('#email').val()) {
            $(".error").fadeOut();
            return false;
        }
    });

    $("#user").keyup(function () {
        if ($(this).val() != "" && usr_reg.test($(this).val())) {
            $(".error").fadeOut();
            return false;
        }
    });

    $("#conf_pass").keyup(function () {
        if ($(this).val() != "" && $(this).val() == $('#pass').val()) {
            $(".error").fadeOut();
            return false;
        }
    });

    $("#pass").keyup(function () {
        if ($(this).val() != "" && pass_reg.test($(this).val())) {
            $(".error").fadeOut();
            return false;
        }
    });

    $("#title_date, #birth_date").keyup(function () {
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
});

function validate_user() {
    var result = true;

    var name = document.getElementById('name').value;
    var last_name = document.getElementById('last_name').value;
    var birth_date = document.getElementById('birth_date').value;
    var title_date = document.getElementById('title_date').value;
    var address = document.getElementById('address').value;
    var en_lvl = document.getElementById('en_lvl').value;
    var user = document.getElementById('user').value;
    var pass = document.getElementById('pass').value;
    var conf_pass = document.getElementById('conf_pass').value;
    var email = document.getElementById('email').value;
    var conf_email = document.getElementById('conf_email').value;
    var interests = [];
    var inputElements = document.getElementsByClassName('messageCheckbox');
    var j = 0;
    for (var i = 0; i < inputElements.length; i++) {
        if (inputElements[i].checked) {
            interests[j] = inputElements[i].value;
            j++;
        }
    }

    //Utilizamos las expresiones regulares para la validación de errores JS
    var email_reg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
    var date_reg = /^(0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](19|20)\d\d$/;
    var address_reg = /^[a-z0-9- -.]+$/i;
    var pass_reg = /^[0-9a-zA-Z]{6,32}$/;
    var string_reg = /^[A-Za-z]{2,30}$/;
    var usr_reg = /^[0-9a-zA-Z]{2,20}$/;

    $(".error").remove();

    if ($("#name").val() == "" || $("#name").val() == "Introduce name") {
        $("#name").focus().after("<span class='error'>Introduce name</span>");
        result = false;
        return false;
    } else if (!string_reg.test($("#name").val())) {
        $("#name").focus().after("<span class='error'>Name must be 2 to 30 letters</span>");
        result = false;
        return false;
    }

    else if ($("#last_name").val() == "" || $("#last_name").val() == "Introduce last name") {
        $("#last_name").focus().after("<span class='error'>Introduce last name</span>");
        result = false;
        return false;
    } else if (!string_reg.test($("#last_name").val())) {
        $("#last_name").focus().after("<span class='error'>Last name must be 2 to 30 letters</span>");
        result = false;
        return false;
    }

    else if ($("#birth_date").val() == "" || $("#birth_date").val() == "Introduce date of birth") {
        $("#birth_date").focus().after("<span class='error'>Introduce date of birth</span>");
        result = false;
        return false;
    } else if (!date_reg.test($("#birth_date").val())) {
        $("#birth_date").focus().after("<span class='error'>error format date (mm/dd/yyyy)</span>");
        result = false;
        return false;
    }

    else if ($("#title_date").val() == "" || $("#title_date").val() == "Introduce date of title") {
        $("#title_date").focus().after("<span class='error'>Introduce date of title</span>");
        result = false;
        return false;
    } else if (!date_reg.test($("#title_date").val())) {
        $("#title_date").focus().after("<span class='error'>error format date (mm/dd/yyyy)</span>");
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

    if ($("#user").val() == "" || $("#user").val() == "Introduce user") {
        $("#user").focus().after("<span class='error'>Introduce user</span>");
        result = false;
        return false;
    } else if (!usr_reg.test($("#user").val())) {
        $("#user").focus().after("<span class='error'>Last name must be 2 to 20 characters.</span>");
        result = false;
        return false;
    }

    if ($("#pass").val() == "" || $("#pass").val() == "password") {
        $("#pass").focus().after("<span class='error'>Introduce pass</span>");
        result = false;
        return false;
    } else if (!pass_reg.test($("#pass").val())) {
        $("#pass").focus().after("<span class='error'>Last name must be 6 to 32 characters.</span>");
        result = false;
        return false;
    }

    if ($("#conf_pass").val() == "" || $("#conf_pass").val() == "password") {
        $("#conf_pass").focus().after("<span class='error'>Repeat pass</span>");
        result = false;
        return false;
    } else if ($("#pass").val() != $("#conf_pass").val()) {
        $("#conf_pass").focus().after("<span class='error'>Pass doesn't match.</span>");
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

    if ($("#conf_email").val() == "" || $("#conf_email").val() == "Repeat email") {
        $("#conf_email").focus().after("<span class='error'>Repeat email</span>");
        result = false;
        return false;
    } else if ($("#email").val() != $("#conf_email").val()) {
        $("#conf_email").focus().after("<span class='error'>Email doesn't match.</span>");
        result = false;
        return false;
    }

    //Si ha ido todo bien, se envian los datos al servidor
    if (result) {
        var data = {"name": name, "last_name": last_name, "birth_date": birth_date, "title_date": title_date, "address": address, "en_lvl": en_lvl, "user": user, "pass": pass, "conf_pass": conf_pass,
            "email": email, "conf_email": conf_email, "interests": interests};

        var data_users_JSON = JSON.stringify(data);

        $.post('modules/users/controller/controller_users.class.php',
                {alta_users_json: data_users_JSON},
        function (response) {
            if (response.success) {
                window.location.href = response.redirect;
            }
            //alert(response);  //para debuguear
            //}); //para debuguear
        //}, "json").fail(function (xhr) {

        }, "json").fail(function(xhr, status, error) {
            console.log(xhr.responseText);
            console.log(xhr.responseJSON);

            if (xhr.responseJSON.error.name)
                $("#name").focus().after("<span  class='error1'>" + xhr.responseJSON.error.name + "</span>");

            if (xhr.responseJSON.error.last_name)
                $("#last_name").focus().after("<span  class='error1'>" + xhr.responseJSON.error.last_name + "</span>");

            if (xhr.responseJSON.error.birth_date)
                $("#birth_date").focus().after("<span  class='error1'>" + xhr.responseJSON.error.birth_date + "</span>");

            if (xhr.responseJSON.error.title_date)
                $("#title_date").focus().after("<span  class='error1'>" + xhr.responseJSON.error.title_date + "</span>");

            if (xhr.responseJSON.error.address)
                $("#address").focus().after("<span  class='error1'>" + xhr.responseJSON.error.address + "</span>");

            if (xhr.responseJSON.error.user)
                $("#user").focus().after("<span  class='error1'>" + xhr.responseJSON.error.user + "</span>");

            if (xhr.responseJSON.error.pass)
                $("#pass").focus().after("<span  class='error1'>" + xhr.responseJSON.error.pass + "</span>");

            if (xhr.responseJSON.error.conf_pass)
                $("#conf_pass").focus().after("<span  class='error1'>" + xhr.responseJSON.error.conf_pass + "</span>");

            if (xhr.responseJSON.error.email)
                $("#email").focus().after("<span  class='error1'>" + xhr.responseJSON.error.email + "</span>");

            if (xhr.responseJSON.error.conf_email)
                $("#conf_email").focus().after("<span class='error1'>" + xhr.responseJSON.error.conf_email + "</span>");

            if (xhr.responseJSON.error.en_lvl)
                $("#en_lvl").focus().after("<span  class='error1'>" + xhr.responseJSON.error.en_lvl + "</span>");

            if (xhr.responseJSON.error.interests)
                $("#e_interests").focus().after("<span  class='error1'>" + xhr.responseJSON.error.interests + "</span>");

            if (xhr.responseJSON.error_avatar)
                $("#dropzone").focus().after("<span  class='error1'>" + xhr.responseJSON.error_avatar + "</span>");

            if (xhr.responseJSON.success1) {
                if (xhr.responseJSON.img_avatar !== "/3_fileupload_dropzone/media/default-avatar.png") {
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
