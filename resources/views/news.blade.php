
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

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

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
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline" style="color:#FFFFFF">Add Game</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/news" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline" style="color:#FFFFFF">Add News</span>
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
            <h3 style="text-align:center">News Add Form</h3>
            <form class="col-md-6" style="margin:0 auto; background: #c6c6c6">
                <div class="form-row" style="padding:20px">
                    <div class="form-group col-md-6">
                            <label for="name">News Title</label>
                        <input name="name" class="form-control"  placeholder="News Title">
                    </div>
                    <div class="form-group col-md-12 mt-2">
                        <label for="content">News Content</label>
                        <textarea id="news_content" type="" name="content" class="form-control"  placeholder="News Content"></textarea>
                    </div>



                    <div class="form-group col-md-6 mt-2">
                        <label for="news_images">Image Links</label>
                        <p>
                            <input name="news_images" type="text" value="" data-role="tagsinput" />
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
        tinymce.init({
            selector: '#news_content',

            image_class_list: [
                {title: 'img-responsive', value: 'img-responsive'},
            ],
            height: 500,
            setup: function (editor) {
                editor.on('init change', function () {
                    editor.save();
                });
            },
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste imagetools"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image ",

            image_title: true,
            automatic_uploads: true,
            images_upload_url: '/upload',
            file_picker_types: 'image',
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function() {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), { title: file.name });
                    };
                };
                input.click();
            }
        });


        $(".create").click(function(event){
            event.preventDefault();

            let title = $("input[name=name]").val();
            let content = $("textarea[name=content]").val();
            let news_images = $("input[name=news_images]").tagsinput('items');

            let _token   = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: "/news-create",
                type:"POST",
                data:{
                    title:title,
                    content:content,
                    news_images:news_images,
                    _token: _token
                },
                success:function(response){
                    console.log(response);
                    Swal.fire({
                        title: response,
                        width: 600,
                        padding: '3em',
                        background: '#fff',
                        backdrop: `
    rgba(0,0,123,0.4)
    url("{{asset('/gif/giphy.gif')}}")
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
                        background: '#fff',
                        backdrop: `
    rgba(0,0,123,0.4)
    url("{{asset('/gif/giphy.gif')}}")
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
