<?php 
	include 'includes.php';
	include 'header.html';
	

	echo "<h1>Create a New Account</h1>
      <form >
       <table>
        <tr>
         <td>Name :</td> <td><input type='text' name='name'></td><br>
        </tr>
        <tr>
         <td>Email :</td> <td><input type='text' name='email'></td><br>
        </tr>
        <tr>
         <td>Password :</td> <td><input type='password' name='password'></td><br>
        </tr>
        <tr>
         <td>Confirm Password :</td> <td><input type='password' name='checkpass'><br>
        </tr>
        <tr>
         <td><input type='submit' value='Submit'></td>
        </tr>
       </table>
      </form>";
	
	
	include 'footer.html';
?>