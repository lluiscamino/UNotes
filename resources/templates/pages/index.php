<?php $this->layout('global::template', ['subtitle' => $this->getTr('SITE_DESC'), 'navigation' => false]) ?>
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4"><?php echo $this->e($this->getTr('SITE_TITLE')); ?>: <?php echo $this->e($this->getTr('SITE_DESC')); ?></h1>
      <p class="lead"><?php echo $this->e($this->getTr('SITE_LONGDESC')); ?></p>
    </div>


      <div class="card-deck mb-3 text-center">
        <div class="card mb-4 shadow-sm">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal"><?php echo $this->e($this->getTr('USER1TITLE')); ?></h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title"><?php echo $this->e($this->getTr('PRICE1')); ?><?php echo $this->e($this->getTr('COIN')); ?> <small class="text-muted">/ <?php echo $this->e($this->getTr('MONTH')); ?></small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <?php echo $this->e($this->getTr('BENEFITSUSER1')); ?>
            </ul>
            <a style="text-decoration: none" href="signup"><button type="button" class="btn btn-lg btn-block btn-outline-primary"><?php echo $this->e($this->getTr('FREESIGNUP')); ?></button></a>
          </div>
        </div>
        <div class="card mb-4 shadow-sm">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal"><?php echo $this->e($this->getTr('USER2TITLE')); ?></h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title"><?php echo $this->e($this->getTr('PRICE2')); ?><?php echo $this->e($this->getTr('COIN')); ?> <small class="text-muted">/ <?php echo $this->e($this->getTr('MONTH')); ?></small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <?php echo $this->e($this->getTr('BENEFITSUSER2')); ?>
            </ul>
            <a style="text-decoration: none" href="signup"><button type="button" class="btn btn-lg btn-block btn-primary"><?php echo $this->e($this->getTr('GETSTARTED')); ?></button></a>
          </div>
        </div>
        <div class="card mb-4 shadow-sm">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal"><?php echo $this->e($this->getTr('USER3TITLE')); ?></h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title"><?php echo $this->e($this->getTr('PRICE3')); ?><?php echo $this->e($this->getTr('COIN')); ?> <small class="text-muted">/ <?php echo $this->e($this->getTr('MONTH')); ?></small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <?php echo $this->e($this->getTr('BENEFITSUSER3')); ?>
            </ul>
            <a style="text-decoration: none" href="signup"><button type="button" class="btn btn-lg btn-block btn-primary"><?php echo $this->e($this->getTr('GETSTARTED')); ?></button></a>
          </div>
        </div>
      </div>