<?php
include 'header.html';
include 'includes.php';
echo "<div class='left'><h1>Welcome!</h1><p>Finding a restaurant that you will <i>want</i> to eat at has never been easier. <a href=''>Sign up</a> today to
        experience a new way to dine out.</div>";
echo "<div class='right'><h1>Log-In</h1><form action='login.php'><input type='text' placeholder='User Name' size='12' name='username'><br><input type='password' name='password' placeholder='Password' size='12'></form><br>
        Don't have an account? <a href='register.php'>Register</a></div>";
$sql = "SELECT * FROM `users`";
$res = mysql_query($sql);
if ($res){
  while ($row = mysql_fetch_assoc($res)){
    echo $row['name'] . "<br>";
  }
}
include 'footer.html';
?>