<?php
$this->layout('global::template', array(
    'subtitle'  =>  $this->e($this->getTr('SIGNUP')),
    'navigation'    =>  $this->e($this->getTr('INDEX')) . ', ' . $this->e($this->getTr('SIGNUP')),
    'navigationLinks'   =>  'index'
));
echo '<h2>' . $this->e($this->getTr('SIGNUP')). '</h2>';

?>	
<div id="register1">
	<form method="post">
	<?php
	if (sizeof($this->e($formerrors)) > 0) {
	    echo '<div class="alert alert-danger" role="alert">' . $this->e($this->getTr('CORRECT_ERRORS')) . '<ul style="margin-bottom: 2px;">';
	    foreach ($this->e($formerrors) as $formerror) {
	        echo '<li>' . $this->e($this->getTr('INVALID_' . $formerror));
	    }
        echo '</ul></div>';
	}
	?>
		<div class="form-group">
        	<input type="text" id="name" name="name" class="form-control"  placeholder="<?php echo $this->e($this->getTr('NAME_SIGNUP'))?>" maxlength="100" autofocus required>
        </div>
        <div class="form-group">
        	<input type="email" id="email" name="email" class="form-control" placeholder="<?php echo $this->e($this->getTr('MAIL_SIGNUP'))?>" maxlength="320" autofocus required>
        </div>
        <div class="form-group">
        	<input type="password" id="password" name="password" class="form-control" placeholder="<?php echo $this->e($this->getTr('PASS_SIGNUP'))?>" autofocus required>
        </div>
        <div class="form-group">
        	<input type="password" id="repassword" name="repassword" class="form-control" placeholder="<?php echo $this->e($this->getTr('RPASS_SIGNUP'))?>" autofocus required>
        </div>
        <div class="form-group">
        	<input type="text" id="captcha" name="captcha" class="form-control" placeholder="<?php echo $this->e($this->getTr('CAPTCHA_SIGNUP'))?>" maxlength="7" autofocus required>
        	<br>
			<div id="loadcaptcha">
                 <img src="resources/captcha/captchaimg.php?code=<?php echo $this->e($captcha)?>">
          	</div>
        </div>
        <input type="submit" class="btn btn-lg btn-block btn-primary" name="signup" value="<?php echo $this->e($this->getTr('SUBMIT_SIGNUP'))?>">
	</form>
</div>