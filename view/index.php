<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vigenere</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/css/main.css">
</head>
<body>
    <div class="container">
        <div class="row p-5">
            <h1 class="mb-5 text-center" style="width: 100%">Vigenere Encrypt</h1>
            <form class="col-12" action="" method="POST">
                <div class="form-group">
                    <label for="plainText"><strong>Plain Text</strong></label>
                    <textarea name="plainText"  id="plainText" class="form-control" rows="4" placeholder="Plain Text"></textarea>
                </div>
                <div class="form-group">
                    <label for="key"><strong>Key</strong></label>
                    <textarea name="key" id="key" class="form-control" rows="4" placeholder="Key"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Encyrpt</button>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="./public/js/main.js"></script>
</body>
</html>