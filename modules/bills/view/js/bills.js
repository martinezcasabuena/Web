//Crear un plugin

jQuery.fn.fill_or_clean = function () {
    this.each(function () {
        if ($("#name").attr("value") == "") {
            $("#name").attr("value", "Introduce name");
            $("#name").focus(function () {
                if ($("#name").attr("value") == "Introduce name") {
                    $("#name").attr("value", "");
                }
            });
        }
        $("#name").blur(function () { //Onblur se activa cuando el usuario retira el foco
            if ($("#name").attr("value") == "") {
                $("#name").attr("value", "Introduce name");
            }
        });

        if ($("#last_name").attr("value") == "") {
            $("#last_name").attr("value", "Introduce last name");
            $("#last_name").focus(function () {
                if ($("#last_name").attr("value") == "Introduce last name") {
                    $("#last_name").attr("value", "");
                }
            });
        }
        $("#last_name").blur(function () {
            if ($("#last_name").attr("value") == "") {
                $("#last_name").attr("value", "Introduce last name");
            }
        });
        if ($("#nif").attr("value") == "") {
            $("#nif").attr("value", "Introduce nif");
            $("#nif").focus(function () {
                if ($("#nif").attr("value") == "Introduce nif") {
                    $("#nif").attr("value", "");
                }
            });
        }
        $("#nif").blur(function () {
            if ($("#nif").attr("value") == "") {
                $("#nif").attr("value", "Introduce nif");
            }
        });
        if ($("#address").attr("value") == "") {
            $("#address").attr("value", "Introduce address");
            $("#address").focus(function () {
                if ($("#address").attr("value") == "Introduce address") {
                    $("#address").attr("value", "");
                }
            });
        }
        $("#address").blur(function () {
            if ($("#address").attr("value") == "") {
                $("#address").attr("value", "Introduce address");
            }
        });
        if ($("#email").attr("value") == "") {
            $("#email").attr("value", "Introduce email");
            $("#email").focus(function () {
                if ($("#email").attr("value") == "Introduce email") {
                    $("#email").attr("value", "");
                }
            });
        }
        $("#email").blur(function () {
            if ($("#email").attr("value") == "") {
                $("#email").attr("value", "Introduce email");
            }
        });
        if ($("#bill_date").attr("value") == "") {
            $("#bill_date").attr("value", "Introduce date of bill");
            $("#bill_date").focus(function () {
                if ($("#bill_date").attr("value") == "Introduce date of bill") {
                    $("#bill_date").attr("value", "");
                }
            });
        }
        $("#bill_date").blur(function () {
            if ($("#bill_date").attr("value") == "") {
                $("#bill_date").attr("value", "Introduce date of bill");
            }
        });
        if ($("#service_date").attr("value") == "") {
            $("#service_date").attr("value", "Introduce date of service");
            $("#service_date").focus(function () {
                if ($("#service_date").attr("value") == "Introduce date of service") {
                    $("#service_date").attr("value", "");
                }
            });
        }
        $("#service_date").blur(function () {
            if ($("#service_date").attr("value") == "") {
                $("#service_date").attr("value", "Introduce date of service");
            }
        });
    });//each
    return this;
};//function

$(document).ready(function () {
    $(this).fill_or_clean(); //siempre que creemos un plugin debemos llamarlo, sino no funcionará

    var email_reg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
    var date_reg = /^(0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](19|20)\d\d$/;
    var address_reg = /^[a-z0-9- -.]+$/i;
    var string_reg = /^[A-Za-z]{2,30}$/;
    var nif_reg = /^(\d{8})([A-Z])$/;

    $("#submit_bill").click(function () {
        $(".error").remove();
        console.log("SUBMIT");
        if ($("#name").val() == "" || $("#name").val() == "Introduce name") {
            $("#name").focus().after("<span class='error'>Introduce name</span>");
            return false;
        } else if (!string_reg.test($("#name").val())) {
            $("#name").focus().after("<span class='error'>Name must be 2 to 30 letters</span>");
            return false;
        }

        if ($("#last_name").val() == "" || $("#last_name").val() == "Introduce last name") {
            $("#last_name").focus().after("<span class='error'>Introduce last name</span>");
            return false;
        } else if (!string_reg.test($("#last_name").val())) {
            $("#last_name").focus().after("<span class='error'>Last name must be 2 to 30 letters</span>");
            return false;
        }

        if ($("#bill_date").val() == "" || $("#bill_date").val() == "Introduce date of bill") {
            $("#bill_date").focus().after("<span class='error'>Introduce date of bill</span>");
            return false;
        } else if (!date_reg.test($("#bill_date").val())) {
            $("#bill_date").focus().after("<span class='error'>error format date (mm/dd/yyyy)</span>");
            return false;
        }

        if ($("#service_date").val() == "" || $("#service_date").val() == "Introduce date of service") {
            $("#service_date").focus().after("<span class='error'>Introduce date of service</span>");
            return false;
        } else if (!date_reg.test($("#service_date").val())) {
            $("#service_date").focus().after("<span class='error'>error format date (mm/dd/yyyy)</span>");
            return false;
        }

        if ($("#address").val() == "" || $("#address").val() == "Introduce address") {
            $("#address").focus().after("<span class='error'>Introduce address</span>");
            return false;
        } else if (!address_reg.test($("#address").val())) {
            $("#address").focus().after("<span class='error'>Address don't have  symbols.</span>");
            return false;
        }

        if ($("#nif").val() == "" || $("#nif").val() == "Introduce nif") {
            $("#nif").focus().after("<span class='error'>Introduce nif</span>");
            return false;
        } else if (!nif_reg.test($("#nif").val())) {
            $("#nif").focus().after("<span class='error'>Introduce a valid nif.</span>");
            return false;
        }

        if ($("#email").val() == "" || $("#email").val() == "Introduce email") {
            $("#email").focus().after("<span class='error'>Introduce email</span>");
            return false;
        } else if (!email_reg.test($("#email").val())) {
            $("#email").focus().after("<span class='error'>Error format email (example@example.com).</span>");
            return false;
        }

        $("#form_bill").submit();
        $("#form_bill").attr("action", "index.php?module=bills");

    });

    //realizamos funciones para que sea más práctico nuestro formulario
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
});
