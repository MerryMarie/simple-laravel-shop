<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
    <link rel="stylesheet" href="../../css/normalize.min.css">
    <link rel="stylesheet" href="../../css/signin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
<main>
    <div class="container">
        <div class="form-wrap d-flex align-items-center justify-content-center">
            <form class="form p-5 shadow-lg rounded" action="{{ route('authenticate') }}" method="post">
                @csrf
                <a class="text-decoration-none fs-4 d-block text-center mb-3 text-dark" href="/">НА
                    ГЛАВНУЮ</a>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Логин</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <div class="text-danger mt-2">
                            Пожалуйста, введите корректный логин.
                        </div>
                    @endif

                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Пароль</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                    @if ($errors->has('password'))
                        <div class="text-danger mt-2">
                            Пожалуйста, введите пароль.
                        </div>
                    @endif

                </div>
                <button type="submit" class="btn btn-primary">Войти</button>
            </form>
        </div>
    </div>

</main>
</body>

</html>
