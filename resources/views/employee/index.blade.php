<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Employee</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

  <div class="container">
   <div class="col-md-12">
     <div class="pull-right">
        <a href="{{ URL::to('employee/create') }}"><div class="btn btn-success">Add New Employee</div></a>
   </div>
   @if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
  @endif

     <table class="table table-striped table-bordered">
       <thead>
         <tr>
           <th>ID</th>
           <th>First Name</th>
           <th>Show</th>
           <th>Edit</th>
           <th>Delete</th>
         </tr>
       </thead>
       <tbody>
        @foreach($employee_models as $key => $value)
         <tr>
           <td>{{ $value->id }}</td>
           <td>{{ $value->emp_fname }}</td>


           <td><a href="{{ URL::to('employee/' . $value->id) }}"><div class="btn btn-success">Show</div></a></td>
           <td><a href="{{ URL::to('employee/' . $value->id . '/edit') }}"><div class="btn btn-primary">Edit</div></a></td>
           <td>
            <a href="{{ URL::to('employee/' . $value->id . '/delete') }}">
               <div class="btn btn-danger">Delete</div></a>

          </td>
         </tr>
         @endforeach
       </tbody>
     </table>
   </div>
 </div>
        </div>

    </body>
</html>
