<section class="section1-new">
	<video autoplay="true" controls="false" loop id="bgvid" class="rs-hide">
		<source type="video/webm" src="http://pivot.mediumra.re/video/video.webm">
		<source type="video/ogg" src="http://pivot.mediumra.re/video/video.ogv">
		<source type="video/mp4" src="http://pivot.mediumra.re/video/video.mp4">
	</video>
	<div class="bgimgvid rs-show"></div>
	<div class="container">
		<nav role="navigation" class="navbar navbar-fixed-top pt10"  id="navbar">
			<div class="container">
				<div class="navbar-header">
					<button type="button" data-target="" data-toggle="collapse" class="navbar-toggle menu-icon">
						<span class="sr-only">Toggle navigation</span>
						<i class="fa fa-reorder light-grey"></i>
					</button>
					<div id="search-icon-mob" class="sr-web"><a href="javascript:void(0);"><i class="fa fa-search fs14 light-grey"></i></a></div>
					<div id="postproject-mob" class="sr-web"><a href="<?php echo CController::createUrl('/site/project');?>" class="top-postproject">Post Your Project </a></div>
					<?php
					if(Yii::app()->user->isGuest)
						echo CHtml::link('<img class="rs-logo rs-hide" itemprop="image" src="'.Yii::app()->theme->baseUrl.'/style/newhome/images/logo.png" alt="VenturePact Logo" width="188" height="30">', array('/'),array('class'=>'navbar-brand rs-hide'));
					else
						echo CHtml::link('<img class="rs-logo rs-hide" itemprop="image" src="'.Yii::app()->theme->baseUrl.'/style/newhome/images/logo.png" alt="VenturePact Logo">', array('/'.Yii::app()->user->role),array('class'=>'navbar-brand rs-hide'));
					?>
					<?php
					if(Yii::app()->user->isGuest)
						echo CHtml::link('<img class="mobilelogo-show" itemprop="image" src="'.Yii::app()->theme->baseUrl.'/style/newhome/images/vp-logo.png" alt="VenturePact Logo" width="39" height="26">', array('/'),array('class'=>'navbar-brand'));
					else
						echo CHtml::link('<img class="mobilelogo-show" itemprop="image" src="'.Yii::app()->theme->baseUrl.'/style/newhome/images/vp-logo.png" alt="VenturePact Logo">', array('/'.Yii::app()->user->role),array('class'=>'navbar-brand'));
					?>
				</div>
				<div id="navbarCollapse" class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right mt5">
						<li id="search-icon" class="">
							<a href="javascript:void(0);"><i class="fa fa-search"></i> &nbsp;Search</a>
						</li>
						<li>
							<a href="<?php echo Yii::app()->createUrl('/site/Categories');?>"><i class="fa fa-list"></i> &nbsp; Software Catagories</a>
						</li>
						<li>
							<a href="javascript:void(0);" class="menu-icon"><i class="fa fa-reorder mr5"></i></a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<nav role="navigation" class="navbar navbar-white navbar-fixed-top navbarsearch">
			<div class="container">
				<div id="navbarCollapse" class="navbar-collapse">
					<div class="navsearch-outr placeholder1">
						<span aria-hidden="true" class="icon-magnifier search-searchicon"></span>
						<div class="searcheader placeholder1">
							<form action="<?php echo Yii::app()->createUrl('/product/index');?>" method="get" id="searchFormTop">
								<select id="topsearch" name="value" multiple class="demo-default"  placeholder="What type of software are you looking for?"></select>
							</form>
						</div>
						<a href="javascript:void(0);" class="search-close">X</a>
					</div>
				</div>
			</div>
		</nav>
		<div class="header-text">
			<h1 class="white">
				Find the Right Software for Your Organization
			</h1>
			<h4 class="font_newlight white">
				Every month, VenturePact helps thousands of businesses & nonprofits find the software that will allow them to improve, grow and succeed.
			</h4>
		</div>
		<form action="<?php echo Yii::app()->createUrl('/product/index');?>" method="get" id="searchFormSite">
			<div class="main-container">
				<div class="search-cont">
					<div class="selectize-outr looking-outr">
						<i class="fa fa-search fs18 light-color"></i>
						<div class="selectize-inner placeholder1">
							<select id="lookingfor" name="value" multiple class="demo-default"  placeholder="What type of software are you looking for?"></select>
						</div>
					</div>
					<!--<div class="looking-outr-border">
						<a href="<?php //echo CController::createUrl('/site/project');?>" id="sfocus" class="find-outr">Meet the Teams <i class="fa fa-spinner fa-spin hide"></i></a>
						<img src="<?php //echo Yii::app()->theme->baseUrl; ?>/style/newhome/images/shadow.png" class="shadow-home rs-hide" alt="shadow" />
					</div>-->
					<div class="hint-outr">
						<span aria-hidden="true" class="icon-energy light-color trending-iconshow"></span>
						<label class="light-color">Trending:</label>
						<ul class="hint-ul">
							<li><a href="javascript:void(0);" class="callTag" data-name="Applicant Tracking">Applicant Tracking</a></li>
							<li>,</li>
							<li><a href="javascript:void(0);" class="callTag" data-name="Construction CRM">Construction CRM</a></li>
							<li>,</li>
							<li><a href="javascript:void(0);" class="callTag" data-name="Medical Billing">Medical Billing</a></li>
							<li>,</li>
							<li><a href="javascript:void(0);" class="callTag" data-name="Maintenance Management">Maintenance</a></li>
						</ul>
					</div>
				</div>
			</div>
		</form>
	</div>
