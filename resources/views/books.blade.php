<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>Hellow World</p>
    <form action="/logout" method="post">
        @csrf
        <button type="submit" class="btn btn-dark align-items-center gap-2 text-white ms-3 mt-2">
            <i class="bi bi-box-arrow-right mb-1"></i>
            Logout
        </button>
    </form>
</body>
</html>