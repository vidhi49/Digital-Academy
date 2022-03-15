<html>

<head>
  <meta charset="utf-8">
  <title>Untitled Document</title>
  <link href="https://fonts.googleapis.com/css2?family=Aclonica&family=Nova+Slim" rel="stylesheet">
  <link rel="stylesheet" href="../css/style.css">
</head>

<style>
  .content {
    margin-top: 100px;
    margin-bottom: 100px;
    margin-right: 150px;
    margin-left: 80px;
  }
</style>

<body>
  <?php include("header.php"); ?>
  <div class="content">
    <div class="container">

      <div class="row" style="height: 500px">
        <div class="col-md-6" style="background-image: url(../img/c7.jpg); color: white">
          <div class="text-left" style="padding-top: 50;padding-bottom: 50;padding-left: 30;padding-right: 30">
            <div>
              <h1>Contact Us </h1>
              <p>We're open for any suggestion you need or just chat.</p><br><br>
              <table width="200" border="0" align="justify">
                <tbody style="color: white">

                  <tr>
                    <td width="43" align="center">
                      <i class="fa fa-envelope" style="font-size:20px"></i>
                    </td>
                    <td width="141"><strong>Email:</strong></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td>abc@gmail.com<br><br><br></td>
                  </tr>

                  <tr>
                    <td height="34" align="center">
                      <i class="fa fa-phone  " style="font-size:20px"></i>
                    </td>
                    <td><strong>Phone:</strong></td>
                  </tr>

                  <tr>
                    <td>&nbsp;</td>
                    <td>+91 123 456 7890<br><br><br></td>
                  </tr>

                  <tr>
                    <td height="33" align="center">
                      <i class="fa fa-globe" aria-hidden="true" style="font-size:25px"></i>
                    </td>
                    <td><strong>Website:</strong></td>
                  </tr>

                  <tr>
                    <td>&nbsp;</td>
                    <td>dgskool@gmailcom</td>
                  </tr>

                </tbody>
              </table><br><br>
            </div>
          </div>
        </div>
        <div class="col-sm-6" style="padding-top: 00px;padding-left: 50px">
          <div>
            <h1>Send us a Message</h1><br><br>
          </div>
          <div>
            <p>Enter Your Name:</p>
            <input class="form-control w-75" style="border: none;border-bottom:  2px solid;" type="text" name="name">
            <p>E-mail Address</p>
            <input class="form-control w-75" style="border: none;border-bottom:  2px solid " type="email" name="email">
            <p>Phone</p>
            <input class="form-control w-75" style="border: none;border-bottom:  2px solid " type="tel" name="phone">
            <p>Message</p>
            <input class="form-control w-75" style="border: none;border-bottom:  2px solid " type="text" name="message"><br><br>
            <input class="btn btn-dark" name="submit" type="submit" title="Submit">
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<?php require('footer.php') ?>

</html>