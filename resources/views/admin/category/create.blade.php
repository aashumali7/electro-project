<x-layout title="Create Category">
    <!--I will pass data to the  layout component using properties  -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add New Category</h1>
                </div><!-- /.col -->
                <!-- <div class="col-sm-6 text-right">
                    <a href='{{route("category.create")}}' class="btn btn-primary">Add New Category</a>
                </div> -->
                <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add New Category</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action ='{{route("category.store")}}' method ="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="cat_name">Category Name</label>
                                    <input name="category_name" type="text" class="form-control" id="cate_name"
                                        placeholder="Enter category">
                                </div>
                                <div class="form-group">
                                    <label for="cat_desc">Description</label>
                                    <textarea rows="5" cols="" name="description" class="form-control" id="cat_desc" placeholder="Password"> </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                        </form>
                    </div>
                    <!-- /.card -->

                </div>
                <!--/.col (left) -->
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</x-layout>