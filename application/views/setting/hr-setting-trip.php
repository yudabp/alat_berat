<div class="row">
  <!-- <div class="row"> -->
  <div class="col-md-4">
    <h5>Add Trip</h5>
    <br />
    <form id="trip_form" method="POST" action="trip_add">
      <input type="hidden" name="trip_id" id="trip_id" />
      <div class="form-group">
        <label for="trip_name">Trip Name</label>
        <input type="text" class="form-control" name="trip_name" id="trip_name" placeholder="Trip Name" required />
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="start-trip">Start Trip</label>
            <div class="input-group date" id="start-trip" data-target-input="nearest">
              <div class="input-group" data-target="#start-trip" data-toggle="datetimepicker">
                <input type="text" name="trip_start" id="trip_start" class="form-control datetimepicker-input" data-target="#start-trip" value="" />
                <div class="input-group-addon input-group-append">
                  <i class="mdi mdi-clock input-group-text"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="end-trip">End Trip</label>
            <div class="input-group date" id="end-trip" data-target-input="nearest">
              <div class="input-group" data-target="#end-trip" data-toggle="datetimepicker">
                <input type="text" name="trip_end" id="trip_end" class="form-control datetimepicker-input" data-target="#end-trip" value="" />
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
      <table class="table table-hover table-bordered table-striped" id="trip_table">
        <thead>
          <tr>
            <th>Trip Name</th>
            <th>Trip Start</th>
            <th>Trip End</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          foreach($trips as $trip){
          ?>
          <tr>
            <td><?php echo $trip->trip_name ?></td>
            <td><?php echo $trip->trip_start ?></td>
            <td><?php echo $trip->trip_end ?></td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn btn-icons btn-rounded text-center" data-toggle="dropdown">
                  <i class="ti-more-alt"></i>
                </button>
                <div class="dropdown-menu">
                  <button class="btn btn-link" onclick="edit_trip('<?php echo $trip->idtrip; ?>')"><i class="fa fa-pencil"></i></button>
                  <button class="btn btn-link" onclick="del_trip('<?php echo $trip->idtrip; ?>')"><i class="fa fa-trash-o"></i></button>
                </div>
              </div>
            </td>
          </tr>
          <?php }?>
        </tbody>
      </table>
    </div>
  </div>
  <!-- </div> -->
</div>
<script>
    window.onload=function(){
      $("#trip_form").submit(function (e) { 
        e.preventDefault();

        var action = $(this).attr("action");
        if(action == "trip_add"){
          trip_add();
        }
        else if(action == "trip_update"){
          trip_update();
        }
      });

      $("#trip_form [type='reset']").click(function(){
        $("#trip_form").attr("action", "trip_add");
        $("#trip_name").val("");
        $("#trip_start").val("");
        $("#trip_end").val("");
      });
    }

    function trip_add(){
      var trip_name = $("#trip_name").val();
      var trip_start = $("#trip_start").val();
      var trip_end = $("#trip_end").val();
      if(trip_name == "" || trip_start == "" || trip_end == ""){
        swal({
          title : "Oops!",
          text : "All data must be filled",
          type : "error"
        })
      }
      else{
        $.ajax({
          type: "POST",
          url: "<?php echo base_url(); ?>trip_add",
          data: { trip_name, trip_start, trip_end },
          dataType: "JSON",
          success: function (data) {
            swal({
              title : "Berhasil!",
              text : "Trip has been added",
              type : "success"
            }, function(){
              location.reload();
            })
          },
          error : function(){
            swal({
              title : "Oops!",
              text : "Failed to Add Trip",
              type : "error"
            })
          }
        });
      }
    }

    function del_trip(trip_id){
      alert(trip_id);
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
            url: "<?php echo base_url() ?>trip_deleting",
            data: {trip_id:trip_id},
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
                text : "Failed to delete Trip",
                type : "error"
              })
            }
          });
        });
      
    }

    function edit_trip(trip_id){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>trip_edit",
        data: {trip_id},
        dataType: "JSON",
        success: function (data) {
          $("#trip_form").attr("action", "trip_update");
          $("#trip_name").val(data.trip_name);
          $("#trip_start").val(data.trip_start);
          $("#trip_end").val(data.trip_end);
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

    function trip_update(){
      var trip_name = $("#trip_name").val();
      var trip_start = $("#trip_start").val();
      var trip_end = $("#trip_end").val();
      if(trip_name == "" || trip_start == "" || trip_end == ""){
        swal({
          title : "Oops!",
          text : "All data must be filled",
          type : "error"
        })
      }
      else{
        $.ajax({
          type: "POST",
          url: "<?php echo base_url(); ?>trip_update",
          data: { trip_name, trip_start, trip_end },
          dataType: "JSON",
          success: function (data) {
            swal({
              title : "Berhasil!",
              text : "Trip has been updated",
              type : "success"
            }, function(){
              location.reload();
            })
          },
          error : function(err){
            console.log(err);
            swal({
              title : "Oops!",
              text : "Failed to updating Trip",
              type : "error"
            })
          }
        });
      }
    }
</script>