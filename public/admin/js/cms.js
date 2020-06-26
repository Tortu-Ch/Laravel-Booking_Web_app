$(document).ready(function() {

       $('#cms_form').validate({ // initialize the plugin
          errorClass: 'text-danger',
          rules: {
               'title': {
                   required: true
              },
              'description': {
                   required: true
              }
          },
          messages: {
               title: {
                   required: "Name Can not be blank"
               },
              description: {
                   required: "Description Can not be blank"
              }
          },
           
       });

});



   $(".selectall").change(function() {
       $(".cmsblk").prop('checked', $(this).prop("checked"));
       $(this).closest("#allpage").find("tr").toggleClass('list-group-item-success',$(this).is(':checked'));
   });

   $(".cmsblk").change(function(){
    if ($('.cmsblk:checked').length == $('.cmsblk').length) {
        $(".selectall").prop('checked', 'checked');
    } else {
        $(".selectall").prop('checked', false);
    }
  });

   function allDelete() {
       var obj = $(".cmsblk:checked");
       var selected = obj.length;
       if (selected == 0) {
           alert("Please select atleast one");
       } else {
           var id = [];
           obj.each(function(i) {
               id.push($(this).attr('dataid'));
           });
           if (confirm('Really You Want to delete Selected Cms?')) {
               $.ajax({
                   type: 'POST',
                   url: 'cms/delete',
                   data: {
                       id: id,"_token": $('input[name=_token]').val()
                   },
                   success: function(result) {
                       for (i = 0; i < result.length; i++) {
                           $("#" + result[i]).fadeOut(1000);
                       }
                   }
               });
           }
       }
   
     }

   function deletecms(id){
    if(confirm("Delete this Cms ?")){
        $.ajax({
            type: "DELETE",
            data: {"_token": $('input[name=_token]').val() },
            url: 'cms/' + id,
            success: function(result) {
                if(result.status == 'true'){
                    $("#"+id).fadeOut(1000);
                }
            }
        });
    }
}

 //Active status
   $(document).on('click', '.updatedstatus', function() {
       var valw = $(this).val();
       $(this).parents('tr').toggleClass('warning');
       $(this).hide().parent().append('<i class="fa fa-refresh fa-spin"></i>');
       var valuedata = $(this).attr('page-id');
       var updatestatus = $(this).attr('value');
       $(this).addClass('currentclass');

       $.ajax({
           url: 'cms/updatestatus/' + valuedata,
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