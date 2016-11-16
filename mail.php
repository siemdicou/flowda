<?php
/*
From http://www.html-form-guide.com 
This is the simplest emailer one can have in PHP.
If this does not work, then the PHP email configuration is bad!
*/
    $username = $_POST['username'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $company = $_POST['company'];
    $mobile = $_POST['mobile'];
    $donation = $_POST['donation'];
    $postalcode = $_POST['postalcode'];
    $adress = $_POST['adress'];
    $remark = $_POST['remark'];
    $type = $_POST['type'];
    $msg="";
if(isset($_POST['submit']))
{
    /* ****Important!****
    replace name@your-web-site.com below 
    with an email address that belongs to 
    the website where the script is uploaded.
    For example, if you are uploading this script to
    www.my-web-site.com, then an email like
    form@my-web-site.com is good.
    */

    $from_add = $email;

    $to_add = "info@flowda.nl"; //<-- put your yahoo/gmail email address here

    $subject = "Flowda";

//    include 'emailstyle.css';








    

    $message =  $header . "" ."<br>Name:". $username ."<br>Surname:". $lastname . "<br>email:". $email . "<br>Company:". $company ."<br>number:". $mobile ."<br>type of website:". $type . "<br>message:".  $remark;

    $headers = "From: $from_add \r\n";
    $headers .= "Reply-To: $from_add \r\n";
    $headers .= "Return-Path: $from_add\r\n";
    $headers .= "X-Mailer: PHP \r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    
    
    if(mail($to_add,$subject,$message,$headers))
    {
        $msg = "Mail sent OK";
        header("location:../index.html");
    } 
    else 
    {
       $msg = "Error sending email!";
    }
}

$msg="";
if(isset($_POST['submit']))
{
    /* ****Important!****
    replace name@your-web-site.com below
    with an email address that belongs to
    the website where the script is uploaded.
    For example, if you are uploading this script to
    www.my-web-site.com, then an email like
    form@my-web-site.com is good.
    */

    $from_add = "info@flowda.nl";

    $to_add = $email; //<-- put your yahoo/gmail email address here

    $subject = "conformation email flowda";

//    include 'emailstyle.css';
    $greeting = "<p>dear " . $username ." " . $lastname . "</p><br>" ; 
    $groet = "<p>Thanks for filling in your personal details</p></body>";
    $message =  $greeting . "The data that will be send to our databases are :<br><br>Username:". $username ."<br>Lastname:". $lastname . "<br>email:". $email . "<br>company:". $company ."<br>number:". $mobile ."<br>type of website:". $type . "<br>message:" .  $remark ."<br><br>" . $groet;


    $headers = "From: $from_add \r\n";
    $headers .= "Reply-To: $from_add \r\n";
    $headers .= "Return-Path: $from_add\r\n";
    $headers .= "X-Mailer: PHP \r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


    if(mail($email,$subject,$message,$headers))
    {
        $msg = "Mail sent OK";
    }
    else
    {
        $msg = "Error sending email!";
    }
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
    <title>Test form to email</title>
</head>

<body>
<?php echo $msg ?>
<p>
<!-- <form action='<?php echo htmlentities($_SERVER['PHP_SELF']); ?>' method='post'>
<input type='submit' name='submit' value='Submit'>

</form> -->
</p>


</body>
</html>