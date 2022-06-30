
<html lang="en">
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-box">
        <h2>Login</h2>
        <form action="/login" method="post" id="loginForm">
          <div class="user-box">
            <input type="text" name="username" id="username" required="">
            <label>Username</label>
          </div>
          <div class="user-box">
            <input type="password" name="password" id="password" required="">
            <label>Password</label>
          </div>
          <a href="#">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Register
          </a>
          <a href="#" onclick="document.getElementById('loginForm').submit();">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Login
          </a>
        </form>
      </div>
</body>
</html>
