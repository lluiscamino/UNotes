<?php
$this->layout('global::template', array(
    'subtitle'  =>  $this->e($this->getTr('NOTFOUND')),
    'navigation'    =>  $this->e($this->getTr('INDEX')) . ', ' . $this->e($this->getTr('USERS')) .', ' .$this->e($this->getTr('NOTFOUND')),
    'navigationLinks'   =>  'index, index'
));
echo '<h2>' . $this->e($this->getTr('NOTFOUND')). '</h2>';
echo $this->getTr('USERNOTFOUND') . '.<br>' . $this->e($this->getTr('RETURNINDEX')) . '.';
?>