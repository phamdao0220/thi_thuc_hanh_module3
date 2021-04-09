@extends('home')
@section('page_title')
@endsection
@section('content')
    <section class="content">
        <form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12 col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title" >Add New Product</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Name</label>
                                <input type="text" name="name"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Description</label>
                                <input type="text" name="description"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Content</label>
                                <input type="text" name="content"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Price</label>
                                <input type="number" name="price"
                                       class="form-control">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success"> Add</button>
                                <a href="{{route('product.index')}}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </form>
    </section>
@endsection
