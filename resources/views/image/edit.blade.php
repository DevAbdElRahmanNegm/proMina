
@extends('layout.admin')
@section('content')
    <div class="box ">
        <div class="box-header with-border">
            <h3 class="box-title">Images</h3>
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
            <form role="form" method="POST" action="{{route('image.update' , $image->id)}}" enctype="multipart/form-data">
                @csrf
                {{method_field('put')}}
                <!-- text input -->

                <div class="form-group">
                    <label>Name Of Image</label>
                    <input type="text" value="{{$image->name}}" name="name" class="form-control" placeholder="Enter ..." >
                </div>
                <div class="form-group">
                    <label>Albums</label>
                    <select name="album_id" class="form-control">

                        @foreach($albums as $album)

                            <option value="{{$album->id}}" {{$image->album_id == $album->id ? 'selected' : ''}}> {{$album->name}} </option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                    <label >Image</label>
                    <input value="{{$image->image}}" class="imagee" type="file" name="image" >
                </div>
                <div class="form-group">
                    <img src="{{asset('images/'.$image->image.'')}}" style="width: 100px" class="img-thumbnail image-preview">
                </div>


                <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">Edit</button>
                </div>
            </form>
        </div>
        <!-- /.box-body -->
    </div>

@endsection