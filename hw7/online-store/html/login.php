<form class="w-25" method="POST" action="<?=ROOT_DIR . 'login.php'?>">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
  </div>
  <div class="form-group">
    <label for="pass">Password</label>
    <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>
