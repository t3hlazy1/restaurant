<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
function nameCheck()
{
var xmlhttp;    
var str = $('input[name=name]').val();
if (str=="")
  {
  document.getElementById("name_info").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("name_info").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","name_check.php?name="+str,true);
xmlhttp.send();
}
</script>

<?php 
	include 'includes.php';
	include 'header.html';
	

	echo "<h1>Create a New Account</h1>
      <form action='process_register.php' method='post'>
       <table>
        <tr>
         <td>Name:</td> <td><input type='text' name='name' id='name' onkeypress='nameCheck()'></td><td id='name_info'></td><br>
        </tr>
        <tr>
         <td>Email:</td> <td><input type='text' name='email'></td><br>
        </tr>
        <tr>
         <td>Password:</td> <td><input type='password' name='password'></td><br>
        </tr>
        <tr>
         <td>Confirm Password:</td> <td><input type='password' name='checkpass'><br>
        </tr>
        <tr>
         <td><input type='submit' value='Submit'></td>
        </tr>
       </table>
      </form>";
	
	
	include 'footer.html';
?>