$(document).ready(function() {

       $('#contact_us_form').validate({ // initialize the plugin
          errorClass: 'text-danger',
          rules: {
               'name': {
                   required: true
              },
              'email': {
                   required: true,
                   email:true
              },
              'subject':{
                  required: true
              },
              'contactno':{
                  digits:true
              },
              'message': {
                   required: true
              }
          },
          messages: {
               name: {
                   required: "Name Can not be blank"
               },
              email: {
                   required: "Email Can not be blank",
                   email: "Please enter valid Email"
              },
              subject: {
                   required: "Subject can not be blank"
               },
               contactno: {
                   digits: "Contact no must be only in number"
               },
              message: {
                   required: "Message Can not be blank"
               },
          },
       });

});
