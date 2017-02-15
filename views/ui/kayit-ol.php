<div class="container">
    <div class="row">
        <div class="col-xs-6">
			<form action="<?php echo BASE_URL; ?>/kayit-ol/post" id="form_kayit_ol" name="form_kayit_ol" method="post" enctype="multipart/form-data">
			<fieldset>
				<legend>Kayıt Ol</legend>
			  <div class="form-group">
				<label for="mail">Mail</label>
				<input type="email" class="form-control" ng-model="kisi.mail" id="mail" name="mail" placeholder="Mail" required />
				<span ng-show="form_kayit_ol.mail.$touched && form_kayit_ol.mail.$invalid" class="required-mesaj">Mail gereklidir.</span>
			  </div>
			  <div class="form-group">
				<label for="adi_soyadi">Ad Soyad</label>
				<input type="text" class="form-control" ng-model="kisi.adi_soyadi" id="adi_soyadi" name="adi_soyadi" placeholder="Ad Soyad" required />
				<span ng-show="form_kayit_ol.adi_soyadi.$touched && form_kayit_ol.adi_soyadi.$invalid" class="required-mesaj">Ad Soyad gereklidir.</span>
			  </div>
			  <div class="form-group">
				<label for="sifre">Şifre</label>
				<input type="password" class="form-control" ng-model="kisi.sifre" id="sifre" name="sifre" placeholder="Şifre" required />
				<span ng-show="form_kayit_ol.sifre.$touched && form_kayit_ol.sifre.$invalid" class="required-mesaj">Şifre gereklidir.</span>
			  </div>
			  <div class="form-group">
				<label for="sifre2">Şifre Tekrar</label>
				<input type="password" class="form-control" ng-model="kisi.sifre2" id="sifre2" name="sifre2" placeholder="Şifre" required />
				<span ng-show="form_kayit_ol.sifre2.$touched && form_kayit_ol.sifre2.$invalid" class="required-mesaj">Şifre tekrar gereklidir.</span>
				<span ng-show="form_kayit_ol.sifre2.$touched && form_kayit_ol.sifre2.$valid && kisi.sifre!=kisi.sifre2" class="required-mesaj">Şifre uyuşmuyor.</span>
			  </div>
			  <div class="checkbox">
				<label>
				  <input type="checkbox" ng-model="kisi.sozlesme" id="sozlesme" name="sozlesme" required /> <a href="">Kullanım Koşulları</a> Okudum ve Kabul Ediyorum
				</label>
				<span ng-show="form_kayit_ol.sozlesme.$touched && form_kayit_ol.sozlesme.$invalid" class="required-mesaj">Kullanım koşullarını kabul etmediniz!</span>
			  </div>
			  <button ng-click="kayitOlClick()" ng-disabled="form_kayit_ol.$invalid || (form_kayit_ol.sifre2.$valid && kisi.sifre!=kisi.sifre2)" type="button" class="btn btn-primary">
                    <i class="fa" ng-class="{'fa-check-circle': !islemYapiliyor['kayitOlClick'], 'fa-cog fa-spin': islemYapiliyor['kayitOlClick']}" aria-hidden="true"></i> 
                    Kayıt Ol
                </button>
			  </fieldset>
			</form>            
        </div>
    </div>
</div>