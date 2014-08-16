<?php
include 'header.html';
echo "<div class='left'><h1>Welcome!</h1><p>Finding a restaurant that you will <i>want</i> to eat at has never been easier. <a href=''>Sign up</a> today to
        experience a new way to dine out.</div>";
echo "<div class='right'><h1>Log-In</h1><form action='login.php'><input type='text' value='User Name' length='16' name='username'><br><input type='password' name='password'></form><br>
        Don't have an account? <a href='register.php'>Register</a></div>";
include 'footer.html';
?>