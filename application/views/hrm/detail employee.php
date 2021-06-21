<?php 
    $this->load->view('template/head');
    $this->load->view('template/topbar');
    $this->load->view('template/sidebar');
?>
<style type="text/css">
  a:hover{
    text-decoration: none;
  }
  #employee-status{
    -webkit-appearance: none;
    -moz-appearance: none;
    border: none;
    background: none;
    font-size: inherit;
    font-weight: 600;
  }
</style>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row mb-4">
            <div class="col-12 d-flex align-items-center justify-content-between">
              <h4 class="page-title">Detail Employee</h4>
              <div class="d-flex align-items-center">
                <div class="wrapper mr-4 d-none d-sm-block">
                  <!-- <p class="mb-0">Summary for
                    <b class="mb-0"><i id="bulan"></i> <i id="tahun"></i></b>
                  </p> -->
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body row">
                  <div class="col-md-2">
                    <center><img src="<?php echo base_url(); ?>assets/staffprofil/defuser.png" class="img-lg rounded-circle" id="userimg"></center>
                  </div>
                  <div class="col-md-10">
                    <h4><?php echo $val->fname." ".$val->mname." ".$val->lname; ?></h4>
                    <br>
                    <p><?= $val->designationtitle." - ".$val->departmenttitle; ?></p>
                    <p><?= $val->email; ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <ul class="nav nav-tabs tab-basic" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="debasic-tab" data-toggle="tab" href="#debasic" role="tab">Basic</a>
                    </li>
                    <!-- <li class="nav-item">
                      <a class="nav-link" id="dework-tab" data-toggle="tab" href="#dework" role="tab">Job</a>
                    </li> -->
                    <li class="nav-item">
                      <a class="nav-link" id="depersonal-tab" data-toggle="tab" href="#depersonal" role="tab">Leave</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="depayroll-tab" data-toggle="tab" href="#depayroll" role="tab">Payroll</a>
                    </li>
                  </ul>
                  <div class="tab-content tab-content-basic">
                    <?php 
                      $this->load->view('hrm/tab/det-basic');
                      $this->load->view('hrm/tab/det-job');
                      $this->load->view('hrm/tab/det-leave');
                      $this->load->view('hrm/tab/det-payroll');
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        
        <!-- Modal -->
        <div class="modal fade" id="formStatus" tabindex="-1" role="dialog" aria-labelledby="formStatusLabel">
					<div class="modal-dialog" role="document" style="margin-top: 15px;margin-bottom: 0">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="formStatusLabel">Update Status</h5>
								<button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
      				<?php echo form_open_multipart('update-status',['class'=>'form-sample','id'=>'tambah']); ?>
							<div class="modal-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="date">Date</label>
											<div class="input-group date datepicker">
												<input type="text" id="date" name="date" class="form-control" >
												<span class="input-group-addon input-group-append border-left">
													<span class="mdi mdi-calendar input-group-text"></span>
												</span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="update_status">Employee Status</label>
											<select name="update_status" id="update_status" class="single-select form-control" >
												<option selected="selected" disabled="disabled"> - Select Status - </option>
												<option value="active">Active</option>
												<option value="terminated">Terminated</option>
												<option value="deceased">Deceased</option>
												<option value="resigned">Resigned</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="comment">Comment</label>
											<textarea name="comment" id="comment" class="form-control" placeholder="Comment"></textarea>
										</div>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-success">Submit</button>
								<button type="button" class="btn btn-light btn-close" data-dismiss="modal">Cancel</button>
							</div>
							<?php echo form_close(); ?>
						</div>
					</div>
				</div>
        <!-- End Modal -->

<?php 
  $this->load->view('template/footer');
  // $this->load->view('template/fixed-plugin');
  $this->load->view('template/js');
