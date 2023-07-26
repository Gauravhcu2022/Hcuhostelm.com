<html>
    <head><title></title></head>
    <style>
        
        h1{
            font-size: 40px;
            margin-right: 300px;
        }
        .dd{
            
            
            background-color: bisque;
            font-size:28px;
        }
        #submit{
            margin-top: 20px;
            
            float: left;
        }
        #f1{
            margin-left: 500px;
        }
        #submit{
            margin-left: 480px;
        }
        #reset{
            margin-top: 20px;
            float:right;
            margin-right: 850px;
        }
        .d{
            font-size: 28px;
        }
        .formerror
        {
            color: red;
            font-size: large;
        }
        #table
        {
            margin-left: 450px;
        }
    </style>
    <body bgcolor="aqua">
    <form action="page2.htm"><input type="submit" class="dd"  name="fmess" value="Get back"><b></form>
        <h1 align="center">
           <u>Fill student information</u>
        </h1>
        
        <form   method="post" name="studentinfo" onsubmit="return validate()">
            
            <table cellpadding="10px" cellspacing="10px" id="table">
           <tr><td> <label class="d">Name :</label></td>
          <td id="name">  <input type="text"  class="dd" name="fname" required><b><span class="formerror"></span></b></td></tr>
          <tr><td>  <label class="d">Reg No :</label></td>
          <td id="regno"> <input type="text"  class="dd" name="fregno" required><b><span class="formerror"></span></b></td></tr>
           <tr><td><label class="d">Course :       </label></td>
           <td id="course"> <input type="text"  class="dd" name="fcourse" required><b><span class="formerror"></span></b></td></tr>
            <tr><td><label class="d">Hostel :       </label></td>
           <td id="hostel"> <input type="text"  class="dd" name="fhostel" required><b><span class="formerror"></span></b></td></tr>
          <tr>  <td><label class="d">Room No :      </label></td>
            <td id="room"><input type="number"  class="dd" name="froom" required><b><span class="formerror"></span></b></td></tr>
           <tr> <td><label class="d">Mess Card No : </label></td>
            <td id="mess"><input type="number"  class="dd" name="fmess" required><b><span class="formerror"></span></b></td></tr>
           <tr><td><label class="d">Contact :      </label></td>
           <td id="contact"><input type="number"  class="dd" name="fcontact" required><b><span class="formerror"></span></b></td></tr>
           </table>
            <input type="submit" class="dd" value="Submit" id="submit" >
            <button type="reset" id="reset" class="dd">Reset</button>
        


    </form >
    <br><br><br>
    
    </body>
   
        <script>
            function clearErrors()
            {
              errors = document.getElementsByClassName('formerror');
              for(let item of errors)
              {
              item.innerHTML="";
              }
            }
            function seterror(id,error)
            {
               element=document.getElementById(id);
               element.getElementsByClassName('formerror')[0].innerHTML=error;
            }
           function validate()
           {
             var rv = true;
             clearErrors();
             var name = document.forms['studentinfo']['fname'].value;
             var regno = document.forms['studentinfo']['fregno'].value;
             var course = document.forms['studentinfo']['fcourse'].value;
             var hostel = document.forms['studentinfo']['fhostel'].value;
             var room = document.forms['studentinfo']['froom'].value;
             var mess = document.forms['studentinfo']['fmess'].value;
             var contact = document.forms['studentinfo']['fcontact'].value;
             if(name.length>26 || name.length <3 )
             {
                seterror("name","*Enter valid name");
                rv = false;
             }
             if(regno.length>10 || regno.length<6)
             {
                seterror("regno","*Enter valid registration Number example 22MCMC10,22MCMC04");
                rv = false;
             }
             if(course.length>10 || course.length<2 )
             {
                seterror("course","*Enter valid course name example mca bsc");
                rv = false;
             }
             if(hostel.length!=1 )
             {
                seterror("hostel","*Enter hostel name example[A to Z]");
                rv = false;
             }
             if(room.length!=3 )
             {
                seterror("room","*Enter valid 3 digit room number");
                rv = false;
             }
             if(mess.length!=3)
             {
                seterror("mess","*Enter valid 3 digit Mess Card Number");
                rv = false;
             }
             if(contact.length!=10 )
             {
                seterror("contact","*Enter valid 10 digit Contact Number");
                rv = false;
             }

             return rv;

           }
 
        

</script>

<?php
 //Connect to the database
 $conn = new mysqli("localhost", "root", "", "test");

 //Check connection
 if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
 }
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  //Retrieve form data
  $name = $_POST['fname'];
  $regno = $_POST['fregno'];
  $course = $_POST['fcourse'];
  $hostel = $_POST['fhostel'];
  $room = $_POST['froom'];
  $mess = $_POST['fmess'];
  $contact = $_POST['fcontact'];
  

  //Insert data into the database
  $sql = "INSERT INTO studentinfo (StudentName, RegistrationNo, Course,Hostel,RoomNo,MessCardNo,ContactNo)
  VALUES ('$name', '$regno', '$course', '$hostel', '$room', '$mess', '$contact')";

  if ($conn->query($sql)==TRUE) {
    echo "<br>    <br><br> &nbsp   &nbsp   &nbsp   &nbsp &nbsp   &nbsp    &nbsp   &nbsp   &nbsp   &nbsp &nbsp   &nbsp  &nbsp   &nbsp   &nbsp   &nbsp &nbsp   &nbsp        Data inserted successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  mysqli_close($conn);
}

?>

</html>