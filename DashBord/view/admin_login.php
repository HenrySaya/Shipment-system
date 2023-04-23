<?php

// include 'php/functions/admin_login.php';
// $errors= [
//   'username'=>'',
//   'pass'=>'',
// ];
// if (isset($_POST['submit'])) {
//     if (empty($username)) {
//       $errors['username']='enter your username';
//     }if (empty($password)){
//       $errors['pass']='enter your password';
//   }
// }
?>

<form class="login" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
      <h4 class="text-center">Admin login</h4>
      <input type="text" name="username" id="login" class="form-control" name="login" placeholder="login" required>
      
      <input type="password" name="pass" id="password" class="form-control" name="login" placeholder="password" required>
      
      <input type="submit" name="submit" class="btn btn-primary btn-block" value="Log In">
      <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a><br>
      <!-- <a href="../view/customer_login.php">customer login</a> -->
    </div>
</form>
