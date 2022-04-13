<?php include("login.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Welcome Guest</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Aclonica&family=Nova+Slim" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

</head>

<style>
.nav-item::after {
  content: '';
  display: block;
  width: 0px;
  height: 2px;
  background: #fec400;
  transition: 0.2s;
}

.nav-link:hover {
  transform: scale(1.0);
}


.nav-item:hover::after {
  width: 100%;
}

.navbar-dark .navbar-nav .active>.nav-link,
.navbar-dark .navbar-nav .nav-link.active,
.navbar-dark .navbar-nav .nav-link.show,
.navbar-dark .navbar-nav .show>.nav-link,
.navbar-dark .navbar-nav .nav-link:focus,
.navbar-dark .navbar-nav .nav-link:hover {
  color: darkgrey;
  font-weight: bold;
  /* font-size: large; */
}

.btn-get-started {
  color: #213b52;
  border-radius: 50px;
  padding: 8px 35px 10px 35px;
  border: 2px solid #fdc134;
  transition: all ease-in-out 0.3s;
  display: inline-block;
  background: #fdc134;
}

.btn-get-started:hover {
  background: transparent;
  color: #fff;
}

.home-img {
  margin: 0px !important;
  /* padding: 0px; */
}


.feature-title,
.contact-title {
  position: relative;
}

.feature-title::before {
  content: "";
  position: absolute;
  display: block;
  width: 120px;
  height: 1px;
  background: #ddd;
  bottom: 1px;
  left: calc(50% - 60px);
}

.contact-title::before {
  content: "";
  position: absolute;
  display: block;
  width: 120px;
  height: 1px;
  background: #ddd;
  bottom: 1px;
  left: calc(50% - 60px);
}

.feature-title::after {
  content: "";
  position: absolute;
  display: block;
  width: 40px;
  height: 3px;
  background: #fdc134;
  bottom: 0;
  left: calc(50% - 20px);
}

.contact-title::after {
  content: "";
  position: absolute;
  display: block;
  width: 40px;
  height: 3px;
  background: #fdc134;
  bottom: 0;
  left: calc(50% - 20px);
}

.feature-icon:hover {
  color: white !important;
  -webkit-transition: all 0.5s ease-in-out;
  -moz-transition: all 0.5s ease-in-out;
  -o-transition: all 0.5s ease-in-out;
  -ms-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
  -webkit-transform: rotate(360deg);
  /* -moz-transform: rotate(360deg); */
  /* -o-transform: rotate(360deg); */
  /* -ms-transform: rotate(360deg); */
}

.feature-circle:hover,
.feature-icon:hover {
  background-color: #162e50;
  color: white !important;
}


.feature-circle {
  border-radius: 105px;
  background-color: #efefef;
  color: #041562;
  /* text-align: center; */
  width: 105px;
  height: 105px;
  line-height: 105px;
  display: flex;
  justify-content: center;
  align-items: center;
}

.social-links a {

  font-size: 18px;
  display: inline-block;
  background: #152736bd;
  color: white;
  line-height: 1;
  padding: 8px 0;
  margin-right: 4px;
  border-radius: 50%;
  text-align: center;
  width: 36px;
  height: 36px;
  transition: 0.3s;
}

.social-links a:hover {
  background: #fcb102;
  color: #fff;
  text-decoration: none;
}

.login-btn:hover {
  border: none;
}
</style>

<body>
  <header class="bg-navy-blue">
    <div class="container">
      <nav class="navbar navbar-expand-sm navbar-dark">
        <div class="container-fluid">
          <img class='logo navbar-brand ' src='../img/logo1.png' />
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="justify-content-end  collapse navbar-collapse  " id="collapsibleNavbar">
            <ul class="navbar-nav fs-6">
              <li class="nav-item">
                <a class="nav-link m-2" href="#home">Home</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link m-2 " href="inquiry.php">Registration-Request</a>
              </li>
              <li class="nav-item ">
                <a href="#" class="btn nav-link m-2 login-btn border-0" role="button" data-bs-toggle="modal"
                  data-bs-target="#loginModal">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link m-2 " href="#aboutus">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link m-2" href="#contact">Contact Us</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>

  <div id="home" class="bg-navy-blue">
    <div class="container">
      <div class="row d-flex align-items-center pb-5">
        <div class="col-sm-6">
          <p style="color:#bec4cb;"
            class="mt-5 fs-1 fw-bold animate__animated animate__bounce animate__slower delay-2s">Your new digital
            experience with DGSkool</p>
          <p style="color:#bec4cb;" class="fs-5">We are team of talented developers making websites with more Security
            and As per Requirements.
          </p>
          <button href="#aboutus" class="btn-get-started scrollto mt-3">Get Started</button>
        </div>
        <div class="col-sm-6 text-center">
          <img src="../img/10.png" class="img img-fluid w-100 m-5 home-img " />
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div id="aboutus">
      <div class="row p-5 mt-3">
        <h1 class="text-center "> DIGITAL ACADEMY
        </h1>

        <p style="font-family: 'Nova Slim', cursive;" class="fs-5 text-center p-4 ">
          Digital school a complete program with the
          vision to blend technology into the school education system</p>
        <br>
        <p class="fs-5 p-3">
          At academic grounds, we help solve the everyday communications challenges that all schools face.
          We believe schools can change educational outcomes if they can improve how they share information. We help
          schools use their website and other web communications to do just that, and bring the entire school
          community closer.
        </p>
      </div>
      <div class="row p-5">
        <div class="col-sm-6">
          <h1 class='navy-blue'>Our team is your team.
            <hr>
          </h1>
          <p class="fs-6">
            Our Campus Suite team is comprised of designers, developers, project leaders, and support specialists who
            all come together to create better ways for schools to communicate via the web.

            We're in this together. Among our team members are former school PR professionals and former teachers,
            many of whom are parents themselves. You might say we take our work home with us, living and knowing
            firsthand the importance of school-parent engagement.
          </p>
        </div>
        <div class="col-sm-6">
          <img src="https://source.unsplash.com/650x350/?team" alt="">
        </div>
      </div>
    </div>
    <div id="features" class="feature m-2">
      <h2 class="text-center fw-bold fs-4 feature-title p-3"> FEATURES
        <!-- <hr class="w-100 h-25 text-primary fw-bolder" /> -->
      </h2>
      <div class="row mt-5">
        <div class="col-sm-4 d-flex justify-content-center">
          <div class="card w-100 align-items-center p-3 aos-init aos-animate" data-aos="flip-right"
            style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
            <div class="feature-circle">
              <i class="fa fa-wpforms navy-blue fs-1 feature-icon"></i>
            </div>
            <div class="card-body">
              <h5 class="card-title navy-blue text-center m-3 fw-bold">ADMISSION MANAGEMENT</h5>
              <div class="float-left">
                <ul style="list-style: none; padding:0px;">
                  <li><i class="fa fa-check navy-blue" aria-hidden="true"></i> Class wise/Individual student reports
                  </li>
                  <li><i class="fa fa-check navy-blue" aria-hidden="true"></i> MIS report generation</li>
                  <li><i class="fa fa-check navy-blue" aria-hidden="true"></i> Student promotion based on academis year
                    set by institution</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-4 d-flex justify-content-center">
          <div class="card w-100  align-items-center p-3 aos-init aos-animate" data-aos="flip-left"
            style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
            <div class="feature-circle">
              <i class="fa fa-users navy-blue fs-1 feature-icon"></i>
            </div>
            <div class="card-body">
              <h5 class="card-title navy-blue text-center m-3 fw-bold">STUDENT MANAGEMENT</h5>
              <div class="float-left">
                <ul style="list-style: none; padding:0px;">
                  <li><i class="fa fa-check navy-blue" aria-hidden="true"></i> Detailed student profile
                  </li>
                  <li><i class="fa fa-check navy-blue" aria-hidden="true"></i> Fees paid and fees due can be viewed
                  </li>
                  <li><i class="fa fa-check navy-blue" aria-hidden="true"></i> Maintaining records of absence and
                    attendance</li>
                  <li><i class="fa fa-check navy-blue" aria-hidden="true"></i> Handling records of examinations,
                    assessments, marks, grades and academic progression</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-4 d-flex justify-content-center">
          <div class="card w-100 align-items-center p-3 aos-init aos-animate" data-aos="flip-right"
            style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
            <div class="feature-circle">
              <i class="fa fa-users navy-blue fs-1 feature-icon"></i>
            </div>
            <div class="card-body">
              <h5 class="card-title navy-blue text-center m-3 fw-bold">STAFF MANAGEMENT</h5>
              <div class="float-left">
                <ul style="list-style: none; padding:0px;">
                  <li><i class="fa fa-check navy-blue" aria-hidden="true"></i> Detailed Teaching and non-teaching staff
                    profile.
                  </li>
                  <li><i class="fa fa-check navy-blue" aria-hidden="true"></i> Consolidate view of staff reports
                  </li>
                  <li><i class="fa fa-check navy-blue" aria-hidden="true"></i> Track your teacher's particulars,
                    residential addresses and other data.
                    representations</li>
                  <li><i class="fa fa-check navy-blue" aria-hidden="true"></i> Manage users password and privileges</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-sm-4 d-flex justify-content-center">
          <div class="card w-100 align-items-center p-3 aos-init aos-animate" data-aos="flip-left"
            style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
            <div class="feature-circle">
              <i class="fa fa-credit-card navy-blue fs-1 feature-icon"></i>
            </div>
            <div class="card-body">
              <h5 class="card-title navy-blue text-center m-3 fw-bold">FEE MANAGEMENT</h5>
              <div class="float-left">
                <ul style="list-style: none; padding:0px;">
                  <li><i class="fa fa-check navy-blue" aria-hidden="true"></i> Setup Your Own Class Fee Structure, For
                    Each Class.
                  </li>
                  <li><i class="fa fa-check navy-blue" aria-hidden="true"></i> Reports – Student dues list, class wise
                    due list, student wise fee collection, class wise fee collection, Fee collection summary report</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-4 d-flex justify-content-center">
          <div class="card w-100  align-items-center p-3 aos-init aos-animate" data-aos="flip-right"
            style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
            <div class="feature-circle">
              <i class="fa fa-file-text-o navy-blue fs-1 feature-icon"></i>
            </div>
            <div class="card-body">
              <h5 class="card-title navy-blue text-center m-3 fw-bold">ONLINE EXAMS AND EVALUATION MANAGEMENT</h5>
              <div class="float-left">
                <ul style="list-style: none; padding:0px;">
                  <li><i class="fa fa-check navy-blue" aria-hidden="true"></i> Exam scheduling & evaluation
                  </li>
                  <li><i class="fa fa-check navy-blue" aria-hidden="true"></i> Online Exam
                  </li>
                  <li><i class="fa fa-check navy-blue" aria-hidden="true"></i> Integrated to Attendance System
                    attendance</li>
                  <li><i class="fa fa-check navy-blue" aria-hidden="true"></i> OMR Integration</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-4 d-flex justify-content-center">
          <div class="card w-100  align-items-center p-3 aos-init aos-animate" data-aos="flip-left"
            style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
            <div class="feature-circle">
              <i class="fa fa-hand-o-up navy-blue fs-1 feature-icon"></i>
            </div>
            <div class="card-body">
              <h5 class="card-title navy-blue text-center m-3 fw-bold">ATTENDANCE TRACKER</h5>
              <div class="float-left">
                <ul style="list-style: none; padding:0px;">
                  <li><i class="fa fa-check navy-blue" aria-hidden="true"></i> Daily attendance
                  </li>
                  <li><i class="fa fa-check navy-blue" aria-hidden="true"></i> Holiday scheduling
                  </li>
                  <li><i class="fa fa-check navy-blue" aria-hidden="true"></i> Customized reports & graphical
                    representations</li>
                  <li><i class="fa fa-check navy-blue" aria-hidden="true"></i> Alerts</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-5 mb-5">
        <div class="col-sm-4 d-flex justify-content-center">
          <div class="card w-100 align-items-center p-3 aos-init aos-animate" data-aos="flip-left"
            style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
            <div class="feature-circle">
              <i class="fa fa-list-alt navy-blue fs-1 feature-icon"></i>
            </div>
            <div class="card-body">
              <h5 class="card-title navy-blue text-center m-3 fw-bold">ID CARD MANAGEMENT</h5>
              <div class="float-left">
                <ul style="list-style: none; padding:0px;">
                  <li><i class="fa fa-check navy-blue" aria-hidden="true"></i> Easily create student and staff ID cards.
                  </li>
                  <li><i class="fa fa-check navy-blue" aria-hidden="true"></i> Design and print fully customizable
                    student photo ID cards
                  </li>
                  <li><i class="fa fa-check navy-blue" aria-hidden="true"></i> Viewable/printable ID card generation
                    residential addresses and other data.
                    representations</li>
                  <li><i class="fa fa-check navy-blue" aria-hidden="true"></i> Customized information on id cards</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-4 d-flex justify-content-center">
          <div class="card w-100 align-items-center p-3 aos-init aos-animate" data-aos="flip-left"
            style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
            <div class="feature-circle">
              <i class="fa fa-list navy-blue fs-1 feature-icon"></i>
            </div>
            <div class="card-body">
              <h5 class="card-title navy-blue text-center m-3 fw-bold"> STUDY MATERIAL MANAGEMENT</h5>
              <div class="float-left">
                <ul style="list-style: none; padding:0px;">
                  <li><i class="fa fa-check navy-blue" aria-hidden="true"></i> It saves your time and money.
                  </li>
                  <li><i class="fa fa-check navy-blue" aria-hidden="true"></i> Atudents Can read any time whenver needs.
                  </li>
                  <li><i class="fa fa-check navy-blue" aria-hidden="true"></i> Teachers can manage whenever they want or
                    whenever they get time.</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="contact" class="contact aos-init aos-animate m-2" data-aos="fade-up">
      <h2 class="text-center fw-bold fs-4 contact-title p-3"> CONTACT
        <!-- <hr class="w-100 h-25 text-primary fw-bolder" /> -->
      </h2>
      <div class="row d-flex m-5 ">
        <div class="col-sm-6 ">
          <div class="row mt-3  me-2" style="background-color: #fafbff;">
            <p class="fs-5 text-secondary mb-5 p-5">We're open for any suggestion you need or just chat.
            </p>
          </div>
          <div class="row">
            <div class="col-sm-6 text-center h-100">
              <div class="mt-4 aos-init aos-animate p-5" data-aos="fade-up" data-aos-delay="100"
                style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; background-color: #fafbff;">
                <i class="fa fa-envelope text-warning fs-3 m-2" aria-hidden="true"></i>
                <h4 class="aos-init aos-animate text-secondary fw-bold m-2" data-aos="fade-up" data-aos-delay="100">
                  Email Us
                </h4>
                <p class="aos-init aos-animate m-4" data-aos="fade-up" data-aos-delay="100"> DGSkool@gmail.com</p>
              </div>
            </div>
            <div class="col-sm-6 text-center h-100">
              <div class="mt-4 aos-init aos-animate p-5" data-aos="fade-up" data-aos-delay="100"
                style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; background-color: #fafbff;">
                <i class=" fa fa-phone text-warning fs-3 m-2" aria-hidden="true"></i>
                <h4 class="aos-init aos-animate text-secondary fw-bold m-2" data-aos="fade-up" data-aos-delay="100">
                  Call Us
                </h4>
                <p class="aos-init aos-animate m-4" data-aos="fade-up" data-aos-delay="100"> 9878967009</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 mt-3 p-5" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;background-color: #fafbff;">
          <form method="post" class="w-100 aos-init aos-animate" data-aos="fade-up">
            <div class="row mb-3">
              <div class="col-sm-6 form-group">
                <input type="text" placeholder="Your Name" class="form-control p-2 " required>
              </div>
              <div class="col-sm-6 form-group">
                <input type="text" placeholder="Your Email" class="form-control p-2 " required>
              </div>
            </div>
            <div class="form-group mb-3">
              <input type="text" placeholder="Subject" class="form-control p-2" required>
            </div>
            <div class="form-group mb-5">
              <textarea class="form-control p-2" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="text-center">
              <button class="btn bg-warning text-white btn-md btn-block p-2" type="submit"> Send Message </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="bg-secondary ">
    <div class="container">
      <div class="row text-center navy-blue container ">
        <h3 class="fw-bold mt-5 mb-5 ">DGSkool</h3>
        <h5 class="text-white ">Teaching Turning Today's Learners Into Tomorrow's Leaders</h5>>
        <div class="social-links mb-5 ">
          <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
          <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
          <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
          <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 justify-content-start">
          <small class="text-white fw-bold m-5">Copyright &copy; 2022 All Rights Reserved DGSkool
            <span id='currentyear'></span></small>
        </div>
        <div class="col-sm-6 d-flex justify-content-end">
          <h6 class="text-white fs-6 pe-3">Designed By : </h6>
          <p class="text-warning ">Vishva Ardeshna
            <br />
            Vidhi Ardeshna <br />
            Aarti Gohil
          </p>
        </div>
      </div>
    </div>
  </div>
</body>
<script type="text/javascript">
AOS.init({
  duration: 1200,
})
</script>

</html>