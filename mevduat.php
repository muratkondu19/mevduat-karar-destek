<?php require_once "header.php";
require_once "navbar.php";
require_once "chart.php";
session_start(); ?>

<!-- Sayfayı kaplayan containter -->
<div class="containter">

    <!-- Mevduat hesaplama alanı -->
    <div class="row">
        <div class="col-4">
            <div class="card border-dark mb-3">
                <div class="card-header">Mevduat Getirileriniz ve Veriler  <span class="badge badge-info" tabindex="0" data-toggle="tooltip" 
                title="Mevduat getirinizi girerek diğer döviz cinslerinde karşılığını görebilir ve bu tutarlar üzerinden de işlem yapabilirsiniz" >Bilgi</span></div>
                <div class="card-body text-dark">

                    <div class="row">
                        <div class="col">
                            <form action="islem.php" method="POST">
                                <ul class="list-group list-group-flush">
                                    <!-- Mevduat tutarı alma  -->
                                    <li class="list-group-item">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"> Mevduat Tutarı</span>
                                            </div>
                                            <input type="text" name="mevduat_tutar" class="form-control" 
                                            value="<?php echo $_SESSION["tutar"] ?>" placeholder="<?php echo number_format($_SESSION["tutar"], 3, ',', '.') ?>">
                                            <input type="hidden" id="mevduat_tutar" value="<?php echo $_SESSION["tutar"] ?>">
                                            <?php if ($_SESSION["tutar"] == "") { ?>
                                                <script>
                                                    swal({
                                                        icon: "error",
                                                        title: "Lütfen bir tutar giriniz!",
                                                    });
                                                </script> <? } ?>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <!-- Döviz cinsi değiştiğinde ikonların değişmesi işlemi -->
                                                    <?php
                                                    if ($_SESSION["cins"] == "TRY") { ?>
                                                        <i class="fa fa-try" aria-hidden="true"></i>
                                                    <?php } elseif ($_SESSION["cins"] == "USD") { ?>
                                                        <i class="fa fa-usd" aria-hidden="true"></i>
                                                    <?php } elseif ($_SESSION["cins"] == "EUR") { ?>
                                                        <i class="fa fa-eur" aria-hidden="true"></i>
                                                    <?php } ?>

                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Döviz cinsi alma  -->
                                    <li class="list-group-item">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect01">Döviz Cinsi</label>
                                            </div>
                                            <select name="cins" class="custom-select" id="inputGroupSelect01">
                                                <option selected><?php echo $_SESSION["cins"] ?></option>
                                                <option value="TRY">TRY</option>
                                                <option value="EUR">EUR</option>
                                                <option value="USD">USD</option>
                                            </select>
                                        </div>
                                    </li>
                                    <!-- vade alma  -->
                                    <li class="list-group-item">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect02">Vade</label>
                                            </div>
                                            <select name="vade" class="custom-select" id="inputGroupSelect02">
                                                <option selected><?php echo $_SESSION["vade"] ?></option>
                                                <option value="1 Ay">1 Ay</option>
                                                <option value="3 Ay">3 Ay</option>
                                                <option value="6 Ay">6 Ay</option>
                                                <option value="1 Yıl">1 Yıl</option>
                                            </select>
                                        </div>
                                    </li>
                                    <!-- Oran bilgisi yazdırma  -->
                                    <li class="list-group-item">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Oran:</span>
                                            </div>
                                            <input type="text" disabled="" class="form-control" placeholder="<?php echo $_SESSION["oran"] ?>">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-percent" aria-hidden="true"></i></span>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Brüt getiri bilgisi yazdırma  -->
                                    <li class="list-group-item">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Brüt Getiri:</span>
                                            </div>
                                            <input type="text" disabled="" class="form-control" placeholder="<?php echo $_SESSION["brut"] ?>">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <!-- Döviz cinsi değiştiğinde ikonların değişmesi işlemi -->
                                                    <?php
                                                    if ($_SESSION["cins"] == "TRY") { ?>
                                                        <i class="fa fa-try" aria-hidden="true"></i>
                                                    <?php } elseif ($_SESSION["cins"] == "USD") { ?>
                                                        <i class="fa fa-usd" aria-hidden="true"></i>
                                                    <?php } elseif ($_SESSION["cins"] == "EUR") { ?>
                                                        <i class="fa fa-eur" aria-hidden="true"></i>
                                                    <?php } ?>

                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Net getiri bilgisi yazdırma  -->
                                    <li class="list-group-item">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Net Getiri:</span>
                                            </div>
                                            <input type="text" disabled="" class="form-control" placeholder="<?php echo $_SESSION["net"] ?>">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <!-- Döviz cinsi değiştiğinde ikonların değişmesi işlemi -->
                                                    <?php
                                                    if ($_SESSION["cins"] == "TRY") { ?>
                                                        <i class="fa fa-try" aria-hidden="true"></i>
                                                    <?php } elseif ($_SESSION["cins"] == "USD") { ?>
                                                        <i class="fa fa-usd" aria-hidden="true"></i>
                                                    <?php } elseif ($_SESSION["cins"] == "EUR") { ?>
                                                        <i class="fa fa-eur" aria-hidden="true"></i>
                                                    <?php } ?>

                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Vade sonu net getiri yazdırma -->
                                    <li class="list-group-item"> 
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Vade Sonu Net Getiri:</span>
                                            </div>
                                            <input type="text" disabled="" class="form-control" placeholder="<?php echo $_SESSION["vadesonu"] ?>">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <!-- Döviz cinsi değiştiğinde ikonların değişmesi işlemi -->
                                                    <?php
                                                    if ($_SESSION["cins"] == "TRY") { ?>
                                                        <i class="fa fa-try" aria-hidden="true"></i>
                                                    <?php } elseif ($_SESSION["cins"] == "USD") { ?>
                                                        <i class="fa fa-usd" aria-hidden="true"></i>
                                                    <?php } elseif ($_SESSION["cins"] == "EUR") { ?>
                                                        <i class="fa fa-eur" aria-hidden="true"></i>
                                                    <?php } ?>

                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                        </div>
                    </div>
                    <p>*Değişiklik yaparak tekrar hesaplama yapabilirsiniz.</p>
                    <p id="change"></p>
                    <button type="submit" name="mevduat_hesapla" class="btn btn-primary mb-2 btn-block">Hesapla</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Döviz cinsi ve TÜFE cardları  -->
        <div class="col-8">
            <div class="card-deck">
                <!-- Mevduatın döviz cinsine göre diğer döviz cinslerinin gösterilmesi -->
                <div class="card text-white bg-primary mb-3" id="headerOne" style="max-width: 18rem;">
                    <!--içerik js ile sağlanacak  -->

                </div>
                <div class="card text-white bg-danger mb-3" id="headerTwo" style="max-width: 18rem;">
                    <!--içerik js ile sağlanacak   -->
                </div>
                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-header">TÜFE Oranları</div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $_SESSION["tufe"] ?> <i class="fa fa-percent" aria-hidden="true"></i></h5>
                        <p class="card-text">Bu ayki açıklanan TÜFE oranı</p>
                    </div>
                </div>
            </div>
            <!-- Chart  -->
            <div class="card border-primary mb-3">
                <div class="card-header">Vadelerine Göre Getiri Değişimi & TÜFE Oranına Karşın Getiri  
                        <span class="badge badge-info" tabindex="0" data-toggle="tooltip" 
            title="Tabloda mevduat tutarınızın TÜFE'ye karşın değerinin faiz getirisi (reel) ve tutarınız üzerinden faiz getirisi yer almaktadır" >Bilgi</span>
                     </div>
                <div class="card-body text-primary">
                    <canvas id="vade_degisim" height="142"></canvas>
                </div>
            </div>
        </div>
    </div>

