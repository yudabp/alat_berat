<!-- JS Crud Modal Disini....... -->
<script>
    $(document).ready(function(){
        $("#container").submit(function(e){
            e.preventDefault();

            var action = $(this).attr("action");
            var formData = $(this).serialize();
            if(action == "tambah"){
                add_container(formData);
            }
            else if(action == "update"){
                update_container(formData);
            }
        });

        $("#addContainerBtn").click(function(){
            $("#container")[0].reset();
            $("#container").attr("action", "tambah");
        });

        $("#pieces").submit(function (e) { 
            e.preventDefault();
            
            var action = $(this).attr("action");
            var formData = $(this).serialize();
            if(action == "tambah"){
                add_pieces(formData);
            }
            else if(action == "update"){
                update_pieces(formData);
            }
        });

        $("#addPiecesBtn").click(function(){
            $("#pieces")[0].reset();
            $("#pieces").attr("action", "tambah");
        });

        $("#status_form").submit(function (e) { 
            e.preventDefault();
            
            var action = $(this).attr("action");
            var formData = $(this).serialize();
            if(action == "tambah"){
                add_status(formData);
            }
            else if(action == "update"){
                update_status(formData);
            }
        });

        $("#addStatusBtn").click(function(){
            $("#status_form")[0].reset();
            $("#status_form").attr("action", "tambah");
        });
    });

    //Action for container modal
    function add_container(formData){
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>add_jo_container",
            data: formData,
            dataType: "JSON",
            success: function (response) {
                if(response.result == "success"){
                    swal({
                        title : "Success",
                        text : "Container has been added",
                        type : "success",
                        showCancelButton : false
                    }, function(){
                        location.reload();
                    })
                }
                else{
                    swal({
                        title : "Failed",
                        text : "Can't add the container data",
                        type : "error",
                        showCancelButton : false
                    });
                }
            }, 
            error : function(){
                swal({
                    title : "Failed",
                    text : "Can't add the container data",
                    type : "error",
                    showCancelButton : false
                })
            }
        });
    }

    function del_container(data_con){
        swal({
            title: 'Are you sure ?',
            text: "You will not be able to recover this file!",
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
                url: "<?php echo base_url(); ?>del_jo_container",
                data: {data_con : data_con},
                dataType: "JSON",
                success: function (response) {
                    if(response.result == "success"){
                        swal({
                            title : "Success",
                            text : "Container has been deleted",
                            type : "success",
                            showCancelButton : false
                        }, function(){
                            location.reload();
                        })
                    }
                    else{
                        swal({
                            title : "Failed",
                            text : "Can't delete the container data",
                            type : "error",
                            showCancelButton : false
                        });
                    }
                }, 
                error : function(){
                    swal({
                        title : "Failed",
                        text : "Can't delete the container data",
                        type : "error",
                        showCancelButton : false
                    })
                }
            });
        });
    }

    function edit_container(data_con){
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>edit_jo_container",
            data: {data_con : data_con},
            dataType: "JSON",
            success: function (response) {
                if(response.result == "success"){
                    $("#container").attr("action", "update");
                    $("#id_data_con").val(data_con);
                    $("#container_number").val(response.container.container_number);
                    $("#seal_number").val(response.container.seal_number);
                    $("#type_container").val(response.container.type);
                    $("#measurement").val(response.container.measurement);
                    $("#net_weight").val(response.container.net_weight);
                    $("#gross_weight").val(response.container.gross_weight);

                    $("#addContainer").modal("show");
                }
                else{
                    swal({
                        title : "Failed",
                        text : "Can't get the container data",
                        type : "error",
                        showCancelButton : false
                    });
                }
            }, 
            error : function(){
                swal({
                    title : "Failed",
                    text : "Can't edit the container data",
                    type : "error",
                    showCancelButton : false
                })
            }
        });
    }

    function update_container(formData){
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>update_jo_container",
            data: formData,
            dataType: "JSON",
            success: function (response) {
                if(response.result == "success"){
                    swal({
                        title : "Success",
                        text : "Container has been updated",
                        type : "success",
                        showCancelButton : false
                    }, function(){
                        location.reload();
                    })
                }
                else{
                    swal({
                        title : "Failed",
                        text : "Can't update the container data",
                        type : "error",
                        showCancelButton : false
                    });
                }
            }, 
            error : function(){
                swal({
                    title : "Failed",
                    text : "Can't update the container data",
                    type : "error",
                    showCancelButton : false
                })
            }
        });
    }

    //Action for pieces modal
    function add_pieces(formData){
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>add_jo_pieces",
            data: formData,
            dataType: "JSON",
            success: function (response) {
                if(response.result == "success"){
                    swal({
                        title : "Success",
                        text : "Pieces has been added",
                        type : "success",
                        showCancelButton : false
                    }, function(){
                        location.reload();
                    })
                }
                else{
                    swal({
                        title : "Failed",
                        text : "Can't add the pieces data",
                        type : "error",
                        showCancelButton : false
                    });
                }
            }, 
            error : function(errorThrown, textStatus, jqXHR){
                swal({
                    title : "Failed",
                    text : "Can't add the pieces data",
                    type : "error",
                    showCancelButton : false
                });
                console.log(errorThrown);
                console.log(textStatus);
                console.log(jqXHR);
            }
        });
    }

    function del_pieces(data_pieces){
        swal({
            title: 'Are you sure ?',
            text: "You will not be able to recover this file!",
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
                url: "<?php echo base_url(); ?>del_jo_pieces",
                data: {data_pieces : data_pieces},
                dataType: "JSON",
                success: function (response) {
                    if(response.result == "success"){
                        swal({
                            title : "Success",
                            text : "Pieces has been deleted",
                            type : "success",
                            showCancelButton : false
                        }, function(){
                            location.reload();
                        })
                    }
                    else{
                        swal({
                            title : "Failed",
                            text : "Can't delete the pieces data",
                            type : "error",
                            showCancelButton : false
                        });
                    }
                }, 
                error : function(){
                    swal({
                        title : "Failed",
                        text : "Can't delete the pieces data",
                        type : "error",
                        showCancelButton : false
                    })
                }
            });
        });
    }

    function edit_pieces(data_pieces){
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>edit_jo_pieces",
            data: {data_pieces : data_pieces},
            dataType: "JSON",
            success: function (response) {
                if(response.result == "success"){
                    $("#pieces").attr("action", "update");
                    $("#id_data_pieces").val(data_pieces);
                    $("#no_of_pieces").val(response.pieces.no_of_pieces);
                    $("#type_pieces").val(response.pieces.type);
                    $("#gross_weight_pieces").val(response.pieces.gross_weight);
                    $("#chargeable_weight").val(response.pieces.chargeable_weight);

                    $("#addPieces").modal("show");
                }
                else{
                    swal({
                        title : "Failed",
                        text : "Can't get the pieces data",
                        type : "error",
                        showCancelButton : false
                    });
                }
            }, 
            error : function(){
                swal({
                    title : "Failed",
                    text : "Can't edit the pieces data",
                    type : "error",
                    showCancelButton : false
                })
            }
        });
    }

    function update_pieces(formData){
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>update_jo_pieces",
            data: formData,
            dataType: "JSON",
            success: function (response) {
                if(response.result == "success"){
                    swal({
                        title : "Success",
                        text : "Pieces has been updated",
                        type : "success",
                        showCancelButton : false
                    }, function(){
                        location.reload();
                    })
                }
                else{
                    swal({
                        title : "Failed",
                        text : "Can't update the pieces data",
                        type : "error",
                        showCancelButton : false
                    });
                }
            }, 
            error : function(){
                swal({
                    title : "Failed",
                    text : "Can't update the pieces data",
                    type : "error",
                    showCancelButton : false
                })
            }
        });
    }

    //Action for container modal
    function add_status(formData){
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>add_jo_status",
            data: formData,
            dataType: "JSON",
            success: function (response) {
                if(response.result == "success"){
                    swal({
                        title : "Success",
                        text : "Status has been added",
                        type : "success",
                        showCancelButton : false
                    }, function(){
                        location.reload();
                    })
                }
                else{
                    swal({
                        title : "Failed",
                        text : "Can't add the status data",
                        type : "error",
                        showCancelButton : false
                    });
                }
            }, 
            error : function(){
                swal({
                    title : "Failed",
                    text : "Can't add the status data",
                    type : "error",
                    showCancelButton : false
                })
            }
        });
    }

    function del_status(data_status){
        swal({
            title: 'Are you sure ?',
            text: "You will not be able to recover this file!",
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
                url: "<?php echo base_url(); ?>del_jo_status",
                data: {data_status : data_status},
                dataType: "JSON",
                success: function (response) {
                    if(response.result == "success"){
                        swal({
                            title : "Success",
                            text : "Status has been deleted",
                            type : "success",
                            showCancelButton : false
                        }, function(){
                            location.reload();
                        })
                    }
                    else{
                        swal({
                            title : "Failed",
                            text : "Can't delete the status data",
                            type : "error",
                            showCancelButton : false
                        });
                    }
                }, 
                error : function(){
                    swal({
                        title : "Failed",
                        text : "Can't delete the status data",
                        type : "error",
                        showCancelButton : false
                    })
                }
            });
        });
    }

    function edit_status(data_status){
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>edit_jo_status",
            data: {data_status : data_status},
            dataType: "JSON",
            success: function (response) {
                if(response.result == "success"){
                    $("#status_form").attr("action", "update");
                    $("#id_data_status").val(data_status);
                    $("#date_status").val(response.status.date);
                    $("#time").val(response.status.time);
                    $("#status").val(response.status.status);
                    $("#note").val(response.status.note);

                    $("#addStatus").modal("show");
                }
                else{
                    swal({
                        title : "Failed",
                        text : "Can't get the status data",
                        type : "error",
                        showCancelButton : false
                    });
                }
            }, 
            error : function(){
                swal({
                    title : "Failed",
                    text : "Can't edit the status data",
                    type : "error",
                    showCancelButton : false
                })
            }
        });
    }

    function update_status(formData){
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>update_jo_status",
            data: formData,
            dataType: "JSON",
            success: function (response) {
                if(response.result == "success"){
                    swal({
                        title : "Success",
                        text : "Status has been updated",
                        type : "success",
                        showCancelButton : false
                    }, function(){
                        location.reload();
                    })
                }
                else{
                    swal({
                        title : "Failed",
                        text : "Can't update the status data",
                        type : "error",
                        showCancelButton : false
                    });
                }
            }, 
            error : function(){
                swal({
                    title : "Failed",
                    text : "Can't update the status data",
                    type : "error",
                    showCancelButton : false
                })
            }
        });
    }
</script>