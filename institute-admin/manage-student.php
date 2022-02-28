<?php include("../connect.php");
include("change-header.php");
$inst_id = $_SESSION['inst_id'];
$inst_name = $_SESSION['name'];
?>
<html>

<head>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="../js/jquery-3.1.1.min.js"></script>
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <script>
    $(document).ready(function() {

      readstudent();
      $(document).on('click', '#delete', function(e) {
        var ID = $(this).attr("data-id");

        SwalDelete(ID);
        e.preventDefault();
      });
      $(document).on('click', '#view', function(e) {
        var ID = $(this).attr("data-id");
        $.ajax({
          type: "POST",
          url: 'ajaxStudentDelete.php',
          data: 'stud_id=' + ID,
         
          success: function(response) {
           
            $.each(response, function(key, studview) {
              
              $(".a").html(studview['Section']);
              $(".b").html(studview['Gender']);
              $(".c").html(studview['Id']);
              var img = "student_profile/" + studview['Profile'];
             
              $(".hello").text(studview['Name']);
              $('#popup-img1').attr('src', img);
            });

            
          }
        });

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
              url: 'ajaxStudentDelete.php',
              type: 'POST',
              data: 'delete=' + ID,
              dataType: 'Json',

            })
            .done(function(response) {
              // Swal.fire('Deleted!',response.message,response.status);
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
      $("#load-table").load("student.php");
    }
  </script>
</head>

<body>
  <div class="container p-5 text-muted h6">
    <div class="card mb-4" style='box-shadow: rgba(0, 0, 0, 0.30) 0px 3px 8px;'>
      <div class="card-header py-4 d-flex flex-row align-items-center justify-content-between">
        <h6 class="h4 m-0 font-weight-bold text-primary">Student Details</h6>

      </div>
      <div id="load-table">

      </div>

    </div>
  </div>
  </div>

</body>

</html>