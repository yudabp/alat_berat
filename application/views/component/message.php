<script type="text/javascript">
<?php if($this->session->flashdata('item')==TRUE){?>
        $(document).ready(function(){
                        swal({
                            title: 'Failed!',
                            text: '<?php echo $this->session->flashdata('item'); ?>',
                            type: 'error',
                            confirmButtonClass: "btn btn-danger",
                            buttonsStyling: false
                        })
        });
<?php }else if($this->session->flashdata('suc')==TRUE){ ?>
  $(document).ready(function(){
                  swal({
                      title: 'success!',
                      text: '<?php echo $this->session->flashdata('suc'); ?>',
                      type: 'success',
                      confirmButtonClass: "btn btn-danger",
                      buttonsStyling: false
                  })
  });
<?php } ?>
    </script>
