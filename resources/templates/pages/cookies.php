<?php
$this->layout('global::template', array(
    'subtitle'  =>  $this->e($this->getTr('COOKIESUSE')),
    'navigation'    =>  $this->e($this->getTr('INDEX')) . ', ' . $this->e($this->getTr('COOKIESUSE')),
    'navigationLinks'   =>  'index, cookies'
));
echo '<h2>' . $this->e($this->getTr('COOKIESUSE')). '</h2>';
echo $this->getTr('COOKIESTXT');
?>