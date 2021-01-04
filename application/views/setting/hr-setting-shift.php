<div class="row">
  <div class="col-md-4">
    <h5>Add Shift</h5>
    <br />
    <!-- <form action="branch_office_add" method="post" enctype="multipart/form-data" id="branch_office_form"> -->
    <form id="shift_form" method="POST" action="shift_add">
      <input type="hidden" name="shift_id" id="shift_id" />
      <div class="form-group">
        <label for="shift_name">Shift Name</label>
        <input type="text" class="form-control" name="shift_name" id="shift_name" placeholder="Shift Name" required />
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="start-shift">Start Shift</label>
            <div class="input-group date" id="start-shift" data-target-input="nearest">
              <div class="input-group" data-target="#start-shift" data-toggle="datetimepicker">
                <input type="text" name="shift_start" id="shift_start" class="form-control datetimepicker-input" data-target="#start-shift" value="" />
                <div class="input-group-addon input-group-append">
                  <i class="mdi mdi-clock input-group-text"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="end-shift">End Shift</label>
            <div class="input-group date" id="end-shift" data-target-input="nearest">
              <div class="input-group" data-target="#end-shift" data-toggle="datetimepicker">
                <input type="text" name="shift_end" id="shift_end" class="form-control datetimepicker-input" data-target="#end-shift" value="" />
                <div class="input-group-addon input-group-append">
                  <i class="mdi mdi-clock input-group-text"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="float-right">
        <button class="btn btn-inverse-success btn-primary" type="submit">Submit</button>
        <button class="btn btn-inverse-default btn-default" type="reset">Reset</button>
      </div>
    </form>
  </div>
  <div class="col-md-8">
    <div class="table responsive">
      <table class="table table-hover table-bordered table-striped" id="shift_table">
        <thead>
          <tr>
            <th>Shift Name</th>
            <th>Shift Start</th>
            <th>Shift End</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          foreach($shifts as $shift){
          ?>
          <tr>
            <td><?php echo $shift->shift_name ?></td>
            <td><?php echo $shift->shift_start ?></td>
            <td><?php echo $shift->shift_end ?></td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn btn-icons btn-rounded text-center" data-toggle="dropdown">
                  <i class="ti-more-alt"></i>
                </button>
                <div class="dropdown-menu">
                  <button class="btn btn-link" onclick="edit_shift('<?php echo $shift->idshift; ?>')"><i class="fa fa-pencil"></i></button>
                  <button class="btn btn-link" onclick="del_shift('<?php echo $shift->idshift; ?>')"><i class="fa fa-trash-o"></i></button>
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
      $("#shift_form").submit(function (e) { 
        e.preventDefault();

        var action = $(this).attr("action");
        if(action == "shift_add"){
          shift_add();
        }
        else if(action == "shift_update"){
          shift_update();
        }
      });

      $("#shift_form [type='reset']").click(function(){
        $("#shift_form").attr("action", "shift_add");
        $("#shift_name").val("");
        $("#shift_start").val("");
        $("#shift_end").val("");
      });
    }

    function shift_add(){
      var shift_name = $("#shift_name").val();
      var shift_start = $("#shift_start").val();
      var shift_end = $("#shift_end").val();
      if(shift_name == "" || shift_start == "" || shift_end == ""){
        swal({
          title : "Oops!",
          text : "All data must be filled",
          type : "error"
        })
      }
      else{
        $.ajax({
          type: "POST",
          url: "<?php echo base_url(); ?>shift_add",
          data: { shift_name, shift_start, shift_end },
          dataType: "JSON",
          success: function (data) {
            swal({
              title : "Berhasil!",
              text : "shift has been added",
              type : "success"
            }, function(){
              location.reload();
            })
          },
          error : function(){
            swal({
              title : "Oops!",
              text : "Failed to Add shift",
              type : "error"
            })
          }
        });
      }
    }

    function del_shift(shift_id){
      // alert(shift_id);
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
            url: "<?php echo base_url() ?>shift_deleting",
            data: {shift_id:shift_id},
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
                text : "Failed to delete shift",
                type : "error"
              })
            }
          });
        });
      
    }

    function edit_shift(shift_id){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>shift_edit",
        data: {shift_id},
        dataType: "JSON",
        success: function (data) {
          $("#shift_form").attr("action", "shift_update");
          $("#shift_name").val(data.shift_name);
          $("#shift_start").val(data.shift_start);
          $("#shift_end").val(data.shift_end);
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

    function shift_update(){
      var shift_name = $("#shift_name").val();
      var shift_start = $("#shift_start").val();
      var shift_end = $("#shift_end").val();
      if(shift_name == "" || shift_start == "" || shift_end == ""){
        swal({
          title : "Oops!",
          text : "All data must be filled",
          type : "error"
        })
      }
      else{
        $.ajax({
          type: "POST",
          url: "<?php echo base_url(); ?>shift_update",
          data: { shift_name, shift_start, shift_end },
          dataType: "JSON",
          success: function (data) {
            swal({
              title : "Berhasil!",
              text : "shift has been updated",
              type : "success"
            }, function(){
              location.reload();
            })
          },
          error : function(err){
            console.log(err);
            swal({
              title : "Oops!",
              text : "Failed to updating shift",
              type : "error"
            })
          }
        });
      }
    }
</script>