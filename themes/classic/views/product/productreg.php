<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/style/newhome/css/productReg.css" rel="stylesheet">
<style type="text/css">
    .search-close {
        color: #738b99;
        display: inline-block;
        font-size: 14px;
        margin-left: 15px;
        margin-top: 18px;
    }
</style>
<div class="container pro">
    <h1>Create a free listing on VenturePact</h1>
    <hr class="center-half">
    <form method="post" action="" id="formProdReg" data-parsley-validate="data-parsley-validate">
        <div class="row">
            <div class="col-md-6 input-field">
                <input id="first_name" type="text" name="first_name" required data-parsley-required-message="First Name is required">
                <label for="first_name">First Name</label>
            </div>
            <div class="col-md-6 input-field">
                <input id="last_name" type="text" name="last_name" required data-parsley-required-message="Last Name is required">
                <label for="last_name">Last Name</label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 input-field">
                <i class="fa fa-envelope prefix"></i>
                <input id="email" type="email" name="email" required data-parsley-type="email" data-parsley-required-message="Email is required">
                <label for="email">&nbsp;Email</label>
            </div>
            <div class="col-md-6 input-field">
                <i class="fa fa-mobile prefix"></i>
                <input id="phone_number" type="tel" name="phone_number" required>
                <label for="phone_number">Phone Number</label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 input-field">
                <input id="company_name" type="text" name="company_name" required data-parsley-required-message="Company Name is required">
                <label for="company_name">Company Name</label>
            </div>
            <div class="col-md-6 input-field">
                <input id="website" type="text" name="website" required data-parsley-required-message="Website is required">
                <label for="website">Website</label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 input-field">
                <select>
                    <option value="" disabled selected>Select your Country</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                </select>
                <label>Country</label>
            </div>
        </div>
        <h2>About Your Product</h2>
        <div class="row">
            <div class="col-md-6 input-field">
                <input type="text" id="product_name" name="product_name" required data-parsley-required-message="Product Name is required">
                <label for="product_name">Product Name</label>
            </div>
            <div class="col-md-6 input-field">
                <input type="text" id="product_category" name="product_category" required data-parsley-required-message="Category is required">
                <label for="product_category">Product Category</label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 input-field">
                <textarea id="description" name="description" class="materialize-textarea"></textarea>
                <label for="description">Description</label>
            </div>
        </div>
        <h2>Compnay Social Media Pages</h2>
        <div class="row">
            <div class="col-md-6 input-field">
                <i class="fa fa-facebook prefix"></i>
                <input type="text" id="facebook_page" name="facebook_page">
                <label for="facebook_page">Facebook's Page</label>
            </div>
            <div class="col-md-6 input-field">
                <i class="fa fa-google-plus prefix"></i>
                <input type="text" id="googleplus_page" name="googleplus_page">
                <label for="googleplus_page">&nbsp;Google Plus Page</label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 input-field">
                <i class="fa fa-linkedin prefix"></i>
                <input type="text" id="linkedin_page" name="linkedin_page">
                <label for="linkedin_page">&nbsp;linkedin Page</label>
            </div>
            <div class="col-md-6 input-field">
                <i class="fa fa-twitter prefix"></i>
                <input type="text" id="twitter_page" name="twitter_page">
                <label for="twitter_page">&nbsp;Twitter Page</label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 input-field">
                <i class="fa fa-youtube prefix"></i>
                <input type="text" id="youtube_page" name="youtube_page">
                <label for="youtube_page">&nbsp;Youtube Page</label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <button class="waves-effect waves-light mybtn btn-large" type="submit">Create My Listing</button>
            </div>
        </div>
    </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>