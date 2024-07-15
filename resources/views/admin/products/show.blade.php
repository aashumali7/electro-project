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
                    <a href='{{route("products.index")}}' class="btn btn-primary">Product list</a>
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
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Product Name</strong> -- {{$product->product_name}}</li>
                            <li class="list-group-item"><strong>Product Description</strong> -- {{$product->product_desc}}</li>
                            <li class="list-group-item"><strong>Brand Name</strong> -- {{$product->brand->brand_name}}</li>
                            <li class="list-group-item"><strong>Unit Name</strong> -- {{$product->unit->unit_name}}</li>
                            <li class="list-group-item"><strong>Category Name</strong> -- {{ optional($product->category)->category_name ?? 'N/A' }}</li>
                            <li class="list-group-item"><strong>MRP</strong> -- {{$product->mrp}}</li>
                            <li class="list-group-item"><strong>Sell Price</strong> -- {{$product->sell_price}}</li>
                            <li class="list-group-item"><strong>Quantity Available</strong> -- {{$product->qty_available}}</li>
                            <li class="list-group-item"><strong>Product Thumbnail IMG</strong> -- <img src="{{ asset($product->prod_thumbnail_img) }}" style="max-width: 90px;"></li>
                        </ul>
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