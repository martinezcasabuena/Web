function load_bills() {
    var jqxhr = $.get("modules/list_bills/controller/controller_bills.class.php?allbills=true", function (data) {
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

    var result;
    for(var i=0;i<data.bill.length;i++)
    {
      console.log(data.bill[i].name + ' ' + data.bill[i].last_name + ' ' + data.bill[i].id);
      result = data.bill[i].name + ' ' + data.bill[i].last_name + ' ' + data.bill[i].id;

      var lista = document.getElementById("content");

      var div = document.createElement("div");
      var label = document.createElement("label");
      var btnDetails = document.createElement("button");
      label.appendChild(document.createTextNode(result));
      btnDetails.appendChild(document.createTextNode("Detalles"));
      btnDetails.id=data.bill[i].id;

      var cad = data.bill[i].avatar;
      var img = document.createElement("div");
      var html = '<img src="' + cad + '" height="100" width="100"> ';
      img.innerHTML = html;

      div.appendChild(label);
      div.appendChild(img);
      label.appendChild(btnDetails);
      lista.appendChild(div);
      btnDetails.onclick= verDetalles;
    }

   function verDetalles(){
     var idBill=this.id;
     $.get("modules/list_bills/controller/controller_bills.class.php?details_bill=" + idBill, function (data) {
       window.location.replace("index.php?module=list_bills&view=details_bill");
         //alert( "success" );
     })
   }
}
