<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <!-- Bootstrap Bundle JS (jsDelivr CDN) -->
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="../css/app.css">
        <style>
            .all_content{
                display: flex;
                flex-flow: row;
            }
            .form,.contacts{
                width: 50%;
            }
        </style>

    </head>
    <div class="container">
        <div class="row justify-content-center all_content">
            <div class="form">
                <h2> Create comment</h2>
                <form method="POST" action ="{{route('formForContact') }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name:</label>
                        <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Email:</label>
                        <input name="email" type="email" class="form-control" id="exampleInputPassword1" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Message:</label>
                        <input name="message" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="contacts">
                <h2> Comments</h2>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Message</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($all))
                        @foreach($all as $contact)
                            <tr>
                                <th scope="row">{{$contact->id}}</th>
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->message}}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
{{--@endsection--}}
