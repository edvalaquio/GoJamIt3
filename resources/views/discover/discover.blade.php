@extends('layouts.app')

@section('content')
<script type ="text/javascript">   
console.log("hello");
    window.onload = getLocation;
    function getLocation(){
        if(navigator.geolocation){
            navigator.geolocation.getCurrentPosition(showPosition);
        }
    }

    function showPosition(position){
        console.log("Latitude: " + position.coords.latitude);
        console.log("Longitude: " + position.coords.longitude);
        document.getElementById('longitude').value = position.coords.longitude;
        document.getElementById('latitude').value = position.coords.latitude;
        console.log("Latitude: " + document.getElementById('longitude').value);
        console.log("Longitude: " + document.getElementById('latitude').value);
    }
</script>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Discover Jammers near you!</div>

                <div class="panel-body">
                
                    <form class="form-horizontal" role="form" method="post" action="/discover/{{$user->username}}">
                     {{ csrf_field() }}
                     {{ method_field('POST') }}
                        <input type="text" id="longitude" name="longitude" value="2.0" hidden/>
                        <input type="text" id="latitude" name="latitude" value="2.0" hidden/>
                        <button type="submit" class="btn btn-success"> Leggo </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
