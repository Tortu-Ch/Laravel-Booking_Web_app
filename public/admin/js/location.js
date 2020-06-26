$(document).ready(function() {

       $('#locations_add').validate({ // initialize the plugin
          errorClass: 'text-danger',
                    rules: {
              'location': {
                   required: true
              },
          },
           messages: {
              location: {
                   required: "Location Field Can not be blank"
              }, 
          },
       });


       $('#location_edit').validate({ // initialize the plugin
          errorClass: 'text-danger',
          rules: {
              'location': {
                   required: true
              },
          },
           messages: {
              location: {
                   required: "Location Field Can not be blank"
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
/*
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
*/