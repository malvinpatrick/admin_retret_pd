<?php
        include_once('phpmailer/PHPMailerAutoload.php');


class myPHPMailer{
    private $host;
    private $username;
    private $password;
    private $webHandlerURL;
    private $fromEmailAddress;private $fromEmailName;
    
    private $namaPerusahaan;
    private $tahunPerusahaan;
    private $replyTo;
	
	/**
     * PHP Mailer Class init
     * @author Williams Gunawan <williams.gunawan123@gmail.com>
     * @since 2018
     *
     * @return void
     */

    function __construct()
    {
        $this->host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $this->username = 'retretpd2018@gmail.com';                 // SMTP username
        $this->password = 'sttsuntukjesus';                           // SMTP password
        $this->fromEmailAddress = "noreply@tumasing.com" ;
        $this->fromEmailName = "History Maker" ;
        $this->webHandlerURL = "http://registration.php?vKey=" ;
        $this->namaPerusahaan = "PD ISTTS" ;
        $this->tahunPerusahaan = "2018" ;
        $this->replyTo = "REPLY TO@gmail.com" ;
    }



    private function sendmail($kirim, $pesan, $judul, $balas){
        $mail = new PHPMailer;
        //$mail->SMTPDebug = 2;                               // Enable verbose debug
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = $this->host;  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = $this->username;                 // SMTP username
        $mail->Password = $this->password;                           // SMTP password
        $mail->SMTPSecure = 'tls';              // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;
        $mail->setFrom($this->fromEmailAddress, $this->fromEmailName);
        $mail->addAddress($kirim, 'Welcome !');     // Add a recipient
        $mail->addReplyTo($balas, 'EZ Code');
        $mail->Subject = $judul;
        $mail->Body    = $pesan;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $sukses='';
        if(!$mail->send()) {
            $sukses= false;
            $error = $mail->ErrorInfo;
        } else {
            $sukses =true;
        }
        return $sukses;
    }

    function send_news($NRP,$WAKTU, $EMAIL){
        $pesan = "<html>
    <head>
        <style>
            body{
                font-family: calibri;
                background: MidnightBlue ;
                color: white;
            }
            .card{
                border : 1px solid MidnightBlue;
                padding: 20px;    
                box-shadow:0px 0px 100px black;
            }
        </style>
    </head>
    <body>
        <h1>Pendaftaran Sukses !!!</h1>
        <h2>Peserta dengan identitas sebagai berikut telah berhasil melakukan Pendaftaran :</h2>
        
        <div class=\"card\">
            NRP : ".$NRP." <br>
            Waktu : ".$WAKTU."<br>
        </div>
        <br>
        <hr>
        <h2>
        Dihimbau kepada peserta agar MENYIMPAN EMAIL INI untuk menunjukkan bahwa peserta telah melakukan pelunasan Retret PD ISTTS 2018 dan ditunjukkan waktu melakukan registrasi ulang
            </h2>
    </body>
    
</html>";
        $phpmail=new myPHPMailer();
		return $phpmail->sendmail($EMAIL,$pesan,' Konfirmasi Pelunasan',$this->replyTo);
        //echo sentEmail($email,$textEmail);
	}


    
}