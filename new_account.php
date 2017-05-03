<html>
<body>
  <title>Test</title>

  <?php

  if($_POST["password"]!= $_POST["confirmpassword"]) {
    echo "Check the password and try again...";
  }

  else {

  $mysqli = new mysqli('69.126.42.110:3306', 'root', '');

  if ($mysqli->connect_error) {
      die('Connect Error (' . $mysqli->connect_errno . ') '
              . $mysqli->connect_error);
  }
  echo 'Connection OK';



    if ($mysqli->select_db("Appadius") == TRUE) {
      echo "Select DB Success";
    }

    else {
      echo "Select DB Fail<br>" . $mysqli->error . "<br>";
    }

  $sql="INSERT INTO Users (Username, Password, Email) VALUES (
    '" . $mysqli->escape_string($_POST["firstname"]) . "',
    '" . $mysqli->escape_string($_POST["password"]) . "',
    '" . $mysqli->escape_string($_POST["emailaddress"]) . "'

  )";
  echo "about to query";
  if ($mysqli->query($sql) == TRUE) {
    echo "Success";
  }
  else {
    echo "you screwed up<br>" . $mysqli->error . "<br>";
  }

  $mysqli->close();

  echo "<script> location.href='http://benstechgarage.com'; </script>";

}


  ?>
<!--Debugging Purposes-->
<!--Welcome <?php echo $_POST["firstname"]; ?><br>
Your email address is: <?php echo $_POST["emailaddress"]; ?><br>
The password you registered with is <?php echo $_POST["password"]; ?><br>
Does your password match the confirmation? The confirmation password you entered is <?php echo $_POST['confirmpassword']; ?><br>-->

</body>
</html>
