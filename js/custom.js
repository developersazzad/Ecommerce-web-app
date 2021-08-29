//==============ADD TO CART AND DETAL,S===============//
function manage_cart(pid, type) {
  if (type == "update") {
    var qty = $("#" + pid + "qty").val();
  } else {
    var qty = $("#qty").val();
  }

  $.post('add_to_cart_core.php', {
    p_id: pid,
    qty: qty,
    type: type
  }, function(mydata) {
    if (type == 'remove' || type == 'update') {
      window.location.href = window.location.href;
    }
    if(mydata==5558000){
      alert("Not ableable");
    }else{
       $('.htc__qua').html(mydata);
    }

  })
}
//================login========click btn======//
//============================================//
$(document).ready(function() {
  $('.click_btn').click(function() {
    $('.resister_hide').addClass('show_this');
    $('.login_show').addClass('hide_this');
  });
});
///srofting=====================//
function change_softing(cat_id) {
  var sorfting_option_id = jQuery("#sorfting_option").val();
  window.location.href = "Catagoris.php?id=" + cat_id + "&sort=" + sorfting_option_id;
}
//add to wistall list===============================//
//==============================================//
function add_to_wistall(id_product, type_work) {
  jQuery.ajax({
    url: 'add_to_wistall.php',
    type: 'post',
    data: 'pid=' + id_product + '&type=' + type_work,
    success: function(result) {
      if (5898989 == result) {
        window.location.href = 'login_res.php';
      }
      $('.htc__wishlist').html(result);
    }
  })
}
//email veryfication//
function email_sand_otp() {
  $('#user_email_error').html('');
  var email = $('.user_email_res_one').val();
  if (email == '') {
    $('#user_email_error').html('pleace enter email id.');
  } else {
    jQuery.ajax({
      url: 'sand_otp.php',
      type: 'post',
      data: 'email=' + email + '&type=email',
      success: function(result) {
        if (result == 202020) {
          $('#user_email').attr('desabled', true);
          $('.otp_box').show();
          $('.button_otp').show();
          $('.button_eml').hide();
        } else {
          $('#user_email_error').html('pleace try after sometime.');
        }
      }
    })

  }

}

function verify_otp() {
  $('#user_email_error').html('');
  var otp = $('#user_otp').val();
  if (otp == '') {
    $('#user_email_error').html('pleace enter otp.');
  } else {
    jQuery.ajax({
      url: 'sand_otp.php',
      type: 'post',
      data: 'otp=' + otp + '&type=verify',
      success: function(result) {
        if (result == 99999) {
          $('.button_otp').hide();
          $('.user_otp_fild').hide();
          $('.email_verify_result').html("your email verify complete.");
          $('.btn_hero_res').attr("disabled",false);

        }
        if (result == 9191919) {
          $('#user_email_error').html('Your otp is rong.pleace enter carect otp.');
        }
      }
    });
  }
};

function resister_now(){
  var name = $('#user_name').val();
  var email = $('#user_email_res').val();
  var pass = $('#user_pass_res').val();
  var mobile = $('#user_mobile').val();
  var error="";
  //validation compleate//
    if(name==''){
      $("#user_name_blank").html("pleace enter name");
      var error="error";
    }
    if(pass==''){
      $("#user_password_blank").html("pleace entar password");
       var error="error";
    }
    if(mobile==''){
      $("#user_mobile_blank").html("pleace entar mobile number");
       var error="error";
    }
     alert(error);
    if(error=""){
      jQuery.ajax({
          url: 'res_check.php',
          type: 'post',
          data: '&name='+name+'&email='+email+'&pass='+ pass+'&mobile='+mobile,
          success: function(result) {
            if(result==34343434){
              window.location.href='login_res.php';
            }
          }
        })
    }

  };
  //==================profile ========================//
  $(".click_to_show_edit_name").click(function(){
    $(".name_edit_box").show();
     $(".name_edit_box_pass").hide();
     $(".name_edit_box_mobile").hide();

  });

  $(".click_to_show_edit_password").click(function(){
    $(".name_edit_box").hide();
     $(".name_edit_box_pass").show();
     $(".name_edit_box_mobile").hide();
  });

  $(".click_to_show_edit_mobile").click(function(){
    $(".name_edit_box").hide();
     $(".name_edit_box_pass").hide();
     $(".name_edit_box_mobile").show();
  });
