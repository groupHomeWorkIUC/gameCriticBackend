
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Material Dashboard 2 by Creative Tim
    </title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('src/bootstrap-taginput-typehead.css') }}">
    <link rel="stylesheet" href="{{ asset('src/bootstrap-tagsinput.css') }}">


</head>

<body>
<style>
    .d-sm-inline:hover{
        color:red !important;
    }
    .select2{
        width:100% !important;
    }
    .bootstrap-tagsinput span {
        color:black  !important;
    }
    .bootstrap-tagsinput{
        width: 100% !important;
    }
    span[data-role='remove']{
        background-color: red;
    }
</style>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col py-3">
            <h3 style="text-align:center">Login</h3>
            <form method="POST" action="{{ route('login-post') }}" class="col-md-3 p-4" style="margin:0 auto; background: #c6c6c6">
                <div class="form-row" style="padding:20px">
                    <div class="form-group col-md-12">
                        <label for="name">Email</label>
                        <input name="email" class="form-control"  placeholder="Email">
                    </div>
                    <div class="form-group col-md-12 mt-2">
                        <label for="content">Password</label>
                        <input name="password" class="form-control"  placeholder="Password"></input>
                    </div>
                    <button type="submit" class="btn btn-primary col-md-12 create mt-2">Login</button>
                </div>
            </form>

        </div>

    </div>
</div>
</div>
<script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('src/bootstrap-tagsinput.js') }}"></script>
<script src="{{ asset('src/bootstrap-tagsinput-angular.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>

</html>
