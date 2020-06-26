$(document).ready(function() {

       $('#user_form').validate({ // initialize the plugin
          errorClass: 'text-danger',
          rules: {
               'username': {
                   required: true
              },
              'firstname': {
                   required: true
              },
               'lastname': {
                   required: true
              },
              'email': {
                   required: true,
                   email: true
              },
               'password': {
                   required: true,
                   min:6
              },
              'password_confirmation': {
                   required: true,
                   min:6
              }
          },
          messages: {
               username: {
                   required: "username Can not be blank"
               },
              firstname: {
                   required: "username Can not be blank"
              },
              lastname: {
                   required: "username Can not be blank"
               },
              email: {
                   required: "username Can not be blank",
                   email:"Please enter a valid email address."
              },
              password: {
                   required: "username Can not be blank"
               },
              password_confirmation: {
                   required: "username Can not be blank"
              }
          },
           
       });

});

function deleteuser(id){
    if(confirm("Delete this owner ?")){
        $.ajax({
            type: "DELETE",
            data: {"_token": $('input[name=_token]').val() },
            url: 'landlords/' + id,
             success: function(result) {
                if(result.status == 'true'){
                    $("#"+id).fadeOut(1000);
        $('.content-wrapper')
        .prepend('<div class="alert alert-success" role="alert" align="center">'+result.message+'</div>');  
                $(".alert-success").fadeOut(3500);
                }
                else{
                  $('.content-wrapper')
        .prepend('<div class="alert alert-danger" role="alert" align="center">'+result.message+'</div>');  
                $(".alert-danger").fadeOut(3500);
                }
            }
        });
    }
}

$(document).on('click', '.updatedstatus', function() {
       var valw = $(this).val();
       $(this).parents('tr').toggleClass('warning');
       $(this).hide().parent().append('<i class="fa fa-refresh fa-spin"></i>');
       var valuedata = $(this).attr('page-id');
       var updatestatus = $(this).attr('value');
       $(this).addClass('currentclass');

       $.ajax({
           url: 'users/updatestatus/' + valuedata,
           type: 'GET',
           data: "active=" + updatestatus,
       })

       .done(function(data) {
        data = jQuery.parseJSON(data);
           if (data.active == 0) {
               $(".currentclass").removeClass("btn-success").addClass("btn-danger");
               $(".currentclass .fa-check").removeClass("fa-check").addClass("fa-close");
               $(".currentclass").attr("value", data.active)
           } else {
               $(".currentclass").removeClass("btn-danger").addClass("btn-success");
               $(".currentclass .fa-close").removeClass("fa-close").addClass("fa-check");
               $(".currentclass").attr("value", data.active);
           }
           $(".currentclass").show();
           $('.currentclass').find('span').remove();
           $(".currentclass").removeClass("currentclass");
           $('.fa-spin').remove();
       })

       .fail(function(data) {
           $('.fa-spin').remove();
           alert("Error Occured. Please contact Developer");
       });
   });