<?php

$error="";

$success="";

if ($_POST){
    
    if(!$_POST["email"]){
        
        $error.= "Email field is empty.<br>";
    }
    if(!$_POST["feedback"]){
        
        $error.= "Feedback field is empty.<br>";
    }
    if ($_POST['email'] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
            
            $error .= "The email address is invalid.<br>";
            
        }
    if ($error!=""){
        
        $error='<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>'.$error.'</div>';
    }
    else{
        $emailTo = "harshnsdalai@gmail.com";
        
        $subject = "Feedback from user";
        
        $body= $_POST["feedback"];
        
        $headers = "From:".$_POST["email"];
        
        if (mail($emailTo, $subject, $body, $headers)){
            
            $emailTo = $_POST["email"];
        
            $subject = "Response to feedback";

            $body= "Thanks For giving your valuable feedback";

            $headers = "From: harshnsdalai@gmail.com";
            
            mail($emailTo, $subject, $body, $headers);
            
            $success.='<div class="alert alert-success" role="alert"><p>Feedback sent succesfully. Contact you ASAP!</p></div>';
            
        }else{
            
            $error='<div class="alert alert-danger" role="alert"><p>Couldn\'t send.Please try again later.</p></div>';
            
        }
    }
}
?>

<!doctype html>
<html lang="en">
    
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <title>Hello, world!</title>
  
</head>
    
    <body>
        <div class="container">
            <h1>Feedback</h1>
            <div id="error"><?php echo $error.$success; ?></div>
          <form  method="post">
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email_address">
              </div>
              <div class="form-group">
                <label for="feedback">What's your Feedback?</label>
                <textarea class="form-control" id="feedback" rows="3" name="feedback" placeholder="Give your valuable feedback"></textarea>
              </div>
              <button type="submit" class="btn btn-primary" id="submit">Submit</button>
          </form>
        </div>
        
    <script>
        
         $("form").submit(function(e) {
              
              var error = "";
              
              if ($("#email").val() == "") {
                  
                  error += "The email field is required.<br>"
                  
              }
              
              
              
              if ($("#feedback").val() == "") {
                  
                  error += "The feedback field is required.<br>"
                  
              }
              
              if (error != "") {
                  
                 $("#error").html('<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>' + error + '</div>');
                  
                  return false;
                  
              } else {
                  
                  return true;
                  
              }
          })
       
        </script>
      
      
      
      
      
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>
