<?php $this->layout('global::template', array(
    'subtitle'  =>  $this->e($this->getTr('ABOUT')),
    'navigation'    =>  $this->e($this->getTr('INDEX')) . ', ' . $this->e($this->getTr('ABOUT')),
    'navigationLinks'   =>  'index'
));
echo '<img src="resources/images/stock/bar.jpg" class="img-fluid" alt="Responsive image" id="rounded-image">';
echo '<p><br>' . $this->e($this->getTr('ABOUT_CONTENT'));
?>