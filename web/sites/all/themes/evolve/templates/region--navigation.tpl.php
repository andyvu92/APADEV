<?php
  // GET CART COUNT
  $type = "PD";
  $counts = 0;
  if(isset($_SESSION['UserId'])) {
    $userID = $_SESSION['UserId'];
    $type="PD";
    $shoppingcartGetPD = getPDProduct($userID,$type);
    foreach($shoppingcartGetPD as $ttt) {
        $counts++;
    }
    $type="PDNG";
    $shoppingcartGetPDNG = getProduct($userID=$_SESSION['UserId'],$type="PDNG"); 
    foreach($shoppingcartGetPDNG as $ttt) {
        $counts++;
    }
    $type="PDMG";
    $shoppingcartGetPDMG = getProduct($userID=$_SESSION['UserId'],$type="PDMG");
    foreach($shoppingcartGetPDMG as $ttt) {
        $counts++;
    }

    // GET USER NAME
    $name = $_SESSION["FirstName"];
    if(isset($_SESSION['Preferred-name']) && $_SESSION['Preferred-name'] != "") {
      if(isset($_POST['Preferred-name']) && $_POST['Preferred-name'] != "") {
        $name = $_POST['Preferred-name'];
      } elseif(isset($_POST['Firstname']) && $_POST['Firstname'] != "") {
        $name = $_POST['Firstname'];
      } else {
        $name = $_SESSION['Preferred-name'];
      }
    } elseif(isset($_POST['Preferred-name']) && $_POST['Preferred-name'] != "") {
      $name = $_POST['Preferred-name'];
    } elseif(isset($_POST['Firstname']) && $_POST['Firstname'] != "") {
      $name = $_POST['Firstname'];
    } 
    /********End get user shopping product form APA server******/
  } else {
    $userID = '';
    $counts = 0;
    $name= '';
  }
?>

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

  <div id="main-nav" class="<?php print $classes; ?>">
    <?php print $content; ?>
  </div>

  <div class="mobile_menu_wrapper">
    <!-- NAME & CART -->
    <div class="mobile_user_name">
      <!-- logged in -->
      <?php if(isset($_SESSION["Log-in"])): ?>
        <div class="name_wrapper">
          <span class="icon user_icon"></span>Hi <?php echo $name; ?>
        </div>

        <div class="cart_wrapper" title="Shopping cart">
          <span class="cart_icon"></span>
          <span class="cart_number"><?php echo $counts; ?></span>
        </div>

      <?php else: ?>
        <!-- non-logged in -->
        <div class="user_login_mobile">
          <button class="info" data-target="#loginAT" data-toggle="modal" type="button">
            <span class="icon user_icon"></span>Login
          </button>
        </div>
      <?php endif; ?>
    </div>
    
    <!-- SEARCH -->
    <div id="search-mobile">
      <form action="" method="post" id="search-block-form-mobile" accept-charset="UTF-8">
          <div class="form-item form-type-textfield form-item-search-block-form">
            <input title="Enter the terms you wish to search for." placeholder="Search" type="text" id="edit-search-block-form--2-mobile" name="search_block_form" value="" size="15" maxlength="128" class="form-text">
            <button type="submit" id="edit-submit-mobile" name="op"><span class="icon search_icon"></span></button>
          </div>
      </form>
    </div>

    <?php endif; ?>
    <div id="menu_mobile">
      <?php print $content; ?>
    </div>

    <?php endif; ?>

    <?php if(isset($_SESSION["Log-in"])): ?>
    <!-- USER LOGGED-IN MENU -->
    <div class="other_sites_mobile menu_accordion" title="Other websites">
      <div class="toggle">
        <span class="icon doashboard_icon"></span>
        Your dashboard
      </div>

      <div class="content">
        <ul class="menu">
          <li><a href="/dashboard">Dashboard</a></li>
          <li><a href="/your-details">Account</a></li>
          <li><a href="/your-purchases">Purchases</a></li>
          <li><a href="/subscriptions">Subscriptions</a></li>
          <li><a href="/renewmymembership">Join/Renew</a></li>
        </ul>
      </div>
    </div>
    <?php endif; ?>

    <!-- APA WEBSITES -->
    <div class="other_sites_mobile menu_accordion" title="Other websites">
      <div class="toggle">
        <span class="icon laptop_icon"></span>
        APA websites
      </div>

      <div class="content">
        <ul class="menu">
          <li><a href="https://choose.physio/" target="_blank">choose.physio</a></li>
          <li><a href="https://www.jobs4physios.com.au/" target="_blank">jobs4physios</a></li>
          <li><a href='<?php  if(isset($_SESSION['UserId']))  { echo "https://australian.physio/sso/redirect-cpd4physio";} else { echo "https://cpd4physios.com.au/";}?>' target="_blank">cpd4physios</a></li>
          <li><a href="https://www.classifieds4physios.com.au/" target="_blank">classifieds4physios</a></li>
          <li><a href="https://www.shop4physios.com.au/" target="_blank">shop4physios</a></li>
          <li><a href="https://physiotherapy.eventsair.com/QuickEventWebsitePortal/ifompt-2020/ifompt2020" target="_blank">IFOMPT2020</a></li>
        </ul>
      </div>
    </div>

    <!-- LOGOUT BUTTON -->
    <div class="user_logout_mobile">
      <span class="icon logout_icon"></span>Logout
    </div>
  </div>

  <!-- MENU OVERLAY -->
  <div class="menu_overlay"></div>
  