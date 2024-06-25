<x-layout>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Brand Form</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">New Brand</h3>
                        </div>


                        <form method="POST" action="{{route('brands.store')}}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="brand_name">Brand Name</label>
                                    <input type="text" name='brand_name' class="form-control" id="brand_name"
                                        placeholder="Enter Brand Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Logo(120×80)</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="brand_logo" type="file" class="custom-file-input" id="brand_logo">
                                            <label class="custom-file-label" for="brand_logo">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="seo_meta_title"> SEO - Meta Title</label>
                                    <input name='seo_meta_title'  type="text" class="form-control" id="seo_meta_title"
                                        placeholder="title">
                                </div>
                                <div class="form-group">
                                    <label for="seo_meta_desc">SEO - Meta Description</label>
                                    <textarea name='seo_meta_desc' class="form-control" rows="5" cols="" id="seo_meta_desc" ></textarea>
                                </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Add Brand</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>