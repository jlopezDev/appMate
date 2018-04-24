var amount = 0;
var other_amount = 0;
var $form;
var recurrent = "no";
var recurrent_mode = "";
var current_fs, next_fs, previous_fs;
var left, opacity, scale;
var animating;

$(document).ready(function () {
  $form = $("#payment-form");

  $('#cell_phone, #number, #cvc').keyup(function () {
    this.value = this.value.replace(/[^0-9]/g,'');
  });

  // Payment
  Stripe.setPublishableKey('pk_test_1O6uqaX8dvZOvee1QX0Zz0sU');

  $("#chk-recurrent").change(function(){
    if (this.checked){
      $("div#recurrent-payments").show();
      recurrent = "si";
    }else{
      $("div#recurrent-payments").hide();
      recurrent = "no";
      recurrent_mode = "";
      $("button.btn-recurrent-mode").each(function (i, element) {
        $(this).removeClass("bordered");
      });
    }
  });

  $("button.btn-recurrent-mode").click(function () {
    $("button.btn-recurrent-mode").each(function (i, element) {
      $(this).removeClass("bordered");
    });
    $(this).addClass("bordered");
    recurrent_mode = $(this).attr("data-mode");
  });

  $("button.btn-quantity").click(function () {
    $("button.btn-quantity").each(function (i, element) {
      $(this).removeClass("bordered");
    });

    if (other_amount !== 0){
      $("input#other_amount").val("");
    }
    $(this).addClass("bordered");
    amount = parseInt($(this).attr("data-value"));
      var lang = $("input#lang").val();
      if(lang == "es"){
          $form.find(".submit").html('Donar $' + amount);
      }else{
          $form.find(".submit").html('Donate $' + amount);
      }
    current_fs = $(this).parent().parent().parent();
    next_fs = $(this).parent().parent().parent().next();
    next_step();
  });

  $("input#other_amount").keyup(function () {
    $("button.btn-quantity").removeClass("bordered");
    amount = parseInt($(this).val());
      var lang = $("input#lang").val();
      if(lang == "es"){
          $form.find(".submit").html('Donar $' + amount);
      }else{
          $form.find(".submit").html('Donate $' + amount);
      }
    if($(this) !== ""){
        $("div#first-next-button").show();
    }else{
        $("div#first-next-button").hide();
    }
  });

  $("fieldset input").keyup(function(){
    var value = $(this).val();
    if(value !== ""){
      if($(this).hasClass("empty-field")){
        $(this).removeClass("empty-field");
      }
    }else{
      $(this).addClass("empty-field");
    }
  });

  $("fieldset select").change(function(){
    var value = $(this).val();
    if(value !== ""){
      if($(this).hasClass("empty-field")){
        $(this).removeClass("empty-field");
      }
    }else{
      $(this).addClass("empty-field");
    }
  });

  $("fieldset#step-1 .next").click(function(){
    if(amount === 0 || isNaN(amount)){
      $("fieldset#step-1 p.error-form").show();
    }else{
      $("fieldset#step-1 p.error-form").hide();
      current_fs = $(this).parent().parent().parent();
      next_fs = $(this).parent().parent().parent().next();
      next_step();
    }
  });

  $("fieldset#step-2 .next").click(function(){
    var fields = ["first_name", "last_name", "country", "address", "province", "zip_code", "cell_phone", "email"];
    var i, count_fields = fields.length;
    var form_validate = 1;

    for(i = 0; i < count_fields; i++) {
      var field = $("fieldset#step-2 #" + fields[i]);
      var field_value = field.val();
      var field_email = $("fieldset#step-2 #email");
      var field_email_value = field_email.val();
      if(field_value === ""){
        form_validate = 0;
        $("fieldset#step-2 p.error-form").show();
        field.addClass("empty-field");
      }else if(!validar_email(field_email_value)){
          form_validate = 0;
          $("fieldset#step-2 p.error-form").show();
          field_email.addClass("empty-field");
      }else{
        $("fieldset#step-2 p.error-form").show();
        field.removeClass("empty-field");
      }
    }

    if(form_validate === 1){
      current_fs = $(this).parent().parent().parent();
      next_fs = $(this).parent().parent().parent().next();
      next_step();
    }
  });

  $(".submit").click(function(){
    var fields = ["number", "exp_month", "exp_year", "cvc"];
    var i, count_fields = fields.length;
    var form_validate = 1;

    for(i = 0; i < count_fields; i++) {
      var field = $("fieldset#step-3 #" + fields[i]);
      var field_value = field.val();
      if(field_value === ""){
        form_validate = 0;
        field.addClass("empty-field");
      }else{
        field.removeClass("empty-field");
      }
    }

    if(form_validate === 1){
      process_payment();
    }
    return false;
  })

});

function validar_email( email ) {
    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email) ? true : false;
}

function next_step(){
  if(animating) return false;
  animating = true;

  $(".steps li").eq($("fieldset").index(next_fs)).addClass("active");
  $(".steps-name li").eq($("fieldset").index(next_fs)).addClass("active");

  current_fs.animate({opacity: 0}, {
    step: function(now, mx) {
      scale = 1 - (1 - now) * 0.2;
      left = (now * 50)+"%";
      opacity = 1 - now;
      current_fs.css({
        'transform': 'scale('+scale+')',
        'position': 'absolute'
      });
      next_fs.css({'left': left, 'opacity': opacity});
    },
    duration: 800,
    complete: function(){
      current_fs.hide(500);
      next_fs.show(500);
      animating = false;
    },
    easing: 'easeInOutBack'
  });
}

