$(document).ready(function() {

       $('#housing_authority_create_form').validate({ // initialize the plugin
          errorClass: 'text-danger',
          rules: {
            'username': {
                   required: true
              },
              'firstname': {
                   required: true
              },
              //  'lastname': {
              //      required: true
              // },
              'email': {
                   required: true,
                   email: true
              },
              'permanent_address': {
                   required: true,
              },
              'state': {
                   required: true,
              },
              'zip': {
                   required: true,
                   number: true,
                    minlength:5
              },
              'city': {
                   required: true,
              },
              'phone': {
                   required: true,
                   number: true,
                    minlength:10
       
              },
              'unit': {
                   number:true
              },
             'contactname': {
                   required: true,
              },
              'contactnumber': {
                   required: true,
                    number: true,
                    minlength:10
              },
               'password': {
                   required: true,
                   minlength:6
              },
              'password_confirmation': {
                required: true,
                   minlength:6,
                   equalTo : "#password"
              },
              'address': {
                   required: true,
              },
          },
          messages: {
              username: {
                   required: "User name cannot be blank"
              },
              firstname: {
                   required: "First name cannot be blank"
              },
              lastname: {
                   required: "Last name cannot be blank"
               },
                email: {
                   required: "Email cannot be blank"
               },
                permanent_address: {
                   required: "Permanent Address cannot be blank"
               },
                state: {
                   required: "State cannot be blank"
               },
                zip: {
                   required: "Zip code cannot be blank",
                   number:"Please enter proper zip"

               },
                city: {
                   required: "City cannot be blank"
               },
                phone: {
                   required: "Phone number cannot be blank"
               },             contactname: {
                   required: "Contact name cannot be blank",
              },
              contactnumber: {
                   required: "Contact number cannot be blank",
              },
               password: {
                   required: "Password cannot be blank",
              },
              password_confirmation: {
                   required: "Confirm password cannot be blank",
              },
              address: {
                   required: "Address cannot be blank",
              },
          },
       });


        $('#housing_authority_edit_form').validate({ // initialize the plugin
          errorClass: 'text-danger',
          rules: {
             'username': {
                   required: true
              },
              // 'firstname': {
              //      required: true
              // },
              //  'lastname': {
              //      required: true
              // },
              'email': {
                   required: true,
                   email: true
              },
              'permanent_address': {
                   required: true,
              },
              'state': {
                   required: true,
              },
              'zip': {
                   required: true,
              },
              'city': {
                   required: true,
              },
              'phone': {
                   required: true,
                   number: true,
                    minlength:10
              },
             'contactname': {
                   required: true,
              },
              'contactnumber': {
                   required: true,
                    number: true,
                    minlength:10
              },
              'address': {
                   required: true,
              },
          },
          messages: {
              username: {
                   required: "User name cannot be blank"
              },
              firstname: {
                   required: "First name cannot be blank"
              },
              lastname: {
                   required: "Last Name cannot be blank"
               },
                email: {
                   required: "Email cannot be blank"
               },
                permanent_address: {
                   required: "Permanent Address cannot be blank"
               },
                state: {
                   required: "State cannot be blank"
               },
                Zip: {
                   required: "Zip code cannot be blank"
               },
                city: {
                   required: "City cannot be blank"
               },
                phone: {
                   required: "Phone number cannot be blank"
               },
                contactname: {
                   required: "Contact name cannot be blank",
              },
                contactnumber: {
                   required: "Contact Number cannot be blank",
              },
                password: {
                   required: "Password cannot be blank",
              },
              address: {
                   required: "Address cannot be blank",
              },
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

$(document).on('click', '.updatedstatus', function() {
       var valw = $(this).val();
       $(this).parents('tr').toggleClass('warning');
       $(this).hide().parent().append('<i class="fa fa-refresh fa-spin"></i>');
       var valuedata = $(this).attr('page-id');
       var updatestatus = $(this).attr('value');
       $(this).addClass('currentclass');

       $.ajax({
           url: 'admin/users/updatestatus/' + valuedata,
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
