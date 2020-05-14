<?php // Veritabanı bağlantısının projeye dahil edilmesi  
 require_once "baglan.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Yatırım Karar Destek, yatırım kararları alırken en ideal karar vermenizi sağlayacak verileri size sunuyoruz.">
    <meta name=”robots” content=” index,nofollow ” />
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF8” />
    <meta name="author" content="Murat Kondu">
    <meta name="keywords" content="Yatırım,portföy,dolar,euro,altın,döviz">
    <!-- Bootstrap 4 CSS  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Font Awesome İkonlar İçin  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- CSS Dosyası  -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Chart JS  -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <!-- Sweet Alert Uyarı Mesajları İçin  -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <!-- Dinamik Title İşlemleri  -->
    <title> </title>
    <link rel="shortcut icon" type="image/x-icon" href='img/money.png'> 

    <script>
        var default1 = "Mevduat Karar Destek Sistemi"; 
        var text1 = "Türk Lirası"; 
        var text2 = "Dolar"; 
        var text3 = "Altın"; 
        var text4 = "Mevduat Karar Destek Sistemi"; 
        var changeRate = 1000; 
        var messageNumber = 0;

        function changeStatus() {
            if (messageNumber == 0) {
                window.status = default1;
                document.title = default1;
            } else if (messageNumber == 1) {
                window.status = text1;
                document.title = text1;
            } else if (messageNumber == 2) {
                window.status = text2;
                document.title = text2;
            } else if (messageNumber == 3) {
                window.status = text3;
                document.title = text3;
            } else if (messageNumber == 4) {
                window.status = text4;
                document.title = text4;
                messageNumber = 0;
            }
            messageNumber++;
            setTimeout("changeStatus();", changeRate);
        }
        changeStatus();
    </script>

</head>
