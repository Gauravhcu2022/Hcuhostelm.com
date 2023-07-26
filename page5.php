
<html>
    <head><title></title>
  <style>
 .dd{
            
            
            background-color: bisque;
            font-size:28px;
        }   
  </style></head>
   
    <body bgcolor="sky blue">
        <h1 style="font-size:50px;"><u>Student information </u></h1>
    <?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
  //Retrieve form data
  $id = $_POST['search'];

  //Connect to the database
  $conn = new mysqli("localhost", "root", "", "test");

  //Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  //Retrieve data from the database by using id
  $sql = "SELECT * FROM studentinfo WHERE RegistrationNo = '$id'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    //output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<div style='background-color: lightblue; padding: 10px;'>";
      echo " <p style='font-weight: bold; font-size:38px;'> Student Name: " . $row["StudentName"]. "<br>";
      echo "Registration No.: " . $row["RegistrationNo"]. "<br>";
      echo "Course: " . $row["Course"]. "<br>";
      echo "Hostel: " . $row["Hostel"]. "<br>";
      echo "Room No.: " . $row["RoomNo"]. "<br>";
      echo "Mess Card No.: " . $row["MessCardNo"]. "<br>";
      echo "Contact No.: " . $row["ContactNo"]. "<br>";
      echo "</p>";
      echo "</div>";
    }
  } else {
    echo "No data found with the given id";
  }

  mysqli_close($conn);
}

?>
<br><br>
<form action="page1.htm"><input type="submit" class="dd"  name="fmess" value="Get back"><b></form>

    </body>
</html>