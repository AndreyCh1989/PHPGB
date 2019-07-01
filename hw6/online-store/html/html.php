<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Catalog</title>
  </head>
  <body>
    <h1>Catalog</h1>
    <div class="container">
        <?php foreach (getAll() as $product): ?>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <img class="img" src="<?=PICS_DIR . $product['image']?>" data-id="<?=$product['id']?>" width="100" height="100" data-toggle="modal" data-target="#exampleModal"/>
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>

  <script>
    function showProduct(product) {
        document.querySelector('.modal-img').src = `pics/${product.image}`;
        document.querySelector('.modal-title').textContent = product.name;
        document.querySelector('.modal-price').textContent = `Price ${product.price}$`;
    }

    document.addEventListener('click', event => {
        if (event.target.className === 'img') {
            fetch(`./sql_operations/getProductInfo.php?id=${+event.target.dataset.id}`, {
              method: 'GET'
            })
            .then(
                async (response) => {
                    const reader = response.body.getReader();
                    const decoder = new TextDecoder("utf-8");
                    let string = "";
                    while(true) {
                        let data = await reader.read();
                        if(data.done) break;
                        string += decoder.decode(data.value);
                    }
                    showProduct(JSON.parse(string)[0]);
                })
            .catch(error => console.error('Error:', error));
        }
    })
  </script>

  <style>
    .container {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
    }
    .card {
        width: 140px !important;
    }
  </style>
</html>
