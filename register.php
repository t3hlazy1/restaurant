<?php 
	include 'includes.php';
	include 'header.html';
	
	echo "<div id='reg_form'>
			<form>
				Select a username: <input type='text' name='username' maxlength='10'>
					</br>
				Select a password: <input type='password' name='password' maxlegnth='10'>
					</br>
				Re-enter your password: <input type='password' name='password' maxlength='10'>
					</br>
			</form>
		</div>";
	
	
	include 'footer.html';
?>