<!-- Card >Diğer Döviz Cinsleri Vadelere Göre Değişim  -->
    <div class="row">
        <div class="col-4">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">Diğer Döviz Cinsleri Vadelere Göre Değişim</div>
                <div class="card-body">
                    <p class="card-text">Mevduat tutarınız diğer döviz cinslerinden işlem görürse getirilerinizdeki değişim grafikteki gibidir.</p>
                </div>
            </div>
        </div>
        <!-- Chart  -->
        <div class="col-8">
            <div class="card border-danger mb-3">
                <div class="card-header">Diğer Döviz Cinsleri Vadelere Göre Değişim</div>
                <div class="card-body text-danger">
                    <canvas id="myChart2" height="140"></canvas>
                </div>
            </div>
        </div>
    </div>

<!-- card ve collapse kullanımı  -->
    <div class="row">
        <div class="col-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Faiz Oranları ve TÜFE Oranları</div>
                <div class="card-body">
                    <p class="card-text">Geçmiş dönemdeki faiz oranları ve TÜFE oranları arasındaki farkı gözlemleyebilirsiniz.</p>
                    <p>Tarih aralığı seçerek grafiği özelleştirebilirsiniz</p>
                    <button id="yil_oran" class="btn btn-dark btn-sm mb-2 btn-block" data-toggle="collapse" href="#collapseExample" 
                    role="button" aria-expanded="false" aria-controls="collapseExample">Yıllık Faiz ve TÜFE Oranları</button>
                    <button id="6_oran" class="btn btn-dark btn-sm mb-2 btn-block" data-toggle="collapse" href="#collapseExample6" 
                    role="button" aria-expanded="false" aria-controls="collapseExample6">6 Aylık Faiz ve TÜFE Oranları</button>
                    <button id="3_oran" class="btn btn-dark btn-sm mb-2 btn-block" data-toggle="collapse" href="#collapseExample3" 
                    role="button" aria-expanded="false" aria-controls="collapseExample3">3 Aylık Faiz ve TÜFE Oranları</button>
                    <button id="1_oran" class="btn btn-dark btn-sm mb-2 btn-block" data-toggle="collapse" href="#collapseExample1" 
                    role="button" aria-expanded="false" aria-controls="collapseExample1">1 Aylık Faiz ve TÜFE Oranları</button>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card border-success mb-3">
                <div class="card-header">Faiz Oranları ve Tüfe Oranları</div>
                <div class="card-body text-succes">
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            <canvas id="yillik_oran" height="140"></canvas>
                            <?php
                            $oransor = $db->prepare("SELECT * FROM mb_yilbazinda_oran INNER JOIN yillik_tufe ON mb_yilbazinda_oran.yil_id=yillik_tufe.tufe_yil_id");
                            $oransor->execute();
                            ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Faiz Oranı</th>
                                        <th scope="col">TÜFE Oranı</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($orancek = $oransor->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                            <th scope="row"><?php echo $orancek["Tarih"] ?></th>
                                            <td><?php echo $orancek["TRY MT05"] ?> </td>
                                            <td><?php echo $orancek["oran"] ?> </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="collapse" id="collapseExample6">
                        <div class="card card-body">
                            <?php
                            $oransor = $db->prepare("SELECT * FROM mb_altiay_oran INNER JOIN altiay_tufe ON oran_id=donem_id");
                            $oransor->execute();
                            ?>
                            <canvas id="6ay_oran" height="140"></canvas>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Faiz Oranı</th>
                                        <th scope="col">TÜFE Oranı</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($orancek = $oransor->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                            <th scope="row"><?php echo $orancek["Tarih"] ?></th>
                                            <td><?php echo $orancek["TRY MT03"] ?> </td>
                                            <td><?php echo $orancek["oran"] ?> </td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="collapse" id="collapseExample3">
                        <div class="card card-body">
                            <canvas id="3ay_oran" height="140"></canvas>
                            <?php
                            $oransor = $db->prepare("SELECT * FROM mb_ucaylık_oran  INNER JOIN ucay_tufe ON mb_ucaylık_oran.ceyrek_id= ucay_tufe.ceyrek_id");
                            $oransor->execute();
                            ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Faiz Oranı</th>
                                        <th scope="col">TÜFE Oranı</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($orancek = $oransor->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                            <th scope="row"><?php echo $orancek["Tarih"] ?></th>
                                            <td><?php echo $orancek["TRY MT02"] ?> </td>
                                            <td><?php echo $orancek["oran"] ?> </td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="collapse" id="collapseExample1">
                        <div class="card card-body">
                            <canvas id="1ay_oran" height="140"></canvas>
                            <?php
                            $oransor = $db->prepare("SELECT * FROM mb_aylik_oran  INNER JOIN ay_tufe ON mb_aylik_oran.ay_id= ay_tufe.ay_id");
                            $oransor->execute();
                            ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Faiz Oranı</th>
                                        <th scope="col">TÜFE Oranı</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($orancek = $oransor->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                            <th scope="row"><?php echo $orancek["Tarih"] ?></th>
                                            <td><?php echo $orancek["TRY MT01"] ?> </td>
                                            <td><?php echo $orancek["oran"] ?> </td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- Chartta kullanılacak olan verilerin veritabanından çekilmesi ve hesaplanması  -->
<?php
$oransor = $db->prepare("SELECT * FROM mb_uyg_faiz");
$oransor->execute();
$orancek = $oransor->fetch(PDO::FETCH_ASSOC);
$tufesor = $db->prepare("SELECT * FROM yillik_tufe WHERE ay_id=:id");
$tufesor->execute(array(
    'id' => 11
));
$tufecek = $tufesor->fetch(PDO::FETCH_ASSOC);
$tutar = $_SESSION["tutar"];
// Mevduat tutarlarının vt dan alınması 
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
// mevduat tutarının tüfe oranına değişiminin hesaplanması
$mevduat_tufe_1a = $tutar - (($tutar / 100) * $_SESSION["oran"] / 12);
$mevduat_tufe_3a = $tutar - (($tutar / 100) * $_SESSION["oran"] / 4);
$mevduat_tufe_6a = $tutar - (($tutar / 100) * $_SESSION["oran"] / 2);
$mevduat_tufe_1y = $tutar - (($tutar / 100) * $_SESSION["oran"]);
// mevduat tutarının ana para üzernden faiz getirisinin hesaplanması 
$tl_1a = ($mevduat_tufe_1a * 32 * 0.85 * $tl_1ay) / 36500 + $mevduat_tufe_1a;
$tl_3a = ($mevduat_tufe_3a * 90 * 0.85 * $tl_3ay) / 36500 + $mevduat_tufe_3a;
$tl_6a = ($mevduat_tufe_6a * 180 * 0.85 * $tl_6ay) / 36500 + $mevduat_tufe_6a;
$tl_1y = ($mevduat_tufe_1y * 365 * 0.85 * $tl_1yil) / 36500 + $mevduat_tufe_1y;
// mevduat tutarının tüfe oranına göre faiz getirisiyle birlikte değişiminin hesaplanması 
$tl_1ar = ($tutar * 32 * 0.85 * $tl_1ay) / 36500 + $tutar;
$tl_3ar = ($tutar * 90 * 0.85 * $tl_3ay) / 36500 + $tutar;
$tl_6ar = ($tutar * 180 * 0.85 * $tl_6ay) / 36500 + $tutar;
$tl_1yr = ($tutar * 365 * 0.85 * $tl_1yil) / 36500 + $tutar;
// mevduat tutarının euro olarak getirisinin hesaplanması 
$euro_1a = ($tutar * 32 * 0.80 * $euro_1ay) / 36500 + $tutar;
$euro_3a = ($tutar * 90 * 0.80 * $euro_3ay) / 36500 + $tutar;
$euro_6a = ($tutar * 180 * 0.80 * $euro_6ay) / 36500 + $tutar;
$euro_1y = ($tutar * 365 * 0.80 * $euro_1yil) / 36500 + $tutar;
// mevduat tutarının dolar olarak getirisinin hesaplanması 
$usd_1a = ($tutar * 32 * 0.80 * $usd_1ay) / 36500 + $tutar;
$usd_3a = ($tutar * 90 * 0.80 * $usd_3ay) / 36500 + $tutar;
$usd_6a = ($tutar * 180 * 0.80 * $usd_6ay) / 36500 + $tutar;
$usd_1y = ($tutar * 365 * 0.80 * $usd_1yil) / 36500 + $tutar;

// Eğer işlem yapılan döviz cinsi TL ise 
if ($_SESSION["cins"] == "TRY") {
    $a = '"';
    $b = ',';
?>
    <script>
        var ctx = document.getElementById('vade_degisim').getContext('2d');
        var chart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["1 Ay", "3 Ay", "6 Ay", "1 Yıl"],
                datasets: [{
                        label: "TÜFE Karşılığına Göre Getiri",
                        backgroundColor: "#007bff",
                        data: [<?php echo $tl_1a ?>, <?php echo $tl_3a ?>, <?php echo $tl_6a ?>, <?php echo $tl_1y ?>],
                    },
                    {
                        label: "Mevduat Tutarına Göre Getiri",
                        backgroundColor: "#dc3545",
                        data: [<?php echo $tl_1ar ?>, <?php echo $tl_3ar ?>, <?php echo $tl_6ar ?>, <?php echo $tl_1yr ?>]
                    },

                ]
            },
        });
    </script>
    <!-- Eğer işlem yapılan döviz cinsi Euro ise  -->
<?php } elseif ($_SESSION["cins"] == "EUR") { ?>
    <script>
        var ctx = document.getElementById('vade_degisim').getContext('2d');
        var chart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["1 Ay", "3 Ay", "6 Ay", "1 Yıl"],
                datasets: [{
                    label: "EUR ",
                    backgroundColor: "#27a243",
                    data: [<?php echo $euro_1a ?>, <?php echo $euro_3a ?>, <?php echo $euro_6a ?>, <?php echo $euro_1y ?>],
                }]
            },
        });
    </script>
    <!-- Eğer işlem yapılan döviz cinsi Dolar ise  -->
