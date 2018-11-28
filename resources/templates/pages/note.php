<?php $this->layout('global::template', array(
    'subtitle'  =>  $this->e($valueArray['title']),
    'navigation'    =>  $this->e($this->getTr('INDEX')) . ', ' . $this->e($this->getTr('NOTES')) .', ' . $this->e($valueArray['title']),
    'navigationLinks'   =>  'index, index'
    ))?>
<h2><?php echo $this->e($valueArray['title']);?></h2>
<div class="card">
  <div class="card-body">
    <?php echo $this->e($valueArray['description']);?>
    <div id="note-views"><img src="resources/images/icons/eye.png"> <?php echo $this->e($valueArray['num_views']) .  ' ' . $this->e($this->getTr('VIEWS'));?></div>
    <hr>
    <?php echo $this->e($this->getTr('SHARENOTES')); ?>: <input type="text" class="form-control" id="share-link" value="<?php echo $_SERVER['REQUEST_URI'];?>/notes/<?php echo $this->e($valueArray['id']);?>" readonly> <button type="button" class="btn btn-outline-primary" id="copy-button">Copy</button>
  </div>
</div>
<br>
<div class="card">
  <div class="card-body">
    <h5 class="card-title"><?php echo $this->e($this->getTr('CONTENT')); ?></h5>
    <?php
        echo $this->e($valueArray['text_content']) !== '' ? $this->e($valueArray['text_content']) : '<i>' . $this->e($this->getTr('NOCONTENT')) . '.</i>';
    ?>
    <hr>
    <h5 class="card-title"><?php echo $this->e($this->getTr('FILES')); ?></h5>
  </div>
</div>