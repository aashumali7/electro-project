<x-layout title="Category Information">
    <!--I will pass data to the  layout component using properties  -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">All Products</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 text-right">
                    <a href='{{route("products.create")}}' class="btn btn-primary">Add New Product</a>
                </div>
                <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                        @if (Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ Session::get('success') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Product List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#Id</th>
                                        <th>Product name</th>
                                        <th>Description</th>
                                        <th>Brand</th>
                                        <th>Category Name</th>
                                        <th>product Thumbnail</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->product_id }}</td>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->product_desc }}</td>
                                        <td>{{ $product->brand_name }}</td>
                                        <td>{{ $product->category_name }}</td>
                                        <td>
                                            <img src="{{ asset($product->prod_thumbnail_img) }}" style="max-width: 80px;">
                                        </td>
                                        <td>
                                            <a href="{{ route('products.show', $product->product_id) }}" class="btn btn-sm btn-info rounded-circle">
                                                <i class="fa-regular fa-eye"></i>
                                            </a>
                                            <a href="{{ route('products.edit', $product->product_id) }}" class="btn btn-sm btn-warning rounded-circle">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </a>
                                            <form action="{{ route('products.destroy', $product->product_id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger rounded-circle" onclick="return confirm('Do you really want to delete ??')">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</x-layout>