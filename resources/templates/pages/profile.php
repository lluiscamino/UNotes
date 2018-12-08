<?php
$this->layout('global::template', array(
    'subtitle'  =>  $this->e($valueArray['name']),
    'navigation'    =>  $this->e($this->getTr('INDEX')) . ', ' . $this->e($this->getTr('USERS')) .', ' . $this->e($valueArray['name']),
    'navigationLinks'   =>  'index, index'
));
$registerDate = new DateTime($this->e($valueArray['account_created']));
?>
<div class="container bootstrap snippet">
    <div class="row">
  		<div class="col-sm-10"><h2><?php echo $this->e($valueArray['name']);?></h2></div>
    </div>
    <div class="row">
  		<div class="col-sm-3">
      <div class="text-center">
        <img src="resources/images/default_avatars/1.png" class="avatar img-circle img-thumbnail" alt="<?php echo $this->e($valueArray['name']);?>">
      </div><hr>
          <div class="card">
              <div class="card-header">
                <?php echo $this->e($this->getTr('STATS'));?>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><img src="resources/images/icons/book.png"> <?php echo $this->e($this->getTr('NOTES'));?>: <?php echo $this->e($valueArray['num_notes']);?></li>
                <li class="list-group-item"><img src="resources/images/icons/folder.png"> <?php echo $this->e($this->getTr('FILES'));?>: <?php echo $this->e($valueArray['num_files']);?></li>
                <li class="list-group-item"><img src="resources/images/icons/friends.png"> <?php echo $this->e($this->getTr('FRIENDS'));?>: <?php echo $this->e($valueArray['num_friends']);?></li>
              </ul>
          </div>
          
        </div>
    	<div class="col-sm-9">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" href="#details" data-toggle="tab"><?php echo $this->e($this->getTr('DETAILS'));?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#notes" data-toggle="tab"><?php echo $this->e($this->getTr('NOTES'));?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#friends" data-toggle="tab"><?php echo $this->e($this->getTr('FRIENDS'));?></a>
          </li>
        </ul>
 
          <div class="tab-content">
            <div class="tab-pane active" id="details">
                <hr>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label"><?php echo $this->e($this->getTr('MAIL_SIGNUP'));?></label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $this->e($valueArray['email']);?>">
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="staticRegisterDate" class="col-sm-2 col-form-label"><?php echo $this->e($this->getTr('REGISTER_DATE'));?></label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext" id="staticRegisterDate" value="<?php echo $registerDate->format($this->e($this->getTr('DATE_FORMAT')));?>">
                    </div>
                </div>
             </div>
             <div class="tab-pane" id="notes">
               <hr>
               <?php 
               if ($this->e($valueArray['num_notes'] !== 0)) {
                   echo '<ul class="list-group">';
                   foreach ($this->e($notes) as $note) {
                       $notePublishDate = new DateTime($note['creation_date']);
                       echo '<li class="list-group-item" title="' . $note['description'] . '"><img src="resources/images/icons/book.png"> <a href="notes/' . $note['id'] . '"><strong>' . $note['title'] . '</strong></a><span style="float: right">' . $notePublishDate->format($this->e($this->getTr('DATE_FORMAT'))) . '</span>';
                   }
                   echo '</ul>';
               } else {
                   echo '<i>' . $this->e($valueArray['name']) . ' ' . $this->getTr('NO_NOTES_USER') . '</i>';
               }
               ?>
             </div>
             <div class="tab-pane" id="friends">
                  <hr>
                  <i><?php echo $this->e($valueArray['name'])?> <?php echo$this->getTr('NO_FRIENDS')?></i>
              </div>     
              </div>
          </div>
        </div>
    </div>