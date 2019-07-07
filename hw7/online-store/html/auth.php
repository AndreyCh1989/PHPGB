<?php
    include ROOT_DIR . 'auth.php';
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse">
      <span class="navbar-nav mr-auto">Hello <?=$username?>!</span>
      <form method="POST" class="form-inline my-2 my-lg-0">
        <input type="hidden" name="logout" value="true">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
      <form>
  </div>
</nav>
