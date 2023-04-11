<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <style>
        body {
            background-color: #eee;
            height: 100vh;
            font-family: "Poppins", sans-serif;
            background: linear-gradient(to top, #fff 10%, rgba(93, 42, 141, 0.4) 90%) no-repeat;
        }


        .btn .btn-block {
            border-radius: 20px;
            background-color: #400485;
            color: #fff;
        }

        .btn .btn-block:hover {
            background-color: #400485;
        }
    </style>

    <title>Products</title>
</head>

<body>

    <section>
        <div class="container py-5">

            @if ($message = Session::get('success'))
                <form>
                    <div class="alert alert-success alert-block text-dark alert-dismissible">
                        <strong>{{ $message }}</strong>
                        <button type="submit" class="btn-close"></button>
                    </div>
                </form>
            @endif

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 justify-content-center">
                <div class="col">
                    <div class="card-deck d-flex flex-wrap">

                        @foreach ($products as $key => $product)
                            @if ($product->status == 1)
                                <div class="card mb-3 shadow p-3 mb-5 rounded border-0 mt-3">
                                    <img src="/images/{{ $product->image }}" class="card-img-top mb-2"
                                        alt="{{ $product->name }}">

                                    <div class="card-body">
                                        <div class="text-center">
                                            <p class="text-muted mb-4">{{ $product->name }}</p>
                                        </div>
                                        <div>

                                            <hr class="my-0 mb-4" />
                                            <div class="d-flex justify-content-between">
                                                {!! $product->description !!}
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="my-5 mb-4" />
                                    <div class="d-flex justify-content-between">

                                        <a href="edit/{{ $product->id }}">
                                            <i class="bi bi-pencil btn btn-block text-light"
                                                style="background-color: #7c5abb;" role="button"></i>
                                        </a>

                                        <a href="remove/{{ $product->id }}" method="POST">
                                            <i class="bi bi-x btn btn-block text-light"
                                                style="background-color: #ff3636;"></i>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>


</body>

</html>
