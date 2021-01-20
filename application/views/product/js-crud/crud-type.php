<script>
    $(document).ready(function(){
      $("#type_form").submit(function (e) { 
        e.preventDefault();

        var action = $(this).attr("action");
        if(action == "p-setting-type_add"){
          type_add();
        }
        else if(action == "p-setting-type_update"){
          type_update();
        }
      });

      $("#type_form [type='reset']").click(function(){
        $("#type_form").attr("action", "p-setting-type_add");
        $("#type_name").val("");
        $("#type_start").val("");
        $("#type_end").val("");
      });
    });

    function type_add(){
      var type_name = $("#type_name").val();
      if(type_name == ""){
        swal({
          title : "Oops!",
          text : "All data must be filled",
          type : "error"
        })
      }
      else{
        $.ajax({
          type: "POST",
          url: "<?php echo base_url(); ?>p-setting-type_add",
          data: { type_name },
          dataType: "JSON",
          success: function (data) {
            swal({
              title : "Success!",
              text : "Type has been added",
              type : "success"
            }, function(){
              location.reload();
            })
          },
          error : function(){
            swal({
              title : "Oops!",
              text : "Failed to Add Type",
              type : "error"
            })
          }
        });
      }
    }

    function del_type(type_id){
      // alert(type_id);
      swal({
            title: 'Are you sure ?',
            text: "You will not be able to recover this data!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            confirmButtonText: 'Yes, Delete!',
            cancelButtonText: 'Cancel',
            buttonsStyling: false
        },function(){
          $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>p-setting-type_deleting",
            data: {type_id:type_id},
            dataType: "JSON",
            success: function (data) {
              swal({
                title : "Success!",
                text : "Your data has been deleted",
                type : "success"
              }, function(){
                location.reload();
              });   
            },
            error : function(){
              swal({
                title : "Oops!",
                text : "Failed to delete type",
                type : "error"
              })
            }
          });
        });
      
    }

    function edit_type(type_id){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>p-setting-type_edit",
        data: {type_id},
        dataType: "JSON",
        success: function (data) {
          $("#type_form").attr("action", "p-setting-type_update");
          $("#type_name").val(data.type_name);
        },
        error : function(){
          swal({
            title : "Oops!",
            text : "Failed to get data",
            type : "error"
          });
        }
      });
    }

    function type_update(){
      var type_name = $("#type_name").val();
      if(type_name == "" || type_start == "" || type_end == ""){
        swal({
          title : "Oops!",
          text : "All data must be filled",
          type : "error"
        })
      }
      else{
        $.ajax({
          type: "POST",
          url: "<?php echo base_url(); ?>p-setting-type_update",
          data: { type_name },
          dataType: "JSON",
          success: function (data) {
            swal({
              title : "Berhasil!",
              text : "type has been updated",
              type : "success"
            }, function(){
              location.reload();
            })
          },
          error : function(err){
            console.log(err);
            swal({
              title : "Oops!",
              text : "Failed to updating type",
              type : "error"
            })
          }
        });
      }
    }
</script>