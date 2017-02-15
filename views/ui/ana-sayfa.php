<div class="m-t-90"></div>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1><i class="fa fa-wpexplorer" aria-hidden="true"></i> SIRA BULUCU</h1>
            <p>Google ile bulmak istediğiniz kelimeyi girin, web sitenizin adresini ekleyin, Kontrol et'i tıklatın.</p>
            <form action="<?php echo BASE_URL; ?>/kp" id="form_sira_bul" name="form_sira_bul" method="post" enctype="multipart/form-data" class="form-inline m-b-20">
                <div class="form-group">                        
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-i-cursor" aria-hidden="true"></i></div>
                        <input ng-model="sb.q" id="q" name="q" type="text" class="form-control" placeholder="Aranacak kelime" required />                            
                    </div>
                    <span ng-show="form_sira_bul.q.$touched && form_sira_bul.q.$invalid" class="required-mesaj">Aranacak kelime gereklidir.</span>
                </div>
                <div class="form-group">                        
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-anchor" aria-hidden="true"></i></div>
                        <input ng-model="sb.site" ng-pattern="/([a-zA-Z0-9]+\.[a-zA-Z]+)\w+/" id="site" name="site" type="text" class="form-control" placeholder="siteadresiniz.com" required />
                    </div>
                    <span ng-show="form_sira_bul.site.$touched && form_sira_bul.site.$invalid" class="required-mesaj">Sitenizin adresi gereklidir.</span>
                </div>
                <div class="form-group">                        
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-globe" aria-hidden="true"></i></div>
                        <select ng-options="cr.name for cr in cr_list track by cr.id" ng-model="sb.cr" name="cr" id="cr" class="form-control">                            
                        </select>
                    </div>
                </div>
                <button ng-click="siraBulClick()" ng-disabled="form_sira_bul.$invalid" type="button" class="btn btn-primary">
                    <i class="fa" ng-class="{'fa-check-circle': !islemYapiliyor['siraBulClick'], 'fa-cog fa-spin': islemYapiliyor['siraBulClick']}" aria-hidden="true"></i> 
                    Kontrol Et
                </button>
            </form> 
        </div>
    </div>
    <div class="row" ng-show="siraResponse != null && !islemYapiliyor['siraBulClick']">
        <div class="col-sm-12">
            <div class="alert alert-success fadeInUp" role="alert"> 
                <h3><i class="fa fa-smile-o" aria-hidden="true"></i> İşte oldu!</h3> 
                <span>{{siraResponse.kelime}} kelimesinin {{siraResponse.tarih}} tarihli {{siraResponse.sunucu}} arama sonuçları</span>
                <br /><span>{{siraResponse.site}} sitesinin {{siraResponse.tarih}} tarihli {{siraResponse.sunucu}} arama motorundaki {{siraResponse.kelime}} arama sonuçlarında, {{siraResponse.site}} <b>{{siraResponse.sira}}</b>. sıradadır</span>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-info-circle" aria-hidden="true"></i> Bilgilerim</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <tbody>                                            
                                <tr>
                                    <td>Sunucu</td>
                                    <td>: {{siraResponse.sunucu}}</td>
                                </tr>
                                <tr>
                                    <td>Ülke</td>
                                    <td>: {{siraResponse.ulke}}</td>
                                </tr>
                                <tr>
                                    <td>Dil</td>
                                    <td>: {{siraResponse.dil}}</td>
                                </tr>
                                <tr>
                                    <td>Kelime</td>
                                    <td>: {{siraResponse.kelime}}</td>
                                </tr>
                                <tr>
                                    <td>Alan Adı</td>
                                    <td>: <b>{{siraResponse.site}}</b></td>
                                </tr>
                                <tr>
                                    <td>Toplam Sonuç</td>
                                    <td>: <b>{{siraResponse.customsearchResponse.searchInformation.totalResults}}</b></td>
                                </tr>
                                <tr>
                                    <td>Sıra</td>
                                    <td>: <b>{{siraResponse.sira}}</b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-info-circle" aria-hidden="true"></i> Rakipler</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <tbody>                                            
                                <tr ng-repeat="diger_site in siraResponse.diger_siteler">
                                    <td><span class="badge">{{$index + 1}}</span></td>
                                    <td><a href="//{{diger_site}}" target="new">{{diger_site}}</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="panel panel-default">                            
                <div class="panel-heading"><i class="fa fa-sort" aria-hidden="true"></i> Sıralama</div>                           
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" colspan="2" class="alert-warning">
                                    Hemen üye olarak sınırsız sorgulama hakkı kazanabilirsiniz, Ayrıca yeni üye olan herkese 15 günlük deneme paketi hediye <a href="<?php echo BASE_URL; ?>/kayit-ol">Hemen Üye Ol</a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="sira in siraResponse.customsearchResponse.items">                                        
                                <td><span class="badge">{{$index + 1}}</span></td>
                                <td><a target="new" href="{{sira.link}}">{{sira.link}}</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>      
</div>