<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/css/tabs.css">
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/css/dash-style.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/css/bootstrap-multiselect.css">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/dashboard/css/prettify.css">
<section class="wrapper">
	<div class="row">
		<aside class="full-height">
			<ul>
				<li><a href="#product_information">Product Information</a></li>
				<li><a href="#company_information">Company Information</a></li>
				<li><a href="#social_media">Social Media Links</a></li>
				<li><a href="#transactions">Transactions</a></li>
			</ul>
		</aside>


		<main class="main-wrap">
			<form class="prod-edit-container">
				<div class="row" id="product_information">
					<h4>Product Information</h4>
					<figure><img src="imp/img/friends/fr-01.jpg" alt="product logo"></figure>
					<div class="container-fluid" id="product_information">

						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Name:</label>
							<div class="input col-lg-10 col-md-10 col-sm-10 col-xs-10">
								<i class="fa fa-product-hunt fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1">
								</i>
								<input type="text" class="col-lg-11 col-md-11 col-sm-11 col-xs-11" name="product_name" value="Salesforce">
							</div>
						</div>

						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Description:</label>
							<div class="input col-lg-10">
								<i class="fa fa-bars fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1">
								</i>
								<textarea class="col-lg-11 col-md-1 col-sm-1 col-xs-1" name="product_description">Bla... Bla...</textarea>
							</div>
						</div>

						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Website:</label>
							<div class="input col-lg-10 col-md-10 col-sm-10 col-xs-10">
								<i class="fa fa-globe fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1">
								</i>
								<input type="text" class="col-lg-11 col-md-11 col-sm-11 col-xs-11" name="product_website">
							</div>
						</div>

						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Category:</label>
							<div class="input col-lg-10 col-md-10 col-sm-10 col-xs-10">
								<i class="fa fa-codiepie fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1">
								</i>
		            <select id="category" name="category[]" multiple="multiple" class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
		              <option value="1">Option 1</option>
		              <option value="2">Option 2</option>
		              <option value="3">Option 3</option>
		              <option value="4">Option 4</option>
		              <option value="5">Option 5</option>
		              <option value="6">Option 6</option>
		          </select>
							</div>
						</div>

						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Features:</label>
							<div class="input col-lg-10 col-md-10 col-sm-10 col-xs-10">
								<i class="fa fa-tasks fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1">
								</i>
		            <select id="features" name="features[]" multiple="multiple" class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
		              <option value="1">Option 1</option>
		              <option value="2">Option 2</option>
		              <option value="3">Option 3</option>
		              <option value="4">Option 4</option>
		              <option value="5">Option 5</option>
		              <option value="6">Option 6</option>
		          </select>
							</div>
						</div>

						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Customers:</label>
							<div class="input col-lg-10 col-md-10 col-sm-10 col-xs-10">
								<i class="fa fa-users fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1">
								</i>
								<input type="text" class="col-lg-11 col-md-11 col-sm-11 col-xs-11" name="customer">
							</div>
						</div>

						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Price:</label>
							<div class="input col-lg-10 col-md-10 col-sm-10 col-xs-10">
								<i class="fa fa-money fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1">
								</i>
								<input type="text" class="col-lg-11 col-md-11 col-sm-11 col-xs-11" name="price">
							</div>
						</div>

						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Pricing Details:</label>
							<div class="input col-lg-10">
								<i class="fa fa-money fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1">
								</i>
								<textarea class="col-lg-11 col-md-1 col-sm-1 col-xs-1" name="pricing_details" name="pricing_details">Bla... Bla...</textarea>
							</div>
						</div>

						<div class="row">
							<div class="input-full-radio">
			          <input type="radio" id="ppc0" name="ppc" checked></input>
			          <label for="ppc0" class="col-lg-6">PPC</label>
			          <input type="radio" id="ppc1" name="ppc"></input>
			          <label for="ppc1" class="col-lg-6">No PPC</label>
			        </div>
						</div>

						<div class="row">
							<div class="input-full-radio">
			          <input type="radio" id="trial0" name="trial" checked></input>
			          <label for="trial0" class="col-lg-6">Trial Available</label>
			          <input type="radio" id="trial1" name="trial"></input>
			          <label for="trial1" class="col-lg-6">No Trial Available</label>
			        </div>
						</div>

						<div class="row">
							<div class="input-full-radio">
			          <input type="radio" id="free0" name="free_version" checked></input>
			          <label for="free0" class="col-lg-6">Has Free Version</label>
			          <input type="radio" id="free1" name="free_version"></input>
			          <label for="free1" class="col-lg-6">Only Paid</label>
			        </div>
						</div>
					</div>
				</div>

				<div class="row" id="company_information">
					<h4>Company Information</h4>
					<div class="container-fluid" id="product_information">

						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Name:</label>
							<div class="input col-lg-10 col-md-10 col-sm-10 col-xs-10">
								<i class="fa fa-building fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1">
								</i>
								<input type="text" class="col-lg-11 col-md-11 col-sm-11 col-xs-11" name="company_name" value="Salesforce">
							</div>
						</div>

						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Website:</label>
							<div class="input col-lg-10 col-md-10 col-sm-10 col-xs-10">
								<i class="fa fa-globe fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1">
								</i>
								<input type="text" class="col-lg-11 col-md-11 col-sm-11 col-xs-11" name="company_website" value="Salesforce">
							</div>
						</div>

						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Founding Year:</label>
							<div class="input col-lg-10 col-md-10 col-sm-10 col-xs-10">
								<i class="fa fa-calendar-o fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1">
								</i>
								<input type="text" class="col-lg-11 col-md-11 col-sm-11 col-xs-11" name="founding_year" value="Salesforce">
							</div>
						</div>

						<div class="row">
							<div class="input-dash-full resp-half">
			          <i class="fa fa-codiepie col-lg-1 col-md-1 col-sm-1 col-xs-1"></i>
			          <select class="col-lg-11 col-md-11 col-sm-11 col-xs-11" name="founding_country">
			            <option>Select a Country</option>
			            <option>Amazon</option>
			            <option>Ghana</option>
			          </select>
			        </div>
						</div>
					</div>
				</div>

				<div class="row" id="social_media">
					<h4>Product's Social Media Links</h4>
					<div class="container-fluid" id="product_information">

						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Google:</label>
							<div class="input col-lg-10 col-md-10 col-sm-10 col-xs-10">
								<i class="fa fa-google-plus fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1">
								</i>
								<input type="text" class="col-lg-11 col-md-11 col-sm-11 col-xs-11" name="googleplus" value="Salesforce">
							</div>
						</div>

						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Facebook:</label>
							<div class="input col-lg-10 col-md-10 col-sm-10 col-xs-10">
								<i class="fa fa-facebook fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1">
								</i>
								<input type="text" class="col-lg-11 col-md-11 col-sm-11 col-xs-11" name="facebook" value="Salesforce">
							</div>
						</div>

						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Youtube:</label>
							<div class="input col-lg-10 col-md-10 col-sm-10 col-xs-10">
								<i class="fa fa-youtube fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1">
								</i>
								<input type="text" class="col-lg-11 col-md-11 col-sm-11 col-xs-11" name="youtube" value="Salesforce">
							</div>
						</div>

						<div class="row">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">LinkedIn:</label>
							<div class="input col-lg-10 col-md-10 col-sm-10 col-xs-10">
								<i class="fa fa-linkedin fa-1x col-lg-1 col-md-1 col-sm-1 col-xs-1">
								</i>
								<input type="text" class="col-lg-11 col-md-11 col-sm-11 col-xs-11" name="linkedin" value="Salesforce">
							</div>
						</div>

						<div class="row">
			        <div class="col-lg-4 submit-part">
			          <input type="submit" value="Save" name="save"></input>
			        </div>
			      </div>
					</div>
				</div>

				<div class="row" id="transactions">
					<h4>Transactions</h4>
					<div class="container-fluid" id="product_information">
						<div class="row">
							<table class="col-lg-12" class="table-style">
								<thead class="row">
									<tr class="row">
										<td class="col-lg-1">S.No.</td>
										<td class="col-lg-3">Billing Date</td>
										<td class="col-lg-2">Clicks Count</td>
										<td class="col-lg-3">Amount</td>
										<td class="col-lg-3">Payment Status</td>
									</tr>
								</thead>
								<tbody class="row">
									<tr class="row">
										<td class="col-lg-1">1</td>
										<td class="col-lg-3">1-1-2016</td>
										<td class="col-lg-2">289</td>
										<td class="col-lg-3">983$</td>
										<td class="col-lg-3">Paid</td>
									</tr>
									<tr class="row">
										<td class="col-lg-1">2</td>
										<td class="col-lg-3">1-2-2016</td>
										<td class="col-lg-2">123</td>
										<td class="col-lg-3">456$</td>
										<td class="col-lg-3">Pending</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</form>
		</main>
	</div>
</section>