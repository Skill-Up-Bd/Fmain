<?php
// Mail engine set
require $_SERVER['DOCUMENT_ROOT'] . '/mail/engine.php';
require_once $_SERVER['DOCUMENT_ROOT']."/App/config.php";
$a=1;

function randstring($length = 5) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}

?>
<?php
$email=$email_err="";
 if ($_SERVER["REQUEST_METHOD"] == "POST"){

$email = $_POST["email"];
if (empty ($email)){
$email_err = "Invalid email format";
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $email_err = "Invalid email format"; 
}

if(empty ($email_err)){
     $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $email;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){

 header("location: http://educare.rf.gd/App/login.php?mail=$email");

       
                    
                }
else{
   



       
$rand=randstring();
$link= $_SERVER['DOCUMENT_ROOT'] . '/App/verify/'.$rand.'.php';
$code=rand(100000,1000000);
$page = fopen($link, "w");

fwrite($page, '<?php 
$email ="'.$email.'";
parse_str($_SERVER["QUERY_STRING"]);
if($a=='.$code.'){
$code="'.$code.'";
require $_SERVER["DOCUMENT_ROOT"] . "/App/register.php";

} 
else{

header("location: http://educare.rf.gd/Not_Found/index.html");
}
?>');



send_mail($email, file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/verifyhtml/index.html')."    
 <a href='http://educare.rf.gd/App/verify/$rand.php?a=$code'> <center><button style='box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);background-color: #2044df; /* Green *background-color: #4CAF50; /* Green */  border: none;  color: white;  padding: 15px 32px;  text-align: center;  text-decoration: none;  display: inline-block;  font-size: 16px;  margin: 4px 2px;  cursor: pointer;  -webkit-transition-duration: 0.4s; /* Safari */  transition-duration: 0.4s;'><strong>VERIFY</strong>
</button></center></a>
");



                
                
            
    }

}

    }

            // Close statement
            mysqli_stmt_close($stmt);
        }





}

 
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">



 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p><form id="a" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>    
           
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form><p>
        
    </div>    
</body>
</html>
