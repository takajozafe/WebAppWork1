</div> <?php // End of div in navigational.php ?>

<script src="<?php echo base_url('commons/js/core/jquery-3.2.1.slim.min.js') ?>" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="<?php echo base_url('commons/js/core/popper.min.js') ?>" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="<?php echo base_url('commons/js/core/moment.js') ?>"></script>

<?php $request_uri = substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['REQUEST_URI'], '/') + 1); ?>
<?php $request_dir = explode("/", $_SERVER['REQUEST_URI'])[sizeof(explode("/", $_SERVER['REQUEST_URI']))-2]; ?>
<script> var apiBackend = "<?php echo API_URL ?>"; </script>

<script src="<?php echo base_url('commons/js/core/sha512.min.js') ?>"></script>
<script src="<?php echo base_url('commons/js/backend/services/language.service.js') ?>"></script>
<script src="<?php echo base_url('commons/js/backend/services/constants.service.js') ?>"></script>
<script src="<?php echo base_url('commons/js/backend/controllers/'.$request_dir.'/'.camelize($request_uri).'Controller.js') ?>"></script>