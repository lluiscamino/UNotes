<?php
$this->layout('global::template', array(
'subtitle'  =>  $this->e($valueArray['title']),
'navigation'    =>  $this->e($this->getTr('INDEX')) . ', ' . $this->e($this->getTr('NOTES')) .', ' . $this->e($valueArray['title']),
'navigationLinks'   =>  'index, index'
))?>
<h2><?php 
echo $this->e($valueArray['title']);
// checks if note was published in the last 5 minutes
if (time() - strtotime($valueArray['creation_date']) <= 300) {
    echo ' <span class="badge badge-success">New</span>';
}
$creationDate = new DateTime($this->e($valueArray['creation_date']));
$userLink = $this->e($userDetails['isguest']) === true ? $this->e($this->getTr('GUEST')) : '<a href="profile/' . $this->e($userDetails['id']) . '" target="_blank">' . $this->e($userDetails['name']) . '</a>';
?></h2>
<div class="card">
  <div class="card-body">
    <?php echo $this->e($valueArray['description']);?>
    <div id="note-info">
      <img src="resources/images/icons/userpencil.png"> <?php echo $userLink ;?> |
      <img src="resources/images/icons/eye.png"> <?php echo $this->e($valueArray['num_views']) .  ' ' . $this->e($this->getTr('VIEWS'));?> |
      <img src="resources/images/icons/calendar.png"> <?php echo $creationDate->format($this->e($this->getTr('DATE_FORMAT')));?>
    </div>
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
    <?php
    echo '<h5 class="card-title">' . $this->e($this->getTr('FILES')) . '</h5>';
    if ($this->e($valueArray['num_files'] !== 0)) {
        echo '<ul id="file-list">';
        foreach ($this->e($files) as $file) {
            echo '<li><a title="' . $this->getTr('OPENFILE') . '" href="' . $file['url'] . '" target="_blank" style="text-decoration: none"><span class="border"><img alt="' . $file['extension'] .'" class="file-icon" src="resources/images/icons/' . $file['extension'] .'.png"> ' . $file['file_name'] . '.' . $file['extension'] . '</span></a>';
        }
        echo '</ul>';
    } else {
        echo '<i>' . $this->getTr('NO_FILES') . '.</i>';
    }
    ?>
  </div>
</div>