<?php } elseif ($_SESSION["cins"] = "USD") { ?>
    <script>
        var ctx = document.getElementById('vade_degisim').getContext('2d');
        var chart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["1 Ay", "3 Ay", "6 Ay", "1 Yıl"],
                datasets: [{
                    label: "USD ",
                    backgroundColor: "#dc3545",
                    data: [<?php echo $usd_1a ?>, <?php echo $usd_3a ?>, <?php echo $usd_6a ?>, <?php echo $usd_1y ?>],
                }]
            },
        });
    </script>
<?php } ?>

<script>
    var ctx = document.getElementById('myChart2').getContext('2d');
    var chart = new Chart(ctx, {
        type: "horizontalBar",
        data: {
            labels: ["1 Ay", "3 Ay", "6 Ay", "1 Yıl"],
            datasets: [{
                    label: "TRY",
                    backgroundColor: "#007bff",
                    data: [<?php echo $tl_1ay ?>, <?php echo $tl_3ay ?>, <?php echo $tl_6ay ?>, <?php echo $tl_1yil ?>],
                },
                {
                    label: "USD ",
                    backgroundColor: "#dc3545",
                    data: [<?php echo $usd_1ay ?>, <?php echo $usd_3ay ?>, <?php echo $usd_6ay ?>, <?php echo $usd_1yil ?>],
                },
                {
                    label: "EUR ",
                    backgroundColor: "#27a243",
                    data: [<?php echo $euro_1ay ?>, <?php echo $euro_3ay ?>, <?php echo $euro_6ay ?>, <?php echo $euro_1yil ?>],
                }
            ]
        },
    });
