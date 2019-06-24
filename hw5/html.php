<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <h1>Галерея</h1>
    <form enctype="multipart/form-data" action="upload.php" method="POST">
        <input type="hidden" name="MAX_FILE_SIZE" value="41943040" />
        Choose picture <input name="file" type="file" accept="image/png, image/jpeg">
        <input type="submit" name="upload" value="Upload"/><br/>
    </form>
    </br>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Size</th>
          <th scope="col">Img</th>
          <th scope="col">Views</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach (getAll() as $picture): ?>
            <tr>
                <td><?=$picture['name']?></td>
                <td><?=$picture['size']?></td>
                <td>
                    <a href="<?=PICS_DIR . $picture['path']?>" target="new">
                        <img src="<?=PICS_DIR . $picture['path']?>" data-id="<?=$picture['id']?>" width="100" height="100"/>
                    </a>
                </td>
                <td><?=$picture['views']?></td>
            </tr>
        <?php endforeach;?>
      </tbody>
    </table>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('click', event => {
            if (event.srcElement.nodeName === 'IMG') {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        console.log(this.responseText);
                    }
                };
                xmlhttp.open("GET", `./increment.php?id=${event.srcElement.dataset.id}`, true);
                xmlhttp.send();

                location.reload();
            }
        })
    </script>
  </body>

  <style>
    .gallery {
        display: inline-flex;
    }
  </style>
</html>
