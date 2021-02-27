<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Dashboard</title>
    <style>
        .body{
        font-family: 'Nunito', sans-serif;
        padding: 50px;
        }
        .card{
            border-radius: 4px;
            background: #fff;
            box-shadow: 0 6px 10px rgba(0,0,0,.08), 0 0 6px rgba(0,0,0,.05);
            transition: .3s transform cubic-bezier(.155,1.105,.295,1.12),.3s box-shadow,.3s -webkit-transform cubic-bezier(.155,1.105,.295,1.12);
        padding: 14px 80px 18px 36px;
        cursor: pointer;
        }

        .card:hover{
            transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
        }

        .card h3{
        font-weight: 600;
        }

        .card img{
        position: absolute;
        top: 20px;
        right: 15px;
        max-height: 120px;
        }

        .card-1{
        background-image: url(https://ionicframework.com/img/getting-started/ionic-native-card.png);
            background-repeat: no-repeat;
            background-position: right;
            background-size: 80px;
        }

        .card-2{
        background-image: url(https://ionicframework.com/img/getting-started/components-card.png);
            background-repeat: no-repeat;
            background-position: right;
            background-size: 80px;
        }

        .card-3{
        background-image: url(https://ionicframework.com/img/getting-started/theming-card.png);
            background-repeat: no-repeat;
            background-position: right;
            background-size: 80px;
        }

        @media(max-width: 990px){
            .card{
                margin: 20px;
            }
        } 
    </style>
</head>
<body>
    <div class="container" style="margin-top:100px">
    <div class="row">
        <div class="col-md-6">
        <div class="card card-1">
            <a  class="btn btn-danger" href="{{ URL::to('login') }}"><h3>Login</h3></a>
        </div>
        </div>
        <!-- <div class="col-md-4">
        <div class="card card-2">
            <a class="btn btn-success" href="{{ URL::to('employees') }}"><h3>Manage Employees</h3></a>
        </div>
        </div> -->
        <div class="col-md-6">
        <div class="card card-2">
            <a class="btn btn-warning" href="{{ URL::to('index') }}"><h3>Layouting</h3></a>
        </div>
        </div>
    </div>
</div>
</body>
</html>