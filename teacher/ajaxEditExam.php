<?php
include '../connect.php';
session_start();

$input = filter_input_array(INPUT_POST);
if ($input['action'] == 'edit') {
  $update_field = '';
  if (isset($input['examName'])) {
    $update_field .= "Exam_Name='" . $input['examName'] . "'";
  } else if (isset($input['examDate'])) {
    $update_field .= "Exam_Date='" . $input['examDate'] . "'";
  } else if (isset($input['status'])) {
    $update_field .= "Status='" . $input['status'] . "'";
  } else if (isset($input['examTime'])) {
    $update_field .= "Exam_Time='" . $input['examTime'] . "'";
  }
  if ($update_field && $input['id']) {
    $sql_query = "UPDATE exam_tbl SET $update_field WHERE id='" . $input['id'] . "'";
    mysqli_query($conn, $sql_query) or die("database error:" . mysqli_error($conn));
  }
}