</section>
<section class="section2">
	<div class="container text-center mt30">
		<h4 class="features-subheading">Our teams are trusted by</h4>
		<span  class="img-responsive c-logo sprite-cmpny sp1" alt="AllState"></span>
		<span  class="img-responsive c-logo sprite-cmpny sp2" alt="Honda"></span>
		<span  class="img-responsive c-logo sprite-cmpny sp3" alt="FIFA"></span>
		<span  class="img-responsive c-logo sprite-cmpny sp4" alt="GRAMMY"></span>
		<span  class="img-responsive c-logo sprite-cmpny sp5" alt="CocaCola"></span>
		<span  class="img-responsive c-logo sprite-cmpny sp6" alt="ING"></span>
		<span  class="img-responsive c-logo sprite-cmpny sp7" alt="Unicef"></span>
		<span  class="img-responsive c-logo sprite-cmpny sp8" alt="FIAT"></span>
		<span  class="img-responsive c-logo sprite-cmpny sp9" alt="NISSAN"></span>
		<span  class="img-responsive c-logo sprite-cmpny sp10 logo-hide" alt="General Electirc"></span>
		<span  class="img-responsive c-logo sprite-cmpny sp11 logo-hide" alt="Thomas Reuters"></span>
		<span  class="img-responsive c-logo sprite-cmpny sp12 logo-hide" alt="L'OREAL"></span>
		<span  class="img-responsive c-logo sprite-cmpny sp13 logo-hide" alt="htc"></span>
		<span  class="img-responsive c-logo sprite-cmpny sp14 logo-hide" alt="FORD"></span>
		<span  class="img-responsive c-logo sprite-cmpny sp15 logo-hide" alt="BOSE"></span>
		<span  class="img-responsive c-logo sprite-cmpny sp16 logo-hide" alt="BOSCH"></span>
		<span  class="img-responsive c-logo sprite-cmpny sp17 logo-hide" alt="VISA"></span>
		<span  class="img-responsive c-logo sprite-cmpny sp18 logo-hide" alt="SAMSUNG"></span>
	</div>
</section>
<section class="section3">
	<div class="container">
		<h3 class="features-heading">It's Easy!</h3>
		<h4 class="features-subheading">Hire Vetted Tech Teams For Your Most Critical Projects</h4>
		<div class="col-md-12 col-sm-12 col-xs-12 np mt50 mb50  section3-easy">
			<div class="col-md-4 col-sm-4 col-xs-12 mb30">
				<span  class="img-responsive fl-img sprite-prj spp1" alt="Hire The Best"></span>
				<h5 class="fl-heading">Hire The Best</h5>
				<div class="">
					<ul class="taxt-ul fl-text">
						96% teams don't make it through our vetting and transparent portfolios speak for themselves.
					</ul>
				</div>
				<a href="<?php echo Yii::app()->createUrl('/site/vettingProcess');?>" class="fl-link">Check Out Our Vetting Process <i class="fa fa-long-arrow-right fl-link-icon"></i></a>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12 mb30">
				<span  class="img-responsive fl-img sprite-prj spp2" alt="End-To-End Teams"></span>
				<h5 class="fl-heading">End-To-End Teams</h5>
				<div class="">
					<ul class="taxt-ul fl-text">
						All inclusive teams with Designers, Developers, Project Managers and Testers. Scale your teams as your business grows.
					</ul>
				</div>
				<a href="<?php echo CController::createUrl('/Digital-Trike');?>" class="fl-link">See A Team Profile <i class="fa fa-long-arrow-right fl-link-icon"></i></a>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12 mb30">
				<span  class="img-responsive fl-img sprite-prj spp3" alt="No Management Hassle"></span>
				<h5 class="fl-heading">No Management Hassle</h5>
				<div class="">
					<ul class="taxt-ul fl-text">
						In built milestone, contract & payment management with an expert project governor ensures 100% success!
					</ul>
				</div>
				<a href="<?php echo CController::createUrl('/site/features');?>" class="fl-link">See How It All Works <i class="fa fa-long-arrow-right fl-link-icon"></i></a>
			</div>
		</div>
	</div>
