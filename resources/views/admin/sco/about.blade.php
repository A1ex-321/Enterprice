@extends('admin.layouts.app')


@section('content')

<!-- SweetAlert2 CSS -->

<main id="main" class="main">
<section class="section dashboard" style="margin-left: -260px;
">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-0">
                <div class="col-sm-6">
                    <h1 class="m-0">Add About</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"></li>




                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div class="card card-info"style="border: 1px solid #ccc;">
                        <div class="card-header">
                            <h3 class="card-title">Add About data <small></small></h3>
                        </div>
                        <div class="container">
                            <form action="{{ route('create-about') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">
    <!-- Form inputs here -->
    <div class="form-row">
        <div class="form-group col">
        <label for="exampleInputEmail1">Meta Title<span style="color:red"></span></label>
        <input type="text" name="metatitle" class="form-control" id="exampleInputEmail1" placeholder="" value="">
        </div>
        <div class="form-group col">
        <label for="exampleInputEmail1">Meta Description<span style="color:red"></span></label>
        <input type="text" name="metadescription" class="form-control" id="exampleInputEmail1" placeholder="" value="">
        </div>
    </div>    <div class="form-row">
        <div class="form-group col">
            <label for="exampleInputEmail1">OG Title<span style="color:red"></span></label>
            <input type="text" name="ogtitle" class="form-control" id="exampleInputEmail1" placeholder="" value="">
        </div>
        <div class="form-group col">
            <label for="exampleInputEmail1">OG Description<span style="color:red"></span></label>
            <input type="text" name="ogdescription" class="form-control" id="exampleInputEmail1" placeholder="" value="">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col">
            <label for="exampleInputEmail1">OG Image<span style="color:red"></span></label>
            <input type="text" name="ogimage" class="form-control" id="exampleInputEmail1" placeholder="" value="">
        </div>
        <div class="form-group col">
            <label for="exampleInputEmail1">OG URL<span style="color:red"></span></label>
            <input type="text" name="ogurl" class="form-control" id="exampleInputEmail1" placeholder="" value="">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col">
            <label for="exampleInputEmail1">OG Type<span style="color:red"></span></label>
            <input type="text" name="ogtype" class="form-control" id="exampleInputEmail1" placeholder="" value="">
        </div>
    </div>
</div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                </div>
                            </form>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="text-center mt-1 mb-2">


                </div>
                {{-- Start - Content comes here --}}
                <div class="col-12">
                    @include('admin.layouts.message')

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                        </div>
                        <!-- /.card-header -->
                        <p>(**only first link will be work.If exists please delete**)</p>
                        <div class="card-body p-0">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>OG Title</th>
                    <th>OG Description</th>
                    <th>OG Image</th>
                    <th>OG URL</th>
                    <th>OG Type</th>
                    <th>Edit & Delete</th>
                </tr>
            </thead>
            <tbody>
                @php $counter = 1; @endphp
                @foreach ($getRecord as $value)
                <tr>
                    <td>{{ $counter++ }}</td>
                    <td>{{ $value->metatitle }}</td>
                    <td>{{ $value->metadescription }}</td>
                    <td>{{ $value->ogtitle }}</td>
                    <td>{{ $value->ogdescription }}</td>
                    <td>{{$value->ogimage}}
                        <img src="{{ $value->ogimage }}" alt="" width="100" height="60">
                    </td>
                                        <td>{{ $value->ogurl }}</td>
                    <td>{{ $value->ogtype }}</td>
                    <td>
                        <a href="{{url('admin/about/edit/'.$value->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <a onclick="return confirm('Are you sure you want to delete?')" href="{{url('admin/about/delete/'.$value->id)}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

                        <!-- /.card-body -->
                    </div>
                </div>









                {{-- End - Content comes here --}}
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection

@section('style')
<!-- Include jQuery -->

<!-- Initialize Select2 -->




</section>
</main>
@endsection