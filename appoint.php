<?php
// Include your database connection details here
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contact_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["number"];
    $dslot = $_POST["appointment_date"];
    $tslot = $_POST["appointment_time"];
    $docname = $_POST["doctor"];
    $hospital = $_POST["hospital"];
    echo $tslot;
$availabilitySql = "SELECT * FROM doctor WHERE docname='$docname'  AND '$tslot' BETWEEN stime AND etime";

    $result = $conn->query($availabilitySql);

    if ($result->num_rows > 0) {
        // Doctor is available, proceed with the appointment
        $sql = "INSERT INTO appointment (name, email, phone, dslot,tslot, docname, hospital) VALUES ('$name', '$email', '$phone', '$dslot','$tslot', '$docname', '$hospital')";

        if ($conn->query($sql) === TRUE) {
            header("Location: success.php?success=true");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        // Doctor is not available at the specified time
        // echo "Error: The selected doctor is not available at the specified time.";
        // $error[]="Error: The selected doctor is not available at the specified time";
        $error_message = "The selected doctor is not available at the specified time.";
    header("Location: back.php?error=" . urlencode($error_message));
    exit();
    }
}
    


$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dentist Website</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- bootstrap cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="icon" href="images/favicon.png"/>

</head>
<body>

<!-- header section starts  -->

<header class="header fixed-top">

   <div class="container">

      <div class="row align-items-center justify-content-between">

         <a href="#home" class="logo">dental<span>Clinic.</span></a>

         <nav class="nav">
            <a href="#home">home</a>
            <a href="#about">about</a>
            <a href="#services">services</a>
            <a href="#reviews">reviews</a>
            <a href="#contact">contact</a>
         </nav>
         <div class='headerbutton'></div>
         <a href="#contact" class="link-btn">make appointment</a>


         <a href="diagnosis.html" >
         <button  >
  <div class="svg-wrapper-1">
    <div class="svg-wrapper">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
        <path fill="none" d="M0 0h24v24H0z"></path>
        <path fill="currentColor" d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"></path>
      </svg>
    </div>
  </div>
  <span>Chat</span>
</button>
</a>
<a href='imganalysis.html'>
<button alt="image analysis">
  <i>i</i>
  <i>m</i>
  <i>a</i>
  <i>g</i>
  <i>e</i>
  <i>&nbsp;</i>
  <i>a</i>
  <i>n</i>
  <i>a</i>
  <i>l</i>
  <i>y</i>
  <i>s</i>
  <i>i</i>
  <i>s</i>
</button>
</a>

         <div id="menu-btn" class="fas fa-bars"></div>

      </div>

   </div>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

   <div class="container">

      <div class="row min-vh-100 align-items-center">
         <div class="content text-center text-md-left">
            <h3>Allow us to make your smile brighter.</h3>
            <p>DentalClinic Can Help You Get the Smile You've Always Wanted. We offer cosmetic dentistry, root canal therapy, cavity inspections, and more.</p>
            <a href="#contact" class="link-btn">make appointment</a>
         </div>
      </div>

   </div>

</section>

<!-- home section ends -->

<!-- about section starts  -->

<section class="about" id="about">

   <div class="container">

      <div class="row align-items-center">

         <div class="col-md-6 image">
            <img src="images/about-img.jpg" class="w-100 mb-5 mb-md-0" alt="">
         </div>

         <div class="col-md-6 content">
            <span>about us</span>
            <h3>Genuine Family Healthcare</h3>
            <p>DentalClinic helps you achieve the quintessentially oriented smile you have always craved. Our product gets the job done without making you go through any hassle or discomfort.</p>
            <a href="#contact" class="link-btn">make appointment</a>
         </div>

      </div>

   </div>

</section>

<!-- about section ends -->

<!-- services section starts  -->

<section class="services" id="services">

   <h1 class="heading">our services</h1>

   <div class="box-container container">

      <div class="box">
         <img src="images/icon-1.svg" alt="">
         <h3>Alignment specialist</h3>
      </div>

      <div class="box">
         <img src="images/icon-2.svg" alt="">
         <h3>Cosmetic dentistry</h3>
      </div>

      <div class="box">
         <img src="images/icon-3.svg" alt="">
         <h3>Oral hygiene experts</h3>
      </div>

      <div class="box">
         <img src="images/icon-4.svg" alt="">
         <h3>Root canal specialist</h3>
      </div>

      <div class="box">
         <img src="images/icon-5.svg" alt="">
         <h3>Live dental advisory</h3>
      </div>

      <div class="box">
         <img src="images/icon-6.svg" alt="">
         <h3>Cavity inspection</h3>
      </div>

   </div>

</section>

<!-- services section ends -->

<!-- process section starts  -->

<section class="process">

   <h1 class="heading">work process</h1>

   <div class="box-container container">

      <div class="box">
         <img src="images/process-1.png" alt="">
         <h3>Cosmetic Dentistry</h3>
         <p>Cosmetic dentistry includes teeth whitening, dental implants, dental crowns, and teeth shaping.</p>
      </div>

      <div class="box">
         <img src="images/process-2.png" alt="">
         <h3>Pediatric Dentistry</h3>
         <p>Padiatric dentistry include stainless steel crowns, tooth-colored fillings, dental cleanings, and cavities.</p>
      </div>

      <div class="box">
         <img src="images/process-3.png" alt="">
         <h3>Dental Implants</h3>
         <p>Dental implants are artificial tooth roots that are surgically placed into the jawbone.</p>
      </div>

   </div>

