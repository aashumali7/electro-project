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
                                <div class="form-group">
                                    <label for="product_desc">Product Desription</label>
                                    <textarea type="text" required  name="product_desc" class="form-control" id="product_desc" ></textarea>
                                </div>
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
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="mrp">MRP</label>
                                            <input type="number" name="mrp" class="form-control" id="mrp" min='0'/>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="sell_price">Sell Price</label>
                                            <input type="number" name="sell_price" class="form-control" id="sell_price" min='0'/>
                                        </div>
                                   </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="qty_available">Quantity Available</label>
                                            <input type="number" name="qty_available" class="form-control" id="qty_available" min='1'/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Product Thumbnail (212 x 200)</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="prod_thumbnail_img" class="custom-file-input" id="prod_thumbnail_img">
                                            <label class="custom-file-label" for="prod_thumbnail_img">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Product Main Image (712 x 660)</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="prod_main_img" class="custom-file-input" id="prod_main_img">
                                            <label class="custom-file-label" for="prod_main_img">Choose file</label>
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
                </div>
            </div>
        </div>
    </section>
</x-layout>