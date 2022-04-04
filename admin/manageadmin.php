<body>
  <?php
  include('../connect.php');
  include('admin-header.php');
  $a = 'manageadmin';
  ?>
  <script>
    $(document).ready(function() {

      readstudent();

      $(document).on('click', '#delete', function(e) {
        var ID = $(this).attr("data-id");

        SwalDelete(ID);
        e.preventDefault();
      });



    });

    function SwalDelete(ID) {

      Swal.fire({
        title: 'Are You Sure?',
        text: "IT will be deleted permanently",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes,delete it!',
        preConfirm: function() {

          $.ajax({
              url: 'ajaxAdmin.php',
              type: 'POST',
              data: 'delete=' + ID,
              dataType: 'Json',

            })
            .done(function(response) {
              Swal.fire('Deleted!',response.message,response.status);
              readstudent();
            })
            .fail(function() {
              Swal.fire('Oops..!', 'Something went wrong with ajax!', 'error');
            });

        },
        allowOutsideClick: false
      });
    }

    function readstudent() {
      $("#load-table").load("alladmin.php");
    }
  </script>
  <div class="d-flex">
    <?php include("admin-sidebar.php"); ?>
    <!-- <div class="content mt-3 p-3 ">
      <div class="d-flex justify-content-center  m-5" style="border-radius:10px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;background-color: white;">
        <div id="load-table">

        </div>
      </div>
    </div> -->

    <div class="content p-5">
      <!-- <div class="d-flex justify-content-center"> -->
      <div style="box-shadow: rgba(0, 0, 0, 0.30) 0px 3px 8px;">
        
        <div id="load-table" class="p-3" style="border-radius:10px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;background-color: white;">
        </div>
      </div>
      <!-- </div> -->
    </div>


  </div>
  </div>
  <?php include("../guest/footer.php"); ?>

</html>