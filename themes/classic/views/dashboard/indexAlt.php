<style>

  .warning {
    width: 100%;
    color: #f2f2f2;
    text-align: center;
    background: #e57373;
    text-align: justify;
    padding: 2em 1em;
  }
  .full {
    height: 100vh;
  }
</style>
<section class="wrapper">
  <div class="row">
    <div class="main-chart full">
      <?php if(!$status): ?>
        <div class="warning">
          <i class="fa fa-exclamation-triangle"></i><h3>Your account is not verified and soon will be listed as unprovisioned. Please verify your account to enjoy uninterrupted services</h3>
        </div>
      <?php endif; ?>
      <h2>No Product to display</h2>
    </div>
</section>