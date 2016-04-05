<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl;?>/style/newhome/css/new_prod.css">
<?php $form = $this->beginWidget('CActiveForm',array('id'=>'add_project','enableClientValidation'=>true,'htmlOptions'=>array('class'=>'container-fluid')));?>
<section class="container prod-reg-container">
    <hgroup class="row">
      <h1>Create a free listing on VenturePact</h1>
      <hr class="center-half">
    </hgroup>
    <!-- <form class="container-fluid"> -->
    <div class="container-fluid">

      <h2>About You</h2>
      <div class="row">
        <div class="input-half">
          <i class="fa fa-user col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
          <!-- <input class="col-lg-11 col-md-11 col-sm-11 col-xs-11" type="text" name="first_name" placeholder="First Name"> -->
          <?php echo $form->textField($user,'first_name',array('class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','placeholder'=>'First Name'));?>
        </div>
        <div class="input-half float-right">
          <i class="fa fa-user col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
          <!-- <input class="col-lg-11 col-md-11 col-sm-11 col-xs-11" type="text" name="last_name" placeholder="Last Name"> -->
          <?php echo $form->textField($user,'last_name',array('class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','placeholder'=>'Last Name'));?>
        </div>
      </div>
      <div class="row">
        <div class="input-half">
          <i class="fa fa-envelope col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
          <!-- <input class="col-lg-11 col-md-11 col-sm-11 col-xs-11" type="email" name="email" placeholder="Email"> -->
          <?php echo $form->emailField($user,'username',array('class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','placeholder'=>'Email'));?>
        </div>
        <div class="input-half float-right">
          <i class="fa fa-phone col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
          <!-- <input class="col-lg-11 col-md-11 col-sm-11 col-xs-11" type="text" name="mobile" placeholder="Mobile Number"> -->
          <?php echo $form->textField($user,'phone_number',array('class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','placeholder'=>'Mobile Number'));?>
        </div>
      </div>

      <div class="row">
        <div class="input-half-submit">
          <input type="button" value="Company Detail" id="user"></input>
        </div>
      </div>
      
    <!-- </form>   -->
    </section>
          
  <section class="container prod-reg-container" id="about_company" style="display: none">
  <!-- <form class="container-fluid"> -->
  
        
        <h2>About Your Company</h2>
        <div class="row">
          <div class="input-half">
            <i class="fa fa-building col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
            <!-- <input class="col-lg-11 col-md-11 col-sm-11 col-xs-11" type="text" name="company_name" placeholder="Company Name"> -->
            <?php echo $form->textField($product,'company_name',array('class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','placeholder'=>'company_name'));?>
          </div>
          <div class="input-half float-right">
            <i class="fa fa-globe col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
            <?php
                $countryNames = array("Afghanistan"=>"AFGHANISTAN","Albania"=>"ALBANIA","Algeria"=>"ALGERIA","American Samoa"=>"AMERICAN SAMOA","Andorra"=>"ANDORRA","Angola"=>"ANGOLA","Anguilla"=>"ANGUILLA","Antarctica"=>"ANTARCTICA","Antigua and Barbuda"=>"ANTIGUA AND BARBUDA","Argentina"=>"ARGENTINA","Armenia"=>"ARMENIA","Aruba"=>"ARUBA","Australia"=>"AUSTRALIA","Austria"=>"AUSTRIA","Azerbaijan"=>"AZERBAIJAN","Bahamas"=>"BAHAMAS","Bahrain"=>"BAHRAIN","Bangladesh"=>"BANGLADESH","Barbados"=>"BARBADOS","Belarus"=>"BELARUS","Belgium"=>"BELGIUM","Belize"=>"BELIZE","Benin"=>"BENIN","Bermuda"=>"BERMUDA","Bhutan"=>"BHUTAN","Bolivia"=>"BOLIVIA","Bosnia and Herzegovina"=>"BOSNIA AND HERZEGOVINA","Botswana"=>"BOTSWANA","Bouvet Island"=>"BOUVET ISLAND","Brazil"=>"BRAZIL","British Indian Ocean Territory"=>"BRITISH INDIAN OCEAN TERRITORY","Brunei Darussalam"=>"BRUNEI DARUSSALAM","Bulgaria"=>"BULGARIA","Burkina Faso"=>"BURKINA FASO","Burundi"=>"BURUNDI","Cambodia"=>"CAMBODIA","Cameroon"=>"CAMEROON","Canada"=>"CANADA","Cape Verde"=>"CAPE VERDE","Cayman Islands"=>"CAYMAN ISLANDS","Central African Republic"=>"CENTRAL AFRICAN REPUBLIC","Chad"=>"CHAD","Chile"=>"CHILE","China"=>"CHINA","Christmas Island"=>"CHRISTMAS ISLAND","Cocos (Keeling) Islands"=>"COCOS (KEELING) ISLANDS","Colombia"=>"COLOMBIA","Comoros"=>"COMOROS","Congo"=>"CONGO","Congo, the Democratic Republic of the"=>"CONGO, THE DEMOCRATIC REPUBLIC OF THE","Cook Islands"=>"COOK ISLANDS","Costa Rica"=>"COSTA RICA","Cote D'Ivoire"=>"COTE D'IVOIRE","Croatia"=>"CROATIA","Cuba"=>"CUBA","Cyprus"=>"CYPRUS","Czech Republic"=>"CZECH REPUBLIC","Denmark"=>"DENMARK","Djibouti"=>"DJIBOUTI","Dominica"=>"DOMINICA","Dominican Republic"=>"DOMINICAN REPUBLIC","Ecuador"=>"ECUADOR","Egypt"=>"EGYPT","El Salvador"=>"EL SALVADOR","Equatorial Guinea"=>"EQUATORIAL GUINEA","Eritrea"=>"ERITREA","Estonia"=>"ESTONIA","Ethiopia"=>"ETHIOPIA","Falkland Islands (Malvinas)"=>"FALKLAND ISLANDS (MALVINAS)","Faroe Islands"=>"FAROE ISLANDS","Fiji"=>"FIJI","Finland"=>"FINLAND","France"=>"FRANCE","French Guiana"=>"FRENCH GUIANA","French Polynesia"=>"FRENCH POLYNESIA","French Southern Territories"=>"FRENCH SOUTHERN TERRITORIES","Gabon"=>"GABON","Gambia"=>"GAMBIA","Georgia"=>"GEORGIA","Germany"=>"GERMANY","Ghana"=>"GHANA","Gibraltar"=>"GIBRALTAR","Greece"=>"GREECE","Greenland"=>"GREENLAND","Grenada"=>"GRENADA","Guadeloupe"=>"GUADELOUPE","Guam"=>"GUAM","Guatemala"=>"GUATEMALA","Guinea"=>"GUINEA","Guinea-Bissau"=>"GUINEA-BISSAU","Guyana"=>"GUYANA","Haiti"=>"HAITI","Heard Island and Mcdonald Islands"=>"HEARD ISLAND AND MCDONALD ISLANDS","Holy See (Vatican City State)"=>"HOLY SEE (VATICAN CITY STATE)","Honduras"=>"HONDURAS","Hong Kong"=>"HONG KONG","Hungary"=>"HUNGARY","Iceland"=>"ICELAND","India"=>"INDIA","Indonesia"=>"INDONESIA","Iran, Islamic Republic of"=>"IRAN, ISLAMIC REPUBLIC OF","Iraq"=>"IRAQ","Ireland"=>"IRELAND","Israel"=>"ISRAEL","Italy"=>"ITALY","Jamaica"=>"JAMAICA","Japan"=>"JAPAN","Jordan"=>"JORDAN","Kazakhstan"=>"KAZAKHSTAN","Kenya"=>"KENYA","Kiribati"=>"KIRIBATI","Korea, Democratic People's Republic of"=>"KOREA, DEMOCRATIC PEOPLE'S REPUBLIC OF","Korea, Republic of"=>"KOREA, REPUBLIC OF","Kuwait"=>"KUWAIT","Kyrgyzstan"=>"KYRGYZSTAN","Lao People's Democratic Republic"=>"LAO PEOPLE'S DEMOCRATIC REPUBLIC","Latvia"=>"LATVIA","Lebanon"=>"LEBANON","Lesotho"=>"LESOTHO","Liberia"=>"LIBERIA","Libyan Arab Jamahiriya"=>"LIBYAN ARAB JAMAHIRIYA","Liechtenstein"=>"LIECHTENSTEIN","Lithuania"=>"LITHUANIA","Luxembourg"=>"LUXEMBOURG","Macao"=>"MACAO","Macedonia, the Former Yugoslav Republic of"=>"MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF","Madagascar"=>"MADAGASCAR","Malawi"=>"MALAWI","Malaysia"=>"MALAYSIA","Maldives"=>"MALDIVES","Mali"=>"MALI","Malta"=>"MALTA","Marshall Islands"=>"MARSHALL ISLANDS","Martinique"=>"MARTINIQUE","Mauritania"=>"MAURITANIA","Mauritius"=>"MAURITIUS","Mayotte"=>"MAYOTTE","Mexico"=>"MEXICO","Micronesia, Federated States of"=>"MICRONESIA, FEDERATED STATES OF","Moldova, Republic of"=>"MOLDOVA, REPUBLIC OF","Monaco"=>"MONACO","Mongolia"=>"MONGOLIA","Montserrat"=>"MONTSERRAT","Morocco"=>"MOROCCO","Mozambique"=>"MOZAMBIQUE","Myanmar"=>"MYANMAR","Namibia"=>"NAMIBIA","Nauru"=>"NAURU","Nepal"=>"NEPAL","Netherlands"=>"NETHERLANDS","Netherlands Antilles"=>"NETHERLANDS ANTILLES","New Caledonia"=>"NEW CALEDONIA","New Zealand"=>"NEW ZEALAND","Nicaragua"=>"NICARAGUA","Niger"=>"NIGER","Nigeria"=>"NIGERIA","Niue"=>"NIUE","Norfolk Island"=>"NORFOLK ISLAND","Northern Mariana Islands"=>"NORTHERN MARIANA ISLANDS","Norway"=>"NORWAY","Oman"=>"OMAN","Pakistan"=>"PAKISTAN","Palau"=>"PALAU","Palestinian Territory, Occupied"=>"PALESTINIAN TERRITORY, OCCUPIED","Panama"=>"PANAMA","Papua New Guinea"=>"PAPUA NEW GUINEA","Paraguay"=>"PARAGUAY","Peru"=>"PERU","Philippines"=>"PHILIPPINES","Pitcairn"=>"PITCAIRN","Poland"=>"POLAND","Portugal"=>"PORTUGAL","Puerto Rico"=>"PUERTO RICO","Qatar"=>"QATAR","Reunion"=>"REUNION","Romania"=>"ROMANIA","Russian Federation"=>"RUSSIAN FEDERATION","Rwanda"=>"RWANDA","Saint Helena"=>"SAINT HELENA","Saint Kitts and Nevis"=>"SAINT KITTS AND NEVIS","Saint Lucia"=>"SAINT LUCIA","Saint Pierre and Miquelon"=>"SAINT PIERRE AND MIQUELON","Saint Vincent and the Grenadines"=>"SAINT VINCENT AND THE GRENADINES","Samoa"=>"SAMOA","San Marino"=>"SAN MARINO","Sao Tome and Principe"=>"SAO TOME AND PRINCIPE","Saudi Arabia"=>"SAUDI ARABIA","Senegal"=>"SENEGAL","Serbia and Montenegro"=>"SERBIA AND MONTENEGRO","Seychelles"=>"SEYCHELLES","Sierra Leone"=>"SIERRA LEONE","Singapore"=>"SINGAPORE","Slovakia"=>"SLOVAKIA","Slovenia"=>"SLOVENIA","Solomon Islands"=>"SOLOMON ISLANDS","Somalia"=>"SOMALIA","South Africa"=>"SOUTH AFRICA","South Georgia and the South Sandwich Islands"=>"SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS","Spain"=>"SPAIN","Sri Lanka"=>"SRI LANKA","Sudan"=>"SUDAN","Suriname"=>"SURINAME","Svalbard and Jan Mayen"=>"SVALBARD AND JAN MAYEN","Swaziland"=>"SWAZILAND","Sweden"=>"SWEDEN","Switzerland"=>"SWITZERLAND","Syrian Arab Republic"=>"SYRIAN ARAB REPUBLIC","Taiwan, Province of China"=>"TAIWAN, PROVINCE OF CHINA","Tajikistan"=>"TAJIKISTAN","Tanzania, United Republic of"=>"TANZANIA, UNITED REPUBLIC OF","Thailand"=>"THAILAND","Timor-Leste"=>"TIMOR-LESTE","Togo"=>"TOGO","Tokelau"=>"TOKELAU","Tonga"=>"TONGA","Trinidad and Tobago"=>"TRINIDAD AND TOBAGO","Tunisia"=>"TUNISIA","Turkey"=>"TURKEY","Turkmenistan"=>"TURKMENISTAN","Turks and Caicos Islands"=>"TURKS AND CAICOS ISLANDS","Tuvalu"=>"TUVALU","Uganda"=>"UGANDA","Ukraine"=>"UKRAINE","United Arab Emirates"=>"UNITED ARAB EMIRATES","United Kingdom"=>"UNITED KINGDOM","United States"=>"UNITED STATES","United States Minor Outlying Islands"=>"UNITED STATES MINOR OUTLYING ISLANDS","Uruguay"=>"URUGUAY","Uzbekistan"=>"UZBEKISTAN","Vanuatu"=>"VANUATU","Venezuela"=>"VENEZUELA","Viet Nam"=>"VIET NAM","Virgin Islands, British"=>"VIRGIN ISLANDS, BRITISH","Virgin Islands, U.s."=>"VIRGIN ISLANDS, U.S.","Wallis and Futuna"=>"WALLIS AND FUTUNA","Western Sahara"=>"WESTERN SAHARA","Yemen"=>"YEMEN","Zambia"=>"ZAMBIA","Zimbabwe"=>"ZIMBABWE");
              echo $form->dropDownList($product,'founding_country',$countryNames,array('prompt'=>'Select Country','class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11'));?>
          </div>
        </div>
        <div class="row">
          <div class="input-half">
            <i class="fa fa-internet-explorer col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
            <!-- <input class="col-lg-11 col-md-11 col-sm-11 col-xs-11" type="email" name="company_website" placeholder="Company's Website"> -->
            <?php echo $form->textField($product,'company_website',array('class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','placeholder'=>'Company Website'));?>
          </div>
          <div class="input-half float-right">
            <i class="fa fa-calendar col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
            <!-- <input class="col-lg-11 col-md-11 col-sm-11 col-xs-11" type="text" name="founding_year" placeholder="Company's Founding Year"> -->
            <?php echo $form->textField($product,'founding_year',array('class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','placeholder'=>'Founding Year'));?>
          </div>
        </div>
        <div class="row">
        <div class="input-half-submit">
          <input type="button" value="Product Detail" id="company"></input>
        </div>
      </div>
      
        <!-- </form> -->
      </section>

    <section class="container prod-reg-container" id="about_product" style="display: none">
    <!-- <form class="container-fluid"> -->
    

     <h2>About Your Product</h2>
     <div class="row">
       <div class="input-half">
         <i class="fa fa-product-hunt col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
         <!-- <input class="col-lg-11 col-md-11 col-sm-11 col-xs-11" type="text" name="product_name" placeholder="Product's Name"> -->
         <?php echo $form->textField($product,'name',array('class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','placeholder'=>'Product Name'));?>

       </div>
       <div class="input-half float-right">
         <i class="fa fa-internet-explorer col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
         <!-- <input class="col-lg-11 col-md-11 col-sm-11 col-xs-11" type="text" name="product_website" placeholder="Product's Website"> -->
         <?php echo $form->textField($product,'product_website',array('class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','placeholder'=>'Product Website'));?>
       </div>
     </div>
     <div class="row">
       <div class="input-full">
         <i class="fa fa-bars col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
         <!-- <textarea class="col-lg-11 col-md-11 col-sm-11 col-xs-11" placeholder="Product's Description"></textarea> -->
         <?php echo $form->textArea($product,'description',array('class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','placeholder'=>'Product Description'));?>
       </div>
     </div>
     <div class="row">
       <div class="input-half resp-half">
         <i class="fa fa-codiepie col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
         <!-- <select class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
           <option>Select a category</option>
           <option>360 Hosting</option>
           <option>Accouting</option>
         </select> -->
         <?php
          $categories = Categories::model()->findAll();
          
          $list = CHtml::listData($categories,'id','name');
          
          echo $form->dropDownList($category,'id',$list,array('prompt'=>'Select Category','class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11'));
          /*$data= CHtml::listData(Categories::model()->findAll(), 'id', 'name');
          echo $form->widget('ext.EchMultiSelect.EchMultiSelect', array('model'=>$category,
            'dropDownAttribute'=>'name','data'=>$data,'dropDownHtmlOptions'=>array('style'=>'width:378px;')));*/
         ?>
       </div>
       <div class="input-half float-right">
         <i class="fa fa-users col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
         <!-- <input class="col-lg-11 col-md-11 col-sm-11 col-xs-11" type="text" name="user_count" placeholder="Average Customer Count"> -->
         <?php echo $form->textField($product,'customer_count',array('class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','placeholder'=>'Average Customer Count'));?>
       </div>
     </div>
    <div class="row">
      <div class="input-half-radio">
         <input type="radio" id="trial0" name="trial" value="trial" checked></input>
         <label for="trial0" class="col-lg-6">Trial Available</label>
         <input type="radio" id="trial1" name="trial" value="no_trial"></input>
         <label for="trial1" class="col-lg-6">No Trial Available</label>
         <!-- <?php echo $form->radioButtonList($product,'has_trial',array('trial'=>'Has Trial','no_trial'=>'No Trial Available'),array('labelOptions'=>array('class'=>'col-lg-6'),'separator'=>''));?> -->
      </div>
      <div class="input-half-radio float-right">
         <input type="radio" id="free0" name="free_version" value="free" checked></input>
         <label for="free0" class="col-lg-6">Has Free Version</label>
         <input type="radio" id="free1" name="free_version" value="no_free"></input>
         <label for="free1" class="col-lg-6">Only Paid</label>
         <!-- <?php echo $form->radioButtonList($product,'has_free_version',array('free'=>'Has Free Version','no_free'=>'Only Paid'),array('labelOptions'=>array('class'=>'col-lg-6'),'separator'=>''));?> -->
       </div>
    </div>
      <div class="row">
       <div class="input-half">
         <i class="fa fa-money col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
         <!-- <input class="col-lg-11 col-md-11 col-sm-11 col-xs-11" type="text" name="starting_price" placeholder="Product's Starting Price"> -->
         <?php echo $form->textField($product,'starting_price',array('class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','placeholder'=>'Starting Prie'));?>
       </div>
      </div>
      <div class="row">
        <div class="input-half-submit">
          <input type="button" value="Deployment Detail" id="product"></input>
        </div>
      </div>
     <!-- </form> -->
     
     </section>

    <section class="container prod-reg-container" id="product_deployment" style="display: none">
    <!-- <form class="container-fluid"> -->
    

     <h2>Product's Deployment Type</h2>
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 input-triad">
          <input type="checkbox" name="web" id="web">
          <label class="col-lg-12" for="web">
          <i class="fa fa-globe"></i>&nbsp;&nbsp;Web
          </label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 input-triad">
          <input type="checkbox" name="mobile" id="mobile">
          <label class="col-lg-12" for="mobile">
          <i class="fa fa-phone"></i>&nbsp;&nbsp;Mobile
          </label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 input-triad">
          <input type="checkbox" name="desktop" id="desktop">
          <label class="col-lg-12" for="desktop">
           <i class="fa fa-desktop"></i>&nbsp;&nbsp;Desktop
          </label>
        </div>
      </div>
      <div class="row">
        <div class="input-half-submit">
          <input type="button" value="Media Link Detail" id="deployment"></input>
        </div>
      </div>
     <!-- </form> -->
     
     </section>
     
    <section class="container prod-reg-container" id="media_link" style="display: none">
    <!-- <form class="container-fluid"> -->
    

      <h2>Product's Social Media Link</h2>
      <div class="row">
        <div class="input-half">
         <i class="fa fa-google-plus col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
         <!-- <input class="col-lg-11 col-md-11 col-sm-11 col-xs-11" type="text" name="googleplus" placeholder="GooglePlus Link"> -->
         <?php echo $form->textField($product,'googleplus_link',array('class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','placeholder'=>'GooglePlus Link'));?>
        </div>
        <div class="input-half float-right">
         <i class="fa fa-facebook-f col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
         <!-- <input class="col-lg-11 col-md-11 col-sm-11 col-xs-11" type="text" name="facebook" placeholder="Facebook Link"> -->
         <?php echo $form->textField($product,'facebook_link',array('class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','placeholder'=>'Facebook Link'));?>
        </div>
      </div>
      <div class="row">
        <div class="input-half">
          <i class="fa fa-linkedin col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
          <!-- <input class="col-lg-11 col-md-11 col-sm-11 col-xs-11" type="text" name="linkedin" placeholder="Linkedin Link"> -->
          <?php echo $form->textField($product,'linkedin_link',array('class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','placeholder'=>'Linkedin Link'));?>
        </div>
        <div class="input-half float-right">
          <i class="fa fa-youtube col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
          <!-- <input class="col-lg-11 col-md-11 col-sm-11 col-xs-11" type="text" name="youtube" placeholder="Youtube Link"> -->
          <?php echo $form->textField($product,'youtube_link',array('class'=>'col-lg-11 col-md-11 col-sm-11 col-xs-11','placeholder'=>'Youtube Link'));?>
        </div>
      </div>
     <div class="row">
       <div class="input-half-submit">
         <!-- <input type="button" value="Create my free listing" name="submit"></input> -->
         <?php echo CHtml::htmlButton('Create Free Listing',array('onclick'=>'send();','class'=>'btn btn-primary submit-final')); ?>
       </div>
     </div>
  <!-- </form> -->
  </div>
  </section>
  <?php $this->endWidget();?>
<script type="text/javascript">
 $(document).ready(function() {
  $('#user').click(function() {
    $('#about_company').toggle();
    $('#user').toggle();
    $('html,body').animate({
        scrollTop: $('#about_company').css('top')
    }, 1000)
  });
  $('#company').click(function() {
    $('#about_product').toggle();
    $('#company').toggle();
    $('html,body').animate({
        scrollTop: $('#about_product').css('top')
    }, 1000)
  });
  $('#product').click(function() {
    $('#product_deployment').toggle();
    $('#product').toggle();
    $('html,body').animate({
        scrollTop: $('#product_deployment').css('top')
    }, 1000)
  });
  $('#deployment').click(function() {
    $('#media_link').toggle();
    $('#deployment').toggle();
    $('html,body').animate({
        scrollTop: $('#media_link').css('top')
    }, 1000)
  });
});
 function send()
 {
  alert("Hello");
  var data = $("#add_project").serialize();
  console.log(data);
  $.ajax({
    type: 'POST',
    url: '<?php echo Yii::app()->createUrl("product/ProductRegisterSave"); ?>',
    data: data,
    success: function(data)
    {
      alert("success");
    },
    error: function(data)
    {
      alert("failed");
    }
  })
 }
</script>