<script type="text/javascript">
	function prosesTruck() {
		$("#formTruck").modal("show");
		loopID=1;
	}

	function prosesEquipment() {
		$("#formEquipment").modal("show");
		loopID=1;
	}

	function addAction(action="", editing=false){
	  loopID++;
	  var headHtml = $('#p_action');
	  if(editing){
	    var html = `
	    <div class="p_action`+loopID+`">
	      <div class="row mt-2">
	        <div class="col-md-10">
	          <input type="text" class="form-control" rows="2" id="action" name="action[]" style="width: 100%;" value="`+action+`">
	        </div>
	      </div>
	    </div>
	    `;
	  }
	  else{
	    var html = `
	    <div class="p_action`+loopID+`">
	      <div class="row mt-2">
	        <div class="col-md-10">
	          <input type="text" class="form-control" rows="2" id="action" name="action[]" style="width: 100%;" value="`+action+`">
	        </div>
	        <div class="col-md-2">
	          <button type="button" class="btn btn-danger btn-just-icon add btn-sm btnDelete" data="p_action`+loopID+`" style="width:100% !important"><i class="fa fa-minus" style="margin:0"></i></button>
	        </div>
	      </div>
	    </div>
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

	function resetAction(){
	  var html=`<div class="p_action1">
	              <div class="row" id="selected_action">
	                <div class="col-md-10" >
	                  <input type="text" class="form-control" rows="2" id="action" name="action[]" style="width: 100%;">
	                </div>
	                <div class="col-md-2">
	                  <button type="button" onclick="addAction()" id="btnselect" class="btn btn-info btn-sm icon-btn mb-2" style="width:100% !important"><i class="mdi mdi-plus" style="margin:0"></i></button>
	                </div>
	              </div>
	            </div>`;
	  $("#p_action").html(html);
	}
</script>