</section>
<!--
<section class="section4">
	<div class="container text-center">
		<div class="col-md-2 mt35 mb35 rs-mb10 rs-mb0 ">
			<img src="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/images/homeReferal.png"/>
		</div>
		<div class="col-md-7 earn-heading">Know anyone who can use our help?<span class="gift-rating">Gift them $500 Today!</span> </div>
		<a href="<?php echo CController::createUrl('/site/referral');?>" class="referral-link">Refer Now</a>
	</div>
</section>-->
<section class="section5">
	<div class="container ">
		<h3 class="features-heading">Trending Software Searches</h3>
		<div class="flexslider">
			<ul class="slides">
				<li>
					<div class="col-md-12 col-sm-12 col-xs-12 mb15 np">
						<div class="col-md-3 col-sm-6 col-xs-12 highlight-outr np">
							<a href="<?php echo CController::createUrl('/product/index/?value=360 Degree feedback');?>" class="highlight-inner">360 Degree feedback</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12 highlight-outr np">
							<a href="<?php echo CController::createUrl('/product/index/?value=Accounting');?>" class="highlight-inner">Accounting</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12 highlight-outr np">
							<a href="<?php echo CController::createUrl('/product/index/?value=Applicant Tracking');?>" class="highlight-inner">Applicant Tracking</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12 highlight-outr np">
							<a href="<?php echo CController::createUrl('/product/index/?value=Computer Security');?>" class="highlight-inner">Computer Security</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12 highlight-outr np">
							<a href="<?php echo CController::createUrl('/product/index/?value=Construction management');?>" class="highlight-inner">Construction management</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12 highlight-outr np">
							<a href="<?php echo CController::createUrl('/product/index/?value=Data Governance');?>" class="highlight-inner">Data Governance</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12 highlight-outr np">
							<a href="<?php echo CController::createUrl('/product/index/?value=Dental');?>" class="highlight-inner">Dental</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12 highlight-outr np">
						<a href="<?php echo CController::createUrl('/product/index/?value=Employee Scheduling');?>" class="highlight-inner">Employee Scheduling</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12 highlight-outr np">
							<a href="<?php echo CController::createUrl('/product/index/?value=Electronic Medical Records');?>" class="highlight-inner">Electronic Medical Records</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12 highlight-outr np">
							<a href="<?php echo CController::createUrl('/product/index/?value=Energy Management');?>" class="highlight-inner">Energy Management</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12 highlight-outr np">
							<a href="<?php echo CController::createUrl('/product/index/?value=Expense Report');?>" class="highlight-inner">Expense Report</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12 highlight-outr np">
							<a href="<?php echo CController::createUrl('/product/index/?value=Food delivery');?>" class="highlight-inner">Food delivery</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12 highlight-outr np">
							<a href="<?php echo CController::createUrl('/product/index/?value=Fund Accounting');?>" class="highlight-inner">Fund Accounting</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12 highlight-outr np">
							<a href="<?php echo CController::createUrl('/product/index/?value=Home health care');?>" class="highlight-inner">Home health care</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12 highlight-outr np">
							<a href="<?php echo CController::createUrl('/product/index/?value=Human Resource');?>" class="highlight-inner">Human Resource</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12 highlight-outr np">
						<a href="<?php echo CController::createUrl('/product/index/?value=Job Costing');?>" class="highlight-inner">Job Costing</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12 highlight-outr np">
						<a href="<?php echo CController::createUrl('/product/index/?value=law Enforcement');?>" class="highlight-inner">law Enforcement</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12 highlight-outr np">
						<a href="<?php echo CController::createUrl('/product/index/?value=library Automation');?>" class="highlight-inner">library Automation</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12 highlight-outr np">
						<a href="<?php echo CController::createUrl('/product/index/?value=Medical Inventory');?>" class="highlight-inner">Medical Inventory</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12 highlight-outr np">
						<a href="<?php echo CController::createUrl('/product/index/?value=Mining');?>" class="highlight-inner">Mining</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12 highlight-outr np">
						<a href="<?php echo CController::createUrl('/product/index/?value=Network Monitoring');?>" class="highlight-inner">Network Monitoring</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12 highlight-outr np">
						<a href="<?php echo CController::createUrl('/product/index/?value=Online CRM');?>" class="highlight-inner">Online CRM</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12 highlight-outr np">
						<a href="<?php echo CController::createUrl('/product/index/?value=Patient Management');?>" class="highlight-inner">Patient Management</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12 highlight-outr np">
						<a href="<?php echo CController::createUrl('/product/index/?value=Payroll');?>" class="highlight-inner">Payroll</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12 highlight-outr np">
						<a href="<?php echo CController::createUrl('/product/index/?value=Public transportation');?>" class="highlight-inner">Public transportation</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12 highlight-outr np">
						<a href="<?php echo CController::createUrl('/product/index/?value=Real Estate Agency');?>" class="highlight-inner">Real Estate Agency</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12 highlight-outr np">
						<a href="<?php echo CController::createUrl('/product/index/?value=Resource Management');?>" class="highlight-inner">Resource Management</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12 highlight-outr np">
						<a href="<?php echo CController::createUrl('/product/index/?value=Scolarship Management');?>" class="highlight-inner">Scolarship Management</a>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>
