@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Timeline</div>

                <div class="panel-body">
                    <div id="userPosts">
                            <input type="textbox" name="status" value="Express what you are feeling in a song"/>
                            <button type="button" class="btn btn-success"> Leggo </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
