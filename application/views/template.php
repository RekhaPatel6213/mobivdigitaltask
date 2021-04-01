<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />    
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="apple-mobile-web-app-capable" content="yes" />
 	<title> <?= PROJECT_NAME; ?></title>
  <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>bootstrap/images/favicon.ico" >
  <link href="<?php echo base_url('bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
  <script type="text/javascript" src="<?= base_url('bootstrap/js/jquery-1.11.1.js'); ?>"></script>
  <script type="text/javascript" src="<?= base_url('bootstrap/js/jquery.validate.js'); ?>"></script>
  <script type="text/javascript">
    var siteurl = '<?= base_url(); ?>';
  </script>
  <style type="text/css">
    #overlay {
      position: absolute;
      top: 50%;
      left: 50%;
      font-size: 50px;
      color: black;
      transform: translate(-50%,-50%);
      -ms-transform: translate(-50%,-50%);
    }
    .error {
      color: rgb(220, 53, 69);
    }
  </style>
</head>
<body>
  <div class="content-wrapper inner page-wrapper">
    <?php if ($this->session->userdata('mobivUserID')) { ?>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="<?= base_url(); ?>"><?= PROJECT_NAME; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbars">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0"> 
            <?php if ($this->session->userdata('isAdmin') === 'No') { ?>                   
              <li class="nav-item active"><a class="nav-link" href="<?php echo base_url(''); ?>">My Profile </a></li>
            <?php } ?>
            <li class="nav-item "><a class="nav-link" href="<?php echo base_url('user/logout'); ?>">Logout </a></li>
          </ul>
        </div>
      </nav>
    <?php } ?>

    <div class="container">
      <div class="overlay" id="overlay" style="display:none;">
        <div id="loading" class="loading">
          <img src="<?= base_url(); ?>bootstrap/images/ajax-loader.gif" alt="load" />
          <h1>Loading, Please wait...</h1>
        </div>
       </div>
      <?php echo $content; ?>
      <div class="cf"></div>
    </div>
  </div>
  <footer class="bg-light text-center text-lg-start fixed-bottom">
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © <?= date('Y'); ?> Copyright:
      <a class="text-dark" href="<?= base_url(); ?>"><?= PROJECT_NAME; ?></a>
    </div>
  </footer>
  <script type="text/javascript" src="<?= base_url('bootstrap/js/bootstrap.min.js'); ?>"></script>
</body>
</html>