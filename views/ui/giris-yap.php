<div class="container">
    <div class="row">
        <div class="col-xs-6">
			<form action="<?php echo BASE_URL; ?>/kayit-ol/post" id="form_giris_yap" name="form_giris_yap" method="post" enctype="multipart/form-data">
			<fieldset>
				<legend>Giriş Yap</legend>
			  <div class="form-group">
				<label for="mail">Mail</label>
				<input type="email" class="form-control" ng-model="kisi.mail" id="mail" name="mail" placeholder="Mail" required />
				<span ng-show="form_giris_yap.mail.$touched && form_giris_yap.mail.$invalid" class="required-mesaj">Mail gereklidir.</span>
			  </div>
			  <div class="form-group">
				<label for="sifre">Şifre</label>
				<input type="password" class="form-control" ng-model="kisi.sifre" id="sifre" name="sifre" placeholder="Şifre" required />
				<span ng-show="form_giris_yap.sifre.$touched && form_giris_yap.sifre.$invalid" class="required-mesaj">Şifre gereklidir.</span>
			  </div>			  
			  <button ng-click="girisYapClick()" ng-disabled="form_giris_yap.$invalid || (form_giris_yap.sifre2.$valid && kisi.sifre!=kisi.sifre2)" type="button" class="btn btn-primary">
                    <i class="fa" ng-class="{'fa-check-circle': !islemYapiliyor['girisYapClick'], 'fa-cog fa-spin': islemYapiliyor['girisYapClick']}" aria-hidden="true"></i> 
                    Giriş Yap
                </button>
			  </fieldset>
			</form>            
        </div>
    </div>
</div>