</script>

<!-- Yıllık bazda faiz ve tüfe oranları grafiği  -->
<?php
$oransor = $db->prepare("SELECT * FROM mb_yilbazinda_oran INNER JOIN yillik_tufe ON mb_yilbazinda_oran.yil_id=yillik_tufe.tufe_yil_id");
$oransor1 = $db->prepare("SELECT * FROM mb_yilbazinda_oran INNER JOIN yillik_tufe ON mb_yilbazinda_oran.yil_id=yillik_tufe.tufe_yil_id ");
$oransor2 = $db->prepare("SELECT * FROM mb_yilbazinda_oran INNER JOIN yillik_tufe ON mb_yilbazinda_oran.yil_id=yillik_tufe.tufe_yil_id ");
$oransor->execute();
$oransor1->execute();
$oransor2->execute();
if ($oransor->rowCount() > 0) {
    $a = ",";
    $b = '"';
}
?>
<script>
    var ctx = document.getElementById('yillik_oran').getContext('2d');
    var chart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: [<?php while ($orancek = $oransor->fetch(PDO::FETCH_ASSOC)) {
                            echo $b . $orancek["Tarih"] . $b . $a;
                        } ?>],
            datasets: [{
                    label: "TRY Faiz Oranı",
                    backgroundColor: "#007bff",
                    data: [<?php while ($orancek1 = $oransor1->fetch(PDO::FETCH_ASSOC)) {
                                echo $b . $orancek1["TRY MT05"] . $b . $a;
                            } ?>],
                },
                {
                    label: "TÜFE Oranı",
                    backgroundColor: "#27a243",
                    data: [<?php while ($orancek2 = $oransor2->fetch(PDO::FETCH_ASSOC)) {
                                echo $b . $orancek2["oran"] . $b . $a;
                            } ?>],
                },
            ]
        },
    });
