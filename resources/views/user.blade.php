<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <title>User</title>
</head>
<body>
    <div class="container">
        <div class="row m-5" >
            <div class="col-md-12">
                <h1 >User View  </h1>
                <h2>Username is {{ $name }} </h2>
                <p>Nom: {{ $users['name'] }}</p>
                <p>Email: {{ $users['email'] }}</p>
                <p>Téléphone: {{ $users['phone'] }}</p>
            </div>
        </div>
    </div>

</body>
</html>
