<?php include("../connect.php");
// session_start();
include("change-header.php");
$Ins_id=$_SESSION['inst_id'];
$statusMsg="";
$dis="";
$a='subject';
//------------------------SAVE--------------------------------------------------
if(isset($_POST['save'])){
    
    $className=$_POST['Name'];
    $sub_code=trim($_POST['Sub_code']);
    $sub_name=$_POST['Sub_name'];
    $query=mysqli_query($con,"select * from subject_tbl where Sub_code ='$sub_code' AND Inst_id='$Ins_id'");
    $ret=mysqli_fetch_array($query);

    if($ret > 0){ 

        $statusMsg = "<div class='alert alert-danger'>This Subject Code is Already Exists!</div>";
    }
    else{
        $q=mysqli_query($con,"select * from class_tbl where Name='$className' AND Insti_id='$Ins_id'");
        $res=mysqli_fetch_array($q);
        $class_id=$res['Id'];
        $query=mysqli_query($con,"insert into subject_tbl(Inst_id,Sub_code,Sub_name,Class_name,Class_id) values('$Ins_id','$sub_code','$sub_name','$className','$class_id')");

    if ($query) {
        
        $statusMsg = "<div class='alert alert-success'  >Created Successfully!</div>";
    }
    else
    {
         $statusMsg = "<div class='alert alert-danger'>An error Occurred".mysqli_error($con)."</div>";
    }
  }
}

