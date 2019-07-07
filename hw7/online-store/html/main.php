<?php
    include ROOT_DIR . 'main.php';

    include HTML_DIR . 'auth.php';
    include HTML_DIR . 'header.php';
?>

<body>
<link rel="stylesheet" type="text/css" href="<?=STATIC_DIR . 'css/main.css'?>">
<h1>Catalog</h1>
<div class="container">
    <?php foreach (getAll() as $product): ?>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <img class="img" src="<?=PICS_DIR . $product['image']?>" data-id="<?=$product['id']?>" width="100" height="100" data-toggle="modal" data-target="#exampleModal"/>
                <button type="button" class="btn btn-secondary mt-3" data-dismiss="modal">Add</button>
            </div>
        </div>
    <?php endforeach;?>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img class="modal-img" src="" width="200" height="200"/>
        <span class="modal-price"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script src="<?=STATIC_DIR . 'js/main.js'?>" type="text/javascript"></script>
</body>

<?php
    include HTML_DIR . '/footer.php';
?>
