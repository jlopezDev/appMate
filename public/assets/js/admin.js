$(document).ready(function () {
  var $login_form = $("form#login-form");
  $('[data-toggle="tooltip"]').tooltip();

  if($('table.datatables').length){
    $('.datatable').DataTable({
      "language": {
        "lengthMenu": "Mostrando _MENU_ resultados por página",
        "zeroRecords": "Nothing found - sorry",
        "info": "Página _PAGE_ de _PAGES_",
        "infoEmpty": "No se han encontrado resultados",
        "infoFiltered": "(filtered from _MAX_ total records)",
        "paginate": {
          "first":      "Primero",
          "last":       "Último",
          "next":       "Siguiente",
          "previous":   "Anterior"
        },
        "search": "Buscar:"
      }
    });
  }

  $login_form.submit(function (e) {
      e.preventDefault();
      $login_form.find(".login-button").html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
      $login_form.find(".login-button").attr('disabled', true);

      var data = $(this).serialize();

      $.ajax({
        url: '/admin/authenticate',
        type: 'POST',
        dataType: 'JSON',
        data: data,
        success: function(data){
          $login_form.find(".login-button").html('<i class="fa fa-chevron-right"></i>');
          $login_form.find(".login-button").attr('disabled', false);
          console.log(data);
          if(data.status === "ok"){
            $("div.login-box").addClass("zoomOut animated");
            window.location = "/donations";
          }else{
            swal({
              title: data.error["codigo"],
              text: data.error["mensaje"],
              type: "warning",
              confirmButtonText: "Aceptar",
              confirmButtonClass: "btn-danger",
              closeOnConfirm: true
            });
          }
        },
        error: function(jqXHR, textStatus, errorThrown){
          $login_form.find(".login-button").html('<i class="fa fa-chevron-right"></i>');
          $login_form.find(".login-button").attr('disabled', false);
          swal({
            title: "Ocurrió un error.",
            text: "Ha ocurrido un problema al procesar su pago, inténte nuevamente.",
            type: "warning",
            confirmButtonText: "Aceptar",
            confirmButtonClass: "btn-danger",
            closeOnConfirm: true
          });
        }
      });
  });

});

function showDonation(el, id){
  $(el).html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
  $(el).attr('disabled', true);
  $.ajax({
    url: "/donation",
    type: 'POST',
    dataType: 'JSON',
    data: {id: id},
    success: function(data){
      if(data.status==="success") {
        $(el).html('<i class="fa fa-eye" aria-hidden="true"></i>');
        $(el).attr('disabled', false);

        $("div.modal.donation td#names").html(data.donation["first_name"] + " " + data.donation["last_name"]);
        $("div.modal.donation td#cell_phone").html(data.donation["cell_phone"]);
        $("div.modal.donation td#email").html(data.donation["email"]);
        $("div.modal.donation td#country").html(data.donation["country"]);
        $("div.modal.donation td#province").html(data.donation["province"]);
        $("div.modal.donation td#address").html(data.donation["address"]);
        $("div.modal.donation td#zip_code").html(data.donation["zip_code"]);
        $("div.modal.donation td#amount").html("$" + data.donation["amount"]);

        var type_payment = "";
        if (data.donation["recurrent"] === "si"){
          if (data.donation["recurrent_mode"] === "mensual"){
            type_payment = "Recurrente mensual";
          }else{
            type_payment = "Recurrente anual";
          }
        }else{
          type_payment = "Único";
        }
        $("div.modal.donation td#payment_type").html(type_payment);

        $("div.modal.donation").modal("show");
        console.log(data);
      }
    },
    error: function(jqXHR, textStatus, errorThrown){
      swal({  title: "Ha ocurrido un error",
        text: "Por favor intenta de nuevo.",
        type: "error"});
      $(el).html('<i class="fa fa-eye" aria-hidden="true"></i>');
      $(el).attr('disabled', false);
    }
  });
}

function cancelDonation(el, id){
  swal({
      title: "¿Está seguro?",
      text: "¿Deseas cancelar el pago recurrente de este usuario?",
      type: "warning",
      showCancelButton: true,
      confirmButtonText: "Aceptar",
      closeOnConfirm: false,
      showLoaderOnConfirm: true
    },
    function(){
      $.ajax({
        url: "/donation/cancel",
        type: 'POST',
        dataType: 'JSON',
        data: {id: id},
        success: function(data){
          if(data.status==="success") {
            swal({
              title: "Pago recurrente cancelado",
              text: "El pago recurrente ha sido cancelado con éxito.",
              type: "success",
              confirmButtonText: "Aceptar",
              closeOnConfirm: false
            },
            function(){
              window.location = "/donations";
            });
          }
        },
        error: function(jqXHR, textStatus, errorThrown){
          swal({  title: "Ha ocurrido un error",
            text: "Por favor intenta de nuevo.",
            type: "error"});
        }
      });
  });
}