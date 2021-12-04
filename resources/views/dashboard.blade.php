
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
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Game Critic Panel</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="/" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline" style="color:#FFFFFF">Oyun ekle</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/news" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline" style="color:#FFFFFF">Haber ekle</span>
                        </a>
                    </li>

                </ul>
                <hr>
                <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1">furblood</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col py-3">
            <h3 style="text-align:center">Game Add Form</h3>
            <form class="col-md-6" style="margin:0 auto; background: #c6c6c6">
                <div class="form-row" style="padding:20px">
                    <div class="form-group col-md-6">
                        <label for="name">Game Name</label>
                        <input name="name" class="form-control"  placeholder="Game Name">
                    </div>
                    <div class="form-group col-md-12 mt-2">
                        <label for="content">Game Content</label>
                        <textarea name="content" class="form-control"  placeholder="Game Content"></textarea>
                    </div>
                    <div class="form-group col-md-12 mt-2">
                        <label for="content">Game Tags</label>
                        <input name="tags" class="form-control"  placeholder="Game Tags">
                    </div>
                    <div class="form-group col-md-6 mt-2">
                        <label for="company_id">Companies</label>
                        <p>
                            <select class="form-select" name="company_id">
                                <option value="" selected>Select options </option>
                                @foreach($companies as $company)
                                    <option value="{{$company->id}}">{{$company->name}}</option>
                                @endforeach
                            </select>
                        </p>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="company_create" id="company_create" type="checkbox" >
                        <label class="form-check-label" for="company_create">
                            Create Company
                        </label>
                    </div>
                    <div id="create_game_div" style="display: none">
                    <div class="form-group col-md-6 mt-2">
                        <label for="content">Company Name</label>
                        <input name="company_name" class="form-control"  placeholder="Company Name">
                    </div>
                    <div class="form-group col-md-12 mt-2">
                        <label for="content">Company Content</label>
                        <textarea name="company_content" class="form-control"  placeholder="Company Content"></textarea>
                    </div>
                    </div>
                    <div class="form-group col-md-6 mt-2">
                        <label for="inputPassword4">Stores</label>
                        <p>
                    <select class="js-example-basic-multiple" name="stores[]" id="stores" multiple="multiple">
                     @foreach($stores as $store)
                        <option value="{{$store->id}}">{{$store->name}}</option>
                      @endforeach
                    </select>
                        </p>
                    </div>

                    <div class="form-group col-md-6 mt-2">
                        <label for="game_images">Image Links</label>
                        <p>
                        <input name="game_images" type="text" value="" data-role="tagsinput" />
                        </p>
                    </div>
                    <div class="form-group col-md-6 mt-2">
                        <label for="content">Release Date</label>
                        <input type="date" name="release_date" class="form-control"  placeholder="Release Date">
                    </div>

                    <div class="form-group col-md-6 mt-2">
                        <label>Platforms</label>
                         <p>
                                <select class="js-example-basic-multiple" name="platforms[]" id="platforms" multiple="multiple">
                                    @foreach($platforms as $platform)
                                        <option value="{{$platform->id}}">{{$platform->name}}</option>
                                    @endforeach
                                </select>
                            </p>
                        </div>
                    </div>

                <button type="submit" class="btn btn-primary col-md-12 create">Create</button>
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

<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();

        $('#company_create').change(
            function(){
                if ($(this).is(':checked')) {
                    $("#create_game_div").css("display", "block");

                }
                else{
                    $("#create_game_div").css("display", "none");

                }
            });

        $(".create").click(function(event){
            event.preventDefault();

            let name = $("input[name=name]").val();
            let content = $("textarea[name=content]").val();
            let tags = $("input[name=tags]").val();
            let company_id = $("select[name=company_id]").val();
            let company_name = $("input[name=company_name]").val();
            let company_content = $("textarea[name=company_content]").val();
            let stores =$('#stores').select2('val');
            let game_images = $("input[name=game_images]").tagsinput('items');
            let platforms=$('#platforms').select2('val');
            let release_date=$("input[name=release_date]").val();


            let _token   = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: "/api/game-create",
                type:"POST",
                data:{
                    name:name,
                    content:content,
                    tags:tags,
                    company_id:company_id,
                    company_name:company_name,
                    company_content:company_content,
                    stores:stores,
                    game_images:game_images,
                    platforms:platforms,
                    release_date:release_date,
                    _token: _token
                },
                success:function(response){
                    Swal.fire({
                        title: response,
                        width: 600,
                        padding: '3em',
                        background: '#fff url(/images/trees.png)',
                        backdrop: `
    rgba(0,0,123,0.4)
    url("{{asset('/gif/giphy2.gif')}}")
    right top
    no-repeat
  `
                    })
                },
                error: function(error) {
                    Swal.fire({
                        title: error,
                        width: 600,
                        padding: '3em',
                        background: '#fff url(/images/trees.png)',
                        backdrop: `
    rgba(0,0,123,0.4)
    url("{{asset('/gif/giphy2.gif')}}")
    right top
    no-repeat
  `
                    })
                }
            });
        });


    });
</script>
</body>

</html>
