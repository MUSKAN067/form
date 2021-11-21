

<?php
 
 $insert = false ;
if(isset($_POST['name'])){


//set connection variables
     $server = "localhost" ;
     $username = "root" ;
     $password = "" ;

     // create a database connection
     $con = mysqli_connect($server, $username , $password) ;


     //check for connection success
     if(!$con){
         die("connection to this database failed due to"   .    mysqli_connect_error()) ;
     }

    // echo "success connecting to db" ;

    //collect post variables
    $emailid = $_POST['emailid'] ;
    $name  = $_POST['name'] ;
    $contactno = $_POST['contactno'] ;
    $course  = $_POST['course'] ;
    $session = $_POST['session'] ;
    $registrationid = $_POST['registrationid'] ;
    $sql = " INSERT INTO `form` .  `form` ( `emailid`, `name`, `contactno`, `course`, `session`, `registrationid`, `dt`) 
    VALUES ( '$emailid', '$name', '$contactno', '$course', '$session', '$registrationid', current_timestamp());" ;

    echo $sql;

    //execute the query
   if($con->query($sql) == true){
    //    echo "succesfuly inserted" ;

    // flag for succesful insertion
    $insert = true ;


   }

   else{
       echo "ERROR: $sql <br> $con->error" ;
    //    $not_insert = true ;
   }


   //close the databse connection
   $con->close() ;

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- custom css file link  -->
    <title>REg2 FORM</title>
    <link rel="stylesheet" href="regform.css">

</head>
<body>

<div class="container">

    <div class="card-container">

        <div class="front">
            <div class="image">
                <img src="log.png" alt="">
                <img src="logo small-web-nev.png" alt="">
            </div>
            
            <div class="flexbox">
                <div class="box">
                   

                    <h1 class="card-holder-name">Registration Form</h1>

                   <?php
                   if($insert == true){
                  echo "<p class='submitmsg'>thanks for submitting form</p>" ;
                   }
                   ?>

                </div>

              
            </div>
        </div>

   

    </div>

    <form action="index.php"  method="post">
    
        <div class="inputBox">
            <span>Email ID</span>
            <input type="text"  name="emailid"  id="emailid"     class="email-ID-input">
        </div>

        <div class="inputBox">
            <span>Name</span>
            <input type="text" name="name"  id="name"   class="name-input">
        </div>

        <div class="inputBox">
            <span>Contact No</span>
            <input type="number" name="contactno"  id="contactno"  class="contact-no-input">
        </div>

        <div class="flexbox">


          <!-- <div class="flexbox">
            <div class="inputBox">
                <span>Course</span>
                <select name="course"  id="course"  class="course-input">
                    <option value="month" selected disabled>-Select  Course Type-</option>
                    
                <option value="B.tech">B.tech</option>
                <option value="Diploma">Diploma</option>
                <option value="B.Ed">B.Ed</option>
                <option value="ITI">ITI</option>
                </select>
            </div>

            <div class="inputBox">
                <span>Session</span>
                <select name="session"  id="session"  class="year-input">
                    <option value="year" selected disabled>-select session type-</option>
                <option value="21-25">2021 - 2025</option>
                    <option value="20-24">2020 - 2024</option>
                    <option value="19-23">2019 - 2023</option>
                    <option value="18-22">2018 - 2022</option>
                    <option value="17-21">2017 - 2021</option>
                    <option value="16-20">2016 - 2020</option>
                    <option value="15-19">2015 - 2019</option>

                </select>
            </div> -->


            <div class="inputBox">
                <span>Course</span>
                <input type="text" name="course"  id="course"  class="registration-input">
            </div>

            <div class="inputBox">
                <span>Session</span>
                <input type="number" name="session"  id="session"  class="registration-input">
            </div>
            


            <div class="inputBox">
                <span>Registration ID</span>
                <input type="number" name="registrationid"  id="registrationid"  class="registration-input">
            </div>

        </div>
        <input type="submit" value="Register" class="submit-btn">
    </form>

</div>    
    
</body>
</html>




