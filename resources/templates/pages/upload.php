<?php $this->layout('global::template', array(
    'subtitle'  =>  $this->e($this->getTr('SIGNUP')),
    'navigation'    =>  $this->e($this->getTr('INDEX')) . ', ' . $this->e($this->getTr('UPLOAD')),
    'navigationLinks'   =>  'index'
));
echo '<h2>' . $this->e($this->getTr('UPLOAD_NOTE')). '</h2>';
?>
<form method="post">
<div class="form-group">
<label for="category"><?php echo $this->e($this->getTr('LEVEL'))?></label>
<select id="category" name="category" class="form-control">
<?php 
foreach ($this->e($categoryTrCodes) as $i => $category) {
    echo '<option value="' . $i . '">' . $this->e($this->getTr($category)) . '</option>';
}
?>
</select>
</div>
<div class="form-group">
<label for="subcategory"><?php echo $this->e($this->getTr('SUBJECT'))?></label>
<input type="text" id="subcategory" name="subcategory" class="form-control" placeholder="<?php echo $this->e($this->getTr('MATHS'))?>" required>
</div>
<div class="form-group">
<label for="title"><?php echo $this->e($this->getTr('TITLE'))?></label>
<input type="text" id="title" name="title" class="form-control" placeholder="<?php echo $this->e($this->getTr('EXTITLE'))?>" required>
</div>
<div class="form-group">
<label for="desc"><?php echo $this->e($this->getTr('DESC'))?></label>
<input type="text" id="desc" name="desc" class="form-control" placeholder="<?php echo $this->e($this->getTr('EXDESC'))?>" required>
</div>
<div class="form-group">
<label for="content"><?php echo $this->e($this->getTr('TEXT'))?></label>
<textarea id="content" name="content" class="form-control" placeholder="<?php echo $this->e($this->getTr('EXTEXT'))?>" rows="6" required></textarea>
</div>
<input type="submit" class="btn btn-primary mb-2" name="publish" value="<?php echo $this->e($this->getTr('PUBLISH'))?>">
<input type="reset" class="btn btn-secondary mb-2" value="<?php echo $this->e($this->getTr('RESET'))?>">
</form>