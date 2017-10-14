function load_details() {
//  $idBill=$_SESSION["idBill"];

    var jqxhr = $.get("modules/listbills/controller/controller_listbills.class.php?loadBill", function (data) {
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

  var content = document.getElementById("content");
  var div_bill = document.createElement("div");
  var parrafo = document.createElement("p");


  //createLine("name","nameLabel","nameValue","Nombre");


  /*function createLine(nameDiv,nameLabel,nameValue,labelText){
    nameDiv = document.createElement("div");
    nameLabel = document.createElement("label");
    nameValue = document.createElement("input");
    nameLabel.innerHTML = labelText;
    nameValue.type = "text";
    nameValue.value = data.bill[0].name;
    nameValue.readOnly = "true";

    nameDiv.appendChild(nameLabel);
    nameDiv.appendChild(nameValue);
    parrafo.appendChild(nameDiv);

  }*/

  var nameDiv = document.createElement("div");
  var nameLabel = document.createElement("label");
  var nameValue = document.createElement("input");
  nameLabel.innerHTML = "Nombre";
  nameValue.type = "text";
  nameValue.value = data.bill[0].name;
  nameValue.readOnly = "true";

  nameDiv.appendChild(nameLabel);
  nameDiv.appendChild(nameValue);

  var last_nameDiv = document.createElement("div");
  var last_nameLabel = document.createElement("label");
  var last_nameValue = document.createElement("input");
  last_nameLabel.innerHTML = "Apellidos";
  last_nameValue.type = "text";
  last_nameValue.value = data.bill[0].last_name;
  last_nameValue.readOnly = "true";

  last_nameDiv.appendChild(last_nameLabel);
  last_nameDiv.appendChild(last_nameValue);

  var nifDiv = document.createElement("div");
  var nifLabel = document.createElement("label");
  var nifValue = document.createElement("input");
  nifLabel.innerHTML = "NIF";
  nifValue.type = "text";
  nifValue.value = data.bill[0].nif;
  nifValue.readOnly = "true";

  nifDiv.appendChild(nifLabel);
  nifDiv.appendChild(nifValue);

  var emailDiv = document.createElement("div");
  var emailLabel = document.createElement("label");
  var emailValue = document.createElement("input");
  emailLabel.innerHTML = "Email";
  emailValue.type = "text";
  emailValue.value = data.bill[0].email;
  emailValue.readOnly = "true";

  emailDiv.appendChild(emailLabel);
  emailDiv.appendChild(emailValue);

  var addressDiv = document.createElement("div");
  var addressLabel = document.createElement("label");
  var addressValue = document.createElement("input");
  addressLabel.innerHTML = "Nombre";
  addressValue.type = "text";
  addressValue.value = data.bill[0].address;
  addressValue.readOnly = "true";

  addressDiv.appendChild(addressLabel);
  addressDiv.appendChild(addressValue);

  var bill_dateDiv = document.createElement("div");
  var bill_dateLabel = document.createElement("label");
  var bill_dateValue = document.createElement("input");
  bill_dateLabel.innerHTML = "Fecha factura";
  bill_dateValue.type = "text";
  bill_dateValue.value = data.bill[0].bill_date;
  bill_dateValue.readOnly = "true";

  bill_dateDiv.appendChild(bill_dateLabel);
  bill_dateDiv.appendChild(bill_dateValue);

  var service_dateDiv = document.createElement("div");
  var service_dateLabel = document.createElement("label");
  var service_dateValue = document.createElement("input");
  service_dateLabel.innerHTML = "Fecha servicio";
  service_dateValue.type = "text";
  service_dateValue.value = data.bill[0].service_date;
  service_dateValue.readOnly = "true";

  service_dateDiv.appendChild(service_dateLabel);
  service_dateDiv.appendChild(service_dateValue);

  var paid_formDiv = document.createElement("div");
  var paid_formLabel = document.createElement("label");
  var paid_formValue = document.createElement("input");
  paid_formLabel.innerHTML = "Forma de pago";
  paid_formValue.type = "text";
  paid_formValue.value = data.bill[0].paid_form;
  paid_formValue.readOnly = "true";

  paid_formDiv.appendChild(paid_formLabel);
  paid_formDiv.appendChild(paid_formValue);

  var serviceDiv = document.createElement("div");
  var serviceLabel = document.createElement("label");
  var serviceValue = document.createElement("input");
  var value="";
  serviceLabel.innerHTML = "Servicio";
  serviceValue.type = "text";
  serviceValue.readOnly = "true";

  if(data.bill[0].venta==1){
      value= value + "- Venta";
  }
  if (data.bill[0].reparacion==1) {
      value= value + "- Reparacion";
  }
  if (data.bill[0].sustitucion==1) {
      value= value + "- Sustitucion";
  }
  if (data.bill[0].revision==1) {
      value= value + "- Revision";
  }
  serviceValue.value = value;

  serviceDiv.appendChild(serviceLabel);
  serviceDiv.appendChild(serviceValue);


  var cityDiv = document.createElement("div");
  var cityLabel = document.createElement("label");
  var cityValue = document.createElement("input");
  cityLabel.innerHTML = "Ciudad";
  cityValue.type = "text";
  cityValue.value = data.bill[0].city;
  cityValue.readOnly = "true";

  cityDiv.appendChild(cityLabel);
  cityDiv.appendChild(cityValue);

  var cad = data.bill[0].avatar;
  var img = document.createElement("div");
  var html = '<img src="' + cad + '" height="75" width="75"> ';
  img.innerHTML = html;

  div_bill.appendChild(parrafo);
  parrafo.appendChild(nameDiv);
  parrafo.appendChild(last_nameDiv);
  parrafo.appendChild(nifDiv);
  parrafo.appendChild(emailDiv);
  parrafo.appendChild(addressDiv);
  parrafo.appendChild(bill_dateDiv);
  parrafo.appendChild(service_dateDiv);
  parrafo.appendChild(paid_formDiv);
  parrafo.appendChild(serviceDiv);
  parrafo.appendChild(cityDiv);
  content.appendChild(div_bill);
  content.appendChild(img);
}
