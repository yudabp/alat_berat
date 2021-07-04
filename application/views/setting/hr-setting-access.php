<div class="row">
  <div class="col-md-12">
    <div class="table responsive">
      <table class="table table-hover table-bordered table-striped" id="machine_table">
        <thead>
          <tr>
            <th>Machine Name</th>
            <th>Start</th>
            <th>End</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          foreach($machines as $machine){
          ?>
          <tr>
            <td><?php echo $machine->machine_name ?></td>
            <td><?php echo $machine->machine_start ?></td>
            <td><?php echo $machine->machine_end ?></td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn btn-icons btn-rounded text-center" data-toggle="dropdown">
                  <i class="ti-more-alt"></i>
                </button>
                <div class="dropdown-menu">
                  <button class="btn btn-link" onclick="edit_machine('<?php echo $machine->idmachine; ?>')"><i class="fa fa-pencil"></i></button>
                  <button class="btn btn-link" onclick="del_machine('<?php echo $machine->idmachine; ?>')"><i class="fa fa-trash-o"></i></button>
                </div>
              </div>
            </td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<script>
    window.onload=function(){
      $("#machine_form").submit(function (e) { 
        e.preventDefault();

        var action = $(this).attr("action");
        if(action == "machine_add"){
          machine_add();
        }
        else if(action == "machine_update"){
          machine_update();
        }
      });

      $("#machine_form [type='reset']").click(function(){
        $("#machine_form").attr("action", "machine_add");
        $("#machine_name").val("");
        $("#machine_start").val("");
        $("#machine_end").val("");
      });
    }

    function machine_add(){
      var machine_name = $("#machine_name").val();
      var machine_start = $("#machine_start").val();
      var machine_end = $("#machine_end").val();
      if(machine_name == "" || machine_start == "" || machine_end == ""){
        swal({
          title : "Oops!",
          text : "All data must be filled",
          type : "error"
        })
      }
      else{
        $.ajax({
          type: "POST",
          url: "<?php echo base_url(); ?>machine_add",
          data: { machine_name, machine_start, machine_end },
          dataType: "JSON",
          success: function (data) {
            swal({
              title : "Berhasil!",
              text : "machine has been added",
              type : "success"
            }, function(){
              location.reload();
            })
          },
          error : function(){
            swal({
              title : "Oops!",
              text : "Failed to Add machine",
              type : "error"
            })
          }
        });
      }
    }

    function del_machine(machine_id){
      // alert(machine_id);
      swal({
            title: 'Are you sure ?',
            text: "You will not be able to recover this data!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
            buttonsStyling: false
        },function(){
          $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>machine_deleting",
            data: {machine_id:machine_id},
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
                text : "Failed to delete machine",
                type : "error"
              })
            }
          });
        });
      
    }

    function edit_machine(machine_id){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>machine_edit",
        data: {machine_id},
        dataType: "JSON",
        success: function (data) {
          $("#machine_form").attr("action", "machine_update");
          $("#machine_name").val(data.machine_name);
          $("#machine_start").val(data.machine_start);
          $("#machine_end").val(data.machine_end);
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

    function machine_update(){
      var machine_name = $("#machine_name").val();
      var machine_start = $("#machine_start").val();
      var machine_end = $("#machine_end").val();
      if(machine_name == "" || machine_start == "" || machine_end == ""){
        swal({
          title : "Oops!",
          text : "All data must be filled",
          type : "error"
        })
      }
      else{
        $.ajax({
          type: "POST",
          url: "<?php echo base_url(); ?>machine_update",
          data: { machine_name, machine_start, machine_end },
          dataType: "JSON",
          success: function (data) {
            swal({
              title : "Berhasil!",
              text : "machine has been updated",
              type : "success"
            }, function(){
              location.reload();
            })
          },
          error : function(err){
            console.log(err);
            swal({
              title : "Oops!",
              text : "Failed to updating machine",
              type : "error"
            })
          }
        });
      }
    }
</script>