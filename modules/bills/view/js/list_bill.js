function load_bills() {
    var jqxhr = $.post("../../bills/load_bills/", {'load': true}, function (data) {
      //console.log(data);
      var json = JSON.parse(data);
      console.log(json);
      pintar_bill(json);
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
    load_bills();
});

function pintar_bill(data) {
    //alert(data.bill.avatar);
    var content = document.getElementById("content");
    var div_bill = document.createElement("div");
    var parrafo = document.createElement("p");

    var msje = document.createElement("div");
    msje.innerHTML = "msje = ";
    msje.innerHTML += data.msje;

    var name = document.createElement("div");
    name.innerHTML = "name = ";
    name.innerHTML += data.bill.name;

    var last_name = document.createElement("div");
    last_name.innerHTML = "last_name = ";
    last_name.innerHTML += data.bill.last_name;

    var bill_date = document.createElement("div");
    bill_date.innerHTML = "bill_date = ";
    bill_date.innerHTML += data.bill.bill_date;

    var service_date = document.createElement("div");
    service_date.innerHTML = "service_date = ";
    service_date.innerHTML += data.bill.service_date;

    var address = document.createElement("div");
    address.innerHTML = "address = ";
    address.innerHTML += data.bill.address;

    var nif = document.createElement("div");
    nif.innerHTML = "nif = ";
    nif.innerHTML += data.bill.nif;

    var email = document.createElement("div");
    email.innerHTML = "email = ";
    email.innerHTML += data.bill.email;

    var paid_form = document.createElement("div");
    paid_form.innerHTML = "paid_form = ";
    paid_form.innerHTML += data.bill.paid_form;

    var service = document.createElement("div");
    service.innerHTML = "service = ";
    for(var i =0;i < data.bill.service.length;i++){
    service.innerHTML += " - "+data.bill.service[i];
    }

    var cad = data.bill.avatar;
    var img = document.createElement("div");
    var html = '<img src="../../' + cad + '" height="100" width="100"> ';

    img.innerHTML = html;

    div_bill.appendChild(parrafo);
    parrafo.appendChild(msje);
    parrafo.appendChild(name);
    parrafo.appendChild(last_name);
    parrafo.appendChild(bill_date);
    parrafo.appendChild(service_date);
    parrafo.appendChild(address);
    parrafo.appendChild(paid_form);
    parrafo.appendChild(nif);
    parrafo.appendChild(email);
    parrafo.appendChild(service);
    content.appendChild(div_bill);
    content.appendChild(img);
}
