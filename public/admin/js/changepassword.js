$(document).ready(function() {

       $('#changepaassword_form').validate({ // initialize the plugin
          errorClass: 'text-danger',
          rules: {
                oldpassword: {
                   required: true,
                   minlength:6,
              },
              'newpassword': {
                   required: true,
                   minlength:6,
              },
              'confirmpassword': {
                   required: true,
                     minlength:6,
                   equalTo: "#newpassword"
              }
          },
          messages: {
               oldpassword: {
                   required: "Oldpassword Can not be blank"
               },
              newpassword: {
                   required: "Newpassword Can not be blank"
              },
              confirmpassword: {
                   required: "Confirmpassword Can not be blank",
                   equalTo:"confirm password should be equal to new password"
              }
          },
           
       });

});