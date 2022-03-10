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
    <!-- <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> 
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../css/style.css"></script>
    <script>
        $(document).ready(function() {

            let btn = document.querySelector("#btn");
            let li = document.querySelectorAll(".list");
            let sidebar = document.querySelector(".sidebar");
            btn.onclick = function() {
                sidebar.classList.toggle("active");

            }
            for (let i = 0; i < li.length; i++) {
                li[i].onclick = function() {
                    let j = 0;
                    while (j < li.length) {
                        li[j++].className = 'listt';
                    }
                    li[i].className = 'list active';
                    // var link=li[i].children[2].children[1].innerHTML;
                    // if(link == "Register staff"){
                    //     $("#cont").load("staff-registration.php");
                    // }
                    // else if(link == "Register student")
                    // {
                    //     $("#cont").load("student-registration.php");
                    // }
                    // readstudent();
                }
            }

            //         function readstudent() {
            //   $("#cont").load("staff-registration.php");
            // }
        });
    </script>
    <style>
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poopins", sans-serif;
        }

        body {
            position: relative;
            min-height: 100vh;
            width: 100%;
            /* overflow: auto; */

        }

        .sidebar {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 240px;
            background-color: #041562;
            padding: 6px 0px 16px 0px;
            /* padding: 6px 14px; */
            transition: all 0.5s ease;
        }

        .sidebar.active {
            width: 75px;
        }

        .sidebar .logo_conent .logo {
            color: #fff;
            display: flex;
            height: 50px;
            width: 100%;
            align-items: center;
            /* opacity: 0; */
            pointer-events: none;
            transition: all 0.5s ease;
        }

        .sidebar.active .logo_conent .logo {
            opacity: 0;
            pointer-events: none;
        }

        .logo_conent .logo i {
            font-size: 28px;
            margin-right: 5px;
        }

        .logo_conent .logo .logo_name {
            font-size: 25px;
            font-weight: 400;

        }

        .sidebar ul li.active {
            background-color: #fff;
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;

        }

        .sidebar ul li.active a {
            color: #11101d;

        }

        .sidebar ul li.active a:hover {
            color: #11101d;

        }

        .sidebar #btn {
            position: absolute;
            color: #fff;
            left: 90%;
            top: 6px;
            font-size: 20px;
            height: 50px;
            width: 50px;
            text-align: center;
            line-height: 50px;
            transform: translate(-50%);
        }

        .sidebar.active #btn {
            left: 55%;
        }

        .sidebar ul {
            margin-top: 20px;
            list-style: none;
            padding-left: 10px;


        }

        .sidebar ul li {
            position: relative;
            height: 50px;
            width: 100%;
            padding: 0;
            margin: 5 5 0 0;
            list-style: none;
            line-height: 50px;
            /* border-radius: 12px; */
        }

        .sidebar ul li .tooltip {
            position: absolute;
            height: 35px;
            left: 122px;
            top: 0;
            transform: translate(-50%, -50%);
            border-radius: 6px;
            width: 122px;
            background: #fff;
            line-height: 35px;
            text-align: center;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            transition: 0s;
            /* opacity: 0; */
            pointer-events: none;
            display: none;
        }

        .sidebar.active ul li .tooltip {
            display: block;
        }

        .sidebar ul li:hover .tooltip {
            transition: all 0.5s ease;
            top: 50%;
            opacity: 1;
            /* display: none; */

        }

        .sidebar .links_name {
            /* opacity: 0; */
            pointer-events: none;
            /* transition: all 0.5s ease; */
        }

        .sidebar.active .links_name {
            opacity: 0;
            pointer-events: auto;
        }

        .sidebar ul li b:nth-child(1) {
            position: absolute;
            top: -20px;
            height: 20px;
            width: 100%;
            background-color: #fff;
            display: none;
        }

        .sidebar ul li b:nth-child(1)::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-bottom-right-radius: 20px;
            background: #041562;
        }

        .sidebar ul li b:nth-child(2) {
            position: absolute;
            bottom: -20px;
            height: 20px;
            width: 100%;
            background-color: #fff;
            display: none;
        }

        .sidebar ul li b:nth-child(2)::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-top-right-radius: 20px;
            background: #041562;
        }

        .sidebar ul li.active b:nth-child(1),
        .sidebar ul li.active b:nth-child(2) {
            display: block;
        }

        .sidebar ul li a {
            color: #fff;
            display: flex;
            align-items: center;
            text-decoration: none;
            /* transition: all 0.4s ease; */
            border-radius: 20px;
            /* border-top-left-radius: 20px;
            border-bottom-left-radius: 20px; */
            white-space: nowrap;
        }

        .sidebar ul li a:hover {
            /* background: #fff; */
            color: #fff;
            font-size: 20px;
            transition: all 0.5s ease;
            /* margin-right: 8px; */
        }
        
        .sidebar ul li a i {
            height: 50px;
            min-width: 50px;
            border-radius: 12px;
            line-height: 50px;
            text-align: center;
        }

        li.active a i {
            background: #041562;
            border: 2px solid #fff;
            color: #fff;
            border-radius: 20px;
        }

        .container {
            position: relative;
            /* width: calc(100% -240px); */
            left: 70px;
            height: 100%;
            /* transition: all 0.5s ease;  */
        }

        .sidebar.active~.container {
            /* width: calc(100% -75px); */
            left: 30px;
            transition: all 0.5s ease;
        }
    </style>
