<?php
  session_start();
?>

<!DOCTYPE html>
<html>
  <body>
    <title>SIGN UP</title>
    <form method="POST" action="signup.php" class="signup">
      <p>
        <label for="login">Username:</label>
        <input type="text" name="user" id="login">
      </p>
  
      <p>
        <label for="password">Password:</label>
        <input type="password" name="pass" id="password">
      </p>
      
      <p>
        <label for="password">Confirm:</label>
        <input type="password" name="confirm" id="password">
      </p>
      
      <font color=#FF0B0B> <?php echo $_SESSION['message2']; ?> </font>
      
      <p class="signup-submit">
        <button type="submit" name="submit" class="signup-button">Login</button>
      </p>
    </form>
  </body>
    
</html>