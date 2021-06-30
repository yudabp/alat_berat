<script type="text/javascript">
	function prosesTruck(idservice) {
		$.ajax({
		    url : "<?php echo base_url(); ?>edtTruckService",
		    type: "POST",
		    dataType: "JSON",
		    data: {
		        id : idservice
		    },
		    success : function(data){
		            let service = data.service;
		            let actions = data.actions;
		            window.idservice = service.idservice;
		            $("#idservice").val(service.idservice);
		            $("#truck_name").val(service.name);
		            $("#plat_no").val(service.plat_no);
		            $("#chassis_no").val(service.chassis_no);
		            $("#machine_no").val(service.machine_no);
		            $("#service_date").val(service.service_date);
		            $("#type_service").val(service.service_type);
		            $("#driver_note").val(service.driver_note);
		            $("#mechanic_note").val(service.mechanic_note);
		            $('.select2').select2().trigger('change');
		            // console.log(actions);
		            resetActionT();
								addActionT(actions, true);
		            // for(let [key, action] of Object.entries(actions)){
		            //   if(key=="0"){
		            //     $("#action_truck").val(action.action); 
		            //   }
		            //   else{
		            //   }
		            // }
		            $("#formTruck").modal("show");
		            // $("#formAdd").modal("show");
		            // $("#formTruckLabel").text("Edit Truck");
		            // $("form").attr("data-id", data.idtruck);
		            // $("form").attr("id",'update');

		            // $("#plat_no").val(data.plat_no);
		    },
		    error : function(jqXHR, textStatus, errorThrown){
		      swal({
		            title: 'Failed!',
		            text: 'Cannot get data.',
		            type: 'error',
		            confirmButtonClass: "btn btn-danger",
		            buttonsStyling: false
		        }).catch(swal.noop)
		    }
		    });
		loopID=1;
	}

	function prosesEquipment(idservice) {
		$.ajax({
		    url : "<?php echo base_url(); ?>edtHEqService",
		    type: "POST",
		    dataType: "JSON",
		    data: {
		        id : idservice
		    },
		    success : function(data){
		            let service = data.service;
		            let actions = data.actions;
		            window.idservice = service.idservice;

		            $("#service_date").val(service.service_date);
		            $("#type_service").val(service.service_type);
		            $("#description").val(service.description);
		            $("#mechanic_note").val(service.mechanic_note);
		            $('.select2-nosearch').select2().trigger('change');
		            // console.log(actions);
		            resetActionH();
		            for(let [key, action] of Object.entries(actions)){
		              if(key=="0"){
		                $("#action_heq").val(action.action); 
		              }
		              else{
		                addActionH(action.action, true);
		              }
		            }
		            // $("#formAdd").modal("show");
		            // $("#formTruckLabel").text("Edit Truck");
		            // $("form").attr("data-id", data.idtruck);
		            // $("form").attr("id",'update');

		            // $("#plat_no").val(data.plat_no);
		    },
		    error : function(jqXHR, textStatus, errorThrown){
		      swal({
		            title: 'Failed!',
		            text: 'Cannot get data.',
		            type: 'error',
		            confirmButtonClass: "btn btn-danger",
		            buttonsStyling: false
		        }).catch(swal.noop)
		    }
		    });
		$("#formEquipment").modal("show");
		loopID=1;
	}

	function addActionT(action=[], editing=false){
	  loopID++;
	  var headHtml = $('#p_action');
	  if(editing && action.length){
			headHtml[0].innerHTML = ""
			var html = ""
			action.map(act => {
				html += `
				<div class="p_action`+loopID+`">
					<div class="row mt-2">
						<div class="col-md-10">
							<input type="text" class="form-control" rows="2" id="action_truck" name="action[]" style="width: 100%;" value="`+act.action+`" readonly>
						</div>
					</div>
					<div class="row mt-2" id="sparepart-items">
						<div class="col-md-10">
							<select name="sparepart" id="sparepart" class="single-select form-control" readonly>
								<option selected="selected" value="${act.idsparepart}"> ${act.name} </option>
							</select>
						</div>
					</div>
				</div>
				`;
			})
	  }
	  else{
	    var html = `
	    <div class="p_action`+loopID+`">
	      <div class="row mt-2">
	        <div class="col-md-10">
	          <input type="text" class="form-control" rows="2" id="action_truck" name="action[]" style="width: 100%;" value="`+action+`">
	        </div>
	        <div class="col-md-2">
	          <button type="button" class="btn btn-danger btn-just-icon add btn-sm btnDelete" data="p_action`+loopID+`" style="width:100% !important"><i class="fa fa-minus" style="margin:0"></i></button>
	        </div>
	      </div>
				<div class="row mt-2" id="sparepart-items">
					<div class="col-md-10">
						<select name="sparepart" id="sparepart" class="single-select form-control" >
							<option selected="selected" value=""> - Sparepart - </option>
							<?php foreach($sparepart as $spare) :?>
								<option value="<?= $spare->idsparepart ?>"><?= $spare->name ?> </option>
							<?php endforeach;?>
						</select>
					</div>
				</div>
	    </div>
			<hr>
	    `;
	  }
	  headHtml.append(html);
	  btnDelete = $('.btnDelete')
	  btnDelete.click(function(){
	    var id_div = $(this).attr('data');
	    console.log(id_div);
	    $('.'+id_div).remove();
	  });
	}

	function resetActionT(){
		const spareitems = document.getElementById("sparepart-items");
	  var html=`<div class="p_action1">
	              <div class="row" id="selected_action">
	                <div class="col-md-10" >
	                  <input type="text" class="form-control" rows="2" id="action_heq" name="action[]" style="width: 100%;">
	                </div>
	                <div class="col-md-2">
	                  <button type="button" onclick="addActionT()" id="btnselect" class="btn btn-info btn-sm icon-btn mb-2" style="width:100% !important"><i class="mdi mdi-plus" style="margin:0"></i></button>
	                </div>
	              </div>
								<div class="row mt-2" id="sparepart-items">
									<div class="col-md-10">
										<select name="sparepart" id="sparepart" class="single-select form-control" >
											<option selected="selected" value=""> - Sparepart - </option>
											<?php foreach($sparepart as $spare) :?>
												<option value="<?= $spare->idsparepart ?>"><?= $spare->name ?> </option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
	            </div>`;
	  $("#p_action").html(html);
	}

	
	$(document).on("click", "#truck-btnrequest", function(e){
		e.preventDefault();
		let data = {};
		let actions = []
		let action = [];
		let formdata = $("#saveTruckService").serializeArray()
		formdata.map(da => {
			if(da.name === "action[]"){
				if(action.length) actions.push(action)
				action = []
				action.push(da.value)
			}else if(da.name === "sparepart"){
				action.push(da.value)
			}else{
				data[da.name] = da.value
			}
		})

		data["action"] = actions;
		console.log("final", data)

		$.ajax({
		    url : "<?php echo base_url(); ?>actionTruck",
		    type: "POST",
		    dataType: "JSON",
		    data: data,
		    success : function(data){
					console.log(data)
				}
		})
		// alert("truck request")
	})

	$(document).on("click", "#truck-btndone", function(e){
		// e.preventDefault();
		console.log("truck done")
		alert("truck done")
	})

	$(document).on("click", "#heavy-btnrequest", function(e){
		// e.preventDefault();
		console.log("heavy request")
		alert("heavy request")
	})
	
	$(document).on("click", "#heavy-btndone", function(e){
		// e.preventDefault();
		console.log("heavy done")
		alert("heavy done")
	})

</script>
