<!DOCTYPE html>
<html lang="en">
	<head>
		<?php
			if((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443){
				$actual_link  = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
				$seo_link   = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
				echo '<link rel="canonical" href="'.$seo_link.'"/>';
			}
		?>
		<!-- Title -->
		<title><?php echo isset($this->pageTitle) ? $this->pageTitle : Yii::app()->name; ?></title>
		<meta charset="utf-8">
		<meta name="author" content="VenturePact">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<!-- Schema.org markup for Google+ -->
		<meta itemprop="name" content="VenturePact - Premium Engineering Teams, On Demand">
		<meta itemprop="description" content="Developing software for your enterprise or start up? Find reliable & pre-screened software services firms to develop your product or scale your software team.">
		<meta itemprop="image" content="https://venturepact.com/fb_post_small.jpg">
		<!-- Twitter Card data -->
		<meta name="twitter:card" content="product">
		<meta name="twitter:site" content="@venturepact">
		<meta name="twitter:title" content="VenturePact - Premium Engineering Teams, On Demand">
		<meta name="twitter:description" content="Developing software for your enterprise or start up? Find reliable & pre-screened software services firms to develop your product or scale your software team.">
		<meta name="twitter:creator" content="@venturepact">
		<meta name="twitter:image" content="https://venturepact.com/fb_post_small.jpg">
		<!-- Open Graph data -->
		<meta property="og:title" content="VenturePact - Premium Engineering Teams, On Demand" />
		<meta property="og:type" content="article" />
		<meta property="og:url" content="https://venturepact.com" />
		<meta property="og:image" content="https://venturepact.com/fb_post_small.jpg" />
		<meta property="og:description" content="Developing software for your enterprise or start up? Find reliable & pre-screened software services firms to develop your product or scale your software team." />
		<meta property="og:site_name" content="VenturePact" />
		<!-- Favicon -->
		<link rel="shortcut icon" href="https://venturepact.com/favicon.ico">

		<!-- Bootstrap core CSS -->
		<link href="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/css/bootstrap.css" rel="stylesheet">
		<!--external css-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/lineicons/style.css">
		<!-- Custom styles for this template -->
		<link href="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/css/style.css" rel="stylesheet">
		<link href="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/css/style-responsive.css" rel="stylesheet">
		<link href="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/css/dash-style.css" rel="stylesheet">
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/js/chart-master/Chart.js"></script>
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<style type="text/css">
		footer {
		position: fixed;
		bottom: 0;
		width: 100%;
}
.parsley-required {
	color: red !important;
	font-size: 11px;
}
.modal-body {
		max-height: calc(100vh - 212px);
		overflow-y: auto;
}
.input-group ul.parsley-errors-list {
	margin: 0;
	padding: 0;
}
.input-group ul.parsley-errors-list li{
	padding: 0;
	position: absolute;
	top: 35px;
	font-size: 11px;
	color: #f00;
	z-index: 99;
}
#cat ~ ul.parsley-errors-list li{
	padding: 0;
	position: absolute;
	top: 35px;
	font-size: 11px;
	color: #f00;
	z-index: 99;
}
.input-group #trial ~ ul li,
.input-group #free ~ ul li {
	top: 60px;
}
		</style>
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/css/bootstrap-multiselect.css">
		<script type="text/javascript">
