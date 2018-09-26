<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

      <!-- Layout container -->
      <div class="layout-container">
        <!-- Layout navbar -->
<?php include 'includes/search.php'; ?>

        <!-- / Layout navbar -->

        <!-- Layout content -->
        <div class="layout-content">

          <!-- Content -->
          <div class="container-fluid flex-grow-1 container-p-y">

            <?php 

            switch (GetPage()) {
              case "":
                include THEME . "home.php";
                break;

              case "user":

                switch (GetSubPage()) {
                  default:
                    include THEME . "user.php";
                    break;

                  case "trash":
                    include THEME . "user.php";
                    break;
                  case "add":
                    include THEME . "user-add.php";
                    break;
                  case "profile":
                    include THEME . "user-profile.php";
                    break;

                  case "group":
                    include THEME . "user-group.php";
                    break;
                }
                break;
              
              case "modules":
                include THEME . "modules.php";
                break;
            }
            ?>

          </div>
          <!-- / Content -->

          <!-- Layout footer -->
          <nav class="layout-footer footer bg-footer-theme">
            <div class="container-fluid d-flex flex-wrap justify-content-between text-center container-p-x pb-3">
              <div class="pt-3">
                <span class="footer-text font-weight-bolder"><?= SITE_NAME; ?></span> ©
              </div>
              <div>
                <a href="javascript:void(0)" class="footer-link pt-3">About Us</a>
                <a href="javascript:void(0)" class="footer-link pt-3 ml-4">Help</a>
                <a href="javascript:void(0)" class="footer-link pt-3 ml-4">Contact</a>
                <a href="javascript:void(0)" class="footer-link pt-3 ml-4">Terms &amp; Conditions</a>
              </div>
            </div>
          </nav>
          <!-- / Layout footer -->

        </div>
        <!-- Layout content -->

      </div>
      <!-- / Layout container -->

<?php include 'includes/footer.php'; ?>