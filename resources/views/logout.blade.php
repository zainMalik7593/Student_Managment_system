<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="frontend/css/bootstrap.css">
    <link rel="shortcut icon" href="frontend/img/icons/simsat.photo.png" />
</head>
<body style="background-color: #fce1e1">
    <div class="d-flex flex-direction-column justify-content-center align-items-center"  style="height: 100vh; width: 100vw;">
        <img src="frontend/img/icons/logout.png" height="400" alt="">
        <div>
            <h1 style="font-family: Georgia, 'Times New Roman', Times, serif; font-weight: 900" class="text-dark">Logout Successfully</h1>
            <a href="{{ url('/') }}">
                <button class="btn btn-danger">Go Back</button>
            </a>
        </div>
    </div>
</body>
</html>