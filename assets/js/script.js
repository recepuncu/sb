angular.module('app', ['app.controllers'])

angular.module('app.controllers', [])

        .controller('anaCtrl', ['$scope', '$http', '$timeout',
            function ($scope, $http, $timeout) {

                $scope.BASE_URL = 'http://localhost/guzzle';

                $scope.islemYapiliyor = [];

                $scope.cr_list = [
                    {name: "Tümü", id: "-1"},
                    {name: "Afghanistan", id: "countryAF"},
                    {name: "Albania", id: "countryAL"},
                    {name: "Algeria", id: "countryDZ"},
                    {name: "American Samoa", id: "countryAS"},
                    {name: "Andorra", id: "countryAD"},
                    {name: "Angola", id: "countryAO"},
                    {name: "Anguilla", id: "countryAI"},
                    {name: "Antarctica", id: "countryAQ"},
                    {name: "Antigua and Barbuda", id: "countryAG"},
                    {name: "Argentina", id: "countryAR"},
                    {name: "Armenia", id: "countryAM"},
                    {name: "Aruba", id: "countryAW"},
                    {name: "Australia", id: "countryAU"},
                    {name: "Austria", id: "countryAT"},
                    {name: "Azerbaijan", id: "countryAZ"},
                    {name: "Bahamas", id: "countryBS"},
                    {name: "Bahrain", id: "countryBH"},
                    {name: "Bangladesh", id: "countryBD"},
                    {name: "Barbados", id: "countryBB"},
                    {name: "Belarus", id: "countryBY"},
                    {name: "Belgium", id: "countryBE"},
                    {name: "Belize", id: "countryBZ"},
                    {name: "Benin", id: "countryBJ"},
                    {name: "Bermuda", id: "countryBM"},
                    {name: "Bhutan", id: "countryBT"},
                    {name: "Bolivia", id: "countryBO"},
                    {name: "Bosnia and Herzegovina", id: "countryBA"},
                    {name: "Botswana", id: "countryBW"},
                    {name: "Bouvet Island", id: "countryBV"},
                    {name: "Brazil", id: "countryBR"},
                    {name: "British Indian Ocean Territory", id: "countryIO"},
                    {name: "Brunei Darussalam", id: "countryBN"},
                    {name: "Bulgaria", id: "countryBG"},
                    {name: "Burkina Faso", id: "countryBF"},
                    {name: "Burundi", id: "countryBI"},
                    {name: "Cambodia", id: "countryKH"},
                    {name: "Cameroon", id: "countryCM"},
                    {name: "Canada", id: "countryCA"},
                    {name: "Cape Verde", id: "countryCV"},
                    {name: "Cayman Islands", id: "countryKY"},
                    {name: "Central African Republic", id: "countryCF"},
                    {name: "Chad", id: "countryTD"},
                    {name: "Chile", id: "countryCL"},
                    {name: "China", id: "countryCN"},
                    {name: "Christmas Island", id: "countryCX"},
                    {name: "Cocos (Keeling) Islands", id: "countryCC"},
                    {name: "Colombia", id: "countryCO"},
                    {name: "Comoros", id: "countryKM"},
                    {name: "Congo", id: "countryCG"},
                    {name: "Congo, the Democratic Republic of the", id: "countryCD"},
                    {name: "Cook Islands", id: "countryCK"},
                    {name: "Costa Rica", id: "countryCR"},
                    {name: "Cote D'ivoire", id: "countryCI"},
                    {name: "Croatia (Hrvatska)", id: "countryHR"},
                    {name: "Cuba", id: "countryCU"},
                    {name: "Cyprus", id: "countryCY"},
                    {name: "Czech Republic", id: "countryCZ"},
                    {name: "Denmark", id: "countryDK"},
                    {name: "Djibouti", id: "countryDJ"},
                    {name: "Dominica", id: "countryDM"},
                    {name: "Dominican Republic", id: "countryDO"},
                    {name: "East Timor", id: "countryTP"},
                    {name: "Ecuador", id: "countryEC"},
                    {name: "Egypt", id: "countryEG"},
                    {name: "El Salvador", id: "countrySV"},
                    {name: "Equatorial Guinea", id: "countryGQ"},
                    {name: "Eritrea", id: "countryER"},
                    {name: "Estonia", id: "countryEE"},
                    {name: "Ethiopia", id: "countryET"},
                    {name: "European Union", id: "countryEU"},
                    {name: "Falkland Islands (Malvinas)", id: "countryFK"},
                    {name: "Faroe Islands", id: "countryFO"},
                    {name: "Fiji", id: "countryFJ"},
                    {name: "Finland", id: "countryFI"},
                    {name: "France", id: "countryFR"},
                    {name: "France, Metropolitan", id: "countryFX"},
                    {name: "French Guiana", id: "countryGF"},
                    {name: "French Polynesia", id: "countryPF"},
                    {name: "French Southern Territories", id: "countryTF"},
                    {name: "Gabon", id: "countryGA"},
                    {name: "Gambia", id: "countryGM"},
                    {name: "Georgia", id: "countryGE"},
                    {name: "Germany", id: "countryDE"},
                    {name: "Ghana", id: "countryGH"},
                    {name: "Gibraltar", id: "countryGI"},
                    {name: "Greece", id: "countryGR"},
                    {name: "Greenland", id: "countryGL"},
                    {name: "Grenada", id: "countryGD"},
                    {name: "Guadeloupe", id: "countryGP"},
                    {name: "Guam", id: "countryGU"},
                    {name: "Guatemala", id: "countryGT"},
                    {name: "Guinea", id: "countryGN"},
                    {name: "Guinea-Bissau", id: "countryGW"},
                    {name: "Guyana", id: "countryGY"},
                    {name: "Haiti", id: "countryHT"},
                    {name: "Heard Island and Mcdonald Islands", id: "countryHM"},
                    {name: "Holy See (Vatican City State)", id: "countryVA"},
                    {name: "Honduras", id: "countryHN"},
                    {name: "Hong Kong", id: "countryHK"},
                    {name: "Hungary", id: "countryHU"},
                    {name: "Iceland", id: "countryIS"},
                    {name: "India", id: "countryIN"},
                    {name: "Indonesia", id: "countryID"},
                    {name: "Iran, Islamic Republic of", id: "countryIR"},
                    {name: "Iraq", id: "countryIQ"},
                    {name: "Ireland", id: "countryIE"},
                    {name: "Israel", id: "countryIL"},
                    {name: "Italy", id: "countryIT"},
                    {name: "Jamaica", id: "countryJM"},
                    {name: "Japan", id: "countryJP"},
                    {name: "Jordan", id: "countryJO"},
                    {name: "Kazakhstan", id: "countryKZ"},
                    {name: "Kenya", id: "countryKE"},
                    {name: "Kiribati", id: "countryKI"},
                    {name: "Korea, Democratic People's Republic of", id: "countryKP"},
                    {name: "Korea, Republic of", id: "countryKR"},
                    {name: "Kuwait", id: "countryKW"},
                    {name: "Kyrgyzstan", id: "countryKG"},
                    {name: "Lao People's Democratic Republic", id: "countryLA"},
                    {name: "Latvia", id: "countryLV"},
                    {name: "Lebanon", id: "countryLB"},
                    {name: "Lesotho", id: "countryLS"},
                    {name: "Liberia", id: "countryLR"},
                    {name: "Libyan Arab Jamahiriya", id: "countryLY"},
                    {name: "Liechtenstein", id: "countryLI"},
                    {name: "Lithuania", id: "countryLT"},
                    {name: "Luxembourg", id: "countryLU"},
                    {name: "Macao", id: "countryMO"},
                    {name: "Macedonia, the Former Yugosalv Republic of", id: "countryMK"},
                    {name: "Madagascar", id: "countryMG"},
                    {name: "Malawi", id: "countryMW"},
                    {name: "Malaysia", id: "countryMY"},
                    {name: "Maldives", id: "countryMV"},
                    {name: "Mali", id: "countryML"},
                    {name: "Malta", id: "countryMT"},
                    {name: "Marshall Islands", id: "countryMH"},
                    {name: "Martinique", id: "countryMQ"},
                    {name: "Mauritania", id: "countryMR"},
                    {name: "Mauritius", id: "countryMU"},
                    {name: "Mayotte", id: "countryYT"},
                    {name: "Mexico", id: "countryMX"},
                    {name: "Micronesia, Federated States of", id: "countryFM"},
                    {name: "Moldova, Republic of", id: "countryMD"},
                    {name: "Monaco", id: "countryMC"},
                    {name: "Mongolia", id: "countryMN"},
                    {name: "Montserrat", id: "countryMS"},
                    {name: "Morocco", id: "countryMA"},
                    {name: "Mozambique", id: "countryMZ"},
                    {name: "Myanmar", id: "countryMM"},
                    {name: "Namibia", id: "countryNA"},
                    {name: "Nauru", id: "countryNR"},
                    {name: "Nepal", id: "countryNP"},
                    {name: "Netherlands", id: "countryNL"},
                    {name: "Netherlands Antilles", id: "countryAN"},
                    {name: "New Caledonia", id: "countryNC"},
                    {name: "New Zealand", id: "countryNZ"},
                    {name: "Nicaragua", id: "countryNI"},
                    {name: "Niger", id: "countryNE"},
                    {name: "Nigeria", id: "countryNG"},
                    {name: "Niue", id: "countryNU"},
                    {name: "Norfolk Island", id: "countryNF"},
                    {name: "Northern Mariana Islands", id: "countryMP"},
                    {name: "Norway", id: "countryNO"},
                    {name: "Oman", id: "countryOM"},
                    {name: "Pakistan", id: "countryPK"},
                    {name: "Palau", id: "countryPW"},
                    {name: "Palestinian Territory", id: "countryPS"},
                    {name: "Panama", id: "countryPA"},
                    {name: "Papua New Guinea", id: "countryPG"},
                    {name: "Paraguay", id: "countryPY"},
                    {name: "Peru", id: "countryPE"},
                    {name: "Philippines", id: "countryPH"},
                    {name: "Pitcairn", id: "countryPN"},
                    {name: "Poland", id: "countryPL"},
                    {name: "Portugal", id: "countryPT"},
                    {name: "Puerto Rico", id: "countryPR"},
                    {name: "Qatar", id: "countryQA"},
                    {name: "Reunion", id: "countryRE"},
                    {name: "Romania", id: "countryRO"},
                    {name: "Russian Federation", id: "countryRU"},
                    {name: "Rwanda", id: "countryRW"},
                    {name: "Saint Helena", id: "countrySH"},
                    {name: "Saint Kitts and Nevis", id: "countryKN"},
                    {name: "Saint Lucia", id: "countryLC"},
                    {name: "Saint Pierre and Miquelon", id: "countryPM"},
                    {name: "Saint Vincent and the Grenadines", id: "countryVC"},
                    {name: "Samoa", id: "countryWS"},
                    {name: "San Marino", id: "countrySM"},
                    {name: "Sao Tome and Principe", id: "countryST"},
                    {name: "Saudi Arabia", id: "countrySA"},
                    {name: "Senegal", id: "countrySN"},
                    {name: "Serbia and Montenegro", id: "countryCS"},
                    {name: "Seychelles", id: "countrySC"},
                    {name: "Sierra Leone", id: "countrySL"},
                    {name: "Singapore", id: "countrySG"},
                    {name: "Slovakia", id: "countrySK"},
                    {name: "Slovenia", id: "countrySI"},
                    {name: "Solomon Islands", id: "countrySB"},
                    {name: "Somalia", id: "countrySO"},
                    {name: "South Africa", id: "countryZA"},
                    {name: "South Georgia and the South Sandwich Islands", id: "countryGS"},
                    {name: "Spain", id: "countryES"},
                    {name: "Sri Lanka", id: "countryLK"},
                    {name: "Sudan", id: "countrySD"},
                    {name: "Suriname", id: "countrySR"},
                    {name: "Svalbard and Jan Mayen", id: "countrySJ"},
                    {name: "Swaziland", id: "countrySZ"},
                    {name: "Sweden", id: "countrySE"},
                    {name: "Switzerland", id: "countryCH"},
                    {name: "Syrian Arab Republic", id: "countrySY"},
                    {name: "Taiwan, Province of China", id: "countryTW"},
                    {name: "Tajikistan", id: "countryTJ"},
                    {name: "Tanzania, United Republic of", id: "countryTZ"},
                    {name: "Thailand", id: "countryTH"},
                    {name: "Togo", id: "countryTG"},
                    {name: "Tokelau", id: "countryTK"},
                    {name: "Tonga", id: "countryTO"},
                    {name: "Trinidad and Tobago", id: "countryTT"},
                    {name: "Tunisia", id: "countryTN"},
                    {name: "Turkey", id: "countryTR"},
                    {name: "Turkmenistan", id: "countryTM"},
                    {name: "Turks and Caicos Islands", id: "countryTC"},
                    {name: "Tuvalu", id: "countryTV"},
                    {name: "Uganda", id: "countryUG"},
                    {name: "Ukraine", id: "countryUA"},
                    {name: "United Arab Emirates", id: "countryAE"},
                    {name: "United Kingdom", id: "countryUK"},
                    {name: "United States", id: "countryUS"},
                    {name: "United States Minor Outlying Islands", id: "countryUM"},
                    {name: "Uruguay", id: "countryUY"},
                    {name: "Uzbekistan", id: "countryUZ"},
                    {name: "Vanuatu", id: "countryVU"},
                    {name: "Venezuela", id: "countryVE"},
                    {name: "Vietnam", id: "countryVN"},
                    {name: "Virgin Islands, British", id: "countryVG"},
                    {name: "Virgin Islands, U.S.", id: "countryVI"},
                    {name: "Wallis and Futuna", id: "countryWF"},
                    {name: "Western Sahara", id: "countryEH"},
                    {name: "Yemen", id: "countryYE"},
                    {name: "Yugoslavia", id: "countryYU"},
                    {name: "Zambia", id: "countryZM"},
                    {name: "Zimbabwe", id: "countryZW"},
                ];

                $scope.sb = {}
                $scope.sb.cr = {name: "Turkey", id: "countryTR"};

                $scope.siraBulClick = function () {
                    $scope.islemYapiliyor['siraBulClick'] = true;
                    $http({
                        method: 'POST',
                        url: $scope.BASE_URL + '/kp',
                        data: {q: $scope.sb.q, site: $scope.sb.site, cr: $scope.sb.cr.id}
                    }).then(function successCallback(response) {
                        $scope.islemYapiliyor['siraBulClick'] = false;
                        $scope.siraResponse = response.data;
                        console.log($scope.siraResponse);
                    }, function errorCallback(response) {
                        $scope.islemYapiliyor['siraBulClick'] = false;
                    });
                }

                $scope.kayitOlClick = function () {                    
                    $scope.islemYapiliyor['kayitOlClick'] = true;
                    $http({
                        method: 'POST',
                        url: $scope.BASE_URL + '/kayit-ol/post',
                        data: $scope.kisi
                    }).then(function successCallback(response) {
                        $scope.islemYapiliyor['kayitOlClick'] = false;
                        if (response != false) {
                            $.notify({'type': 'success', 'message': '<strong>Kayıt başarılı</strong> Bilgileriniz kayıt edildi!'});
                        }
                    }, function errorCallback(response) {
                        $scope.islemYapiliyor['kayitOlClick'] = false;
                    });
                }
				
				$scope.girisYapClick = function () {                    
                    $scope.islemYapiliyor['girisYapClick'] = true;
                    $http({
                        method: 'POST',
                        url: $scope.BASE_URL + '/giris-yap/post',
                        data: $scope.kisi
                    }).then(function successCallback(response) {
                        $scope.islemYapiliyor['girisYapClick'] = false;						
                        if (response != false) {
							if(response.data.sonuc==true){
								$.notify({
									'type': 'success', 
									'message': '<strong>Giriş başarılı</strong> Panel açılıyor...'									
								});
								setTimeout(function(){
									window.location.href = 'panel';
								}, 1500);
							}else{
								$.notify({'type': 'error', 'message': '<strong>'+response.data.mesaj+'</strong>'});
							}
                        }
                    }, function errorCallback(response) {
                        $scope.islemYapiliyor['girisYapClick'] = false;
                    });
                }

            }])