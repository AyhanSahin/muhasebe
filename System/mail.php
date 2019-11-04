<?php include FCPATH.'System/mail/class.phpmailer.php';
class mail extends PHPMailer{
  static  public  $class ;
        function __construct(){
            
            
            
           
            
        }
                
    
         
        function  sendmail($alicilar,$subject,$text,$ek=""){
            
             
            $mail = $this;
            
            
                    
            $mail->IsSMTP(); // telling the class to use SMTP

            //$mail->Host       = "mail.basalanpatent.com.tr"; // SMTP server
            $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
            
            $str = file_get_contents(FCPATH."upload/mail.json");

              
                $json = json_decode($str);
        
           
            

            $mail->SMTPAuth = true;
          $mail->Host = $json->Host;
            $mail->Port = $json->Port;
            $mail->SMTPSecure = $json->SMTPSecure;
            $mail->Username = $json->Username;
            $mail->Password = $json->Password;   
 
            $body  = str_replace("[\]",'',$text);



            $mail->SetFrom($mail->Username);
            $mail->AddReplyTo( $mail->Username);



            foreach($alicilar as $alici){

            $mail->AddAddress($alici);

            }

            if($ek){
            foreach($ek as $ekler){

             $mail->AddAttachment($ekler); // attachment	

                    }
            }


            $mail->Subject    = $subject;
            $mail->AltBody    = "Mail sağlayıcınız html format desteklememektedir!"; // optional, comment out and test
            $mail->MsgHTML($body);
            //$mail->AddAttachment("images/phpmailer.gif");      // attachment
            //$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment
            $mail->CharSet="UTF-8";
            if(!$mail->Send()) {
             // $mail->ErrorInfo;
            return false;

              } else {
              return true;
            }


            }                
                
                
	
    }
        
 


