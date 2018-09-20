<!DOCTYPE html>

<html lang="en" class="default-style">
<head>
  <title>404 Not Found</title>

  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="IE=edge,chrome=1">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
  <link rel="icon" type="image/x-icon" href="favicon.ico">

  <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900" rel="stylesheet">

  <!-- Core stylesheets -->
  <link rel="stylesheet" href="<?= CDN; ?>_vendor/css/rtl/bootstrap.css" class="theme-settings-bootstrap-css">
  <link rel="stylesheet" href="<?= CDN; ?>_vendor/css/rtl/appwork.css" class="theme-settings-appwork-css">
  <link rel="stylesheet" href="<?= CDN; ?>_vendor/css/rtl/theme-corporate.css" class="theme-settings-theme-css">
  <link rel="stylesheet" href="<?= CDN; ?>_vendor/css/rtl/colors.css" class="theme-settings-colors-css">
  <link rel="stylesheet" href="<?= CDN; ?>_vendor/css/rtl/uikit.css">

  <script src="<?= CDN; ?>_vendor/js/material-ripple.js"></script>
  <script src="<?= CDN; ?>_vendor/js/layout-helpers.js"></script>

  

  <!-- Core scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Page -->
  <link rel="stylesheet" href="<?= CDN; ?>_vendor/css/pages/error.css">
</head>

<body class="bg-primary">

  <div class="overflow-hidden">
    <div class="container d-flex align-items-stretch ui-mh-100vh p-0">
      <div class="row w-100">
        <div class="d-flex col-md justify-content-center align-items-center order-2 order-md-1 position-relative p-5">
          <div class="error-bg-skew bg-white"></div>

          <div class="text-md-left text-center">
            <h1 class="display-2 font-weight-bolder mb-4"><?= e("whoops"); ?></h1>
            <div class="text-xlarge font-weight-light mb-5"><?= e("message_not_found"); ?><br><?= e("404_message") ?></div>
            <button type="button" class="btn btn-primary">←&nbsp; <?= e("goback"); ?></button>
          </div>
        </div>

        <div class="d-flex col-md-5 justify-content-center align-items-center order-1 order-md-2 text-center text-white p-5">
          <div>
            <div class="error-code font-weight-bolder mb-2">404</div>
            <div class="error-description font-weight-light">Not Found</div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- Core scripts -->
  <script src="<?= CDN; ?>_vendor/libs/popper/popper.js"></script>
  <script src="<?= CDN; ?>_vendor/js/bootstrap.js"></script>
</body>
</html>
