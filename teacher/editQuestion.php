 <html>

 <head>

 </head>
 <!--  Edit - Modal -->
 <?php

  if (isset($_GET['QueId']) && isset($_GET['action']) && $_GET['action'] == "edit") {
    $queId = $_GET['QueId'];
    echo $queId;
  }
  ?>

 <body>
   <!-- <div class="modal fade" id="editQuestion">
     <div class="modal-dialog modal-dialog-centered">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Edit Question</h5>
           <hr>
         </div>
         <div class="modal-body">
           <div class="modal-body p-3">

             <div class="form-floating m-2">
               <textarea class="form-control" placeholder="Question " id="floatingTextarea2" style="height: 100px"
                 name="question" value="<?php ?>"></textarea>
               <label for="floatingTextarea2">Question</label>
             </div>

             <!-- <div class="form-floating m-2">
                  <input class="form-check-input" type="checkbox" name="correctAnswer[]" value="1">
                  <input type="text" class="form-control" id="floatingInputInvalid" placeholder="Option" name="option1">
                  <label for="floatingInputInvalid">Option</label>
                </div>

                <div class="form-floating m-2">
                  <input class="form-check-input" type="checkbox" name="correctAnswer[]" value="2">
                  <input type="text" class="form-control " id="floatingInputInvalid" placeholder="Option"
                    name="option2">
                  <label for="floatingInputInvalid">Option</label>
                </div>

                <div id="newRow">
                  <input type="hidden" id="dynamicOptions" value="2" name="dynamicOptions" />
                </div>

                <div class="d-flex justify-content-end m-2">
                  <button type="button" class="btn bg-navy-blue text-white m-2" id="addOption">
                    <i class="fas fa-plus"></i> Add More Option
                  </button>

                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-floating m-2">
                      <select required class="form-select" aria-label="Default select example"
                        onchange="sectionDropdown1(this.value);subjectDropdown1(this.value)" name="class1">
                        <?php
                        // $qry = "SELECT DISTINCT Name FROM class_tbl ORDER BY Name ASC";
                        // $result = $con->query($qry);
                        // $num = $result->num_rows;
                        // if ($num > 0) {
                        //   // echo ' <select required name="name"  class="form-select w-50">';
                        //   echo '<option value="">---- -Select Class -----</option>';
                        //   while ($rows = $result->fetch_assoc()) {
                        //     echo '<option  value="' . $rows['Name'] . '" >' . $rows['Name'] . '</option>';
                        //   }
                        //   echo '</select>';
                        // }
                        ?>
                        <label for="floatingSelect">Select Class</label>
                    </div>
                  </div>
                  <div class="col-sm-6">

                    <div class="form-floating m-2">
                      <select required name="section" id='txtHint1' class="form-select">
                        <option value="">--Select Section--</option>
                      </select>
                      <label for="floatingSelect">Select Section</label>
                    </div>
                  </div>
                </div>
                <div class="form-floating m-2">
                  <select required class="form-select" name="subject1" id='subject1'
                    onchange='subcodeDropdown(this.value)'>
                    <option value="">----- Select Subject -----</option>
                  </select>
                  <label for="floatingSelect">Select Subject</label>
                </div>

              </div> -->
   <!-- </div>
   <div class="modal-footer">
     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
     <button type="button" class="btn btn-primary">Save changes</button>
   </div>
   </div>
   </div>
   </div>

   </div> -->
 </body>

 </html>