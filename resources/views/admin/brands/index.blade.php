<x-layout>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">All Brands</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 text-right">
                    <a href='{{route("brands.create")}}' class="btn btn-primary">Add New Brands</a>
                </div>
                <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class='container-fluid'>
            <div class='row'>
                <div class="col-12">
                </div>
            </div>
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Logo</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($brands as $brand)
                        <tr>
                            <td>{{$brand['id']}}</td>
                            <td>{{$brand['name']}}</td>
                            <td>{{$brand['logo']}}</td>
                            <td>
                                <button>Edit</button>
                                <button>Delete</button>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
    </section>    
</x-layout>