<html>
<?php
include("../connect.php");
// $a='';
// session_start();
// include("change-header.php");
// $inst_id = $_SESSION['inst_id'];
// $inst_name = $_SESSION['name'];
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" crossorigin="anonymous" />
    <style>
        /* *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins",
            sans-serif;
        } */
        /* body{
            min-height: 100vh;
            background: #eee;
            
        } */
        .nav-link {
            padding: 0;
        }

        .institute-sidebar {
            /* position: absolute;
            top: 0px; */
            /* left: 0px; */
            /* bottom: -1000px; */
            /* bottom:0px; */
            width: 300px;
            /* overflow: auto; */
            /* border-radius: 5px; */
            /* border-left: 5px solid #191a1c; */
            background-color: #191a1c;
            transition: 0.5s ease;
        }

        .institute-sidebar ul {
            /* position: absolute; */
            top: 0;
            left: 0;
            width: 100%;
            /* height: 100%; */
            /* padding-top: 70px; */
            /* padding-left:10px; */
            display: flex;
            flex-direction: column;
            /* flex: 0; */
        }

        .institute-sidebar ul li {
            list-style: none;
            position: relative;
            width: 100%;
        }

        .institute-sidebar ul li a {
            position: relative;
            text-decoration: none;
            display: block;
            width: 100%;
            display: flex;
            color: #fff;
        }

        .institute-sidebar ul li a .icon {
            display: block;
            position: relative;
            min-width: 55px;
            height: 60px;
            line-height: 60px;
            text-align: center;
            font-size: 20px;
        }

        .institute-sidebar ul li .icon-link {
            justify-content: space-between;
        }

        .institute-sidebar ul li a span {
            position: relative;
            line-height: 70px;
            padding-left: 10px;
            margin-left: 10px;
        }

        .institute-sidebar ul li.active {
            background: #eee;
            border-top-left-radius: 60px;
            border-bottom-left-radius: 60px;
        }

        .institute-sidebar ul li.active a {
            color: #333;
        }

        .institute-sidebar ul li.active a .icon {
            /* height: 50px;
            width: 50px; */
            background: #191a1c;
            border-radius: 50%;
            color: #eee;
            margin: 5px 0px 5px 5px;
        }

        .institute-sidebar ul li.active p:nth-child(1) {
            position: absolute;
            width: 100%;
            height: 20px;
            background: #eee;
            /* border-bottom-right-radius: 60px; */
            top: -20px;
            left: 0;
        }

        .institute-sidebar ul li.active p:nth-child(1)::after {
            position: absolute;
            content: '';
            width: 100%;
            height: 20px;
            background: #191a1c;
            border-bottom-right-radius: 60px;
            /* top: -20px; */
            left: 0;
        }

        .institute-sidebar ul li.active p:nth-child(2) {
            position: absolute;
            width: 100%;
            height: 20px;
            background: #eee;
            bottom: -35px;
            left: 0;
        }

        .institute-sidebar ul li.active p:nth-child(2)::after {
            position: absolute;
            content: '';
            width: 100%;
            height: 20px;
            background: #191a1c;
            border-top-right-radius: 60px;
            left: 0;
            bottom: 0px;
        }

        @media only screen and (max-width: 500px) {

            .insttitute-sidebar {
                width: 50px;
                align-items: center;
                text-align: center;
                display: block;
            }

            .institute-content {
                width: calc(100vw - 50px);
                padding: 15px;
                margin: 0px;

            }

            .insttitute-sidebar .links_name {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="institute-sidebar nav">
        <ul>
            <li class="nav-item">
                <p></p>
                <p></p>
                <a href="#" class="nav-link">
                    <i class="fa fa-check icon"></i>
                    <span>Edit Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <p></p>
                <p></p>
                <a href="#" class="nav-link">
                    <i class="fa fa-check icon"></i>
                    <span>Dashbord</span>
                </a>
            </li>
            <li class=" nav-item">
                <p></p>
                <p></p>
                <a href="#" class="nav-link">
                    <i class="fa fa-check icon"></i>
                    <span>Register Staff</span>
                </a>
            </li>
            <li class="nav-item">
                <p></p>
                <p></p>
                <a href="#" class="nav-link">
                    <i class="fa fa-check icon"></i>
                    <span>Register Student</span>
                </a>
            </li>
            <li>
                <p></p>
                <p></p>
                <a href="#" class="nav-link">
                    <i class="fa fa-check icon"></i>
                    <span>Create Class</span>
                </a>
            </li>
            <li class="nav-item m-5">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle nav-link align-middle px-0 text-white"><i class="fas fa-folder-open fs-5 mr-2"></i>
                    Exam
                </a>
                <ul class="collapse list-unstyled"> id="homeSubmenu">
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
            <li class="active nav-item">
                <p></p>
                <p></p>
                <div class="icon-link d-flex">
                    <a href="#" class="nav-link">
                        <i class="fa fa-check icon"></i>
                        <span>Create Subject</span>
                    </a>
                    <i class="bx bxs-chevron-down"></i>
                </div>

            </li>
            <li class="nav-item">
                <p></p>
                <p></p>
                <a href="#" class="nav-link">
                    <i class="fa fa-check icon"></i>
                    <span>Manage Student</span>
                </a>
            </li>
            <li class="nav-item">
                <p></p>
                <p></p>
                <a href="#" class="nav-link">
                    <i class="fa fa-check icon"></i>
                    <span>Manage Staff</span>
                </a>
            </li>
            <li class="nav-item">
                <p></p>
                <p></p>
                <a href="#" class="nav-link">
                    <i class="fa fa-check icon"></i>
                    <span>View Student</span>
                </a>
            </li>
            <li class="nav-item">
                <p></p>
                <p></p>
                <a href="#" class="nav-link">
                    <i class="fa fa-check icon"></i>
                    <span>View Staff</span>
                </a>
            </li>
            <li class="nav-item">
                <p></p>
                <p></p>
                <a href="#" class="nav-link">
                    <i class="fa fa-check icon"></i>
                    <span>Attedance</span>
                </a>
            </li>
        </ul>
    </div>


</body>

</html>