<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UPLOAD FILES</title>
    <link rel="stylesheet" href="{{ asset('assets/upload/upload.css') }}">
</head>
<body>
    <form class="upload" action="{{ route('upload.postUpload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="upload-files">
            <header>
                <p>
                    <i class="fa fa-cloud-upload" aria-hidden="true"></i>
                    <span class="up">UP</span>
                    <span class="load">LOAD TO VDI</span>
                </p>
            </header>
            <div class="body" id="drop">
                <i class="fa fa-file-text-o pointer-none" aria-hidden="true"></i>
                <p class="pointer-none">
                    <b>Drag and drop</b> files here <br /> or <a href="" id="triggerFile">browse</a> to begin the upload
                </p>
                <input type="file" multiple="multiple" name="files[]" />
            </div>
            <footer>
                <div class="divider">
                <span>
                    <AR>FILES</AR>
                </span>
                </div>
                <div class="list-files">
                <!--   template   -->
                </div>
                <div>
                    <button class="importar" type="button">UPDATE FILES</button>
                    <button class="uploadFile" type="submit">UPLOAD FILES</button>
                </div>
            </footer>
        </div>
    </form>
    <script src="{{ asset('assets/upload/upload.js') }}"></script>
</body>
</html>