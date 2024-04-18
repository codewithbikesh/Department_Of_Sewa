<?php
require 'smtp/class.phpmailer.php';

if(isset($_POST['send']))
{     
            $name=$_POST['name'];
            $email=$_POST['email'];
            $msg=$_POST['message'];
            $subject=$_POST['subject'];
    
            $mail = new PHPMailer(true); 

        	$mail->IsSMTP();                           
        	$mail->SMTPAuth   = true;                 
        	$mail->Port       = 587;                    
        	$mail->Host       = "smtp.omsnepal.com"; 
        	$mail->Username   = "dos@omsnepal.com";   
        	$mail->Password   = "Dos#@21^^??";            
        
        	$mail->IsSendmail();  
        
        	$mail->From       = "dos@omsnepal.com";
        // 	$mail->FromName   = "omsnepal.com";
        
        	$mail->AddAddress($email);
            $mail->Subject  = $subject;
        	$mail->WordWrap   = 80; 
        
            $mail->MsgHTML($msg);
        	$mail->IsHTML(true); 
                 
            if(!$mail->Send())
            {
                   echo "Mail Not Sent";
            }
            else
            {
               	echo '<script language="javascript">';
    	        echo 'alert("Thank You Contacting Us We Will Response You As Early Possible")';
    	        echo '</script>';
         
            } 
        	
}        	    
        