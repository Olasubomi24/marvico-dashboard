
<script src="<?php echo base_url('assets/js/vendor-all.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/plugins/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/plugins/feather.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/pcoded.min.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
<script src="<?php echo base_url('assets/js/plugins/clipboard.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/uikit.min.js'); ?>"></script>


<script src=" <?php echo base_url('assets/js/plugins/jquery.dataTables.min.js') ?>"></script>
<script src=" <?php echo base_url('assets/js/plugins/dataTables.bootstrap4.min.js') ?>"></script>


<script src="<?php echo base_url('assets/js/pages/data-advance-custom.js') ?>"></script>
<script src="<?php echo base_url('assets/js/plugins/moment.js')?>"></script>

<script src="<?php echo base_url('assets/js/plugins/apexcharts.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/pages/dashboard-sale.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/plugins/bootstrap-datepicker.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/csv-downloader'); ?>"></script>

<script src="<?php echo base_url('assets/js/plugins/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/plugins/buttons.colVis.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/plugins/buttons.print.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/plugins/pdfmake.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/plugins/jszip.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/plugins/dataTables.buttons.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/plugins/buttons.html5.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/plugins/buttons.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/pages/data-export-custom.js'); ?>"></script>
<script src="<?php echo base_url('assets/hata/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/hata/js/jquery-3.6.0.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/hata/js/datatables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/hata/js/pdfmake.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/hata/js/vfs_fonts.js'); ?>"></script>
<script src="<?php echo base_url('assets/hata/js/custom.js'); ?>"></script>


<script>
    arrows = {
        leftArrow: '<i class="feather icon-chevron-left"></i>',
        rightArrow: '<i class="feather icon-chevron-right"></i>'
    }
    // minimum setup
    $('#pc-datepicker-1').datepicker({
        todayHighlight: true,
        orientation: "bottom left",
        templates: arrows
    });

    // minimum setup for modal demo
    $('#pc-datepicker-1_modal').datepicker({
        todayHighlight: true,
        orientation: "bottom left",
        templates: arrows
    });

    // input group layout
    $('#pc-datepicker-2').datepicker({
        todayHighlight: true,
        orientation: "bottom left",
        templates: arrows
    });

    // input group layout for modal demo
    $('#pc-datepicker-2_modal').datepicker({
        todayHighlight: true,
        orientation: "bottom left",
        templates: arrows
    });

    // enable clear button
    $('#pc-datepicker-3, #pc-datepicker-3_validate').datepicker({
        todayBtn: "linked",
        clearBtn: true,
        todayHighlight: true,
        templates: arrows
    });

    // enable clear button for modal demo
    $('#pc-datepicker-3_modal').datepicker({
        todayBtn: "linked",
        clearBtn: true,
        todayHighlight: true,
        templates: arrows
    });

    // orientation
    $('#pc-datepicker-4_1').datepicker({
        orientation: "top left",
        todayHighlight: true,
        templates: arrows
    });

    $('#pc-datepicker-4_2').datepicker({
        orientation: "top right",
        todayHighlight: true,
        templates: arrows
    });

    $('#pc-datepicker-4_3').datepicker({
        orientation: "bottom left",
        todayHighlight: true,
        templates: arrows
    });

    $('#pc-datepicker-4_4').datepicker({
        orientation: "bottom right",
        todayHighlight: true,
        templates: arrows
    });

    // range picker
    $('#pc-datepicker-5').datepicker({
        todayHighlight: true,
        templates: arrows
    });

    // inline picker
    $('#pc-datepicker-6').datepicker({
        todayHighlight: true,
        templates: arrows
    });
</script>
   
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.js"></script>
<?php if ($this->session->flashdata('success')) { ?>
  <script>
    Swal.fire({
      title: 'SUCCESS !!!',
      text: '<?php echo $this->session->flashdata('success');?>',
      icon: 'success'
    })
  </script>
<?php } else if ($this->session->flashdata('error')) { ?>
  <script>
    Swal.fire({
      title: 'ERROR !!!',
      text: '<?php echo $this->session->flashdata('error');?>',
      icon: 'error',
    })
  </script>
<?php } ?>




      
   
  </body>
</html>

