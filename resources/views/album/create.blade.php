@extends('layout.admin')
@section('content')


    <div class="box ">
        <div class="box-header with-border">
            <h3 class="box-title">Albums</h3>
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
            <form role="form" method="POST" action="{{route('album.store')}}" enctype="multipart/form-data">
                @csrf
                <!-- text input -->
                <div class="form-group">
                    <label>Name Of Album</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter ..." >
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">Add</button>
                </div>
            </form>
        </div>
        <!-- /.box-body -->
    </div>

@endsection