</section>
<!--
<section class="section7">
	<div class="container ">
		<h3 class="features-heading">Love Your Team!</h3>
		<h4 class="features-subheading">Over 75% Of Companies Rehire Their Teams</h4>

		<div class="text-center">
			<img src="<?php //echo Yii::app()->theme->baseUrl; ?>/style/newhome/images/stars.png" alt="Ratings" class="rating-img" width="112" height="21"/>
			<p class="rating-value">Avg. Rating: 4.8 on 5 (212 Reviews)</p>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12 np mt30">
			<div class="testimonial-outr">
				<div class="test-box-outr ml30 mr30">
					<div class="test-box">
						<span class="test-text">Nick Bowers, <br>CTO @ Klink Technologies</span>
						<a href="<?php //echo Yii::app()->createUrl('/site/testimonials');?>" class="test-link">VenturePact provided a great way to find top quality teams that fit our budget and timeline needs</a>
						<img src="<?php //echo Yii::app()->theme->baseUrl; ?>/style/newhome/images/test-arrow.png" class="test-arrow" width="24" height="12"/>
					</div>
					<span  class="img-responsive klink-pic nb sprite-team spt1" alt="Klink Technologies"></span>
				</div>
				<div class="test-box-outr ml30 mr30">
					<div class="test-box-mid">
						<span class="test-text">Matt Carey <br>CEO @ Abaris</span>
						<a href="<?php //echo Yii::app()->createUrl('/site/testimonials');?>" class="test-link">Overall, much better than freelance marketplaces.</a>
						<img src="<?php //echo Yii::app()->theme->baseUrl; ?>/style/newhome/images/test-arrow.png" class="test-arrow-mid" width="24" height="12" />
					</div>
					<span  class="img-responsive klink-pic sprite-team spt2" alt="Abaris"></span>
				</div>
				<div class="test-box-outr ml30">
					<div class="test-box">
						<span class="test-text">Dan Shipper <br>Founder @ FireFly</span>
						<a href="<?php //echo Yii::app()->createUrl('/site/testimonials');?>" class="test-link">Our team was highly available, very engaged, and and responded to feedback swiftly.</a>
						<img src="<?php //echo Yii::app()->theme->baseUrl; ?>/style/newhome/images/test-arrow.png" class="test-arrow" width="24" height="12"/>
					</div>
					<span  class="img-responsive klink-pic sprite-team spt3" alt="FireFly"></span>
				</div>
				<div class="col-md-12 col-xs-12 text-center mt50 mb30">
					<a href="<?php //echo Yii::app()->createUrl('/site/testimonials');?>" class="readwhat-small">Read More Reviews</a>
				</div>
			</div>
		</div>
	</div>