</script>

<!-- Altı aylık periyottaki faiz ve tüfe oranları grafiği  -->
<?php
$oransor = $db->prepare("SELECT * FROM mb_altiay_oran INNER JOIN altiay_tufe ON altiay_tufe.oran_id=mb_altiay_oran.donem_id  ");
$oransor2 = $db->prepare("SELECT * FROM mb_altiay_oran ");
$oransor3 = $db->prepare("SELECT * FROM mb_altiay_oran INNER JOIN altiay_tufe ON altiay_tufe.oran_id=mb_altiay_oran.donem_id ");
$oransor->execute();
$oransor2->execute();
$oransor3->execute();
if ($oransor->rowCount() > 0) {
    $a = ",";
    $b = '"';
}
?>
<script>
    var ctx = document.getElementById('6ay_oran').getContext('2d');
    var chart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: [<?php while ($orancek2 = $oransor2->fetch(PDO::FETCH_ASSOC)) {
                            echo $b . $orancek2["Tarih"] . $b . $a;
                        } ?>],
            datasets: [{
                    label: "TRY Faiz Oranı",
                    backgroundColor: "#007bff",
                    data: [<?php while ($orancek = $oransor->fetch(PDO::FETCH_ASSOC)) {
                                echo $b . $orancek["TRY MT03"] . $b . $a;
                            } ?>],
                },
                {
                    label: "TÜFE Oranı",
                    backgroundColor: "#27a243",
                    data: [<?php while ($orancek3 = $oransor3->fetch(PDO::FETCH_ASSOC)) {
                                echo $b . $orancek3["oran"] . $b . $a;
                            } ?>],
                },
            ]
        },
    });
