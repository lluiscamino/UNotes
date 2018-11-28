<?php
$this->layout('global::template', array(
    'subtitle' => $this->e($this->getTr('404ERROR')),
    'navigation'    =>  $this->e($this->getTr('INDEX')) . ', ' . $this->e($this->getTr('404ERROR')),
    'navigationLinks'   =>  'index'
));
echo '<h2>' . $this->e($this->getTr('404ERROR')) .'</h2>
The requested page was not found on this server.<br>
' . $this->e($this->getTr('RETURNINDEX')) . '.';
?>