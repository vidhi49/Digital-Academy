<?php include("../connect.php");
// session_start();
include("change-header.php");
$inst_id = $_SESSION['inst_id'];
$inst_name = $_SESSION['name'];
$a = 'managestudent';
?>
<html>

<head>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="../js/jquery-3.1.1.min.js"></script>
  <!-- <link rel="stylesheet" href="../css/style.css"> -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"> -->
  </script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" crossorigin="anonymous">
  </script>
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
            $(".class").html(studview['Class'] + "-" + studview['Section']);
            $(".gender").html(studview['Gender']);
            $(".fname").html(studview['Father_name']);
            $(".mname").html(studview['Mother_name']);
            $(".gender").html(studview['Gender']);
            $(".cno").html(studview['Mobileno']);
            $(".dob").html(studview['Dob']);
            $(".bloodgroup").html(studview['Bloodgroup']);
            $(".address").html(studview['Address'] + " ," + studview['State'] + " ," + studview[
              'Country']);
            $(".grno").html(studview['Grno']);
            // $(".class").html(studview['Class'] + "-" + studview['Section']);
            $(".edate").html(studview['Enroll_date']);
            $(".ayr").html(studview['Academicyr']);
            $(".email").html(studview['Email']);
            var img = "student_profile/" + studview['Profile'];

            $(".name").text(studview['Name']);
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
  <div class="d-flex">

    <?php include("institute-sidebar.php"); ?>
    <div class="institute-content ">
      <div style="box-shadow: rgba(0, 0, 0, 0.30) 0px 3px 8px;">
        <div class="py-4 pl-3 border-bottom" style="border-radius:10px 10px 0px 0px;background-color: white;">
          <div class="row">
            <div class="col">
              <h1 class="h2 font-weight-bold text-primary">Student Details</h1>
            </div>
            <div class="col text-right mr-5">
              <a class="btn btn-primary" href="studentfilter.php">Filter</a>
            </div>
          </div>


        </div>

        <div id="load-table" class="p-3" style='border-radius:0px 0px 10px 10px;background-color: white;'>

        </div>
      </div>
    </div>
  </div>

  <!-- <div class="container p-5 text-muted ">
    <div style="box-shadow: rgba(0, 0, 0, 0.30) 0px 3px 8px;">
      <div class="py-4 pl-3 border-bottom" style="border-radius:10px 10px 0px 0px;background-color: white;">
        <h1 class="h2 font-weight-bold text-primary">Staff Details</h1>
        
      </div>
      
      <div id="load-table" class="p-3" style='border-radius:0px 0px 10px 10px;background-color: white;'>

      </div>
    </div>


  </div> -->

</body>

</html>