</script>

<!-- Üç aylık periyottaki faiz ve tüfe oranları grafiği  -->
<?php
$oransor = $db->prepare("SELECT * FROM mb_ucaylık_oran INNER JOIN ucay_tufe ON mb_ucaylık_oran.ceyrek_id= ucay_tufe.ceyrek_id");
$oransor2 = $db->prepare("SELECT * FROM mb_ucaylık_oran ");
$oransor3 = $db->prepare("SELECT * FROM mb_ucaylık_oran  INNER JOIN ucay_tufe ON mb_ucaylık_oran.ceyrek_id= ucay_tufe.ceyrek_id");
$oransor->execute();
$oransor2->execute();
$oransor3->execute();
if ($oransor->rowCount() > 0) {
    $a = ",";
    $b = '"';
}
?>
<script>
    var ctx = document.getElementById('3ay_oran').getContext('2d');
    var chart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: [<?php while ($orancek2 = $oransor2->fetch(PDO::FETCH_ASSOC)) {
                            echo $b . $orancek2["Tarih"] . $b . $a;
                        } ?>],
            datasets: [{
                    label: "TRY Faiz Oranı",
                    backgroundColor: "#007bff",
                    data: [<?php while ($orancek = $oransor->fetch(PDO::FETCH_ASSOC)) {
                                echo $b . $orancek["TRY MT02"] . $b . $a;
                            } ?>],
                },
                {
                    label: "TÜFE Oranı",
                    backgroundColor: "#27a243",
                    data: [<?php while ($orancek3 = $oransor3->fetch(PDO::FETCH_ASSOC)) {
                                echo $b . $orancek3["oran"] . $b . $a;
                            } ?>],
                },
            ]
        },
    });
</script>

<!-- Aylık periyottaki faiz ve tüfe oranları grafiği  -->
<?php
$oransor = $db->prepare("SELECT * FROM mb_aylik_oran INNER JOIN ay_tufe ON mb_aylik_oran.ay_id= ay_tufe.ay_id");
$oransor2 = $db->prepare("SELECT * FROM mb_aylik_oran ");
$oransor3 = $db->prepare("SELECT * FROM mb_aylik_oran  INNER JOIN ay_tufe ON mb_aylik_oran.ay_id= ay_tufe.ay_id");
$oransor->execute();
$oransor2->execute();
$oransor3->execute();
if ($oransor->rowCount() > 0) {
    $a = ",";
    $b = '"';
}
?>
<script>
    var ctx = document.getElementById('1ay_oran').getContext('2d');
    var chart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: [<?php while ($orancek2 = $oransor2->fetch(PDO::FETCH_ASSOC)) {
                            echo $b . $orancek2["Tarih"] . $b . $a;
                        } ?>],
            datasets: [{
                    label: "TRY Faiz Oranı",
                    backgroundColor: "#007bff",
                    data: [<?php while ($orancek = $oransor->fetch(PDO::FETCH_ASSOC)) {
                                echo $b . $orancek["TRY MT01"] . $b . $a;
                            } ?>],
                },
                {
                    label: "TÜFE Oranı",
                    backgroundColor: "#27a243",
                    data: [<?php while ($orancek3 = $oransor3->fetch(PDO::FETCH_ASSOC)) {
                                echo $b . $orancek3["oran"] . $b . $a;
                            } ?>],
                },
            ]
        },
    });
</script>
<!-- <script src="js/change.js"></script> -->
<!-- <script src="js/faiz.js"></script> -->
<script src="js/exchangeUsd.js"></script>
<script src="js/exchangeEur.js"></script>
<?php include "footer.php" ?>