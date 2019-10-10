<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
 <div class="clear-lab"></div>
 <section class="content">
  <div class="card card-info">
    <div class="card-header ui-sortable-handle" style="cursor: move;">
      <h3 class="card-title">Filter Panel</h3>
      <!-- filter panel -->


      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
      </div></div>
      <!-- /.card-header -->
      <div class="card-body" style="display: block;">
        <div class="row">

          <div class="col-12 col-md-6 col-lg-4">
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
            </div>
          </div>

          <div class="col-12 col-md-6 col-lg-4">
            <div class="form-group">
              <label for="exampleInputEmail1">Mobile</label>
              <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Mobile">
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-3">
            <div class="form-group">
              <label for="exampleInputEmail1">Location</label>
              <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Location">
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-1">
            <div class="form-group">
              <div class="clear-lab"></div>
              <button type="submit" class="btn btn-primary"><i class="fas fa-filter"></i> Filter</button>
            </div>

          </div>


        </div>

      </div>
    </div>
  </section>


  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
<!--
        <div class="card-header">
          <h3 class="card-title">student Management</h3>
        </div>
      -->
      <div class="card-header d-flex p-0 ui-sortable-handle" style="cursor: move;">
        <h3 class="card-title p-3">
          <i class="fas fa-chart-pie mr-1"></i>
          Student Management
        </h3>
        <div class="nav nav-pills ml-auto p-2">
          <a href="<?php echo base_url(); ?>student/add" class="btn btn-sm btn-success">+ Add New</a>
        </ul>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="table-contain table-responsive"> 
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>City</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
        </tfoot>
      </table>
    </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
<!-- /.content-wrapper -->
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>


<script>
  $(document).ready(function() {
    <?php
    $url = base_url().'index.php/student/getstudent'; 
    ?>
    $('#example1').DataTable({
     dom: 'Blfrtip',
     buttons: [
     {
      extend: 'excelHtml5',
      exportOptions: {
        columns: ':visible'
      }
    },
    'colvis'

    ],
    "ajax": {
      'url':"<?php echo $url; ?>",
      'type':'POST',
    },
    "deferRender": true,
    "pageLength": 10,
    "lengthMenu": [[10, 50, 100, 250, 500, -1], [10, 50, 100, 250, 500, "All"]],

    });//datatable
});

  function activate(data){
    var dataString = "student_id="+data;
    $.ajax({
      type: "POST",
      cache : false,
      ashync:false,
      url: "<?php echo base_url(); ?>index.php/student/activate",
      data: dataString,
      dataType:'json',
      success: function(data){
        toastr.success('student activated successfully');
        $('#example1').DataTable().ajax.reload();
      }

    });
  }

  function del(data){
    var dataString = "student_id="+data;
    $.ajax({
      type: "POST",
      cache : false,
      ashync:false,
      url: "<?php echo base_url(); ?>index.php/student/deativate",
      data: dataString,
      dataType:'json',
      success: function(data){
        toastr.error('student deactivated successfully');
        $('#example1').DataTable().ajax.reload();
      }

    });
  }
</script>