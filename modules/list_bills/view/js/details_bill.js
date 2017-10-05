function load_details() {
//  $idBill=$_SESSION["idBill"];

    var jqxhr = $.get("modules/list_bills/controller/controller_bills.class.php?loadBill", function (data) {
        //alert( "success" );
        var json = JSON.parse(data);
        console.log(json);
        pintar_details(json);
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
});

function pintar_details(data){
  //var result=data.bill[0].name;
  result = data.bill[0].name + ' ' + data.bill[0].last_name + ' ' + data.bill[0].id;
  console.log(result);

  /*var lista = document.getElementById("content");
  var div = document.createElement("div");
  var label = document.createElement("label");
  var btnDetails = document.createElement("button");

  label.appendChild(document.createTextNode(result));
  btnDetails.appendChild(document.createTextNode("Detalles"));
  btnDetails.id=data.bill.id;
  div.appendChild(label);
  label.appendChild(btnDetails);
  lista.appendChild(div);
*/
}
