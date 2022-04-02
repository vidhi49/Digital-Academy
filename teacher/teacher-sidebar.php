<html>
<style>

</style>

<body>
  <div class="row flex-nowrap d-inline-block width-sidebar p-5 sidebar" style="background-color:#041562;">
    <ul class="nav nav-pills flex-column mb-sm-auto align-items-center align-items-sm-start" id="menu">
      <li class="nav-item m-1">
        <a href="teacher-home.php" class="nav-link align-middle px-0 text-white" data-toggle="modal"
          data-target="#exampleModal">
          <i class="fas fa-home fs-5"></i>
          <p class="ms-2 d-none d-sm-inline "> Home </p>
        </a>
      </li>
      <li class="nav-item m-1">
        <a href="question-bank.php" class="nav-link align-middle px-0 text-white">
          <i class="fas fa-question fs-5"></i>
          <p class="ms-2 d-none d-sm-inline"> Question Bank </p>
        </a>
      </li>
      <li class="nav-item m-1">
        <a href="takeattedance.php" class="nav-link align-middle px-0 text-white">
          <i class="fas fa-question fs-5"></i>
          <p class="ms-2 d-none d-sm-inline"> Take Attedance </p>
        </a>
      </li>
      <!-- <li class="nav-item m-1">
        <a href="takeattedance.php" class="nav-link align-middle px-0 text-white">
          <i class="fas fa-question fs-5"></i>
          <p class="ms-2 d-none d-sm-inline"> Generate Roll Number </p>
        </a>
      </li> -->
      <li class="nav-item m-1">
        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="true"
          class="dropdown-toggle nav-link align-middle px-0 text-white"><i class="fas fa-folder-open fs-5 mr-2"></i>
          Exam
        </a>
        <ul class="collapse list-unstyled" id="homeSubmenu">
          <li>
            <a href="question-bank.php" class="nav-link float-right text-white"> Add Question </a>
          </li>
          <li>
            <a href="manageExam.php" class="nav-link float-right text-white" aria-expanded="true">Manage Exam</a>
          </li>
          <!-- <li>
            <a href="#">Home 3</a>
          </li> -->
        </ul>
      </li>
    </ul>
  </div>
</body>


</html>