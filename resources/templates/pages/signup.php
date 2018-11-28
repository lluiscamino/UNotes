<?php $this->layout('global::template', array(
    'subtitle'  =>  $this->e($this->getTr('SIGNUP')),
    'navigation'    =>  $this->e($this->getTr('INDEX')) . ', ' . $this->e($this->getTr('SIGNUP')),
    'navigationLinks'   =>  'index'
));
echo '<h2>' . $this->e($this->getTr('SIGNUP')). '</h2>';
echo '<p><br>' . $this->e($this->getTr('NO_SIGNUP')) . '.<br> ' . $this->e($this->getTr('RETURNINDEX')) . '.';
?>