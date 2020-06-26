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
                    minlength:6,
              },
              'password_confirmation': {
                   required: true,
                    minlength:6,
                   equalTo: "#password"
              }
          },
          messages: {
               username: {
                   required: "Username cannot be blank"
               },
              firstname: {
                   required: "Firstname cannot be blank"
              },
              lastname: {
                   required: "Lastname cannot be blank"
               },
              email: {
                   required: "Email cannot be blank",
                   email:"Please enter a valid email address."
              },
              password: {
                   required: "Password cannot be blank"
               },
              password_confirmation: {
                   required: "Confirm password cannot be blank",
                   equalTo:"Confirm password shoul be equal to password"
              }
          },
           
       });

});

function deleteuser(id){
    if(confirm("Delete this user ?")){
        $.ajax({
            type: "DELETE",
            data: {"_token": $('input[name=_token]').val() },
            url: 'users/' + id,
            success: function(result) {
                if(result.status == 'true'){
                    $("#"+id).fadeOut(1000);
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
           //url: url ,
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