</section>-->
<!-- Modal Thank You -->
<div class="modal fade" id="thankyou" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content col-md-12 col-xs-12 np">
			<div class="modal-body col-md-12 col-xs-12 np">
				<div class="col-md-12 col-sm-12 col-xs-12 np p30 thankyou-bg-popup" id="">
					<div class="col-md-12 col-xs-12 np">
						<div class="col-md-12 col-xs-12 text-center mt30 mb40">
							<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/thankyou-img.jpg" class="" alt="thank you" width="241" height="70"/>
						</div>
						<div class="col-md-12 col-xs-12 text-center">
							<h2 class="fs24 font_newlight blue-new mb20 pb10">Thank you for <br/>submitting your review.</h2>
							<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/thankyou-done-img.png" class="" alt="thank you" width="87" height="87"/>
						</div>
						<div class="col-md-12 col-xs-12 text-center mt10">
							<button type="button" class="btn btn-orange fs14" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal Thank You End-->
<style>
	video#bgvid {
	    position: fixed;
	    top: 50%;
	    left: 50%;
	    min-width: 100%;
	    min-height: 100%;
	    width: auto;
	    height: auto;
	    z-index: -1;
	    -webkit-transform: translateX(-50%) translateY(-50%);
	    transform: translateX(-50%) translateY(-50%);
	}
