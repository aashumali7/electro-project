<x-layout title=''>
    <!--I will pass data to the  layout component using properties  -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add New product</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class=row>
                <div class="col-md-12">
                    @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ Session::get('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Prouct Information</h3>
                        </div>
                        <form method="POST" action="{{route('products.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="product_name">Product Name</label>
                                    <input type="text" required name="product_name" class="form-control" id="product_name"/>
                                </div>
                                @error('product_name')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror    
                                <div class="form-group">
                                    <label for="product_desc">Product Desription</label>
                                    <textarea type="text" required  name="product_desc" class="form-control" id="product_desc" ></textarea>
                                </div>
                                @error('product_desc')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror  
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                           <label for="unit_id">Unit</label>
                                                <select name="unit_id" id ="unit_id" class="select2" style="width: 100%;">
                                                    @foreach($units as $unit)
                                                        <option value="{{$unit->id}}">{{$unit->unit_name}}</option>
                                                    @endforeach
                                                </select>
                                        </div>   
                                        @error('unit_id')
                                            <div class="alert alert-danger">{{$message}}</div>
                                        @enderror      
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                           <label>Brand</label>
                                                <select name="brand_id" class="select2" style="width: 100%;">
                                                    @foreach($brands as $brand)
                                                        <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                                    @endforeach
                                                </select>
                                        </div>
                                        @error('brand_id')
                                            <div class="alert alert-danger">{{$message}}</div>
                                        @enderror  
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Category</label>
                                                <select name="category_id" class="select2" style="width: 100%;">
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                                                    @endforeach
                                                </select>
                                        </div>
                                        @error('category_id')
                                            <div class="alert alert-danger">{{$message}}</div>
                                        @enderror  
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="mrp">MRP</label>
                                            <input type="number" name="mrp" class="form-control" id="mrp" min='0'/>
                                        </div>
                                        @error('mrp')
                                            <div class="alert alert-danger">{{$message}}</div>
                                        @enderror  
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="sell_price">Sell Price</label>
                                            <input type="number" name="sell_price" class="form-control" id="sell_price" min='0'/>
                                        </div>
                                        @error('sell_price')
                                            <div class="alert alert-danger">{{$message}}</div>
                                        @enderror  
                                   </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="qty_available">Quantity Available</label>
                                            <input type="number" name="qty_available" class="form-control" id="qty_available" min='1'/>
                                        </div>
                                    </div>
                                    @error('qty_available')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror  
                                </div>
                                <div class="form-group">
                                    <label for="prod_thumbnail_img">Product Thumbnail (212 x 200)</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="prod_thumbnail_img" class="custom-file-input" id="prod_thumbnail_img" onchange="previewImage(event, 'thumbnail_preview')">
                                            <label class="custom-file-label" for="prod_thumbnail_img">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                    <img id="thumbnail_preview" src="#" alt="Thumbnail Preview" style="max-width: 100px; margin-top: 10px; display: none;">
                                    @error('prod_thumbnail_img')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror  
                                </div>

                                <div class="form-group">
                                    <label for="prod_main_img">Product Main Image (712 x 660)</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="prod_main_img" class="custom-file-input" id="prod_main_img" onchange="previewImage(event, 'main_image_preview')">
                                            <label class="custom-file-label" for="prod_main_img">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                    <img id="main_image_preview" src="#" alt="Main Image Preview" style="max-width: 100px; margin-top: 10px; display: none;">
                                </div>
                                @error('prod_main_img')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror  
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>

<script>
function previewImage(event, previewId) {
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById(previewId);
        output.src = reader.result;
        output.style.display = 'block';
    }
    reader.readAsDataURL(event.target.files[0]);
}
</script>