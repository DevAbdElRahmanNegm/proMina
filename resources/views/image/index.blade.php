@extends('layout.admin')
@section('content')

    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Images</h3>
                <br>
                <a href="{{route('image.create')}}" type="submit" class="btn btn-info center-block pull-center">Add</a>

            </div>

            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody><tr>
                        <th style="text-align: inherit !important;">Name </th>
                        <th style="text-align: inherit !important;">Album </th>



                        <th style="text-align: inherit !important;">Image </th>
                        <th style="text-align: inherit !important;">Edit</th>
                        <th style="text-align: inherit !important;">Delte</th>

                    </tr>
                    @foreach($images as $image)
                        <tr>
                            <td>{{$image->name}}</td>
                            <td>{{$image->album->name}}</td>



                            <td><img src="{{asset('images/' . $image->image)}}" width="100px" height="100px"></td>
                            <td><a href="{{route('image.edit',$image->id)}}" type="submit" class="btn btn-info pull-center">Edit</a></td>
                            <td style="text-align: inherit !important;"><form action="{{route('image.destroy',$image->id)}}"  method="post">
                                    @csrf
                                    {{method_field('delete')}}

                                    <button type="submit"   class="btn btn-danger">
                                        <i class="material-icons">Delete</i>
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