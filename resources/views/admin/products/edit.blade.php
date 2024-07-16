<x-layout title="Edit Product">
    <!--I will pass data to the layout component using properties -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Product</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ Session::get('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Product</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form action ='{{ route("products.update", $product->id) }}' method ="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="product_name">Product Name</label>
                                    <input name="product_name" type="text" class="form-control" id="product_name" value="{{ $product->product_name }}" placeholder="Enter product name">
                                </div>
                                @error('product_name')
                                    <div class='alert alert-danger' role='alert'>
                                        {{ $message }}
                                    </div>
                                @enderror

                                <div class="form-group">
                                    <label for="product_desc">Description</label>
                                    <textarea rows="5" name="product_desc" class="form-control" id="product_desc" placeholder="Enter product description">{{ $product->product_desc }}</textarea>
                                </div>
                                @error('product_desc')
                                    <div class='alert alert-danger' role='alert'>
                                        {{ $message }}
                                    </div>
                                @enderror

                                <div class="form-group">
                                    <label for="unit_id">Unit</label>
                                    <select name="unit_id" class="form-control" id="unit_id">
                                        @foreach($units as $unit)
                                            <option value="{{ $unit->id }}" {{ $unit->id == $product->unit_id ? 'selected' : '' }}>{{ $unit->unit_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('unit_id')
                                    <div class='alert alert-danger' role='alert'>
                                        {{ $message }}
                                    </div>
                                @enderror

                                <div class="form-group">
                                    <label for="brand_id">Brand</label>
                                    <select name="brand_id" class="form-control" id="brand_id">
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}" {{ $brand->id == $product->brand_id ? 'selected' : '' }}>{{ $brand->brand_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('brand_id')
                                    <div class='alert alert-danger' role='alert'>
                                        {{ $message }}
                                    </div>
                                @enderror

                                <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <select name="category_id" class="form-control" id="category_id">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('category_id')
                                    <div class='alert alert-danger' role='alert'>
                                        {{ $message }}
                                    </div>
                                @enderror

                                <div class="form-group">
                                    <label for="mrp">MRP</label>
                                    <input name="mrp" type="number" step="0.01" class="form-control" id="mrp" value="{{ $product->mrp }}" placeholder="Enter MRP">
                                </div>
                                @error('mrp')
                                    <div class='alert alert-danger' role='alert'>
                                        {{ $message }}
                                    </div>
                                @enderror

                                <div class="form-group">
                                    <label for="sell_price">Sell Price</label>
                                    <input name="sell_price" type="number" step="0.01" class="form-control" id="sell_price" value="{{ $product->sell_price }}" placeholder="Enter sell price">
                                </div>
                                @error('sell_price')
                                    <div class='alert alert-danger' role='alert'>
                                        {{ $message }}
                                    </div>
                                @enderror

                                <div class="form-group">
                                    <label for="qty_available">Quantity Available</label>
                                    <input name="qty_available" type="number" class="form-control" id="qty_available" value="{{ $product->qty_available }}" placeholder="Enter quantity available">
                                </div>
                                @error('qty_available')
                                    <div class='alert alert-danger' role='alert'>
                                        {{ $message }}
                                    </div>
                                @enderror

                                <div class="form-group">
                                    <label for="prod_thumbnail_img">Thumbnail Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="prod_thumbnail_img" class="custom-file-input" id="prod_thumbnail_img">
                                            <label class="custom-file-label" for="prod_thumbnail_img">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                    @if($product->prod_thumbnail_img)
                                        <div class="mt-2">
                                            <img src="{{ $product->prod_thumbnail_img }}" alt="Thumbnail" width="100">
                                        </div>
                                    @endif
                                </div>
                                @error('prod_thumbnail_img')
                                    <div class='alert alert-danger' role='alert'>
                                        {{ $message }}
                                    </div>
                                @enderror

                                <div class="form-group">
                                    <label for="prod_main_img">Main Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="prod_main_img" class="custom-file-input" id="prod_main_img">
                                            <label class="custom-file-label" for="prod_main_img">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                    @if($product->prod_main_img)
                                        <div class="mt-2">
                                            <img src="{{ $product->prod_main_img }}" alt="Main Image" width="100">
                                        </div>
                                    @endif
                                </div>
                                @error('prod_main_img')
                                    <div class='alert alert-danger' role='alert'>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
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
