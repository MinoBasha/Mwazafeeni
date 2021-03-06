<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Employee</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
         <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBmnATbcsItV07AIzYhG-6E0ZYgZgTkh3w"></script>

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
        <div class=" position-ref full-height">
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
                  <h2>Add new Employee</h2>
                      <hr>
                       <form action="/employee" method="post">
                       {{ csrf_field() }}
                        <div class="form-group">
                          <label for="emp_fname">First Name</label>
                          <input type="text" class="form-control" id="emp_fname"  name="emp_fname" required>
                        </div>
                        <div class="form-group">
                          <label for="emp_lname">Last Name</label>
                          <input type="text" class="form-control" id="emp_lname"  name="emp_lname" required>
                        </div>
                        <div class="form-group">
                          <label for="emp_image">Image</label>
                          <input type="text" class="form-control" id="emp_image"  name="emp_image" required>
                        </div>
                        <div class="form-group">
                          <label for="user_id">User ID</label>
                          <select class="form-control" id="user_id" name="user_id"required>
                            @foreach($user as $user)
                            <option value="{{$user->id}}">{{$user->id}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="emp_job">Job</label>
                          <input type="text" class="form-control" id="emp_job"  name="emp_job"required>
                        </div>
                        <div class="form-group">
                          <label for="emp_status">Status</label>
                          <select class="form-control" id="emp_status" name="emp_status"required>
                            <option value="active">Active</option>
                            <option value="not_active">Not Active</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="map_title">Location Title</label>
                          <input type="text" class="form-control" id="map_title"  name="map_title"required>
                        </div>
                        <div class="form-group">
                          <label for="">Map</label>
                          <input type="text" class="form-control" id="searchmap">
                          <div id="map-canvas" style="height:300px;"></div>
                        </div>
                        <div class="form-group">
                          <label for="lat">Latitude</label>
                          <input type="text" class="form-control" id="lat"  name="lat" required>
                        </div>
                        <div class="form-group">
                          <label for="lng">Longtitde</label>
                          <input type="text" class="form-control" id="lng"  name="lng"required>
                        </div>
                        @if ($errors->any())
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                        @endif
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <div class="pull-right">
                            <a href="{{ URL::to('employee/') }}"><div class="btn btn-success">Go to the list</div></a>
                        </div>
                      </form>
                  </div>
                  <script>
                  var map = new google.maps.Map(document.getElementById('map-canvas'),{
                    center:{
                      lat:30.04,
                      lng:31.24
                    },
                    zoom:15
                  });
                  var marker = new google.maps.Marker({
                    position:{
                      lat:30.04,
                      lng:31.24
                    },
                    map: map,
                    draggable: true
                  });
                  var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));

                  google.maps.event.addListener(searchBox,'places_changed',function() {
                    var places = searchBox.getPlaces();
                    var bounds = new google.maps.LatLngBounds();
                    var i,place;
                    for(i=0;place=places[i];i++){
                      bounds.extend(place.geometry.location);
                      marker.setPosition(place.geometry.location);
                    }
                    map.fitBounds(bounds);
                    map.setZoom(15);
                  });
                  google.maps.event.addListener(marker,'poition_changed',function(){
                    var lat = marker.getPosition().lat();
                    var lng = marker.getPosition().lng();

                    $('#lat').val(lat);
                    $('#lng').val(lng);

                  });
                  </script>
        </div>
     </div>
    </body>
</html>
