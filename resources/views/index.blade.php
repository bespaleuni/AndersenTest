<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Andersen</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <style>
            table, th, td {
                border:1px solid black;
            }
        </style>
    </head>
    <body>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{url('/')}}" method="post" class="input-form">
            @csrf
            <div class="input-form">
                <label for="name">Enter your name: </label>
                <input type="text" name="name" id="name" required />
            </div>
            <div class="input-form">
                <label for="email">Enter your email: </label>
                <input type="email" name="email" id="email" required />
            </div>
            <div class="input-form">
                <label for="message">Enter your message: </label>
                <input type="text" name="message" id="message" required />
            </div>
            <div class="input-form">
                <input type="submit" value="Send" />
            </div>
        </form>

        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th><strong>Name</strong></th>
                    <th><strong>Email</strong></th>
                    <th><strong>Message</strong></th>
                    <th><strong>Date created</strong></th>
                </tr>
                </thead>
                <tbody>
                @foreach($info as $key => $data)
                    <tr>    
                    <th>{{$data->name}}</th>
                    <th>{{$data->email}}</th>
                    <th>{{$data->message}}</th>
                    <th>{{$data->created_at}}</th>         
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </body>     
</html>