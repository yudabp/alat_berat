<script>
    $(document).ready(function(){
      $("#unit_form").submit(function (e) { 
        e.preventDefault();

        var action = $(this).attr("action");
        if(action == "p-setting-unit_add"){
          unit_add();
        }
        else if(action == "p-setting-unit_update"){
          unit_update();
        }
      });

      $("#unit_form [unit='reset']").click(function(){
        $("#unit_form").attr("action", "p-setting-unit_add");
        $("#unit_name").val("");
        $("#unit_start").val("");
        $("#unit_end").val("");
      });
    });
    
    function unit_add(){
      var unit_name = $("#unit_name").val();
      if(unit_name == ""){
        swal({
          title : "Oops!",
          text : "All data must be filled",
          type : "error"
        })
      }
      else{
        $.ajax({
          type: "POST",
          url: "<?php echo base_url(); ?>p-setting-unit_add",
          data: { unit_name:unit_name },
          dataType: "JSON",
          success: function (data) {
            swal({
              title : "Success!",
              text : "Unit has been added",
              type : "success"
            }, function(){
              location.reload();
            })
          },
          error : function(){
            swal({
              title : "Oops!",
              text : "Failed to Add Unit",
              type : "error"
            })
          }
        });
      }
    }

    function del_unit(unit_id){
      // alert(unit_id);
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
            url: "<?php echo base_url() ?>p-setting-unit_deleting",
            data: {unit_id:unit_id},
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
                text : "Failed to delete Unit",
                type : "error"
              })
            }
          });
        });
      
    }

    function edit_unit(unit_id){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>p-setting-unit_edit",
        data: {unit_id},
        dataType: "JSON",
        success: function (data) {
          $("#unit_form").attr("action", "p-setting-unit_update");
          $("#unit_name").val(data.unit_name);
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

    function unit_update(){
      var unit_name = $("#unit_name").val();
      if(unit_name == ""){
        swal({
          title : "Oops!",
          text : "All data must be filled",
          type : "error"
        })
      }
      else{
        $.ajax({
          type: "POST",
          url: "<?php echo base_url(); ?>p-setting-unit_update",
          data: { unit_name },
          dataType: "JSON",
          success: function (data) {
            swal({
              title : "Berhasil!",
              text : "Unit has been updated",
              type : "success"
            }, function(){
              location.reload();
            })
          },
          error : function(err){
            console.log(err);
            swal({
              title : "Oops!",
              text : "Failed to updating Unit",
              type : "error"
            })
          }
        });
      }
    }
</script>