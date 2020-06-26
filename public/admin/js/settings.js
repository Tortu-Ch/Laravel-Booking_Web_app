$(document).ready(function() {

       $('#settings_form').validate({ // initialize the plugin
          errorClass: 'text-danger',
          rules: {
               'EMAIL': {
                   required: true
              },
              'videos[]': {
                  required: true
              },
              'pdf[]': {
                  required: true
              }
          },
          messages: {
               email: {
                   required: "Email not be blank"
               },
              videos: {
                  required: "Email not be blank"
              },
              pdf: {
                  required: "Email not be blank"
              }
          },
           
       });

});