</head>

<body>

    <div class="d-flex">
        <div class="sidebar">
            <div class="logo_conent">
                <div class="logo">
                    <div class="logo_name">
                        Academy
                    </div>

                </div>
                <i class='fa fa-bars' id="btn"></i>

            </div>
            <br>
            <ul >
                <li class="list">
                    <b></b>
                    <b></b>
                    <a href="#">

                        <i class='fa fa-edit'></i>
                        <span class="links_name">Edit Profile</span>
                    </a>
                    <span class="tooltip">Edit</span>
                </li>

                <li class="list">
                    <b></b>
                    <b></b>
                    <a href="#">
                        <i class='fa fa-check'></i>
                        <span class="links_name">Dashbord</span>
                    </a>
                    <span class="tooltip">Dashbord</span>
                </li>
                <li class="list">
                    <b></b>
                    <b></b>
                    <a href="#">
                    <i class='fa fa-check'></i>
                        <span class="links_name">Register staff</span>
                    </a>
                    <span class="tooltip">Register</span>
                </li>
                <li class="list">
                    <b></b>
                    <b></b>
                    <a href="#">
                    <i class='fa fa-check'></i>
                        <span class="links_name">Register student</span>
                    </a>
                    <span class="tooltip">Register</span>
                </li>
                <li <?php if (($a == 'class')) {
                        echo "Class='list active'";
                    } ?>>
                    <b></b>
                    <b></b>
                    <a href="create-class.php">
                        <i class='fa fa-check'></i>
                        <span class="links_name">Create Class</span>
                    </a>
                    <span class="tooltip">Create</span>
                </li>
                <li <?php if (($a == 'subject')) {
                        echo "Class='list active'";
                    } ?>>
                    <b></b>
                    <b></b>
                    <a href="create-subject.php">
                    <i class='fa fa-check'></i>
                        <span class="links_name">Create Subject</span>
                    </a>
                    <span class="tooltip">Create</span>
                </li>
                <li <?php if (($a == 'managestudent')) {
                        echo "Class='list active'";
                    } ?>>
                    <b></b>
                    <b></b>
                    <a href="manage-student.php">
                    <i class='fa fa-check'></i>
                        <span class="links_name">Manage student</span>
                    </a>
                    <span class="tooltip">Manage</span>
                </li>
                <li <?php if (($a == 'managestaff')) {
                        echo "Class='list active'";
                    } ?>>
                    <b></b>
                    <b></b>
                    <a href="manage-staff.php">
                    <i class='fa fa-check'></i>
                        <span class="links_name">Manage staff</span>
                    </a>
                    <span class="tooltip">Manage</span>
                </li>

                <li <?php if (($a == 'viewstudent')) {
                        echo "Class='list active'";
                    } ?>>
                    <b></b>
                    <b></b>
                    <a href="studentfilter.php">
                    <i class='fa fa-check'></i>
                        <span class="links_name">View Student</span>
                    </a>
                    <span class="tooltip">View</span>
                </li>
                <li <?php if (($a == 'viewstaff')) {
                        echo "Class='list active'";
                    } ?>>
                    <b></b>
                    <b></b>
                    <a href="stafffilter.php">
                    <i class='fa fa-check'></i>
                        <span class="links_name">View staff</span>
                    </a>
                    <span class="tooltip">View</span>
                </li>

                <li class="list">
                    <b></b>
                    <b></b>
                    <a href="#">
                    <i class='fa fa-check'></i>
                        <span class="links_name">Attedence</span>
                    </a>
                    <span class="tooltip">Attedance</span>
                </li>
            </ul>

        </div>

        <!-- <div class="container content m-5">
            <div id="cont" class="p-3" style='border-radius:0px 0px 10px 10px;background-color: white;'>
sdfsdlorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur nihil voluptatibus ad sed vel dolorem pariatur neque laborum, fugit qui molestiae rem aspernatur, quidem, aliquid error quisquam at obcaecati id!
            </div>
        </div> -->
    </div>

</body>

</html>