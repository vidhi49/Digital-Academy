<?php

session_start();
$email = $_SESSION['email'];
$id = $_SESSION['id'];
$q = "select * from master_admin_tbl where Id='$id'";
$res = mysqli_query($con, $q);
$result = mysqli_fetch_array($res);
?>
<html>

<head>
  <title> DGSkool </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <script src="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
  </script>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" /> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    crossorigin="anonymous" />
  <!-- <script type="text/javascript">
  $(document).ready(function() {
    $("body").tooltip({
      selector: '[data-toggle=tooltip]',
    });
  });
  </script> -->

  <!-- <script type="text/javascript">
  // add row
  $("#addOption").click(function() {
    var html = '';
    html += '<div class="form-floating m-2">';
    html += ` <textarea class="form-control" placeholder="Question " id="floatingTextarea2" style="height: 100px"
                name="question"></textarea>`;
    html +=
      '<label for="floatingTextarea2">Question</label>';
    html += '</div>';

    $('#newRow').append(html);
  });

  // remove row
  $(document).on('click', '#removeRow', function() {
    $(this).closest('#inputFormRow').remove();
  });
  </script> -->
</head>

<body>
  <div class="container-fluid ">
    <!-- style='box-shadow: black 0px 3px 80px;' -->
    <div class="row bg-navy-blue" style="box-shadow:  0 10px 15px -6px black;">
      <div class="col-sm-6 d-flex">
        <img class='logo  navbar-brand ms-5 ' src='../img/logo1.png' ; ?>

      </div>
      <div class="col-sm-6 d-flex justify-content-end align-items-center">
        <div class="d-block">

          <span class="h-25 pe-2 fs-4  text-light" id="email"><?php echo $result[1]; ?></span>
        </div>
        <img class='logo ms-1' src='admin_profile/<?php echo $result[3]; ?>'
          style=" height:80px;width:80px;border-radius:50px;padding:20" />
        <a href="../admin/admin-logout.php" class="btn btn-secondary" role="button">logout</a>
      </div>
    </div>

  </div>
</body>
<!-- <body> -->
<!-- <nav class="navbar navbar-light bg-dark">
    <a class="navbar-brand">
      <img class='logo ms-1' src='../img/logo1.png' style=" height:100px" />
    </a>
    <form class="form-inline">
      <span style="height:30px;padding:0 20 0 0px;font-size:25;color:white"
        id="email"><?php echo $_SESSION['email']; ?></span>
      <img class='logo ms-1' src='../img/p1.jpg' style=" height:80px;width:80px;border-radius:50px;padding:20" />
      <a href="admin-logout.php" class="btn btn-secondary btn-lg" role="button">Logout</a>
    </form>
  </nav> -->
<!-- <nav class="navbar navbar-expand-sm bg-navy-blue navbar-dark py-1">
    <div class="container-fluid">
      <img class='logo navbar-brand ms-5' src='../img/logo1.png' /> -->
<!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button> -->

<!-- <div class="collapse navbar-collapse " id="collapsibleNavbar"> -->
<!-- <ul class="navbar-nav justify-content-end fs-6">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            <img class='logo ms-1' src='../img/p1.jpg' style=" height:80px;width:80px;border-radius:50px;padding:20" />
            <?php echo $_SESSION['email']; ?>
          </a>

          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="admin-logout.php">Logout</a></li>
          </ul>
        </li>
      </ul> -->
<!-- </div> -->
<!-- </div>
  </nav>
</body> -->

</html>