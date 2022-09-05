@extends('layout.admin')
@section('content')

    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Albums</h3>
                <a href="{{route('album.create')}}" type="submit" class="btn btn-info center-block pull-center">Add</a>
                <br>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody><tr>
                        <th style="text-align: inherit !important;">Name Of Album </th>
                        <th style="text-align: inherit !important;">Show Photos</th>
                        <th style="text-align: inherit !important;">Delete all photos</th>
                        <th style="text-align: inherit !important;">Move All Photo to another  album </th>
                        <th style="text-align: inherit !important;">Edit</th>
                        <th style="text-align: inherit !important;">Delete</th>

                    </tr>
                    @foreach($albums as $album)
                        <tr>
                            @php
                                $images = \App\Models\Image::where('album_id','=',$album->id)->count();
                                if($images != 0){
                                $delete ='return confirm("Are you sure? All photos in album will deleted")';
                                }else{
                                $delete = ' ';
                                }
                            @endphp
                            <td>{{$album->name}}</td>
                            <td><a href="{{route('image.index',$album->id)}}" type="submit" class="btn btn-info pull-center">Show Photos {{$images}} </a></td>

                            <td style="text-align: inherit !important;"><form action="{{route('delete.All',$album->id)}}"   method="post" class="delete-confirm">
                                    @csrf
                                    <button type="submit" onclick="{{$delete}}"class="btn btn-danger" >
                                        <i class="material-icons">Delete all photos </i>
                                    </button>
                                </form></td>

                            <td><a href="{{route('image.move',$album->id)}}" type="submit" class="btn btn-info pull-center">Move All Photo to another  album</a></td>

                            <td><a href="{{route('album.edit',$album->id)}}" type="submit" class="btn btn-info pull-center">Edit</a></td>

                            <td style="text-align: inherit !important;"><form action="{{route('album.destroy',$album->id)}}"   method="post" class="delete-confirm">
                                    @csrf
                                    {{method_field('delete')}}

                                    <button type="submit" onclick="{{$delete}}" id="delete-confirm" class="btn btn-danger delete-confirm">
                                        <i class="material-icons">Delete </i>
                                    </button>
                                </form></td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>

@endsection