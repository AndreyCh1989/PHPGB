<?php
    include ROOT_DIR . 'login.php';

    include HTML_DIR . 'header.php';
?>

<form class="w-25" method="POST">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
  </div>
  <div class="form-group">
    <label for="pass">Password</label>
    <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
  <?if ($status && $status != ''):?>
    <div class="alert alert-danger"><?=$status?></div>
  <?endif;?>
</form>

<?php
    include HTML_DIR . '/footer.php';
?>
