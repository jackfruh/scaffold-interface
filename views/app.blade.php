<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>installation</title>
        <style>
            label {
                width: 100%;
            }
            .input-field label {
                font-size: 0.8rem;
                -webkit-transform: translateY(-140%);
                -moz-transform: translateY(-140%);
                -ms-transform: translateY(-140%);
                -o-transform: translateY(-140%);
                transform: translateY(-140%);
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h2><i>Scaffold Interface</i> for laravel v5.1</h2>
            <div style = 'margin-top: 2cm;'></div>
            <div class = 'row'>
                <div class = 'col s5'>
                    <a class = 'createNewTable btn waves-effect waves-light btn'><i class = 'material-icons left'>create</i>New Table</a>
                    <br>
                    <div class = 'new'>
                    </div>
                </div>
                <div class = 'col s7'>
                <div class = 'actions'>
                </div>
                    @if (session('status'))
                    <div class="msg card-panel #fce4ec green lighten-5">
                        <div class = 'row'>
                            <div class = 'col s5'><i class = 'large material-icons'>info</i></div>
                            <div class = 'col s7'><blockquote>
                                {{ session('status') }}
                            </blockquote>
                        </div>
                    </div>
                </div>
                @endif
                <table>
                    <thead>
                        <th>Name</th>
                        <th>Created at</th>
                        <th>Rollback</th>
                    </thead>
                    <tbody>
                        @foreach($scaffold as $value)
                        <tr>
                            <td>{{$value->tablename}}</td>
                            <td>{{$value->created_at}}</td>
                            <td><a href = '#modal1' class = 'delete btn-floating modal-trigger pink' data-link = '/scaffold/guidelete/{{$value->id}}/'><i class = 'material-icons'>repeat</i></a></td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
                {!! $scaffold->render() !!}
                <p class = 'light'>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
                <div class = 'message'></div>
            </div>
        </div>
    </div>
    <div id="modal1" class="modal">
        <div class = "row AjaxisModal">
        </div>
    </div>
</body>
<!--***********************************************************************************************************-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
<script src= "http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js" </script>
<script> var baseURL = "{{URL::to('/')}}"</script>
<script type="text/javascript" src = "{{URL::to('js/AjaxisMaterialize.js')}}"></script>
<script> var baseURL = "{{URL::to('/')}}"</script>
<script> var token = '{{Session::token()}}'</script>
<script src = "{{URL::to('js/custom.js')}}"></script>
</html>