function previous_step(){
  if(animating) return false;
  animating = true;

  current_fs = $(this).parent().parent().parent();
  previous_fs = $(this).parent().parent().parent().prev();

  $(".steps li").eq($("fieldset").index(current_fs)).removeClass("active");
  $(".steps-name li").eq($("fieldset").index(current_fs)).removeClass("active");

  current_fs.animate({opacity: 0}, {
    step: function(now, mx) {
      scale = 0.8 + (1 - now) * 0.2;
      left = ((1-now) * 50)+"%";
      opacity = 1 - now;
      current_fs.css({'left': left});
      previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
    },
    duration: 800,
    complete: function(){
      current_fs.hide(500);
      previous_fs.show(500);
      animating = false;
    },
    easing: 'easeInOutBack'
  });
}

function process_payment(){
  $form.find("p.error").text("");
  $form.find(".submit").html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
  $form.find(".submit").attr('disabled', true);

  Stripe.card.createToken($form, stripeResponseHandler);
}

function send_payment(){
  var data = $form.serialize() + "&amount=" + amount + "&recurrent=" + recurrent + "&recurrent_mode=" + recurrent_mode;

  $.ajax({
    url: 'payment/store',
    type: 'POST',
    dataType: 'JSON',
    data: data,
    success: function(data){
      $form.find(".submit").html('Aceptar');
      $form.find(".submit").attr('disabled', false);

      var lang = $("input#lang").val();
        var title_m = "";
        var text_m = "";
        var btn_text = "";

        if(lang === "es"){
            title_m  = "Donación realizada con éxito.";
            text_m  = "Gracias por su donación.";
            btn_text  = "Aceptar";
        }else{
            title_m  = "Donation completed with success.";
            text_m  = "Thank you for your donation.";
            btn_text  = "Accept";
        }


      if (data["status"] === "success"){
        swal({
            title: title_m,
            text: text_m,
            type: "success",
            confirmButtonText: btn_text,
            closeOnConfirm: false
          },
          function(){
            if(lang === "es"){
                window.location = "/thanks/" + data["token"];
            }else{
                window.location = "/thanks/en/" + data["token"];
            }
        });
      }else{
        swal({
            title: "Ocurrió un error.",
            text: "Ha ocurrido un problema al procesar su pago, inténte nuevamente.",
            type: "warning",
            confirmButtonText: "Aceptar",
            confirmButtonClass: "btn-danger",
            closeOnConfirm: true
          });
      }
    },
    error: function(jqXHR, textStatus, errorThrown){
      $form.find(".submit").html('Aceptar');
      $form.find(".submit").attr('disabled', false);
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
}

function stripeResponseHandler(status, response){
  var $form = $("#payment-form");
  var errors = {
    incorrect_number: "El número de tarjeta es incorrecto.",
    invalid_number: "El número de tarjeta no es un número de tarjeta válido.",
    invalid_expiry_month: "El mes de caducidad de la tarjeta no es válido.",
    invalid_expiry_year: "El año de caducidad de la tarjeta no es válido.",
    invalid_cvc: "El código de seguridad de la tarjeta no es válido.",
    expired_card: "La tarjeta ha caducado.",
    incorrect_cvc: "El código de seguridad de la tarjeta es incorrecto.",
    incorrect_zip: "Falló la validación del código postal de la tarjeta.",
    card_declined: "La tarjeta fué rechazada.",
    missing: "El cliente al que se está cobrando no tiene tarjeta",
    processing_error: "Ocurrió un error procesando la tarjeta.",
    rate_limit:  "Ocurrió un error debido a consultar la API demasiado rápido. Por favor, avísanos si recibes este error continuamente."
  };
  if (response.error){
    $form.find("p.error").text(errors[response.error.code]);
    $form.find(".submit").html('Aceptar');
    $form.find(".submit").attr('disabled', false);
  }else{
    var token = response.id;
    $form.append($('<input type="hidden" name="stripeToken">').val(token));
    send_payment();
  }
}

function send_thanks(el){
    var data = $("form#message-form").serialize();
    $(el).html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
    $(el).attr('disabled', true);
    var lang = $("input#lang").val();
    $.ajax({
        url: '/thanks/participate',
        type: 'POST',
        dataType: 'JSON',
        data: data,
        success: function(data){
            var title_m = "";
            var text_m = "";
            var btn_text = "";
            if(lang === "es"){
                $(el).html("Enviar");
                title_m = "Envío realizado con éxito.";
                text_m = "Los mensajes han sido enviados.";
                btn_text = "Aceptar";
            }else{
                $(el).html("Send");
                title_m = "Delivery completed with success.";
                text_m = "Messages have been sent.";
                btn_text = "Accept";
            }

            swal({
                    title: title_m,
                    text: text_m,
                    type: "success",
                    confirmButtonText: btn_text,
                    closeOnConfirm: true
                });
            $(el).attr('disabled', false);
        },
        error: function(jqXHR, textStatus, errorThrown){
          if(lang === "es"){
              $(el).html("Enviar");
          }else{
              $(el).html("Send");
          }
            $(el).attr('disabled', false);
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
  return false;
}