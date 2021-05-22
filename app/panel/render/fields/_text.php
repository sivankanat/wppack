<!-- field -->

<div class="field">
  <!-- head -->
  <div class="field-head">
    <p class="title"><?php echo $field['title'] ?></p>
    <p class="desc"><?php echo $field['desc'] ?></p>
  </div>

  <!-- body -->
  <div class="field-body">
    <input type="text" name="app_options[<?= $field['id'] ?>]" placeholder="Type text here.." value="<?php echo !empty($value) ? $value : $def_text ?>">
  </div>
  <!-- body end -->
</div>

<!-- field end -->