?>
<script type="text/javascript">
  $(document).ready(function () {
    function getUrlVars(param=null)
    {
      if(param !== null)
      {
        var vars = [], hash;
        var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
        for(var i = 0; i < hashes.length; i++)
        {
          hash = hashes[i].split('=');
          vars.push(hash[0]);
          vars[hash[0]] = hash[1];
        }
        return vars[param];
      } 
      else 
      {
        return null;
      }
    }

		$('#table-leave').DataTable();
		
		if ($(".datepicker").length) {
			$('.datepicker').datepicker({
				enableOnReadonly: true,
				todayHighlight: true,
				autoclose: true,
				format: "dd/mm/yyyy"
			});
		}

    function viewItem(){
    var id = getUrlVars("id");
      $.ajax({
        url : "<?php echo base_url(); ?>viewEmp",
        type: "POST",
        dataType: "JSON",
        data: {
            id : id
        },
        success : function(view){
                // $("#detailStaff").modal("show");
                $("#first_named").html(view.data.fname);
                $("#middle_named").html(view.data.mname);
                $("#last_named").html(view.data.lname);
                $("#employee_idd").html(view.data.employeid);
                $("#emaild").html(view.data.email);
                $("#employee_typed").html(view.data.employetype);
                $("#employee_statusd").html(view.data.employestatus);
                $("#date_of_hired").html(view.data.datehire);
                $("#departmentd").html(view.data.departmenttitle);
                $("#job_titled").html(view.data.designationtitle);
                $("#locationd").html(view.data.location);
                $("#reporting_tod").html(view.data.departmentlead);
                $("#source_of_hired").html(view.data.sourceofhire);
                $("#payrated").html(view.data.payrate);
                $("#pay_typed").html(view.data.paytype);
                $("#work_phoned").html(view.data.workphone);
                $("#phoned").html(view.data.phone);
                $("#hand_phoned").html(view.data.handphone);
                $("#other_emaild").html(view.data.otheremail);
                $("#date_of_birthd").html(view.data.birth);
                $("#nationalityd").html(view.data.nationality);
                $("#genderd").html(view.data.gender);
                $("#marital_statusd").html(view.data.status);
                $("#driving_licensed").html(view.data.drivinglicense);
                $("#addressd").html(view.data.address);
                $("#cityd").html(view.city.name);
                $("#stated").html(view.provinsi.name);
                $("#zip_coded").html(view.data.zipcode);
                $("#mainid").html(view.data.mainid);
								// var role = view.data.role_id;
								// console.log(view.city);
								//Job
								$("#employee-status").val(view.data.employestatus);
                var cek = view.data.sendnotif;
                var cekimg = view.data.photo;
                if(cekimg !=""){
                  $("#userimg").attr('src','<?php echo base_url(); ?>assets/staffprofil/'+cekimg);
                }
                if(cek == "yes"){
                  $("#notification").attr('checked','checked');
                }

                // alert(data.fname);
        },
        error : function(jqXHR, textStatus, errorThrown){
          swal({
                title: 'Gagal!',
                text: 'Gagal mengambil data.',
                type: 'error',
                confirmButtonClass: "btn btn-danger",
                buttonsStyling: false
            }).catch(swal.noop);
        }
      });
    }
    viewItem(); 
    // alert(id);
  });

	function getUrlVars(param=null)
    {
      if(param !== null)
      {
        var vars = [], hash;
        var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
        for(var i = 0; i < hashes.length; i++)
        {
          hash = hashes[i].split('=');
          vars.push(hash[0]);
          vars[hash[0]] = hash[1];
        }
        return vars[param];
      } 
      else 
      {
        return null;
      }
    }

  function saveBasic() {
    var id = getUrlVars("id");
    var basic_pay = $("#basic_pay").val();
    var tax_number = $("#tax_number").val();
    var bank_account_number = $("#bank_account_number").val();
    var bank_account_name = $("#bank_account_name").val();
    var bank_name = $("#bank_name").val();
    $.ajax({
      url   : "<?php echo base_url(); ?>saveBasic",
      type  : "POST",
      dataType  : "JSON",
      data  : {
        id : id,
        basic_pay : basic_pay,
        tax_number : tax_number,
        bank_account_number : bank_account_number,
        bank_account_name : bank_account_name,
        bank_name : bank_name,
      },
			success : function(data){
				swal({
                  title: "Congratulation!",
                  text: "Data has been added",
                  type: "success",
                  icon: 'success',
                  buttonsStyling: false,
                  confirmButtonClass: "btn btn-success"
              },function(){
                location.reload();
              });
			},
			error : function(jqXHR, textStatus, errorThrown){
          swal({
                title: 'Failed!',
                text: 'Failed to save data',
                type: 'error',
                confirmButtonClass: "btn btn-danger",
                buttonsStyling: false
            }).catch(swal.noop)
        }
    });
  }
</script>