</style>
<script>
$(document).ready(function(){
	$('#searchFormSite').trigger("reset");
	$('#searchFormTop').trigger("reset");
	$('#topsearch').selectize({
		theme: 'links',
		//maxItems: null,
		valueField: 'id',
		searchField: 'title',
		sortField: 'title',
		maxItems: 2,
		openOnFocus:false,
		closeAfterSelect: true,
		maxOptions:5,
		options: [
			<?php $categories=Categories::model()->findAllByAttributes(array('status'=>1));
				foreach($categories as $category){?>
					{id: "<?php echo $category->name;?>", title: '<?php echo $category->name;?>', category: 'Skill'},
			<?php } ?>
		],
		render: {
			option: function(data, escape) {
				return	'<div class="option">'+
							'<span class="title">' + escape(data.title) + '</span>' +
							'<span class="tag">' + escape(data.category) + '</span>' +
						'</div>';
			},
			item: function(data, escape) {
				return '<div class="item"><a href="' + escape(data.category) + '">' + escape(data.title) + '</a></div>';
			}
		},
		onChange: function() { $('#searchFormTop').submit();},
	});
	var searchSel = $('#lookingfor').selectize({
		theme: 'links',
		//maxItems: null,
		valueField: 'id',
		searchField: 'title',
		sortField: 'title',
		maxItems: 2,
		openOnFocus:false,
		closeAfterSelect: true,
		maxOptions:5,
		options: [
			<?php $categories=Categories::model()->findAllByAttributes(array('status'=>1));
			foreach($categories as $category){?>
				{id: "<?php echo $category->name;?>", title: '<?php echo $category->name;?>', category: 'Skill'},
			<?php } ?>
		],
		render: {
			option: function(data, escape) {
				return	'<div class="option">'+
							'<span class="title">' + escape(data.title) + '</span>' +
							'<span class="tag">' + escape(data.category) + '</span>' +
						'</div>';
			},
			item: function(data, escape) {
				return '<div class="item"><a href="' + escape(data.category) + '">' + escape(data.title) + '</a></div>';
			}
		},
		onChange: function() { $('#sfocus').focus();$('#searchFormSite').submit();},
	});
	$('#sfocus').click(function(){
		$('.fa-spinner').removeClass('hide');
	});
	$('.callTag').click(function(){
		var data = $(this).attr('data-name');
		select12 = searchSel[0].selectize;
		select12.setValue(data);
	});
	$('.selectize-input').find('input').css('width','420');
	/*$('.find-outr').click(function(){
		$('.search-cont').animo({
			animation: "fadeOutLeft",
			duration: 0.3,
			keep: true
		}, function(){
			$('body').css('overflow-x', 'hidden');
			$('.search-cont').hide();
			$('.email-cont').show().animo({
				animation: "fadeInRight",
				duration: 0.3,
				keep: true
			});
		});
	});*/
	$('#searchFormSite').submit(function(){
		localStorage.clear();
		return true;
	});
	$('#searchFormTop').submit(function(){
		localStorage.clear();
		return true;
	});
	//Scroll search add
	$(window).scroll(function(){
		if ($(this).scrollTop() > 425) {
			$('#navbar').addClass('navbar-custom');
		} else  {
			$('#navbar').removeClass('navbar-custom');
		}
	});

	$(window).scroll(function(){
		if($(this).width() < 768) {
			if ($(this).scrollTop() > 100) {
				$('#navbar').addClass('navbar-custom');
			} else  {
				$('#navbar').removeClass('navbar-custom');
			}
		}
	});
	$('#search-icon-mob a').click(function(){
		$('#navbar').animo({
			animation: "fadeOutRight",
			duration: 0.3,
			keep: true
		}, function(){
			$('#navbar').hide();
			$('.navbarsearch').show().animo({
				animation: "fadeInLeft",
				duration: 0.3,
				keep: true
			});
		});
	});
	$('#search-icon a').click(function(){
		$('#navbar').animo({
			animation: "fadeOutRight",
			duration: 0.3,
			keep: true
		}, function(){
			$('#navbar').hide();
			$('.navbarsearch').show().animo({
				animation: "fadeInLeft",
				duration: 0.3,
				keep: true
			});
		});
	});
	$('.search-close').click(function(){
		$('.navbarsearch').animo({
			animation: "fadeOutLeft",
			duration: 0.3,
			keep: true
		}, function(){
			$('.navbarsearch').hide();
			$('#navbar').show().animo({
				animation: "fadeInRight",
				duration: 0.3,
				keep: true
			});
		});
	});
	//show more
	$('#readwhat').click(function(){
		$(this).animo({
			animation: "fadeOutUp",
			duration: 0.3,
			keep: true
		}, function(){
			$('#readwhat').hide();
			$('.team-hide').show().animo({
				animation: "fadeInDown",
				duration: 0.3,
				keep: true
			});
			$('#lesswhat').show().animo({
				animation: "fadeInDown",
				duration: 0.3,
				keep: true
			});
		});
	});
	$('#lesswhat').click(function(){
		$(this).animo({
			animation: "fadeOutUp",
			duration: 0.3,
			keep: true
		}, function(){
			$('#lesswhat').hide();
			$('.team-hide').show().animo({
				animation: "fadeOutUp",
				duration: 0.3,
				keep: true
			});
			$('.team-hide').hide();
			$('#readwhat').show().animo({
				animation: "fadeInUp",
				duration: 0.3,
				keep: true
			});
		});
	});
	<?php if(isset($_REQUEST['thank']) && $_REQUEST['thank']==1){?>
	$('#thankyou').modal('toggle');
	<?php } ?>

	$(".menu-icon").click(function(){
		$(".menu-login-section").fadeIn(300);
		<?php
		if(Yii::app()->user->hasState('promo')){
			if(Yii::app()->user->hasState('remail')){
		?>
				$('.btn-linkedin').attr('href','<?php echo Yii::app()->createUrl('/site/linkedin',array('lType'=>'initiate','role'=>2,'redirectType'=>5));?>');
		<?php
			}else{
		?>
				$('.btn-linkedin').attr('href','<?php echo Yii::app()->createUrl('/site/linkedin',array('lType'=>'initiate','role'=>2,'redirectType'=>4));?>');
		<?php
			}
		}else{
		?>
			$(".btn-linkedin").attr('href',"<?php echo Yii::app()->createUrl('/site/linkedin',array('lType'=>'initiate','role'=>'2'));?>");
		<?php
		}
		?>
		$('.affiliate').val('2');
	});
	$('#menu-close').click(function(){
		$(".menu-login-section").fadeOut(300);
	});
});
</script>
<div class="hide">
<script type="text/javascript">
/*
var CE_SNAPSHOT_NAME = "VenturePact Index Page";
setTimeout(function(){var a=document.createElement("script");
var b=document.getElementsByTagName("script")[0];
a.src=document.location.protocol+"//script.crazyegg.com/pages/scripts/0034/1290.js?"+Math.floor(new Date().getTime()/3600000);
a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);
*/
</script>
<!-- Google Code for VP Site Visit Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 957807862;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "5bsQCJuAsV4Q9vnbyAM";
var google_remarketing_only = false;
/* ]]> */
</script>
</div>