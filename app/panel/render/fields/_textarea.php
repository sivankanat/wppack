<!-- field -->

<div class="field">
  <!-- head -->
  <div class="field-head">
    <p class="title"><?php echo $field['title'] ?></p>
    <p class="desc"><?php echo $field['desc'] ?></p>
  </div>

  <!-- body -->
  <div class="field-body">
    <textarea name="app_options[<?= $field['id'] ?>]" rows="5"><?php echo !empty($value) ? $value : $def_text ?></textarea>
  </div>
  <!-- body end -->
</div>

<!-- field end -->