(function(a){if(window.filepicker){return}var b=a.createElement("script");b.type="text/javascript";b.async=!0;b.src=("https:"===a.location.protocol?"https:":"http:")+"//api.filestackapi.com/filestack.js";var c=a.getElementsByTagName("script")[0];c.parentNode.insertBefore(b,c);var d={};d._queue=[];var e="pick,pickMultiple,pickAndStore,read,write,writeUrl,export,convert,store,storeUrl,remove,stat,setKey,constructWidget,makeDropPane".split(",");var f=function(a,b){return function(){b.push([a,arguments])}};for(var g=0;g<e.length;g++){d[e[g]]=f(e[g],d._queue)}window.filepicker=d})(document);
</script>
	</head>
	<body>
		<section id="container" >
			<!--header start-->
			<header class="header black-bg">
				<div class="sidebar-toggle-box">
					<div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
				</div>
				<!--logo start-->
				<a href="<?php echo Yii::app()->createUrl('/dashboard');?>" class="logo"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/images/vp_icon.png"><b>VenturePact</b></a>
				<!--logo end-->
				<div class="top-menu">
					<ul class="nav pull-right top-menu">
						<li>
						<?php echo CHtml::link('<i class="fa fa-sign-out"></i> Logout',array('/site/logout'),array('class'=>'logout')); ?>
						</li>
					</ul>
				</div>
			</header>
			<!--header end-->
			<!--sidebar start-->
			<?php $product = Product::model()->findAllByAttributes(array('user_id'=>Yii::app()->user->user_id),array('select'=>'name,id')); ?>
			<aside>
				<div id="sidebar"  class="nav-collapse ">
					<!-- sidebar menu start-->
					<?php $user = Users::model()->findByPk(Yii::app()->user->user_id);?>
					<ul class="sidebar-menu" id="nav-accordion">
						<p class="centered"><a href="#"><img src="<?php echo (!empty($user->profile_img))?$user->profile_img:Yii::app()->theme->baseUrl."/style/newhome/images/pic.png";?>" class="img-circle" width="60"></a>
						</p>
							<h5 class="centered">

							<?php echo $user->first_name;?>
							</h5>
							<li class="mt">
								<a id="dashboard" class="active" href="<?php echo Yii::app()->createUrl('/dashboard');?>">
									<i class="fa fa-dashboard"></i>
									<span>Dashboard</span>
								</a>
							</li>

							<li>
								<a id="addProduct" href="javascript:void(0);" data-toggle="modal" data-target="#addNewProduct">
									<i class="fa fa-plus"></i>
									<span>Add Product</span>
								</a>
							</li>

							<li class="sub-menu">
								<a id="editProduct" href="#" >
									<i class="fa fa-pencil"></i>
									<span>Edit Product</span>
								</a>
								<ul class="sub">
									<?php if(count($product) >= 1):?>
											<?php foreach ($product as $prodDetails): ?>
												<li>
													<a href="<?php echo $this->createUrl('Productsetting',array('id'=>$prodDetails->id)); ?>">
														<?php echo $prodDetails->name; ?>
													</a>
												</li>
											<?php endforeach; ?>
									<?php else: ?>
										<li><a href="#">No Product</a></li>
									<?php endif; ?>
								</ul>
							</li>

							<li class="sub-menu">
								<a id="editProduct" href="#" >
									<i class="fa fa-bars"></i>
									<span>Show Stats</span>
								</a>
								<ul class="sub">
									<?php if(count($product) >= 1):?>
											<?php foreach ($product as $prodDetails): ?>
												<li>
													<a href="<?php echo $this->createUrl('ShowStats',array('id'=>$prodDetails->id)); ?>">
														<?php echo $prodDetails->name; ?>
													</a>
												</li>
											<?php endforeach; ?>
									<?php else: ?>
										<li><a href="#">No Product</a></li>
									<?php endif; ?>
								</ul>
							</li>

							<?php if($user->oauth_uid):?>
								<li class="sub-menu">
									<a href="javascript:;" >
										<i class="fa fa-cogs"></i>
										<span>User Account Settings</span>
									</a>
									<ul class="sub">
										<li><a  href="<?php echo $this->createUrl('viewprofile');?>">View Profile</a></li>
										<li><a  href="<?php echo $this->createUrl('socialnetworks');?>">Social Networks</a></li>
									</ul>
								</li>
							<?php else: ?>
								<li>
									<a id="usersetting" href="<?php echo $this->createUrl('usersetting');?>">
										<i class="fa fa-cogs"></i>
										<span>User Account Settings</span>
									</a>
								</li>
							<?php endif; ?>
						</ul>
						<!-- sidebar menu end-->

				</div>
			</aside>
			<!--sidebar end-->
			<!--main content start-->
			<section id="main-content">
				<?php echo $content;?>

			</section>
		<!--footer start-->
			<footer class="site-footer">
				<div class="text-center">
					2016 - VenturePact
				</div>
			</footer>
		<!--footer end-->
		</section>

	<div id="addNewProduct" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Add New Product</h4>
				</div>
				<?php $form=$this->beginWidget('CActiveForm', array('id'=>"formAddNewProduct",'enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true),'htmlOptions'=>array('class'=>"panel-default",'data-parsley-validate'=>'data-parsley-validate')));?>
					<div class="modal-body">

					<label>Company Name</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-building"></i>
							</span>
							<input type="text" class="form-control" name="company_name" placeholder="Company Name" data-parsley-trigger="focusout" required>
						</div><br>
						<label>Founding Year</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</span>
							<input type="text" class="form-control" name="founding_year" placeholder="Company Founding Year" data-parsley-trigger="focusout" required='required' data-parsley-type="digits" data-parsley-minlength="4">
						</div><br>
						<label>Founding Country</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-globe"></i>
							</span>
							<select class="form-control" name="founding_country" placeholder="Company Founding Country" data-parsley-trigger="focusout" required='required' id="Product_founding_country">
<option value="">Select Country</option>
<option value="Afghanistan">AFGHANISTAN</option>
<option value="Albania">ALBANIA</option>
<option value="Algeria">ALGERIA</option>
<option value="American Samoa">AMERICAN SAMOA</option>
<option value="Andorra">ANDORRA</option>
<option value="Angola">ANGOLA</option>
<option value="Anguilla">ANGUILLA</option>
<option value="Antarctica">ANTARCTICA</option>
<option value="Antigua and Barbuda">ANTIGUA AND BARBUDA</option>
<option value="Argentina">ARGENTINA</option>
<option value="Armenia">ARMENIA</option>
<option value="Aruba">ARUBA</option>
<option value="Australia">AUSTRALIA</option>
<option value="Austria">AUSTRIA</option>
<option value="Azerbaijan">AZERBAIJAN</option>
<option value="Bahamas">BAHAMAS</option>
<option value="Bahrain">BAHRAIN</option>
<option value="Bangladesh">BANGLADESH</option>
<option value="Barbados">BARBADOS</option>
<option value="Belarus">BELARUS</option>
<option value="Belgium">BELGIUM</option>
<option value="Belize">BELIZE</option>
<option value="Benin">BENIN</option>
<option value="Bermuda">BERMUDA</option>
<option value="Bhutan">BHUTAN</option>
<option value="Bolivia">BOLIVIA</option>
<option value="Bosnia and Herzegovina">BOSNIA AND HERZEGOVINA</option>
<option value="Botswana">BOTSWANA</option>
<option value="Bouvet Island">BOUVET ISLAND</option>
<option value="Brazil">BRAZIL</option>
<option value="British Indian Ocean Territory">BRITISH INDIAN OCEAN TERRITORY</option>
<option value="Brunei Darussalam">BRUNEI DARUSSALAM</option>
<option value="Bulgaria">BULGARIA</option>
<option value="Burkina Faso">BURKINA FASO</option>
<option value="Burundi">BURUNDI</option>
<option value="Cambodia">CAMBODIA</option>
<option value="Cameroon">CAMEROON</option>
<option value="Canada">CANADA</option>
<option value="Cape Verde">CAPE VERDE</option>
<option value="Cayman Islands">CAYMAN ISLANDS</option>
<option value="Central African Republic">CENTRAL AFRICAN REPUBLIC</option>
<option value="Chad">CHAD</option>
<option value="Chile">CHILE</option>
<option value="China">CHINA</option>
<option value="Christmas Island">CHRISTMAS ISLAND</option>
<option value="Cocos (Keeling) Islands">COCOS (KEELING) ISLANDS</option>
<option value="Colombia">COLOMBIA</option>
<option value="Comoros">COMOROS</option>
<option value="Congo">CONGO</option>
<option value="Congo, the Democratic Republic of the">CONGO, THE DEMOCRATIC REPUBLIC OF THE</option>
<option value="Cook Islands">COOK ISLANDS</option>
<option value="Costa Rica">COSTA RICA</option>
<option value="Cote D&#039;Ivoire">COTE D&#039;IVOIRE</option>
<option value="Croatia">CROATIA</option>
<option value="Cuba">CUBA</option>
<option value="Cyprus">CYPRUS</option>
<option value="Czech Republic">CZECH REPUBLIC</option>
<option value="Denmark">DENMARK</option>
<option value="Djibouti">DJIBOUTI</option>
<option value="Dominica">DOMINICA</option>
<option value="Dominican Republic">DOMINICAN REPUBLIC</option>
<option value="Ecuador">ECUADOR</option>
<option value="Egypt">EGYPT</option>
<option value="El Salvador">EL SALVADOR</option>
<option value="Equatorial Guinea">EQUATORIAL GUINEA</option>
<option value="Eritrea">ERITREA</option>
<option value="Estonia">ESTONIA</option>
<option value="Ethiopia">ETHIOPIA</option>
<option value="Falkland Islands (Malvinas)">FALKLAND ISLANDS (MALVINAS)</option>
<option value="Faroe Islands">FAROE ISLANDS</option>
<option value="Fiji">FIJI</option>
<option value="Finland">FINLAND</option>
<option value="France">FRANCE</option>
<option value="French Guiana">FRENCH GUIANA</option>
<option value="French Polynesia">FRENCH POLYNESIA</option>
<option value="French Southern Territories">FRENCH SOUTHERN TERRITORIES</option>
<option value="Gabon">GABON</option>
<option value="Gambia">GAMBIA</option>
<option value="Georgia">GEORGIA</option>
<option value="Germany">GERMANY</option>
<option value="Ghana">GHANA</option>
<option value="Gibraltar">GIBRALTAR</option>
<option value="Greece">GREECE</option>
<option value="Greenland">GREENLAND</option>
<option value="Grenada">GRENADA</option>
<option value="Guadeloupe">GUADELOUPE</option>
<option value="Guam">GUAM</option>
<option value="Guatemala">GUATEMALA</option>
<option value="Guinea">GUINEA</option>
<option value="Guinea-Bissau">GUINEA-BISSAU</option>
<option value="Guyana">GUYANA</option>
<option value="Haiti">HAITI</option>
<option value="Heard Island and Mcdonald Islands">HEARD ISLAND AND MCDONALD ISLANDS</option>
<option value="Holy See (Vatican City State)">HOLY SEE (VATICAN CITY STATE)</option>
<option value="Honduras">HONDURAS</option>
<option value="Hong Kong">HONG KONG</option>
<option value="Hungary">HUNGARY</option>
<option value="Iceland">ICELAND</option>
<option value="India">INDIA</option>
<option value="Indonesia">INDONESIA</option>
<option value="Iran, Islamic Republic of">IRAN, ISLAMIC REPUBLIC OF</option>
<option value="Iraq">IRAQ</option>
<option value="Ireland">IRELAND</option>
<option value="Israel">ISRAEL</option>
<option value="Italy">ITALY</option>
<option value="Jamaica">JAMAICA</option>
<option value="Japan">JAPAN</option>
<option value="Jordan">JORDAN</option>
<option value="Kazakhstan">KAZAKHSTAN</option>
<option value="Kenya">KENYA</option>
<option value="Kiribati">KIRIBATI</option>
<option value="Korea, Democratic People&#039;s Republic of">KOREA, DEMOCRATIC PEOPLE&#039;S REPUBLIC OF</option>
<option value="Korea, Republic of">KOREA, REPUBLIC OF</option>
<option value="Kuwait">KUWAIT</option>
<option value="Kyrgyzstan">KYRGYZSTAN</option>
<option value="Lao People&#039;s Democratic Republic">LAO PEOPLE&#039;S DEMOCRATIC REPUBLIC</option>
<option value="Latvia">LATVIA</option>
<option value="Lebanon">LEBANON</option>
<option value="Lesotho">LESOTHO</option>
<option value="Liberia">LIBERIA</option>
<option value="Libyan Arab Jamahiriya">LIBYAN ARAB JAMAHIRIYA</option>
<option value="Liechtenstein">LIECHTENSTEIN</option>
<option value="Lithuania">LITHUANIA</option>
<option value="Luxembourg">LUXEMBOURG</option>
<option value="Macao">MACAO</option>
<option value="Macedonia, the Former Yugoslav Republic of">MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF</option>
<option value="Madagascar">MADAGASCAR</option>
<option value="Malawi">MALAWI</option>
<option value="Malaysia">MALAYSIA</option>
<option value="Maldives">MALDIVES</option>
<option value="Mali">MALI</option>
<option value="Malta">MALTA</option>
<option value="Marshall Islands">MARSHALL ISLANDS</option>
<option value="Martinique">MARTINIQUE</option>
<option value="Mauritania">MAURITANIA</option>
<option value="Mauritius">MAURITIUS</option>
<option value="Mayotte">MAYOTTE</option>
<option value="Mexico">MEXICO</option>
<option value="Micronesia, Federated States of">MICRONESIA, FEDERATED STATES OF</option>
<option value="Moldova, Republic of">MOLDOVA, REPUBLIC OF</option>
<option value="Monaco">MONACO</option>
<option value="Mongolia">MONGOLIA</option>
<option value="Montserrat">MONTSERRAT</option>
<option value="Morocco">MOROCCO</option>
<option value="Mozambique">MOZAMBIQUE</option>
<option value="Myanmar">MYANMAR</option>
<option value="Namibia">NAMIBIA</option>
<option value="Nauru">NAURU</option>
<option value="Nepal">NEPAL</option>
<option value="Netherlands">NETHERLANDS</option>
<option value="Netherlands Antilles">NETHERLANDS ANTILLES</option>
<option value="New Caledonia">NEW CALEDONIA</option>
<option value="New Zealand">NEW ZEALAND</option>
<option value="Nicaragua">NICARAGUA</option>
<option value="Niger">NIGER</option>
<option value="Nigeria">NIGERIA</option>
<option value="Niue">NIUE</option>
<option value="Norfolk Island">NORFOLK ISLAND</option>
<option value="Northern Mariana Islands">NORTHERN MARIANA ISLANDS</option>
<option value="Norway">NORWAY</option>
<option value="Oman">OMAN</option>
<option value="Pakistan">PAKISTAN</option>
<option value="Palau">PALAU</option>
<option value="Palestinian Territory, Occupied">PALESTINIAN TERRITORY, OCCUPIED</option>
<option value="Panama">PANAMA</option>
<option value="Papua New Guinea">PAPUA NEW GUINEA</option>
<option value="Paraguay">PARAGUAY</option>
<option value="Peru">PERU</option>
<option value="Philippines">PHILIPPINES</option>
<option value="Pitcairn">PITCAIRN</option>
<option value="Poland">POLAND</option>
<option value="Portugal">PORTUGAL</option>
<option value="Puerto Rico">PUERTO RICO</option>
<option value="Qatar">QATAR</option>
<option value="Reunion">REUNION</option>
<option value="Romania">ROMANIA</option>
<option value="Russian Federation">RUSSIAN FEDERATION</option>
<option value="Rwanda">RWANDA</option>
<option value="Saint Helena">SAINT HELENA</option>
<option value="Saint Kitts and Nevis">SAINT KITTS AND NEVIS</option>
<option value="Saint Lucia">SAINT LUCIA</option>
<option value="Saint Pierre and Miquelon">SAINT PIERRE AND MIQUELON</option>
<option value="Saint Vincent and the Grenadines">SAINT VINCENT AND THE GRENADINES</option>
<option value="Samoa">SAMOA</option>
<option value="San Marino">SAN MARINO</option>
<option value="Sao Tome and Principe">SAO TOME AND PRINCIPE</option>
<option value="Saudi Arabia">SAUDI ARABIA</option>
<option value="Senegal">SENEGAL</option>
<option value="Serbia and Montenegro">SERBIA AND MONTENEGRO</option>
<option value="Seychelles">SEYCHELLES</option>
<option value="Sierra Leone">SIERRA LEONE</option>
<option value="Singapore">SINGAPORE</option>
<option value="Slovakia">SLOVAKIA</option>
<option value="Slovenia">SLOVENIA</option>
<option value="Solomon Islands">SOLOMON ISLANDS</option>
<option value="Somalia">SOMALIA</option>
<option value="South Africa">SOUTH AFRICA</option>
<option value="South Georgia and the South Sandwich Islands">SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS</option>
<option value="Spain">SPAIN</option>
<option value="Sri Lanka">SRI LANKA</option>
<option value="Sudan">SUDAN</option>
<option value="Suriname">SURINAME</option>
<option value="Svalbard and Jan Mayen">SVALBARD AND JAN MAYEN</option>
<option value="Swaziland">SWAZILAND</option>
<option value="Sweden">SWEDEN</option>
<option value="Switzerland">SWITZERLAND</option>
<option value="Syrian Arab Republic">SYRIAN ARAB REPUBLIC</option>
<option value="Taiwan, Province of China">TAIWAN, PROVINCE OF CHINA</option>
<option value="Tajikistan">TAJIKISTAN</option>
<option value="Tanzania, United Republic of">TANZANIA, UNITED REPUBLIC OF</option>
<option value="Thailand">THAILAND</option>
<option value="Timor-Leste">TIMOR-LESTE</option>
<option value="Togo">TOGO</option>
<option value="Tokelau">TOKELAU</option>
<option value="Tonga">TONGA</option>
<option value="Trinidad and Tobago">TRINIDAD AND TOBAGO</option>
<option value="Tunisia">TUNISIA</option>
<option value="Turkey">TURKEY</option>
<option value="Turkmenistan">TURKMENISTAN</option>
<option value="Turks and Caicos Islands">TURKS AND CAICOS ISLANDS</option>
<option value="Tuvalu">TUVALU</option>
<option value="Uganda">UGANDA</option>
<option value="Ukraine">UKRAINE</option>
<option value="United Arab Emirates">UNITED ARAB EMIRATES</option>
<option value="United Kingdom">UNITED KINGDOM</option>
<option value="United States">UNITED STATES</option>
<option value="United States Minor Outlying Islands">UNITED STATES MINOR OUTLYING ISLANDS</option>
<option value="Uruguay">URUGUAY</option>
<option value="Uzbekistan">UZBEKISTAN</option>
<option value="Vanuatu">VANUATU</option>
<option value="Venezuela">VENEZUELA</option>
<option value="Viet Nam">VIET NAM</option>
<option value="Virgin Islands, British">VIRGIN ISLANDS, BRITISH</option>
<option value="Virgin Islands, U.s.">VIRGIN ISLANDS, U.S.</option>
<option value="Wallis and Futuna">WALLIS AND FUTUNA</option>
<option value="Western Sahara">WESTERN SAHARA</option>
<option value="Yemen">YEMEN</option>
<option value="Zambia">ZAMBIA</option>
<option value="Zimbabwe">ZIMBABWE</option>
</select>
						</div><br>
						<label>Company Website</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-internet-explorer"></i>
							</span>
							<input type="text" class="form-control" name="company_website" placeholder="Company Website" data-parsley-trigger="focusout" required='required' data-parsley-type="url">
						</div><br>
						<label>Product Name</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-star-empty"></i>
							</span>
							<input type="text" class="form-control" name="product_name" placeholder="Product Name" id="productName" data-parsley-trigger="focusout" required='required'>
						</div><br>
						<label>Product Description</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-pencil"></i>
							</span>
							<textarea class="form-control" name="product_description" placeholder="Product Description" id="productDescription" data-parsley-trigger="focusout" required='required' data-parsley-minlength="20"></textarea>
						</div><br>
						<label>Product Website</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-internet-explorer"></i>
							</span>
							<input type="text" class="form-control" name="product_website" placeholder="Product Website" id="productWebsite" data-parsley-trigger="focusout" required='required' data-parsley-type="url">
						</div><br>
						<label>Product Category</label>
						<div class="input-group" id="#cat">
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-bookmark"></i>
							</span>
							<?php
							$categories = Categories::model()->findAll();
							$category = new Categories;
							/*$categoryNames = array();
							foreach ($categories as $category)
								array_push($categoryNames,$category->name);*/
							$categoryNames = CHtml::listData($categories,'id','name');

							echo $form->dropDownList($category,'id',$categoryNames,array('id'=>"productCategory",'multiple'=>"multiple",'class'=>'form-control','onchange'=>"getFeatures()",'required'=>'required','data-parsley-trigger'=>"focusout"));
							?>

						</div><br>
						<label>Product Features</label>
						<div class="input-group" id="features_list">
						</div><br>
						<label>Starting Price</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-money"></i>
							</span>
							<input type="text" class="form-control" name="starting_price" placeholder="Product's Starting Price" id="startingPrice">
						</div><br>
						<label>Number of users</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-users"></i>
							</span>
							<input class="form-control" type="text" name="user_count" placeholder="Number of user counts" id="user_count"value="0" data-parsley-trigger="focusout" data-parsley-type="digits">
						</div><br>
						<div class="input-group">
							<label>Trial Available</label>
							<select name="trial" id="trial" class="form-control" required='required',data-parsley-trigger="focusout">
								<option value="">Select</option>
								<option value="trial">Yes</option>
								<option value="no_trial">No</option>
							</select>
						</div><br>
						<div class="input-group">
							<label>Free Version Available</label>
							<select name="free_version" id="free" class="form-control" required='required',data-parsley-trigger="focusout">
								<option value="">select</option>
								<option value="free">Yes</option>
								<option value="not_free">No</option>
							</select>
						</div><br>
						<label>Deployment Details</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="glyphicon glyphicons-life-preserver"></i>
							</span>
							<select class="form-control" multiple="multiple" id="deployment" name="deployment_features[]" required='required',data-parsley-trigger="focusout">
								<option value="1" name="web">Web Based</option>
								<option value="2">Desktop</option>
								<option value="3">Mobile</option>
							</select>
						</div><br>
					</div>
					<div class="modal-footer">            
						<?php echo CHtml::htmlButton('Add',array('onclick'=>'send();','class'=>'btn btn-primary')); ?>
					</div>
				<?php $this->endWidget(); ?>
			</div>
		</div>
	</div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	 <!--  <script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/js/jquery-1.8.3.min.js"></script> -->
	 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.0.7/parsley.min.js" async></script>
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/js/bootstrap.min.js"></script>
		<script class="include" type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/js/jquery.dcjqaccordion.2.7.js"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/js/jquery.scrollTo.min.js"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/js/jquery.nicescroll.js" type="text/javascript"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/js/jquery.sparkline.js"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/js/common-scripts.js"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/js/sparkline-chart.js"></script>


<script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/js/prettify.js"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/js/bootstrap-multiselect.js"></script>

<script type="text/javascript">

	$(document).ready(function(){
		$('#category').multiselect({
			enableFiltering: true
		});
		$('#features').multiselect({
			enableFiltering: true
		});
		$('#productCategory').multiselect({
			enableFiltering: true
		});
		$('#productFeatures').multiselect({
			enableFiltering: true
		});
		$('#deployment').multiselect({
			enableFiltering: true
		});
	});

	function send()
 {
	if($("#formAddNewProduct").parsley().validate()){
	var data = $("#formAddNewProduct").serialize();
	console.log(data);
	$.ajax({
		type: 'POST',
		url: '<?php echo Yii::app()->createUrl("dashboard/addproduct"); ?>',
		data: data,
		success: function(data)
		{
			alert("Product listed");
		},
		error: function(data)
		{
			alert("failed");
		}
	})
}
 }

 function getFeatures()
 {
	var data = $('#productCategory').val();
	console.log(data);
	$.ajax({
		type: 'POST',
		url: '<?php echo Yii::app()->createUrl("dashboard/GetFeaturesByID");?>',
		data: {categories : data},
		success: function(data)
		{
			//alert(data);
			$("#features_list").html(data);
			$('#productFeatures').multiselect({
				enableFiltering: true
			});
		},
		error: function(data)
		{
			//alert("failed");
		}
	})
 }
</script>
	</body>
</html>
