  function subcodeDropdown(str) {
    if (str == "") {
      document.getElementById("sub_code").innerHTML = "";
      return;

    } else {
      if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
      } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("sub_code").innerHTML = this.responseText;

        }
      };
      xmlhttp.open("GET", "ajaxSubcode.php?subject=" + str, true);
      xmlhttp.send();

    }

  }

  function sectionDropdown1(str) {
    if (str == "") {
      document.getElementById("txtHint1").innerHTML = "";
      return;
    } else {
      if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
      } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("txtHint1").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET", "../institute-admin/ajaxclass.php?name=" + str, true);
      xmlhttp.send();
    }
  }

  function subjectDropdown1(str) {
    if (str == "") {
      document.getElementById("subject1").innerHTML = "";
      return;
    } else {
      if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
      } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("subject1").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET", "ajaxSubject.php?className=" + str, true);
      xmlhttp.send();
    }
  }
  function subcodeDropdown(str) {
    if (str == "") {
      document.getElementById("sub_code").innerHTML = "";
      return;
    } else {
      if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
      } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("sub_code").innerHTML = this.responseText;

        }
      };
      xmlhttp.open("GET", "../Institute-admin/ajaxSubcode.php?subject=" + str, true);
      xmlhttp.send();
    }
  }

  function sectionDropdown(str) {
    if (str == "") {
      document.getElementById("txtHint").innerHTML = "";
      return;
    } else {
      if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
      } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("txtHint").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET", "../institute-admin/ajaxclass.php?name=" + str, true);
      xmlhttp.send();
    }
  }

  function subjectDropdown(str) {
    if (str == "") {
      document.getElementById("subject").innerHTML = "";
      return;
    } else {
      if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
      } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("subject").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET", "ajaxSubject.php?className=" + str, true);
      xmlhttp.send();
    }
  }

  $(function() {
    var count = 0;
    // console.log('111');
    $('.cntCheck').on('change', function() {
      console.log('checked');
      if (this.checked) {
        count++;
        $('cntCheck').text(count);
        // console.log(count);
        // document.getElementById("totQue").ty = count;
        // document.getElementById("totQue").type = "text";
        document.getElementById("totQue").innerHTML = count + " Rows Selected";
      } else {
        count--;
        document.getElementById("totQue").innerHTML = count + " Rows Selected";
      }
    })
  })
  