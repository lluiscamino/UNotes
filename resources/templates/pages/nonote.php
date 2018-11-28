<?php
$this->layout('global::template', array(
    'subtitle'  =>  $this->e($this->getTr('NOTFOUND')),
    'navigation'    =>  $this->e($this->getTr('INDEX')) . ', ' . $this->e($this->getTr('NOTES')) .', ' .$this->e($this->getTr('NOTFOUND')),
    'navigationLinks'   =>  'index, index'
));
echo '<h2>' . $this->e($this->getTr('NOTFOUND')). '</h2>';
echo $this->getTr('NOTFOUNDNOTE') . '.<br>' . $this->e($this->getTr('RETURNINDEX')) . '.';
?>