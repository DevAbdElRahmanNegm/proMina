
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
            <form role="form" method="POST" action="{{route('move.to')}}" enctype="multipart/form-data">
                @csrf



                        <div class="form-group">
                            <label>Album Of Photos</label>
                            <input type="text" disabled value="" name="name" class="form-control" placeholder="{{$image->album->name}}" >
                        </div>
                <div class="form-group">

                    <input type="hidden" value="{{$image->album_id}}" name="old_album" class="form-control" >
                </div>
                        <div class="form-group">
                            <label>Move To</label>
                            <select name="new_album" class="form-control">

                                @foreach($albums as $album)

                                    <option value="{{$album->id}}" {{$image->album_id == $album->id ? 'selected' : ''}}> {{$album->name}} </option>
                                @endforeach
                            </select>
                        </div>


                <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">Edit</button>
                </div>
            </form>
        </div>
        <!-- /.box-body -->
    </div>

@endsection