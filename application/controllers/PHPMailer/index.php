<?php 
    
    include("phpmailer.php");
    if(isset($_POST['kirim'])){
        
        $emails=new myPHPMailer();
        if($emails ->send_news("NRPKU","namaKU","JurusanKU","malvinpatrickk@gmail.com","088","myidline","ocowks","tytyd")){
           echo "mantab"; 
        }
        else{
            echo "gagal";
        }
        
    }
?>
<html>
    <form method="post">
        <button name="kirim" value="">Send</button>    
    </form>

</html>