$(document).ready(function() {

       $('#inspector_create_form').validate({ // initialize the plugin
          errorClass: 'text-danger',
          rules: {
              'firstname': {
                   required: true
              },
               'lastname': {
                   required: true
              },
              'username': {
                   required: true,
              },
              'email': {
                   required: true,
                   email:true
              },
              //  'assigned_location': {
              //      required: true
              // },
              //  'status': {
              //      required: true
              // },
              'password': {
                   required: true,
                   minlength:6
              },
              'password_confirmation': {
                required: true,
                   minlength:6,
                   equalTo : "#password"
              }
          },
          messages: {
              firstname: {
                   required: "First name cannot be blank"
              },
              lastname: {
                   required: "Last name cannot be blank"
               },
               email: {
                   required: "Email cannot be blank"
               },
                username: {
                   required: "User name cannot be blank"
               },
               //  assigned_location: {
               //     required: "Location Can not be blank"
               // },
                status: {
                   required: "Status cannot be blank"
               },
              password: {
                   required: "Password cannot be blank",
              },
              password_confirmation: {
                   required: "Confirm password cannot be blank",
              },
          },
       });


         $('#inspector_edit_form').validate({ // initialize the plugin
          errorClass: 'text-danger',
          rules: {
              'firstname': {
                   required: true
              },
               'lastname': {
                   required: true
              },
              'username': {
                   required: true,
              },
              'email': {
                   required: true,
                   email:true
              },
               'status': {
                   required: true
              },
             
          },
          messages: {
              firstname: {
                   required: "First name cannot be blank"
              },
              lastname: {
                   required: "Last name cannot be blank"
               },
                username: {
                   required: "User name cannot be blank"
               },
               //  status: {
               //     required: "Status Can not be blank"
               // },
             
          },
       });
});



function deleteuser(id,url){
  durl=url+id;
  if(confirm("Delete this user ?")){
  $.ajax({
            method:'POST',
            url: durl,
            data:{
                '_token': $('input[name=_token]').val(),
                'id': id,
                '_method':'DELETE',
            },
            success:function(data) {
              $("#"+id).fadeOut(1000);
            }
        });
  }
}

 /*$(document).on('click', '#delete', function() {
        id=$('#delete').attr('data-id');
        url=$('#delete').attr('data-url')+id;
        alert(url);
          /*$.ajax({
            method:'POST',
            url: url,
            data:{
                '_token': $('input[name=_token]').val(),
                'id': id,
                '_method':'DELETE',
            },
            success:function(data) {
              $("#"+id).fadeOut(1000);
            }
        });
      });*/

/*function deleteuser(id){
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
}*/

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
