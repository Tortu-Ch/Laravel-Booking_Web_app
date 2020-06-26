$(document).ready(function() {

       $('#register_form').validate({ // initialize the plugin
          errorClass: 'text-danger',
          rules: {
               'username': {
                   required: true
              },
              'firstname': {
                   required: true
              },
              'lastname':{
                  required: true
              },
              'email': {
                   required: true,
                   email:true
              },

              'password':{
                   required:true,
                   minlength : 6
              },
              'password_confirmation': {
                   minlength : 6,
                   equalTo: "#password"
              }
          },
          messages: {
              username: {
                  required: "User Name Can not be blank"
              },
              firstname: {
                  required: "First Name Can not be blank"
              },
              lastname: {
                  required: "Last Name Can not be blank"
              },
              email: {
                  required: "Email Can not be blank",
                  email: "Please enter valid Email"
              },
              password: {
                  required: "Password can not be blank",
                  minlength: "Password must be at least 6 characters long"
              },
              password_confirmation: {
                  required: "Password confirmation can not be blank",
                  minlength: "Password confirmation must be at least 6 characters long",
                  equalTo: "Confirm password must be same as Password"
              },
          }
       });

});
