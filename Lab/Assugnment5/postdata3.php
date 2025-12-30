<?php if($_SERVER['REQUEST_METHOD'] === 'POST'){ 
 
 $FirstName = $_POST['FirstName']; 
 $LastName = $_POST['LastName']; 
 $UserName = $_POST['UserName']; 
 $Email = $_POST['Email']; 
 $ContactNo = $_POST['ContactNo']; 
 $dob = $_POST['dob']; 
 $gender = $_POST['gender']; 
 $city = $_POST['city']; 
 $country = $_POST['country']; 
 $pass = $_POST['pass'];  
 
 $emailPattern = '/^[a-z]+[0-9]*@[a-z]+\.[a-z]+$/'; 
 $namePattern = '/^[a-zA-Z]+$/'; 
 $usernamePattern = '/^[a-z]+[0-9]{3,16}$/'; 
 $passwordPattern = '/^(?=.*[A-Za-z])(?=.*\d)(?=.*[^A-Za-z0-9]).{8,}$/'; 
 $dobPattern = '/^\d{4}-\d{2}-\d{2}$/'; 
 $contactPattern = '/^\+92\d{10}$/'; 
 $cityPattern = '/^[a-zA-Z ]+$/'; 
 $countryPattern = '/^[a-zA-Z ]+$/'; 

 if (!preg_match($emailPattern, $Email)) die("Invalid Email Pattern"); 
 if (!preg_match($namePattern, $FirstName)) die("First Name must contain only alphabets"); 
 if (!preg_match($namePattern, $LastName)) die("Last Name must contain only alphabets"); 
 if (!preg_match($usernamePattern, $UserName)) die("Invalid Username format"); 
 if (!preg_match($contactPattern, $ContactNo)) die("Contact must be 
+92XXXXXXXXXX"); 
 if (!preg_match($dobPattern, $dob)) die("DOB must be YYYY-MM-DD"); 
 if (!preg_match($passwordPattern, $pass)) die("Password must include letters, numbers & special characters");     if (!preg_match($cityPattern, $city)) die("City must contain alphabets only"); 
 if (!preg_match($countryPattern, $country)) die("Country must contain alphabets only"); 
 
 $conn = new mysqli('localhost','root','Bilal@2003','signupfoam'); 

 if($conn->connect_error){         die("Connection Failed: " . $conn->connect_error); 
 }     else{ 
     $stmt = $conn->prepare(" 
     INSERT INTO data (FirstName, LastName, Email, Contact, Username, 
Gender, DateofBirth, Password, Country, City) 
     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?) 
 "); 

     $stmt->bind_param("ssssssssss", $FirstName, $LastName, $Email, 
$ContactNo, $UserName, $dob, $gender, $city, $country, $pass); 

     $stmt->execute();         echo "<script>alert('Registration Successful');</script>"; 

     $stmt->close(); 
     $conn->close(); 
 } 
} 
?> 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
 <meta charset="UTF-8"> 
 <title>Canva Signup Form</title> 

 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> 

 <style>         body {             background: #e2e8f0;             font-family: 'Segoe UI', sans-serif; 
     } 

     .signup-card {             max-width: 450px;             margin: 60px auto;             padding: 25px;             background: #ffffff;             border-radius: 15px;             border: 1px solid #cbd5e1;             box-shadow: 0px 4px 20px rgba(0,0,0,0.08);         } 
      h3 {             text-align: center;             font-weight: 700;             color: #334155;             margin-bottom: 20px; 
     } 

     .form-control {             border-radius: 10px;             border: 1px solid #94a3b8;             padding: 10px; 
     } 

     .btn-canva {             background-color: #6366f1;             border: none;             color: white;             padding: 12px;             border-radius: 10px;             font-weight: 600;             width: 100%;             transition: 0.3s; 
     } 

     .btn-canva:hover {             background-color: #59b2eeff; 
     } 

     .social-btn {             width: 50%;             margin-top: 10px;             margin-left: 100px;             border-radius: 10px;             padding: 10px;             font-weight: 600; 
     } 
     .google-btn { background: #4455ebff; color: white; } 
     .fb-btn { background: #1877f2; color: white; } 
      label {             font-weight: 600;             color: #334155; 
     } 
 </style> 
</head> 
<body> 

<div class="signup-card"> 
 <h3>Create Canva Account</h3> 

  
 <button class="social-btn google-btn">Continue with Google</button> 
 <button class="social-btn fb-btn">Continue with Facebook</button> 

 <form action="#" method="POST" onsubmit="return validateForm()"> 
      
     <label class="mt-3">First Name</label> 
     <input type="text" class="form-control" name="FirstName" id="FirstName" required> 

     <label class="mt-2">Last Name</label> 
     <input type="text" class="form-control" name="LastName" id="LastName" required> 

     <label class="mt-2">Username</label> 
     <input type="text" class="form-control" name="UserName" id="username" required> 

     <label class="mt-2">Email</label> 
     <input type="email" class="form-control" name="Email" id="Email" required> 

     <label class="mt-2">Contact Number</label> 
     <input type="tel" class="form-control" name="ContactNo" id="ContactNo" placeholder="+92XXXXXXXXXX" required> 

     <label class="mt-2">Date of Birth</label> 
     <input type="date" class="form-control" name="dob" id="dob" required> 

     <label class="mt-2">City</label> 
     <input type="text" class="form-control" name="city" id="city" required> 

     <label class="mt-2">Country</label> 
     <input type="text" class="form-control" name="country" id="country" required> 

     <label class="mt-3">Gender</label> 
     <div class="form-check"> 
         <input class="form-check-input" type="radio" name="gender" value="Male" required> 
         <label class="form-check-label">Male</label> 
     </div> 

     <div class="form-check"> 
         <input class="form-check-input" type="radio" name="gender" value="Female"> 
         <label class="form-check-label">Female</label> 
     </div> 

     <div class="form-check mb-2"> 
         <input class="form-check-input" type="radio" name="gender" value="Other"> 
         <label class="form-check-label">Other</label> 
     </div> 

     <label>Password</label> 
     <input type="password" class="form-control" name="pass" id="pass" required> 

     <button type="submit" class="btn-canva mt-3">Sign Up</button> 

 </form> 
</div> 

<script> function validateForm() {     const email = document.getElementById('Email').value.trim();     const firstName = document.getElementById('FirstName').value.trim();     const lastName = document.getElementById('LastName').value.trim();     const username = document.getElementById('username').value.trim();     const pass = document.getElementById('pass').value;     const dob = document.getElementById('dob').value;     const city = document.getElementById('city').value.trim();     const country = document.getElementById('country').value.trim();     const contact = document.getElementById('ContactNo').value.trim(); 

 const emailPattern = /^[a-z]+[0-9]*@[a-z]+\.[a-z]+$/;     const namePattern = /^[a-zA-Z]+$/;     const usernamePattern = /^[a-z]+[0-9]{3,16}$/;     const passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[^A-Za-z0-9]).{8,}$/;     const dobPattern = /^\d{4}-\d{2}-\d{2}$/;     const contactPattern = /^\+92\d{10}$/;     const cityPattern = /^[a-zA-Z ]+$/;     const countryPattern = /^[a-zA-Z ]+$/; 

 if (!emailPattern.test(email)) return alert('Invalid Email');     if (!namePattern.test(firstName)) return alert('Invalid First Name');     if (!namePattern.test(lastName)) return alert('Invalid Last Name'); 
 if (!usernamePattern.test(username)) return alert('Username example: bilal1234'); 
 if (!contactPattern.test(contact)) return  alert('Contact must be 
+92XXXXXXXXXX'); 
 if (!passwordPattern.test(pass)) return alert('Weak Password'); 
