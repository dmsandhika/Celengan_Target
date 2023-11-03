<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #2980b9;
    }
    
    .container {
      max-width: 400px;
      margin: 100px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    
    h1 {
      font-size: 24px;
      text-align: center;
      margin-bottom: 20px;
    }
    
    p {
      margin-bottom: 30px;
      text-align: center;
    }
    
    .btn {
      display: inline-block;
      background-color: #4caf50;
      color: #fff;
      padding: 10px 20px;
      text-decoration: none;
      border-radius: 4px;
      transition: background-color 0.3s ease;
    }
    
    .btn:hover {
      background-color: #45a049;
    }
  </style>
  <title>Anda harus Login Ulang</title>
</head>
<body>
  <div class="container">
    <h1>Anda harus login ulang</h1>
    <p>Setelah mengganti password, Anda perlu melakukan login ulang untuk melanjutkan.</p>
    <a href="session_logout.php" class="btn">Lanjut</a>
  </div>
</body>
</html>
