function load_details() {
    var jqxhr = $.get("modules/list_bills/controller/controller_bills.class.php?details_bill=true", function (data) {

        //alert( "success" );
    }).done(function () {
        //alert( "second success" );
    }).fail(function () {
        //alert( "error" );
    }).always(function () {
        //alert( "finished" );
    });
    jqxhr.always(function () {
        //alert( "second finished" );
    });
}

$(document).ready(function () {
    load_details();
    alert();
});
