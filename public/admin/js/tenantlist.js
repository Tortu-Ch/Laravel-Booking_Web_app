$(document).ready(function() {

       $('#tenant_create_form').validate({ // initialize the plugin
          errorClass: 'text-danger',
          rules: {
              'firstname': {
                   required: true
              },
              //  'lastname': {
              //      required: true
              // },
              'permanentaddress': {
                   required: true,
              },
              'state': {
                   required: true,
              },
              'zip': {
                   required: true,
                  minlength:5,
                  number:true
              },
              'city': {
                   required: true,
              },
              'property_address':{
                  required:true,
              },
              'property_city':{
                  required:true,
              },
              'property_state':{
                  required:true,
              },
              'property_zip':{
                  required:true,
                  minlength:5,
                  number:true,
              },
              // 'caseworker': {
              //      required: true,
              // }
          },
          messages: {
              firstname: {
                   required: "First name cannot be blank"
              },
              // lastname: {
              //      required: "Last Name cannot be blank"
              //  },
                permanentaddress: {
                   required: "Permanent address cannot be blank"
               },
                state: {
                   required: "State cannot be blank"
               },
                zip: {
                   required: "Zip code cannot be blank"
               },
                city: {
                   required: "City cannot be blank"
               },
              // caseworker: {
              //      required: "Case Worker cannot be blank",
              // },
          },

           submitHandler: function(form){
               form.submit();
           }
       });


       $('#tenant_edit_form').validate({ // initialize the plugin
          errorClass: 'text-danger',
          rules: {
              'firstname': {
                   required: true
              },
              //  'lastname': {
              //      required: true
              // },
              'permanentaddress': {
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
              // 'caseworker': {
              //      required: true,
              // }
          },
           messages: {
              firstname: {
                   required: "First name cannot be blank"
              },
              // lastname: {
              //      required: "Last Name cannot be blank"
              //  },
                permanentaddress: {
                   required: "Permanent address cannot be blank"
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
              // caseworker: {
              //      required: "Case Worker cannot be blank",
              // },
          },
       });
});



function deleteuser(id,url){
  // id=14;
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
