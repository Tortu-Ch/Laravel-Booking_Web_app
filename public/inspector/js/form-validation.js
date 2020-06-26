$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='registration']").validate({
    ignore: ".ignore",
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      firstname: "required",
      email_addr: "required",
/*      email_addr: {
        required: true,
        // Specify that email should be validated
        // by the built-in "email" rule
        email: true
      },*/
      contact_num: {
        required: true,
        minlength: 8
      },
      msg:{
        required: true,
        minlength: 8 
      },
      hiddenRecaptcha: {
     required: function() {
         if(grecaptcha.getResponse() == '') {
          console.log("hdawjudgwai");
             return true;
         } else {
             return false;
         }
     }
},
    },
    // Specify validation error messages
    messages: {
      firstname: "Please enter your name",
     // email_addr: "Please provide an email",
   email_addr: {
    required: "Please provide a email",
    email:"Please enter a valid email",
   },
         contact_num: {
      required: "Please provide a contact number",
      minlength: "Contact number must be at least 8 characters long",
      },
      msg:{
        required: "Please enter a message",
      minlength: "Contact number must be at least 8 characters long"
      },
      hiddenRecaptcha:"Please fill the captcha"
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});