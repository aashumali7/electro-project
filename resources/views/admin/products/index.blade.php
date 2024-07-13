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
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->product_desc }}</td>
                                        <td>{{ $product->brand_name}}</td>
                                        <td>{{ $product->category_name }}</td>
                                        <td>
                                            <img src="{{ asset($product->prod_thumbnail_img) }}" style="max-width: 80px;">
                                        </td>
                                        <td>
                                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-info">View</a>
                                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
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