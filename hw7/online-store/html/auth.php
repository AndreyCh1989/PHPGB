<?php
    include ROOT_DIR . 'auth.php';
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse">
      <span class="navbar-nav mr-auto">Hello <?=$username?>!</span>
      <div class="form-inline my-2 my-lg-0">
          <div class="dropdown mr-3">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Cart
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <?if ($cartItems):?>
                    <?php foreach ($cartItems as $item): ?>
                        <div class="mt-2">
                            <img class="img"
                                src="<?=PICS_DIR . $item['img']?>"
                                width="100"
                                height="100"
                                data-toggle="modal"
                                data-target="#exampleModal"/>
                            <div>
                                <p><?=$item['name']?></p>
                                <p>$<?=$item['price']?></p>
                                <p><?=strval($item['quantity'])?> item</p>
                            </div>
                        </div>
                        <form method="POST" id="del<?=$item['id']?>" action="cart.php">
                            <input type="hidden" name="op" value="del">
                            <input type="hidden" name="id" value="<?=$item['id']?>">
                            <button
                                type="button"
                                onClick="submitform('del<?=$item['id']?>')"
                                class="btn btn-secondary mt-3 add"
                                data-dismiss="modal">Remove</button>
                        </form>
                    <?endforeach;?>
                <?endif;?>
              </div>
          </div>
          <form method="POST" class="m-0" id="logout">
            <input type="hidden" name="logout" value="true">
            <button class="btn btn-outline-success my-2 my-sm-0" onClick="submitform('logout')" type="button">Logout</button>
          <form>
      </div>
  </div>
</nav>

<script src="<?=STATIC_DIR . 'js/main.js'?>" type="text/javascript"></script>
