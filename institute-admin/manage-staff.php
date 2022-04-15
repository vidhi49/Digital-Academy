<?php
include("../connect.php");
// session_start();
include("change-header.php");
$inst_id = $_SESSION['inst_id'];
$inst_name = $_SESSION['name'];
$a = 'staff';
?>
<html>

<head>

  <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
  <script src="../js/jquery-3.1.1.min.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"> -->
    
  <!-- </script> -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" crossorigin="anonymous"> -->
  </script>
  <!-- <link rel="stylesheet" href="../css/style.css"> -->
  <!-- <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
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
          url: 'ajaxStaff.php',
          data: 'staff_id=' + ID,

          success: function(response) {

            $.each(response, function(key, staffview) {
              // alert(staffview['Name']);
              $(".stype").html(staffview['Desgination']);
              $(".gender").html(staffview['Gender']);
              $(".Id").html(staffview['Id']);
              $(".cno").html(staffview['Cno']);
              $(".dob").html(staffview['Dob']);
              $(".bloodgroup").html(staffview['Bloodgroup']);
              $(".address").html(staffview['Address'] + " ," + staffview['State'] + " ," + staffview[
                'Country']);
              $(".doj").html(staffview['Doj']);
              $(".desig").html(staffview['Desgination']);
              $(".edate").html(staffview['Enroll_date']);
              $(".ayr").html(staffview['Academicyr']);
              $(".email").html(staffview['Email']);
              var img = "staff_profile/" + staffview['Profile'];
              $(".name").text(staffview['Name']);
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
              url: 'ajaxStaff.php',
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
      $("#load-table").load("staff.php");
    }
  </script>
</head>

<body>
  <div class="d-flex">
    <?php include("institute-sidebar.php"); ?>
    <div class="content p-5">
      <!-- <div class="d-flex justify-content-center"> -->
      <div style="box-shadow: rgba(0, 0, 0, 0.30) 0px 3px 8px;">
        <div class="py-4 pl-3 border-bottom " style="border-radius:10px 10px 0px 0px;background-color: white;">
          <div class="row">
            <div class="col">
              <div class="h2 font-weight-bold text-primary">Staff Details</div>
            </div>
            <div class="col text-right mr-5">
              <a class="btn btn-primary" href="stafffilter.php">Filter</a>
            </div>
          </div>

        </div>

        <div id="load-table" class="p-3" style='border-radius:0px 0px 10px 10px;background-color: white;'>

        </div>
      </div>
      <!-- </div> -->
    </div>
  </div>
  <!-- <div class="content p-5 text-muted ">
    <div class="d-block justify-content-center" style="box-shadow: rgba(0, 0, 0, 0.30) 0px 3px 8px;">
      <div class="py-4 pl-3 border-bottom" style="border-radius:10px 10px 0px 0px;background-color: white;">
        <h1 class="h2 font-weight-bold text-primary">Staff Details</h1>
        
      </div>
      
      <div id="load-table" class="p-3" style='border-radius:0px 0px 10px 10px;background-color: white;'>

      </div>
    </div>


  </div> -->

</body>

</html>