//--------------------EDIT------------------------------------------------------------

 if (isset($_GET['Id']) && isset($_GET['action']) && $_GET['action'] == "edit")
	{
        $Id= $_GET['Id'];

        $query=mysqli_query($con,"select * from subject_tbl where Id ='$Id' AND Inst_id='$Ins_id'");
        $row=mysqli_fetch_array($query);
        $dis="disabled";
        //------------UPDATE-----------------------------

        if(isset($_POST['update'])){
    
            //$className=$_POST['Name'];
            $sub_code=$_POST['Sub_code'];
            $sub_name=$_POST['Sub_name'];

            $q=mysqli_query($con,"select * from subject_tbl where Sub_code='$sub_code' AND Inst_id='$Ins_id'");
            $res=mysqli_fetch_array($q);
            $q1=mysqli_query($con,"select * from subject_tbl where Id = '$res[Id]' AND Inst_id='$Ins_id'");
            $res1=mysqli_fetch_array($q1);
            if($res1>0)
            {
              if($Id==$res['Id'])
              {
                $query=mysqli_query($con,"update subject_tbl set Sub_name='$sub_name' where Id='$Id' AND Inst_id='$Ins_id'");

                if ($query) 
                {
                    
                    echo "<script type = \"text/javascript\">
                    window.location = (\"create-subject.php\")
                    </script>"; 
                }
                else
                {
                    $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>";
                }
              }
              else
              {
                $statusMsg = "<div class='alert alert-danger'>This Subject Code Already Exists!</div>"; 
              }
              
            }
            else
            {
                $query=mysqli_query($con,"update subject_tbl set Sub_code=' $sub_code',Sub_name='$sub_name' where Id='$Id' AND Inst_id='$Ins_id'");

                if ($query) 
                {
                    
                    echo "<script type = \"text/javascript\">
                    window.location = (\"create-subject.php\")
                    </script>"; 
                }
                else
                {
                    $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>";
                }
            }

        
            
        }
    }


//--------------------------------DELETE------------------------------------------------------------------

  if (isset($_GET['Id']) && isset($_GET['action']) && $_GET['action'] == "delete")
	{
        $Id= $_GET['Id'];

        $query = mysqli_query($con,"DELETE FROM subject_tbl WHERE Id='$Id' AND Inst_id='$Ins_id'");

        if ($query == TRUE) {

                echo "<script type = \"text/javascript\">
                window.location = (\"create-subject.php\")
                </script>";  
        }
        else{

            $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>"; 
         }
      
  }



?>
<head>
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>  -->
	<link href="https://fonts.googleapis.com/css2?family=Aclonica&family=Nova+Slim" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <!-- <link href="../css/css/ruang-admin.min.css" rel="stylesheet"> -->
  <script src="../js/jquery-3.1.1.min.js"></script>
  <!-- <link href="css/ruang-admin.min.css" rel="stylesheet"> -->
  <script>
    $(document).ready(function(){
      // $(".container").fadeIn("slow");
      $(".institute-content").fadeIn(1000);
      // alert("hello");
    });
  </script>
  
</head>
<html>
<body>
  <div class="d-flex">
  <?php include("institute-sidebar.php"); ?>
  <div class="institute-content p-5 text-muted h6" style="display: none;">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Create Subjects</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Subjects</li>
                    
                </ol>
          </div>
          <div class="card mb-4" style='box-shadow: rgba(0, 0, 0, 0.30) 0px 3px 8px;'>
                <div class="card-header py-4 d-flex flex-row align-items-center justify-content-between">
                  <h4 class="m-0 font-weight-bold text-primary">Select Class</h4>
                  <?php echo $statusMsg; ?>
                </div>
                <div class="card-body">
                  <form method="post">
                    <div class="form-group row mb-3">
                        <div class="col">
                            <label class="form-control-label">Select Class<span class="text-danger ml-2">*</span></label>
                            <?php
                            $qry= "SELECT DISTINCT Name FROM class_tbl where  Insti_id='$Ins_id' ORDER BY Name ASC";
                            $result = $con->query($qry);
                            $num = $result->num_rows;		
                            if ($num > 0){
                            echo ' <select required name="Name" '.$dis.' onchange="classDropdown(this.value)" class="form-control form-control-lg mb-3">';
                            echo'<option value="">--Select Class--</option>';
                            while ($rows = $result->fetch_assoc()){
                            echo'<option '.(($row['Class_name']==$rows['Name'])?'selected="selected"':"").' value="'.$rows['Name'].'" >'.$rows['Name'].'</option>';
                                }
                                    echo '</select>';
                                }
                                ?>  
                        </div>
                        <div class="col">
                            <label class="form-control-label ">Create Subject Code<span class="text-danger ml-2">*</span></label>
                            <input type="text" class="form-control form-control-lg" name="Sub_code" value="<?php if(isset($row['Sub_code'])) echo $row['Sub_code'];?>" placeholder="Enter Subject Code">
                        </div>
                        <div class="col">
                            <label class="form-control-label ">Create Subject<span class="text-danger ml-2">*</span></label>
                            <input type="text" class="form-control form-control-lg" name="Sub_name" value="<?php if(isset($row['Sub_name'])) echo $row['Sub_name'];?>" placeholder="Enter Subject Name">
                        </div>
                        
                    </div>
                    <?php
                    if (isset($Id))
                    {
                    ?>
                    <button type="submit" name="update" class="btn btn-warning">Update</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php
                    } else {           
                    ?>
                    <button type="submit" name="save" class="btn btn-primary">Create</button>
                    <?php
                    }         
                    ?>
                  </form>
                </div>

          </div>
          <div class="card mb-4" style='box-shadow: rgba(0, 0, 0, 0.30) 0px 3px 8px;'>
                <div class="card-header py-4 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="h4 m-0 font-weight-bold text-primary">All Classes</h6>
                 
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>#</th>
                        <th>Class Name</th>
                        <th>Subject Code</th>
                        <th>Subject Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                  
                    <tbody>

                  <?php
                      $query = "SELECT * FROM subject_tbl where  Inst_id='$Ins_id'";
                      $rs = $con->query($query);
                      $num = $rs->num_rows;
                      $sn=0;
                      if($num > 0)
                      { 
                        while ($rows = $rs->fetch_assoc())
                          {
                             $sn = $sn + 1;
                            echo"
                              <tr>
                                <td>".$sn."</td>
                                <td>".$rows['Class_name']."</td>
                                <td>".$rows['Sub_code']."</td>
                                <td>".$rows['Sub_name']."</td>
                                <td><a href='?action=edit&Id=".$rows['Id']."'><i class='fas fa-fw fa-edit'></i>Edit</a></td>
                                <td><a href='?action=delete&Id=".$rows['Id']."'><i class='fas fa-fw fa-trash'></i>Delete</a></td>
                              </tr>";
                          }
                      }
                      else
                      {
                           echo   
                           "<div class='alert alert-danger' role='alert'>
                            No Record Found!
                            </div>";
                      }
                      
                      ?>
                    </tbody>
                  </table>
                </div>
            </div>
    </div>
  </div>
   

   

  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
   <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>

</body>
</html>
