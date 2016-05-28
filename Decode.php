<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>PHP LOCK IT DECODER 0.1</title>
    <style>
    body{background-color:#000;color:White;font-family:comic sans ms;}
    .logo h1{font-family:Comic Sans Ms;font-size:30px;color:green;}
    .logo{border-bottom:1px solid; color:orange;margin:auto;}
    .form textarea{background-color:#000;color:red;resize:none;width:500px;height:250px;border:1px solid;border-color:green;}
    .form input{background-color:#000;color:red;width:500px;border:1px solid;border-color:green;}
    .form button{border:2px dotted;background-color:#000;border-color:green;width:200px;height:40px;color:red;font-family:Comic Sans Ms;font-size:20px;}
    .altsoz h4{font-family:comic Sans ms;font-size:20px;}
    </style>
</head>
<body>
    
    <center><div class="logo">
    <h1>PHP LOCK IT DECODER 0.1 Arsle!!</h1>
    </div>
    
    
    <div class="form">
    <form action="#" method="POST"><br>
    Dosya Yolu:<br>
    <input type="text" name="Yol"/><br><br>
    <textarea name="cozucu" id="" cols="30" rows="10"></textarea><br><br>
    <button type="submit">Çözmeyenin Aq</button>
    </form>
    </div>
    
    </center>
    
</body>
</html>

<?php 
error_reporting(0);
if($_POST)
{
    
    $yol=$_POST['Yol'];
    $veri = $_POST['cozucu'];
    $cikti = str_replace('__FILE__', "'".$yol."'", $veri);
    $cikti = str_replace('<?php', '', $cikti);
    $cikti = preg_replace('/\?\>.*/i', '', $cikti);
    
  
    $cikti = str_replace('eval', 'echo', $cikti);
    
    ob_start();
    eval($cikti);
    $adim1 = ob_get_contents();
    ob_end_clean();
    $adim1 = str_replace('eval', 'echo', $adim1);
   
    $cikti = preg_replace('/echo\(.*return;/i', $adim1, $cikti);
    
    ob_start();
    eval($cikti);
    
    $adim2 = ob_get_contents();
    ob_end_clean();
    
    
    $adim2 = str_replace('eval', 'echo', $adim2);
    $cikti = preg_replace('/echo\(.*\);/i', $adim2, $cikti);

    ob_start();
    eval($cikti);
    $sonuc = ob_get_contents();
    ob_end_clean();
    $sonuc = "<?php\n".$sonuc."\n?>";
    echo '<br><center>Decoded.txt Olarak Kaydedildi!</center>';
    file_put_contents('decoded.txt',$sonuc);
    
}

?>
    <center><div class="altsoz">
        <h4>arsle@janissaries.org </h4>
    </div></center>
