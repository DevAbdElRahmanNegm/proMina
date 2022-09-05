
@extends('layout.admin')
@section('content')
    <div class="box ">
        <div class="box-header with-border">
            <h3 class="box-title">Places</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>

                    @foreach($errors->all() as $error)
                        {{ $error }}<br/>
                    @endforeach
                </div>
            @endif
            <form method="post" action="{{route('album.update' , $album->id)}}" enctype="multipart/form-data">
                @csrf
            {{method_field('put')}}
            <!-- text input -->

                <div class="form-group">
                    <label>Name Of Album</label>
                    <input type="text" value="{{$album->name}}" name="name" class="form-control" placeholder="Enter ..." >
                </div>

                <!-- textarea -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">Done</button>
                </div>
            </form>
        </div>
        <!-- /.box-body -->
    </div>

@endsection