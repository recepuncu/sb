<div class="container">
    <div class="row">
        <div class="col-sm-12">                
            <div class="jumbotron">
                <h2>SIRA BULUCU</h2>
                <p>Google ile bulmak istediğiniz kelimeyi girin, web sitenizin adresini ekleyin, Kontrol et'i tıklatın.</p>                                
                <form action="<?php echo BASE_URL; ?>/kp" id="form_sira_bul" name="form_sira_bul" method="post" enctype="multipart/form-data" class="form-inline m-b-20">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-i-cursor" aria-hidden="true"></i></div>
                            <input ng-model="sb.q" id="q" name="q" type="text" class="form-control" placeholder="Aranan kelime" required />
                        </div>
                    </div>
                    <div class="form-group">                        
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-anchor" aria-hidden="true"></i></div>
                            <input ng-model="sb.site" id="site" name="site" type="text" class="form-control" placeholder="siteadresiniz.com" required />
                        </div>
                    </div>
                    <div class="form-group">                        
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-globe" aria-hidden="true"></i></div>
                            <select ng-model="sb.cr" name="cr" id="cr" class="form-control">
                                <option value="countryTR" selected="">Turkey</option>
                            </select>
                        </div>
                    </div>
                    <button ng-click="siraBulClick(sb)" type="button" class="btn btn-primary">
                        <i class="fa" ng-class="{'fa-check-circle': !islemYapiliyor['siraBulClick'], 'fa-spinner fa-spin': islemYapiliyor['siraBulClick']}" aria-hidden="true"></i> 
                        Kontrol Et
                    </button>
                </form> 
                <div class="alert alert-success" role="alert"> <strong>İşte bu!</strong> sonuçlar aşağıda listelenmiştir. </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">Bilgilerim</div>
                            <div class="panel-body">
                                ...
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="panel panel-default">                            
                            <div class="panel-heading">Sıralama</div>                           
                            <table class="table">
                                <tbody>
                                    <tr ng-repeat="sira in siraListesi">                                        
                                        <td>{{$index + 1}}</td>
                                        <td><a target="new" href="{{sira.link}}">{{sira.link}}</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>