<?php //Header'ın dahil edilmesi
require_once "header.php"; ?>

<!-- Sayfayı kapsayan containter  -->
<div align="center" class="containter_index">

    <!-- Başlık card -->
    <div class="card border-info mb-3" style="width: 500px">
        <div class="card-header">Mevduat Karar Destek Sistemi</div>
        <div class="card-body text-info">
            <p class="card-text">Mevduat tutarınızdaki getiri ve değişimlerini görmek için bilgileri doldurarak ilerleyiniz.</p>
        </div>
    </div>

    <!-- Mevduat bilgileri alma card  -->
    <div class="card text-white bg-dark mb-3 " style="width: 500px">
        <div class="card-header">Mevduat Bilgileriniz</div>
        <div class="card-body text-center">
            <h5 class="card-title"></h5>
            <p class="card-text">
                <form action="islem.php" method="POST">
                    <label>Mevduat Tutarınız</label>
                    <input type="text" name="mevduat_tutar" id="mevduat_tutar" class="form-control" placeholder="Mevduat tutarınızı giriniz">
                    <label>Mevduat Vadeniz</label>
                    <select name="vade" class="custom-select">
                        <option selected>Vade seçiniz</option>
                        <option value="1 Ay">1 Ay</option>
                        <option value="3 Ay">3 Ay</option>
                        <option value="6 Ay">6 Ay</option>
                        <option value="1 Yıl">1 Yıl</option>
                    </select>
                    <label>Döviz Cinsiniz</label>
                    <select name="cins" id="cins" class="custom-select">
                        <option>Döviz cinsi seçiniz</option>
                        <option value="TRY">TRY</option>
                        <option value="EUR">EUR</option>
                        <option value="USD">USD</option>
                    </select>
                    <label for=""> <br></label>


                    <button type="button" class="btn btn-primary mb-2 btn-block" data-toggle="modal" data-target="#exampleModalCenter">
                        Hesapla
                    </button>
                    <label for=""><br></label>

                    <button type="button" class="btn btn-primary mb-2 btn-block" data-toggle="modal" data-target="#exampleModalCenter1">
                        Döviz Çevirici
                    </button>


                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle" style="color:black">Yönlendiriliyorsunuz</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" style="color:black">
                                    Bir diğer sayfaya yönlendiriliyorsunuz. Bilgilerinizden emin misiniz?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Düzenle</button>
                                    <button type="submit" name="mevduat_hesapla" class="btn btn-primary">İlerle</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div style="color:black" class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Döviz Çevirici</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <form id="currency-form">
                                        <div class="form-group mx-sm-3 mb-2">
                                            <div class="row">
                                                <div class="col">
                                                    <select class="custom-select custom-select-sm" id="firstCurrency">
                                                        <option selected>USD</option>
                                                        <option>EUR</option>
                                                        <option>TRY</option>
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <select class="custom-select custom-select-sm" id="secondCurrency">
                                                        <option>USD</option>
                                                        <option>EUR</option>
                                                        <option selected>TRY</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <hr>
                                            <input class="form-control form-control-sm" type="number" name="amount" id="amount" placeholder="Miktar">
                                            <hr>
                                    </form>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="btn btn-outline-secondary" name="outputFirsr" id="outputFirst">USD</label>
                                            <label class="btn btn-outline-secondary" name="outputSecond" id="outputSecond">TRY</label>
                                        </div>
                                        <input type="text" name="outputResult" id="outputResult" class="form-control " placeholder="Sonuç" 
                                        readonly aria-label="" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Geri Dön</button>
                            <button type="button" id="mevduat_veri" class="btn btn-primary" data-dismiss="modal">Bu tutarla işleme devam et</button>
                        </div>
                    </div>
                </div>
        </div>

        </p>
    </div>
</div>
</div>
<!-- Sayfada çalışacak olan JS klasörlerinin dahil edilmesi  -->
<script src="js/mevduatVeri.js"></script>
<script src="js/ui.js"></script>
<script src="js/currency.js"></script>
<script src="js/app.js"></script>

<!-- Footer'ın dahil edilmesi  -->
<?php require_once "footer.php" ?>
