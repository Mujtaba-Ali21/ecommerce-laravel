<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Yinka Enoch Adedokun">

    <link rel="stylesheet" href="./style.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- Froala Editor CDNs -->

    <link rel="stylesheet" href="{{ asset('css/froala_editor.pkgd.min.css') }}">

    <script type="text/javascript" src="{{ asset('js/froala_editor.pkgd.min.js') }}"></script>


    <title>Create Product</title>

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Poppins&display=swap");

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #eee;
            height: 100vh;
            font-family: "Poppins", sans-serif;
            background: linear-gradient(to top, #fff 10%, rgba(93, 42, 141, 0.4) 90%) no-repeat;
        }

        .wrapper {
            max-width: 500px;
            border-radius: 10px;
            margin: 50px auto;
            padding: 30px 40px;
            box-shadow: 20px 20px 80px rgb(206, 206, 206);
        }

        .h2 {
            font-family: "Kaushan Script", cursive;
            font-size: 3.5rem;
            font-weight: bold;
            color: #400485;
            font-style: italic;
        }

        .h4 {
            font-family: "Poppins", sans-serif;
        }

        .input-field {
            /* border: 1px solid #ddd; */
            border-radius: 5px;
            padding: 5px;
            display: flex;
            align-items: center;
            cursor: pointer;
            border: 1px solid #400485;
            color: #400485;
        }

        .input-field:hover {
            color: #7b4ca0;
            border: 1px solid #7b4ca0;
        }

        input {
            border: none;
            outline: none;
            box-shadow: none;
            width: 100%;
            padding: 0px 2px;
            font-family: "Poppins", sans-serif;
        }

        .fa-eye-slash.btn {
            border: none;
            outline: none;
            box-shadow: none;
        }

        a {
            text-decoration: none;
            color: #400485;
            font-weight: 700;
        }

        a:hover {
            text-decoration: none;
            color: #7b4ca0;
        }

        .option {
            position: relative;
            padding-left: 30px;
            cursor: pointer;
        }

        .option label.text-muted {
            display: block;
            cursor: pointer;
        }

        .option input {
            display: none;
        }

        .checkmark {
            position: absolute;
            top: 3px;
            left: 0;
            height: 20px;
            width: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 50%;
            cursor: pointer;
        }

        .option input:checked~.checkmark:after {
            display: block;
        }

        .option .checkmark:after {
            content: "";
            width: 13px;
            height: 13px;
            display: block;
            background: #400485;
            position: absolute;
            top: 48%;
            left: 53%;
            border-radius: 50%;
            transform: translate(-50%, -50%) scale(0);
            transition: 300ms ease-in-out 0s;
        }

        .option input[type="radio"]:checked~.checkmark {
            background: #fff;
            transition: 300ms ease-in-out 0s;
            border: 1px solid #400485;
        }

        .option input[type="radio"]:checked~.checkmark:after {
            transform: translate(-50%, -50%) scale(1);
        }

        .btn.btn-block {
            border-radius: 20px;
            background-color: #400485;
            color: #fff;
        }

        .btn.btn-block:hover {
            background-color: #55268be0;
        }

        @media (max-width: 575px) {
            .wrapper {
                margin: 10px;
            }
        }

        @media (max-width: 424px) {
            .wrapper {
                padding: 30px 10px;
                margin: 5px;
            }

            .option {
                position: relative;
                padding-left: 22px;
            }

            .option label.text-muted {
                font-size: 0.95rem;
            }

            .checkmark {
                position: absolute;
                top: 2px;
            }

            .option .checkmark:after {
                top: 50%;
            }

            #forgot {
                font-size: 0.95rem;
            }
        }
    </style>

</head>

<body>

    <div class="wrapper bg-white">

        <div class="h2 text-center">Creativity</div>

        <div class="h4 text-muted text-center pt-2">Create A Product</div>

        <form method="POST" enctype="multipart/form-data" class="pt-3">

            @csrf

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-block text-danger text-capitalize">
                        {{ $error }}
                    </div>
                @endforeach
            @endif

            <div class="form-group py-2">

                <label for="name" class="mb-1">Product name</label>
                <div class="input-field">
                    <input type="text" id="name" placeholder="Product Name" name="name">
                </div>
            </div>

            <div class="form-group py-2 pb-2">
                <label for="description" class="mb-1">Product Description</label>
                <div class="input-field">
                    <textarea name="description" id="description" class="form-control" rows="3" placeholder="Product Description"></textarea>
                </div>
            </div>

            <div class="form-group py-2 pb-2">
                <label for="file" class="mb-1">Select Image</label>
                <div class="input-field">
                    <input type="file" id="file" name="image">
                </div>
            </div>

            <div class="form-group py-2 pb-2">
                <label for="select" class="mb-1">Product Status</label>
                <div class="input-field">
                    <select class="w-100 border-0" id="select" name="status">
                        <option>0</option>
                        <option>1</option>
                    </select>
                </div>
            </div>

            <button class="btn btn-block text-center my-3 d-flex justify-content-center text-center"
                type="submit">Create Product</button>

        </form>

    </div>

    </div>

</body>

<script>
    $(document).ready(function() {
        var editor = new FroalaEditor('#description');
    })
</script>
