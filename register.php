//include jQuery
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

//Page scripts
<script>

//Disable submit button
$("input[type=submit]").attr("disabled", "disabled");

//Name Check
//Determines if name is taken or not, and changes curr page accordingly
function nameCheck(){
var xmlhttp;    

//Get username from form
var name = $('input[name=name]').val();

//If username is empty
if (name=="" || name.length < 4){
  //set input font color to red and disable submit button
  $('input[name=name]').css("color", "red");
  $("input[type=submit]").attr("disabled", "disabled");
  return;
}

if (window.XMLHttpRequest){
// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
}
else{
// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}

xmlhttp.onreadystatechange=function(){
  if (xmlhttp.readyState==4 && xmlhttp.status==200){
    //if username is available
    if (xmlhttp.responseText == "Available"){
      $('input[name=name]').css("color", "green");
      $("input[type=submit]").removeAttr("disabled");
    }
    //if username is taken
    else{
      $('input[name=name]').css("color", "red");
      $("input[type=submit]").attr("disabled", "disabled");
    }
  }
}

//open php script
xmlhttp.open("GET","name_check.php?name="+name,true);
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
         <td>Name:</td> <td><input type='text' name='name' id='name' onkeyup='nameCheck()'></td><br>
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
         <td><input type='submit' value='Submit' id='submit' disabled></td>
        </tr>
       </table>
      </form>";
	
	
	include 'footer.html';
?>