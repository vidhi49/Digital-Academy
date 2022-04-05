<?php
// session_start();
include("../connect.php");
include("change-header.php");
$a="fees";



//--------------------------------DELETE------------------------------------------------------------------

if (isset($_GET['Id']) && isset($_GET['action']) && $_GET['action'] == "delete")
{
    $Id= $_GET['Id'];

    $query = mysqli_query($con,"DELETE FROM fees WHERE Id='$Id'");

    if ($query == TRUE) {

            echo "<script type = \"text/javascript\">
            window.location = (\"manage_fees.php\")
            </script>";  
    }
    else{

        $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>"; 
     }
  
}

 //------------UPDATE-----------------------------

 if (isset($_POST['update'])) {

   $inst_id=$_SESSION['inst_id'];
    $Class_id=$_REQUEST['class'];  
    $Amount=$_REQUEST['amount'];
    $q = mysqli_query($con, "select * from fees where  Class_id ='$Class_id'");
    $res = mysqli_fetch_array($q);
    $query1 = mysqli_query($con, "select * from fees where  Id ='$res[Id]'");
    $ret = mysqli_fetch_array($query1);
    if ($ret > 0) {

      if ($Id == $res['Id']) {

        $query = mysqli_query($con, "update fees set Amount='$Amount' where Class_id='$Class_id'");

        if ($query) {

          echo "<script type = \"text/javascript\">
                      window.location = (\"manage_fees.php\")
                      </script>";
        } else {
          $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>";
        }
      } else {
        $statusMsg = "<div class='alert alert-danger'>This Class Already Exists!</div>";
      }
    } else {
      $query = mysqli_query($con, "update fees set Amount='$amount' where Id='$Id'");

      if ($query) {

        echo "<script type = \"text/javascript\">
                window.location = (\"manage_fees.php\")
                </script>";
      } else {
        $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>";
      }
    }
  }

//------------save-----------------------------

  if (isset($_POST['save'])) {
    $inst_id=$_SESSION['inst_id'];
    $Class_id=$_REQUEST['class'];  
    $Amount=$_REQUEST['amount'];
    $q = "insert into fees values(null,'$Class_id','$Amount')";
        $res = mysqli_query($con, $q);
    }


?>

<head>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <script>


    </script>

</head>

<body>
    <div class="d-flex">
        <?php include("institute-sidebar.php"); ?>
        <div class=" container  p-5">
            <form method="post">
                <div class="row">
                    <div class="col">
                        <div style="box-shadow: rgba(0, 0, 0, 0.30) 0px 3px 8px;">
                        
                            <div class="py-4 pl-3 border-bottom " style="border-radius:10px 10px 0px 0px;background-color: #030d38;">
                                <div class="h2 font-weight-bold text-white">Course Details</div>
                            </div>
                            <div class="py-4 pl-3" style="border-radius:0px 0px 10px 10px;background-color: white;">
                                <div class="row mr-2 ">
                                    <div class="col-sm-4 col-lg-4">
                                        <label class="form-control-label">Select Class<span class="text-danger ml-2">*</span></label>
                                        <?php
                                        $qry = "SELECT DISTINCT Name FROM class_tbl ORDER BY Name ASC";
                                        $result = $con->query($qry);
                                        $num = $result->num_rows;
                                        if ($num > 0) {
                                            echo ' <select required name="class" onchange="classDropdown(this.value)" class="form-control form-control m-1">';
                                            echo '<option value="">--Select Class--</option>';
                                            while ($rows = $result->fetch_assoc()) {
                                                echo '<option ' . (($r['Class'] == $rows['Name']) ? 'selected="selected"' : "") . ' value="' . $rows['Name'] . '" >' . $rows['Name'] . '</option>';
                                            }
                                            echo '</select>';
                                        }
                                        ?>
                                    </div>
                                   
                                    <!-- <div class="col">
                                    <label class="form-control-label">Select Fee type<span class="text-danger ml-2">*</span></label>
                                        <select class="form-control" id="feetype" name="feetype">
                                            <option value="" selected> Choose... </option>
                                            <option value="cash"> Cash </option>
                                            <option value="cheque"> Cheque </option>
                                           
                                        </select>
                                    </div> -->
                                    <div class="col">
                                        <label class="control-label">Amount</label>
                                        <input type="number" step="any" min="0" class="form-control text-right" name="amount">
                                    </div>

                                </div>
                               
                                <div class="row py-3">
                                    <div class="col ">
                                        <label for="" class="control-label">&nbsp;</label>
                                        <?php
                                            if (isset($Id)) {
                                            ?>
                                            <button type="submit" name="update" class="btn btn-warning">Update</button>
                                            <?php
                                            } else {
                                            ?>
                                            <button type="submit" name="save" class="btn btn-primary MT-2">Add to list</button>
                                            <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <br><br>
            <div class="row" id="studtable" style="box-shadow: rgba(0, 0, 0, 0.30) 0px 3px 8px;">
                <div class="col m-3" style='border-radius:10px 10px 10px 10px;background-color: white;'>
                    <div class="table-responsive pt-3">
                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th></th>
                                    <th>Class</th>
                                    <th>Total Amount</th>
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            
                                <?php
                                $query = "SELECT * FROM fees";
                                $rs = mysqli_query($con,$query);
                                $num = mysqli_num_rows($rs);
                                $sn = 0;
                                if ($num > 0) {
                                    while ($rows=mysqli_fetch_array($rs)) {
                                        $sn = $sn + 1;
                                        echo "
                              <tr>
                                <td>" . $sn . "</td>
                                <td>" . $rows[1] . "</td>                               
                                <td>" . $rows[2] . "</td>
                                <td><a href='?action=delete&Id=".$rows['Id']."'><i class='fas fa-fw fa-trash'></i>Delete</a></td>
                               
                              </tr>";
                                    }
                                } else {
                                    echo
                                    "<div class='alert alert-danger' role='alert'>
                            No Record Found!
                            </div>";
                                }

                                ?>
                            </tbody>
                        </table>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" type="submit" onclick="location.href = 'Courses-Fees.php'">Save</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>
<?php

    
       
?> 