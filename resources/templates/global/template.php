<!doctype html>
<html lang="en">
  <head>
  	<base href="http://localhost/UNotes/">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php echo $this->e($this->getTr('SIGNUP')); ?>">
    <meta name="author" content="">
    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="57x57" href="resources/images/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="resources/images/favicons//apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="resources/images/favicons//apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="resources/images/favicons//apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="resources/images/favicons//apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="resources/images/favicons//apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="resources/images/favicons//apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="resources/images/favicons//apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="resources/images/favicons//apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="resources/images/favicons//android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="resources/images/favicons//favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="resources/images/favicons//favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="resources/images/favicons//favicon-16x16.png">
    <link rel="manifest" href="resources/images/favicons//manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="resources/images/favicons//ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <title>
    <?php echo $this->e($this->getTr('SITE_TITLE')) . ' :: ' . $this->e($subtitle);  ?>
    </title>

	<!-- Imports -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<!-- Bootstrap cookie alert -->
	<link rel="stylesheet" href="resources/styles/cookiealert.css">
	<script src="resources/scripts/cookiealert.js"></script>

    <!-- Custom styles -->
    <link href="resources/styles/main.css" rel="stylesheet">
    
    <!-- Custom scripts -->
    <script src="resources/scripts/events.js"></script>
  </head>

  <body>
  <div class="alert text-center cookiealert" role="alert">
    <?php echo $this->e($this->getTr('COOKIEMSG')); ?>
    <button type="button" class="btn btn-primary btn-sm acceptcookies" aria-label="Close"><?php echo $this->e($this->getTr('OK')); ?></button>
	</div>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <span class="my-0 mr-md-auto font-weight-normal"><a title="<?php echo $this->e($this->getTr('SITE_TITLE')); ?>" style="text-decoration: none; color: initial" href="index"><img src="resources/images/logos/logo_small.png" alt="<?php echo $this->e($this->getTr('SITE_TITLE')); ?>" title="<?php echo $this->e($this->getTr('SITE_TITLE')); ?>"></a></span>
      <nav class="my-2 my-md-0 mr-md-3">
      <a class="p-2 text-dark dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php
        echo $this->e($this->getTr('LANGUAGES'));
        $loginError = isset($_GET['loginerror']) ? $_GET['loginerror'] : 0;
        function getActualUrl(): string {
            $actualUrl=strtok($_SERVER['REQUEST_URI'], '?');
            $actualUrl=strtok($actualUrl, '&');
            unset($_GET['lang']);
            unset($_GET['loginerror']);
            $actualUrl .= (count($_GET) > 0) ? '&' : '?';
            return $actualUrl;
        }
        ?>
      </a>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="<?php echo getActualUrl()?>lang=en"><?php echo $this->e($this->getTr('ENGLISH')); ?></a>
        <a class="dropdown-item" href="<?php echo getActualUrl();?>lang=es"><?php echo $this->e($this->getTr('SPANISH')); ?></a>
      </div>
        <a class="p-2 text-dark" href="notes/1"><?php echo $this->e($this->getTr('EXAMPLE')); ?></a>
        <a class="p-2 text-dark" href="about"><?php echo $this->e($this->getTr('ABOUT')); ?></a>
      </nav>
      <?php
      if (!$this->e($this->isLogged())) {
      ?>
      <div class="btn-group">
        <a class="btn btn-outline-primary" href="signup"><?php echo $this->e($this->getTr('SIGNUP')); ?></a>
        <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#login-box"><?php echo $this->e($this->getTr('SIGNIN')); ?></a>
      </div>
      <div class="modal" id="login-box">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><?php echo $this->e($this->getTr('SIGNIN')); ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form method="post" action="login">
              <?php 
              if ($loginError == 1) {
                  echo '<div class="alert alert-danger" role="alert">' . $this->e($this->getTr('INVALID_SIGNIN')) . '</div>';
              }
              ?>
                <div class="form-group">
        	      <input type="email" id="email" name="login-email" class="form-control" placeholder="<?php echo $this->e($this->getTr('MAIL_SIGNUP'))?>" maxlength="320" autofocus required>
                </div>
                <div class="form-group">
        	      <input type="password" id="password" name="login-password" class="form-control" placeholder="<?php echo $this->e($this->getTr('PASS_SIGNUP'))?>" autofocus required>
                </div>
                <input type="hidden" name="url" value="<?php echo getActualUrl()?>">
                <input type="submit" class="btn btn-lg btn-block btn-primary" name="signin" value="<?php echo $this->e($this->getTr('SUBMIT_SIGNUP'))?>">
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php
      } else {
      ?>
      <div class="dropdown">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><?php echo $this->e($this->getLoggedUserData('name')); ?></button>
        <div class="dropdown-menu dropdown-menu-right">
          <a class="dropdown-item" href="#"><?php echo $this->e($this->getTr('PROFILE_PROFILE')); ?></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout"><?php echo $this->e($this->getTr('PROFILE_LOGOUT'));?></a>
        </div>
      </div>
      <?php
      }
      ?>
    </div>
    <div class="container">
    <?php
    if ($this->e($navigation) != false) {
        $navTexts = explode(', ', $this->e($navigation));
        $navLinks = explode(', ', $this->e($navigationLinks));
        echo '
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">';
        foreach ($navTexts as $i => $navText) {
            $link = isset($navLinks[$i]) ? $navLinks[$i] : '';
            echo $i === count($navTexts)-1 ? '<li class="breadcrumb-item active" aria-current="page">' . $navText . '</li>' : '<li class="breadcrumb-item"><a href="' . $link . '">' . $navText . '</a></li>';
        }
        echo '
          </ol>
        </nav>';
    }
    echo $this->section('content')
    ?>
      <footer class="pt-4 my-md-5 pt-md-5 border-top">
        <div class="row">
          <div class="col-12 col-md">
            <img class="mb-2" src="resources/images/logos/cloud_small.png" alt="<?php echo $this->e($this->getTr('SITE_TITLE')); ?>" width="36" height="19">
            <small class="d-block mb-3 text-muted">&copy; 2018 <?php echo $this->e($this->getTr('SITE_TITLE')); ?></small>
          </div>
          <div class="col-6 col-md" style="margin-left: -480px;">
            <h5><?php echo $this->e($this->getTr('LINKS'))?></h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="notes/1"><?php echo $this->e($this->getTr('EXAMPLE'))?></a></li>
              <li><a class="text-muted" href="upload"><?php echo $this->e($this->getTr('UPLOAD'))?></a></li>
              <li><a class="text-muted" href="about"><?php echo $this->e($this->getTr('ABOUT'))?></a></li>
              <?php
               if (!$this->e($this->isLogged())) {
               ?>
               <li><a class="text-muted" href="signup"><?php echo $this->e($this->getTr('SIGNUP'))?></a></li>
              <?php 
               } else {
               ?>
               <li><a class="text-muted" href="logout"><?php echo $this->e($this->getTr('PROFILE_LOGOUT'))?></a></li>
               <?php
               }?>
            </ul>
          </div>
        </div>
      </footer>
    </div>   
    <?php 
    if ($loginError == 1) {
        echo '<script>$("#login-box").modal();</script>';
    }
    ?>
  </body>
</html>
