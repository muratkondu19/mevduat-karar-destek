<?php
require_once "fonksiyon.php";
require_once "baglan.php";
session_start();

// Mevduat tutarına uygulanan faizin vt sorgusu
$oransor = $db->prepare("SELECT * FROM mb_uyg_faiz");
$oransor->execute();
$orancek = $oransor->fetch(PDO::FETCH_ASSOC);

//TÜFE oranlarının vt sorgusu
$tufesor = $db->prepare("SELECT * FROM ay_tufe WHERE ay_id=:id");
$tufesor->execute(array(
    'id' => 16
));
$tufecek = $tufesor->fetch(PDO::FETCH_ASSOC);

//Post verileri yakalama
$tutar = $_POST["mevduat_tutar"];
$cins = $_POST["cins"];
$vade = seo($_POST["vade"]); //seo fonksiyonu kullanımı

//Oranların veri tabanından alınması
$tl_1ay = $orancek["TRY MT01"];
$tl_3ay = $orancek["TRY MT02"];
$tl_6ay = $orancek["TRY MT03"];
$tl_1yil = $orancek["TRY MT04"];
$usd_1ay = $orancek["USD MT01"];
$usd_3ay = $orancek["USD MT02"];
$usd_6ay = $orancek["USD MT03"];
$usd_1yil = $orancek["USD MT04"];
$euro_1ay = $orancek["EUR MT01"];
$euro_3ay = $orancek["EUR MT02"];
$euro_6ay = $orancek["EUR MT03"];
$euro_1yil = $orancek["EUR MT04"];
$tufe_ay = $tufecek["oran"];


if (isset($_POST["mevduat_hesapla"])) {

    //Hesaplama işlemleri
    //Faiz oranları döviz cinsine ve vadesine göre vergi ve oran olarak değişiklik göstermektedir
    if ($cins == "TRY") {
        if ($vade == "1_Ay") {
            $net = ($tutar * 32 * 0.85 * $tl_1ay) / 36500;
            $vadesonu = ($tutar * 32 * 0.85 * $tl_1ay) / 36500 + $tutar;
            $brut = ($tutar * 32 * $tl_1ay) / 36500;
            $oran = $tl_1ay;
        } elseif ($vade == "3_Ay") {
            $net = ($tutar * 32 * 0.85 * $tl_3ay) / 36500;
            $vadesonu = ($tutar * 32 * 0.85 * $tl_3ay) / 36500 + $tutar;
            $brut = ($tutar * 90 * $tl_3ay) / 36500;
            $oran = $tl_3ay;
        } elseif ($vade == "6_Ay") {
            $net = ($tutar * 32 * 0.85 * $tl_6ay) / 36500;
            $vadesonu = ($tutar * 32 * 0.85 * $tl_6ay) / 36500 + $tutar;
            $brut = ($tutar * 180 * $tl_6ay) / 36500;
            $oran = $tl_6ay;
        } elseif ($vade == "1_Yil") {
            $net = ($tutar * 32 * 0.85 * $tl_1yil) / 36500;
            $vadesonu = ($tutar * 32 * 0.85 * $tl_1yil) / 36500 + $tutar;
            $brut = ($tutar * 365 * $tl_1yil) / 36500;
            $oran = $tl_1yil;
        }
    } elseif ($cins == "USD") {
        if ($vade == "1_Ay") {
            $net = ($tutar * 32 * 0.80 * $usd_1ay) / 36500;
            $vadesonu = ($tutar * 32 * 0.80 * $usd_1ay) / 36500 + $tutar;
            $brut = ($tutar * 32 * $usd_1ay) / 36500;
            $oran = $usd_1ay;
        } elseif ($vade == "3_Ay") {
            $net = ($tutar * 90 * 0.80 * $usd_3ay) / 36500;
            $vadesonu = ($tutar * 90 * 0.80 * $usd_3ay) / 36500 + $tutar;
            $brut = ($tutar * 90 * $usd_3ay) / 36500;
            $oran = $usd_3ay;
        } elseif ($vade == "6_Ay") {
            $net = ($tutar * 180 * 0.80 * $usd_6ay) / 36500;
            $vadesonu = ($tutar * 180 * 0.80 * $usd_6ay) / 36500 + $tutar;
            $brut = ($tutar * 180 * $usd_6ay) / 36500;
            $oran = $usd_6ay;
        } elseif ($vade == "1_Yil") {
            $net = ($tutar * 365 * 0.80 * $usd_1yil) / 36500;
            $vadesonu = ($tutar * 365 * 0.80 * $usd_1yil) / 36500 + $tutar;
            $brut = ($tutar * 365 * $usd_1yil) / 36500;
            $oran = $usd_1yil;
        }
    } elseif ($cins == "EUR") {
        if ($vade == "1_Ay") {
            $net = ($tutar * 32 * 0.80 * $euro_1ay) / 36500;
            $vadesonu = ($tutar * 32 * 0.80 * $euro_1ay) / 36500 + $tutar;
            $brut = ($tutar * 32 * $euro_1ay) / 36500;
            $oran = $euro_1ay;
        } elseif ($vade == "3_Ay") {
            $net = ($tutar * 90 * 0.80 * $euro_3ay) / 36500;
            $vadesonu = ($tutar * 90 * 0.80 * $euro_3ay) / 36500 + $tutar;
            $brut = ($tutar * 90 * $euro_3ay) / 36500;
            $oran = $euro_3ay;
        } elseif ($vade == "6_Ay") {
            $net = ($tutar * 180 * 0.80 * $euro_6ay) / 36500;
            $vadesonu = ($tutar * 180 * 0.80 * $euro_6ay) / 36500 + $tutar;
            $brut = ($tutar * 180 * $euro_6ay) / 36500;
            $oran = $euro_6ay;
        } elseif ($vade == "1_Yil") {
            $net = ($tutar * 365 * 0.80 * $euro_1yil) / 36500;
            $vadesonu = ($tutar * 365 * 0.80 * $euro_1yil) / 36500 + $tutar;
            $brut = ($tutar * 365 * $euro_1yil) / 36500;
            $oran = $euro_1yil;
        }
    }

    //Rakamları formatlama

    $net = number_format($net, 2, ',', '.');
    $vadesonu = number_format($vadesonu, 2, ',', '.');
    $brut = number_format($brut, 2, ',', '.');

    //Sonuçların SESSION'a aktarılması
    $_SESSION["brut"] = $brut;
    $_SESSION["tutar"] = $tutar;
    $_SESSION["cins"] = $cins;
    $_SESSION["vade"] = $vade;
    $_SESSION["net"] = $net;
    $_SESSION["vadesonu"] = $vadesonu;
    $_SESSION["tufe"] = $tufe_ay;
    $_SESSION["oran"] = $oran;


    header("Location:mevduat.php?durum=basarisili");
} else {

    header("Location:index.php");
}


