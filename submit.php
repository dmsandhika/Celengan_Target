<!DOCTYPE html>
<html>
<head>
  <title>Submit Berhasil</title>
  <style>
    @keyframes slideIn {
      0% {
        transform: translateX(-100%);
        opacity: 0;
      }
      100% {
        transform: translateX(0);
        opacity: 1;
      }
    }

    body {
      background-color: #f5f5f5;
      font-family: Arial, sans-serif;
      text-align: center;
      padding-top: 100px;
    }

    h1 {
      color: #333;
      font-size: 36px;
      margin-bottom: 30px;
      animation: slideIn 1s ease-in-out;
    }

    .success-message {
      font-size: 24px;
      color: green;
      margin-bottom: 20px;
      animation: slideIn 1s ease-in-out;
    }

    .button {
      display: inline-block;
      background-color: #4CAF50;
      color: white;
      padding: 12px 24px;
      text-align: center;
      text-decoration: none;
      font-size: 18px;
      border-radius: 4px;
      transition: background-color 0.3s;
      animation: slideIn 1s ease-in-out;
    }

    .button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <h1>Submit Berhasil</h1>

  <div class="success-message">Submit berhasil!</div>

  <a href="target.php" class="button">Kembali</a>
</body>
</html>
