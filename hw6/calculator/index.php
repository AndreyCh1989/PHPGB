<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Calculator</title>
  </head>
  <body>
    <form class="w-25">
      <div class="form-group mt-5">
        <span class="label"></span>
        <input type="number" class="form-control" id="input" value="0">
      </div>
      <div class="form-group">
        <div class="row w-100 m-0">
            <button type="submit" data-action="+" class="btn btn-success border border-secondary col-3">+</button>
            <button type="submit" data-action="-" class="btn btn-success border border-secondary col-3">-</button>
            <button type="submit" data-action="/" class="btn btn-success border border-secondary col-3">/</button>
            <button type="submit" data-action="*" class="btn btn-success border border-secondary col-3">*</button>
        </div>
        <div class="row w-100 m-0">
            <button type="button" data-action="7" class="btn btn-primary border border-secondary col-4">7</button>
            <button type="button" data-action="8" class="btn btn-primary border border-secondary col-4">8</button>
            <button type="button" data-action="9" class="btn btn-primary border border-secondary col-4">9</button>
        </div>
        <div class="row w-100 m-0">
            <button type="button" data-action="4" class="btn btn-primary border border-secondary col-4">4</button>
            <button type="button" data-action="5" class="btn btn-primary border border-secondary col-4">5</button>
            <button type="button" data-action="6" class="btn btn-primary border border-secondary col-4">6</button>
        </div>
        <div class="row w-100 m-0">
            <button type="button" data-action="1" class="btn btn-primary border border-secondary col-4">1</button>
            <button type="button" data-action="2" class="btn btn-primary border border-secondary col-4">2</button>
            <button type="button" data-action="3" class="btn btn-primary border border-secondary col-4">3</button>
        </div>
        <div class="row w-100 m-0">
            <button type="button" data-action="0" class="btn btn-primary border border-secondary col-12">0</button>
        </div>
        <div class="row w-100 m-0">
            <button type="submit" data-action="=" class="btn btn-danger border border-secondary col-12 mt-3">=</button>
        </div>
      </div>
    </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        let data = [];

        function setLabel(operations) {
            const label = document.querySelector('.label');

            if (operations.error) {
                label.textContent = `Error: ${operations.error}`;
                data = [];
                document.querySelector('#input').value = 0;
                return;
            }

            label.textContent = '';
            operations.forEach((operation, index) => {
                label.textContent += `${operation.input} ${operation.action}`;
                if (operation.action === '=') {
                    label.textContent += operation.result;
                    document.querySelector('#input').value = 0;
                }
            })
        }

        document.addEventListener('click', event => {
            if (event.target.nodeName === 'BUTTON') {
                if (event.target.type === 'submit') {
                    event.preventDefault();

                    if (document.querySelector('#input').value === '')
                    return;

                    if (data.filter(o => o.action === '=').length) {
                        data = [];
                    }

                    data.push({
                        'action': event.target.dataset.action,
                        'input': document.querySelector('#input').value
                    });

                    document.querySelector('#input').value = '';

                    fetch('./calc.php', {
                      method: 'POST',
                      body: JSON.stringify(data),
                      headers:{
                        'Content-Type': 'application/json'
                      }
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
                            setLabel(JSON.parse(string));
                        }
                    )
                    .catch(
                        error => console.error(error)
                    );

                } else if (event.target.type === 'button') {
                    if (/(^$)|(^0$)/g.test(document.querySelector('#input').value)) {
                        document.querySelector('#input').value = event.target.textContent;
                    } else {
                        document.querySelector('#input').value += event.target.textContent;
                    }
                }
            }
        })

        document.addEventListener("keydown", event => {
          let key = event.key;
          if (key === 'Enter')
            key = '=';

          const component = document.querySelector(`[data-action='${key}']`);
          if (component) {
            component.click();
          }
        });
    </script>
  </body>
</html>
