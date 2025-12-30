<?php if($_SERVER['REQUEST_METHOD'] === 'POST'){ 
 
 $FirstName = $_POST['FirstName']; 
 $LastName = $_POST['LastName']; 
 $UserName = $_POST['UserName']; 
 $Email = $_POST['Email']; 
 $ContactNo = $_POST['ContactNo']; 
 $dob = $_POST['dob']; 
 $gender = $_POST['gender']; 
 $pass = $_POST['pass']; 
  
 $emailPattern = '/^[a-z]+[0-9]*@[a-z]+\.[a-z]+$/'; 
 $namePattern = '/^[a-zA-Z]+$/'; 
 $usernamePattern = '/^[a-zA-Z0-9_]{3,16}$/'; 
 $passwordPattern = '/^(?=.*[A-Za-z])(?=.*\d)(?=.*[^A-Za-z0-9]).{8,}$/'; 
 $dobPattern = '/^\d{4}-\d{2}-\d{2}$/'; 
 $contactPattern = '/^\+92\d{10}$/'; 
  
  
 if (!preg_match($emailPattern, $Email)) die("Invalid Email"); if (!preg_match($namePattern, $FirstName)) die("Invalid First Name"); if (!preg_match($namePattern, $LastName)) die("Invalid Last Name"); if (!preg_match($usernamePattern, $UserName)) die("Invalid Username"); if (!preg_match($dobPattern, $dob)) die("DOB must be YYYY-MM-DD"); 
 if (!preg_match($contactPattern, $ContactNo)) die("Contact must be 
 +92XXXXXXXXXX"); 
 if (!preg_match($passwordPattern, $pass)) die("Weak Password"); 
  
  
 $conn = new mysqli('localhost','root','Bilal@2003','signupfoam'); 
  
 if($conn->connect_error){     die("Connection Failed: ".$conn->connect_error); 
 } else { 
  
      
     $stmt = $conn->prepare(" 
         INSERT INTO data (FirstName, LastName, Email, Contact, Username, 
 Gender, DateofBirth, Password) 
         VALUES (?, ?, ?, ?, ?, ?, ?, ?) 
     "); 
  
     
     $stmt->bind_param("ssssssss", 
         $FirstName, 
         $LastName, 
         $Email, 
         $ContactNo, 
         $UserName, 
         $gender, 
         $dob, 
         $pass 
     ); 
  
     $stmt->execute();     echo "<script>alert('Registration Successful');</script>"; 
     $stmt->close(); 
     $conn->close(); 
 } 
  
 } 
 ?> 
  
  
  
 <!DOCTYPE html> 
 <html lang="en"> 
 <head> 
     <meta charset="UTF-8"> 
     <title>Instagram Signup Form</title> 
  
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> 
  
     <style>         body {             background: #fafafa;             font-family: Arial, sans-serif; 
         } 
  
         .signup-card {             max-width: 400px;             margin: 60px auto;             padding: 30px;             background: #fff;             border: 1px solid #dbdbdb;             border-radius: 12px;             box-shadow: 0 0 20px rgba(0,0,0,0.05); 
         } 
  
         .signup-card h3 {             text-align: center;             font-weight: 600;             margin-bottom: 25px;             color: #262626; 
         } 
  
         button {             width: 100%;             padding: 12px;             border-radius: 8px; 
             background: linear-gradient(45deg, #f58529, #dd2a7b, #8134af, 
 #515bd4); 
             color: white;             border: none;             font-weight: bold;             font-size: 16px; 
         } 
     </style> 
 </head> 
  
 <body> 
  
 <div class="signup-card"> 
     <h3>Sign up to Instagram</h3> 
  
     <form action="#" method="POST" onsubmit="return validateForm()"> 
          
         <label>First Name</label> 
         <input type="text" class="form-control" name="FirstName" id="FirstName" required> 
  
         <label>Last Name</label> 
         <input type="text" class="form-control" name="LastName" id="LastName" required> 
  
         <label>Username</label> 
         <input type="text" class="form-control" name="UserName" id="username" required> 
  
         <label>Email</label> 
         <input type="email" class="form-control" name="Email" id="Email" required> 
  
         <label>Contact Number</label> 
         <input type="tel" class="form-control" name="ContactNo" id="ContactNo" placeholder="+92XXXXXXXXXX" required>         <label>Date of Birth</label> 
         <input type="date" class="form-control" name="dob" id="dob" required> 
  
         <label>Gender</label> 
         <div> 
             <input type="radio" name="gender" value="Male" required> Male   
             <input type="radio" name="gender" value="Female"> Female   
             <input type="radio" name="gender" value="Other"> Other         </div> 
  
         <label>Password</label> 
         <input type="password" class="form-control" name="pass" id="pass" required> 
  
         <br> 
         <button type="submit">Sign Up</button> 
     </form> 
 </div> 
  
 <script> function validateForm() {     const email = document.getElementById('Email').value.trim();     const firstName = document.getElementById('FirstName').value.trim();     const lastName = document.getElementById('LastName').value.trim();     const username = document.getElementById('username').value.trim();     const pass = document.getElementById('pass').value.trim();     const dob = document.getElementById('dob').value.trim();     const contact = document.getElementById('ContactNo').value.trim(); 
  
     const emailPattern = /^[a-z]+[0-9]*@[a-z]+\.[a-z]+$/;     const namePattern = /^[a-zA-Z]+$/;     const usernamePattern = /^[a-zA-Z0-9_]{3,16}$/;     const passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[^A-Za-z0-9]).{8,}$/;     const dobPattern = /^\d{4}-\d{2}-\d{2}$/;     const contactPattern = /^\+92\d{10}$/; 
  
     if (!emailPattern.test(email)) return alert("Invalid Email");     if (!namePattern.test(firstName)) return alert("Invalid First Name");     if (!namePattern.test(lastName)) return alert("Invalid Last Name");     if (!usernamePattern.test(username)) return alert("Invalid Username"); 
     if (!contactPattern.test(contact)) return alert("Contact must be 
 +92XXXXXXXXXX"); 
     if (!passwordPattern.test(pass)) return alert("Weak Password");     if (!dobPattern.test(dob)) return alert("DOB must be YYYY-MM-DD"); 
  
     return true; 
 } 
 </script> 
  
 </body> 
 </html> 
 