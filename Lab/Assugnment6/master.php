<?php 
 
 
?> 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
  <meta charset="UTF-8"> 
  <title><?php echo $pageTitle ?? 'Master Template'; ?></title> 
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
 
   
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> 
 
   
  <style>     body { background-color: #f5f6fa; }     .sidebar {       width: 240px;       min-height: 100vh;       background-color: #212529; 
    } 
    .sidebar a {       color: #adb5bd;       text-decoration: none;       padding: 12px 20px;       display: block;       font-weight: 500; 
    } 
    .sidebar a:hover {       background-color: #343a40; 
      color: #ffffff; 
    } 
 
     
    .content {       padding: 25px;       background-color: #ffffff;       min-height: 100vh; 
    } 
 
    
    footer {       background-color: #212529;       color: #ffffff;       text-align: center;       padding: 12px 0;       font-size: 14px; 
    } 
  </style> 
</head> 
<body> 
 
 
<nav class="navbar navbar-expand-lg navbar-dark bg-dark"> 
  <div class="container-fluid justify-content-between"> 
 
     
    <div class="navbar-brand fw-bold">My App</div> 
 
     
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bstarget="#mainNav"> 
      <span class="navbar-toggler-icon"></span> 
    </button> 
 
    <div class="collapse navbar-collapse" id="mainNav"> 
 
       
   <ul class="navbar-nav ms-auto gap-3"> 
  <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li> 
  <li class="nav-item"><a class="nav-link" href="about.php">About</a></li> 
  <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li> </ul> 
 
<div class="d-flex ms-4"> 
  <a class="nav-link text-white" href="login.php">Login</a> 
</div> 
 
 
    </div> 
  </div> 
</nav> 
 
<div class="d-flex"> 
 
   
  <aside class="sidebar"> 
    <a href="dashboard.php">Dashboard</a> 
    <a href="products.php">Products</a> 
    <a href="analytics.php">Analytics</a> 
    <a href="settings.php">Settings</a> 
  </aside> 
 
   
  <main class="flex-grow-1 content"> 
    <?php echo $content ?? '<h4>Welcome</h4>'; ?> 
  </main> 
 
</div> 
 
 
<footer> 
  © <?php echo date('Y'); ?> Template. All rights reserved. 
</footer> 
 
 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> 
 
 
<script>   console.log('Master template loaded successfully'); 
</script> 
 
</body> 
</html> 
