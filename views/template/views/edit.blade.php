<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Edit {{$TableName}}</title>
    </head>
    <body>
        <div class = 'container'>
            <h1>Edit {{$TableName}}</h1>
            <form method = 'get' action = '{{$standardApi}}'>
                <button class = 'btn blue'>{{$TableName}} Index</button>
            </form>
            <br>
            <form method = 'POST' action = '{{$standardApi}}/{{$open}}${{$TableNameSingle}}->id{{$close}}/update'>
                <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
                @foreach($request as $value)

                <div class="input-field col s6">
                    <input id="{{$value}}" name = "{{$value}}" type="text" class="validate" value="{{$open}}${{$TableNameSingle}}->{{$value}}{{$close}}">
                    <label for="{{$value}}">{{$value}}</label>
                </div>
                @endforeach

                <button class = 'btn red' type ='submit'>Update</button>
            </form>
        </div>
    </body>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
</html>
