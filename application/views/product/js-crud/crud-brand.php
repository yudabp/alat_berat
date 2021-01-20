<script>
    $(document).ready(function(){
      $("#brand_form").submit(function (e) { 
        e.preventDefault();

        var action = $(this).attr("action");
        if(action == "p-setting-brand_add"){
          brand_add();
        }
        else if(action == "p-setting-brand_update"){
          brand_update();
        }
      });

      $("#brand_form [brand='reset']").click(function(){
        $("#brand_form").attr("action", "p-setting-brand_add");
        $("#brand_name").val("");
        $("#brand_start").val("");
        $("#brand_end").val("");
      });
    });
    
    function brand_add(){
      var brand_name = $("#brand_name").val();
      if(brand_name == ""){
        swal({
          title : "Oops!",
          text : "All data must be filled",
          type : "error"
        })
      }
      else{
        $.ajax({
          type: "POST",
          url: "<?php echo base_url(); ?>p-setting-brand_add",
          data: { brand_name:brand_name },
          dataType: "JSON",
          success: function (data) {
            swal({
              title : "Success!",
              text : "brand has been added",
              type : "success"
            }, function(){
              location.reload();
            })
          },
          error : function(){
            swal({
              title : "Oops!",
              text : "Failed to Add brand",
              type : "error"
            })
          }
        });
      }
    }

    function del_brand(brand_id){
      // alert(brand_id);
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
            url: "<?php echo base_url() ?>p-setting-brand_deleting",
            data: {brand_id:brand_id},
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
                text : "Failed to delete brand",
                type : "error"
              })
            }
          });
        });
      
    }

    function edit_brand(brand_id){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>p-setting-brand_edit",
        data: {brand_id},
        dataType: "JSON",
        success: function (data) {
          $("#brand_form").attr("action", "p-setting-brand_update");
          $("#brand_name").val(data.brand_name);
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

    function brand_update(){
      var brand_name = $("#brand_name").val();
      if(brand_name == "" || brand_start == "" || brand_end == ""){
        swal({
          title : "Oops!",
          text : "All data must be filled",
          type : "error"
        })
      }
      else{
        $.ajax({
          type: "POST",
          url: "<?php echo base_url(); ?>p-setting-brand_update",
          data: { brand_name },
          dataType: "JSON",
          success: function (data) {
            swal({
              title : "Berhasil!",
              text : "brand has been updated",
              type : "success"
            }, function(){
              location.reload();
            })
          },
          error : function(err){
            console.log(err);
            swal({
              title : "Oops!",
              text : "Failed to updating brand",
              type : "error"
            })
          }
        });
      }
    }
</script>