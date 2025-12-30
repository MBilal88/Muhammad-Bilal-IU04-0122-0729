<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    $FirstName = $_POST['FirstName']; 
    $LastName = $_POST['LastName']; 
    $Email = $_POST['Email']; 
    $ContactNo = $_POST['ContactNo']; 
    $dob = $_POST['dob']; 
    $pass = $_POST['pass']; 
 
 
     
    $emailPattern = '/^[a-z]+[0-9]*@[a-z]+\.[a-z]+$/'; 
    $namePattern = '/^[a-zA-Z]+$/'; 
    $passowrdPattern = '/^(?=.*[A-Za-z])(?=.*\d)(?=.*[^A-Za-z0-9]).{8,}$/'; 
    $dobPattern = '/^\d{4}-\d{2}-\d{2}$/'; 
    $contactPattern = '/^\+92\d{10}$/'; 
 
    if (!preg_match($emailPattern, $Email)) {       
          $error_message = "Email is not valid";         die("Email is not valid"); 
    } 
    if (!preg_match($namePattern, $FirstName)) { 
        $error_message = "First name can contain alphabets only";      
           die("First name should only have alphabets"); 
    } 
    if (!preg_match($namePattern, $LastName)) { 
        $error_message = "Last name can contain alphabets only"; 
        die("Last name can contain alphabets only"); 
    } 
    if (!preg_match($dobPattern, $dob)) { 
        $error_message = "DOB pattern should be yyyy-mm-dd";      
           die("DOB pattern should be yyyy-mm-dd"); 
    } 
    if (!preg_match($contactPattern, $ContactNo)) { 
        $error_message = "Contact pattern should be +92xxxxxxxxxx";       
          die("Contact pattern should be +92xxxxxxxxxx"); 
    } 
 
    $conn = new mysqli('localhost', 'root', 'Bilal@2003', 'signupfoam');    
     if ($conn->connect_error) {         die('Connection Failed  :  ' . $conn->connect_error); 
    } else { 
        $stmt = $conn->prepare("insert into data(FirstName,LastName,Email,Contact,DateofBirth,Password)  
    values(?,?,?,?,?,?) "); 
        $stmt->bind_param("ssssss", $FirstName, $LastName, $Email, $ContactNo, $dob, $pass); 
        $stmt->execute();        echo "<script>alert('Registration Successful');</script>"; 
        $stmt->close(); 
        $conn->close(); 
    } 
} 
?> 
 
 
<!DOCTYPE html> 
<html lang="en"> 
 
<head> 
    <meta charset="UTF-8"> 
    <title>Bootstrap Signup Form</title> 
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> 
 
    <style>       
      body {            
         background: #f0f2f5; 
        } 
 
        .signup-card {          
                max-width: 450px;            
                margin: 60px auto;            
                padding: 25px;             
                border-radius: 12px;             
                background: #fff;             
                box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1); 
        } 
         h3 {             
            text-align: center;             
            margin-bottom: 25px;         
        } 
    </style> 
 
</head> 
 
<body> 
 
    <div class="signup-card"> 
        <h3>Create Account</h3> 
 
        <form action=""  method="POST" onsubmit="return validateForm()"> 
 
            <div class="row mb-3"> 
                <div class="col"> 
                    <label class="form-label">First Name</label> 
                    <input type="text" placeholder="first name" class="form-control" id="FirstName" name="FirstName" 
                        required> 
                </div> 
 
                <div class="col"> 
                    <label class="form-label">Last Name</label> 
                    <input type="text" placeholder="last name" class="form-control" id="LastName" name="LastName" 
                        required> 
                </div> 
            </div> 
 
            <div class="mb-3"> 
                <label class="form-label">Email</label> 
                <input type="email" placeholder="abc@gmail.com" class="form-control" id="Email" name="Email" required> 
            </div> 
 
            <div class="mb-3"> 
                <label class="form-label">Contact Number</label> 
                <input type="tel" placeholder="+92123456789" class="form-control" id="ContactNo" name="ContactNo" 
                    required> 
            </div> 
 
            <div class="mb-3"> 
                <label class="form-label">Date of Birth</label> 
                <input type="date" class="form-control" id="dob" name="dob" required> 
            </div> 
 
            <div class="mb-3"> 
                <label class="form-label">Password</label> 
                <input type="password" class="form-control" id="pass" name="pass" required> 
            </div> 
 
            <button type="submit" class="btn btn-primary w-80">Sign Up</button> 
 
        </form> 
    </div> 
 
    <script> 
 
        function validateForm() {             
            const email = document.getElementById('Email').value.trim();             
            const firstName = document.getElementById('FirstName').value.trim();             
            const lastName = document.getElementById('LastName').value.trim();             
            const pass = document.getElementById('pass').value;             
            const dob = document.getElementById('dob').value;             
            const contact = document.getElementById('ContactNo').value.trim(); 
 
            const emailPattern = /^[a-z]+[0-9]*@[a-z]+\.[a-z]+$/;             
            const namePattern = /^[a-zA-Z]+$/;             
            const passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[^A-Za-z0-9]).{8,}$/;             
            const dobPattern = /^\d{4}-\d{2}-\d{2}$/;             
            const contactPattern = /^\+92\d{10}$/; 
 
            if (!emailPattern.test(email)) 
            { alert('Invalid email'); return false; }             
            if (!namePattern.test(firstName)) 
            { alert('Invalid first name'); return false; }             
            if (!namePattern.test(lastName)) 
            { alert('Invalid last name'); return false; } 
            if (!contactPattern.test(contact)) 
            { alert('Contact must be +92 followed by 10 digits'); 
                return false; } 
            if (!passwordPattern.test(pass)) 
            { alert('Password must be 8+ chars with number & special'); 
                return false; }             
                if (!dobPattern.test(dob)) { alert('DOB must be YYYY-MM-DD'); return false; } 
             return true; 
        } 
    </script> 
</body> 
 
</html> 
