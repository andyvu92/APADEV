<?php
if ($content):
  $search_block = false;
  $blocks = block_get_blocks_by_region('top');
  if ($blocks) {
    foreach ($blocks as $key => $block) {
      if ($key == 'search_form') {
        $search_block = true;
      }
    }
  }
  ?>
  <?php if ($search_block): ?>
    <a href="#" class="search-toggle"><span class="fa fa-search"></span></a>
    <div class="dexp-menu-toggle" id='custom-nav-toggle'>
      <span class="bar-1"></span><span class="bar-2"></span><span class="bar-3"></span>
      </span><span class="fa fa-search"></span>
    </div>
  
  <div id="search-mobile">
    <form action="" method="post" id="search-block-form-mobile" accept-charset="UTF-8">
        <div class="form-item form-type-textfield form-item-search-block-form">
          <input title="Enter the terms you wish to search for." placeholder="Search" type="text" id="edit-search-block-form--2-mobile" name="search_block_form" value="" size="15" maxlength="128" class="form-text">
          <button type="submit" id="edit-submit-mobile" name="op"><span class="fa fa-search"></span></button>
        </div>
    </form>
  </div>

    <?php endif; ?>
  <div class="<?php print $classes; ?>">
  <?php print $content; ?>
  </div>
<?php endif; ?>