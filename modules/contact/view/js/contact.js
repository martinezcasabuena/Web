function paint(dataString) {
    $("#resultMessage").html(dataString).fadeIn("slow");

    setTimeout(function() {
        $("#resultMessage").fadeOut("slow")
    }, 5000);

    //reset the form
    $('#contact_form')[0].reset();

    // hide ajax loader icon
    $('.ajaxLoader').fadeOut("fast");

    // Enable button after processing
    $('#submitBtn').attr('disabled', false);

}

$(document).ready(function(){
    // disable submit button in case of disabled javascript browsers
    $(function(){
        $('#submitBtn').attr('disabled', false);
        $('.ajaxLoader').fadeOut("slow");

    });

    $('#submitBtn').click(function () {
        validate_email();
    });

    function validate_email(){

      var email_reg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
      var string_reg = /^[A-Za-z]{2,30}$/;

      var result = true;
      var inputName = document.getElementById('inputName').value;
      var inputEmail = document.getElementById('inputEmail').value;
      var inputMessage = document.getElementById('inputMessage').value;


      if ($("#inputName").val() == "" || $("#inputName").val() == "Introduce name") {
          $("#inputName").focus().after("<span class='error'>Introduce name</span>");
          result = false;
          return false;
      } else if (!string_reg.test($("#inputName").val())) {
          $("#inputName").focus().after("<span class='error'>Name must be 2 to 30 letters</span>");
          result = false;
          return false;
      }

      if ($("#inputEmail").val() == "" || $("#inputEmail").val() == "Introduce email") {
          $("#inputEmail").focus().after("<span class='error'>Introduce email</span>");
          result = false;
          return false;
      } else if (!email_reg.test($("#inputEmail").val())) {
          $("#inputEmail").focus().after("<span class='error'>Error format email (example@example.com).</span>");
          result = false;
          return false;
      }

      if ($("#inputMessage").val() == "" || $("#inputMessage").val() == "Introduce name") {
        $("#inputMessage").focus().after("<span class='error'>Introduce a message</span>");
          result = false;
          return false;
      }

      if(result!==false){
        // Disable button while processing
        $('#submitBtn').attr('disabled', true);
        // show ajax loader icon
        $('.ajaxLoader').fadeIn("fast");

        var dataString = {"name":inputName,"email":inputEmail, "message": inputMessage};
        var dataEmailJSON = JSON.stringify(dataString);
        var jqxhr = $.post("../../contact/process_contact/",{dataEmail: dataEmailJSON,'sendEmail': true}, function (data) {
        }).done(function () {
            alert( "second success" );
            paint(dataEmailJSON);
        });
      }
    }
});
