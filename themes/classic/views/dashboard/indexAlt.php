
<style>
.warning {
    color: #f2f2f2;
    text-align: center;
    background: #e57373;
    text-align: justify;
    padding: 2em 1em;
  }
  @media all and (max-width: 1040px) {
    .warning {
      font-size: 0.8em;
    }
  }
  @media all and (max-width: 800px) {
    .warning {
      font-size: 0.6em;
    }
  }
</style>
  <section class="wrapper">
  <div class="row">
    <div class="main-chart">
      <?php 
        $user_id  = Yii::app()->user->user_id;
        $user = Users::model()->findByPk($user_id);
        if(!$user->is_verified): ?>
        <div class="warning">
          <h3><i class="fa fa-exclamation-triangle"></i>&nbsp;Your account is not verified and soon will be listed as unprovisioned. Please verify your account to enjoy uninterrupted services</h3>
        </div>
      <?php endif; ?>
      <h2>No Product to display</h2>
    </div>
  </div>
</section>