</section>

<!-- process section ends -->

<!-- reviews section starts  -->

<section class="reviews" id="reviews">

   <h1 class="heading"> Our Clients </h1>

   <div class="box-container container">

      <div class="box">
         <img src="images/pic-1.png" alt="">
         <p> I couldn’t believe that it was so afordable compared to the alternatives available in the market.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Alan Harris</h3>
         <span>Manager</span>
      </div>

      <div class="box">
         <img src="images/pic-2.png" alt="">
         <p>Earlier I used to hide my smile and now I can’t stop smiling. Flexalign aligners changed my life &amp; smile completely.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Sophie Johnson</h3>
         <span>Assistant Manager</span>
      </div>

      <div class="box">
         <img src="images/pic-3.png" alt="">
         <p>Great experience with DentalClinic aligners. I would recommend this place for they have the best quality service</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>James Williams</h3>
         <span>CEO</span>
      </div>

   </div>

</section>

<!-- reviews section ends -->

<!-- contact section starts  -->

<!-- <h2>Appointment Form</h2>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="name">Name:</label>
    <input type="text" name="name" required>

    <label for="email">Email:</label>
    <input type="email" name="email" required>

    <label for="phone">Phone Number:</label>
    <input type="tel" name="phone" required>

    <label for="date">Preferred Date:</label>
    <input type="date" name="date" required>

    <label for="time">Preferred Time:</label>
    <input type="time" name="time" required>

    <input type="submit" value="Submit">
</form> -->

<section class="contact" id="contact">

   <h1 class="heading">make appointment</h1>

   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <!--<?php
         if(isset($message)){
            foreach($message as $message){
               echo '<p class="message">'.$message.'</p>';
            }
         }
      ?>-->
      <span>Enter your name :</span>
      <input type="text" name="name" placeholder="Enter your name" class="box" required>
      <span>Enter your email :</span>
      <input type="email" name="email" placeholder="Enter your email" class="box" required>
      <span>Enter your number :</span>
      <input type="number" name="number" placeholder="Enter your number" class="box" required>
      <!-- <?php
            // if(isset($error)){
                // foreach($error as $error){
                //     echo '<span class="message1">Error: The selected doctor is not available at the specified time.</span>';

            //     };
            // };
            // ?> -->
      <span>Enter appointment date :</span>
    <input type="date" name="appointment_date" id='date' class="box" required>
    <span>Enter appointment time :</span>
    <input type="time" name="appointment_time" id='time' class="box" required>
      
      <span>Select Hospital:</span>
      <select name="hospital" id="hospital" class="box" required onchange="updateDoctors()">
         <option value="" disabled selected>Select Hospital</option>
         <option value="AJ">AJ</option>
         <option value="yenepoya">yenepoya</option>
         <option value="Father Muller">Father Muller</option>
         <option value="KMC">KMC</option>
         <option value="Srinivas">Srinivas</option>
      </select>

      <span>Select Doctor:</span>
      <select name="doctor" id="doctor" class="box" required>
         <option value="" disabled selected>Select Doctor</option>
         <!-- You can replace these options with actual doctor names -->
         <option value="doctor1">ravi</option>
         <option value="doctor2">manu</option>
         <option value="doctor3">raghu</option>
      </select>
      <input type="submit" value="make appointment" name="submit" class="link-btn">
      <script>
    function updateDoctors() {
        var hospitalSelect = document.getElementById('hospital');
        var doctorSelect = document.getElementById('doctor');

        // Reset doctor options
        doctorSelect.innerHTML = '<option value="" disabled selected>Select Doctor</option>';

        // Populate doctor options based on the selected hospital
        if (hospitalSelect.value === 'AJ') {
            addDoctorOption('ravi');
            addDoctorOption('raghu');
            // addDoctorOption('shree');
        } else if (hospitalSelect.value === 'yenepoya') {
            addDoctorOption('manu');
            addDoctorOption('manvi');
            // addDoctorOption('tanvi');
        }
        else if (hospitalSelect.value === 'Father Muller') {
            addDoctorOption('diya');
            addDoctorOption('gopal');
            // addDoctorOption('sharvi');
        }
        else if (hospitalSelect.value === 'KMC') {
            addDoctorOption('raghav');
            addDoctorOption('meena');
            // addDoctorOption('shreya');
        }
        else if (hospitalSelect.value === 'Srinivas') {
            addDoctorOption('preethi');
            addDoctorOption('riya');
            // addDoctorOption('asha');
        }
        // Add similar conditions for other hospitals

        // Function to add a doctor option
        function addDoctorOption(doctorName) {
            var option = document.createElement('option');
            option.value = doctorName;
            option.textContent = doctorName;
            doctorSelect.appendChild(option);
        }
    }
</script>

   </form>

</body>
</html>
