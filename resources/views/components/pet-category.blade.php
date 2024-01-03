<div class="row">
          <div class="col-12">
       

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Pet Category Data table</h3> 
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#add" style="margin-left:77%"><i class="fa fa-plus">Add</i>
                </button>
                <div class="modal fade" id="add">
                        <div class="modal-dialog modal-sm">
                           <form action="submit-pet-category" method="post">
                            @csrf
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Add Category</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="card card-primary">
                                <div class="card-body">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Category</label>
                                    <input type="text" class="form-control" row="5" id="" name="category_name" placeholder="Enter Category Name.." required="required" autocomplete="off">
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                              </div>
                            </div>
                          </form>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Category Name</th>
                    <th width="7%"></th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($pet_category as $key)
                    <tr>
                      <td>{{$key->category_name}}</td>
                      <td>
                        <button type="button" style="display: inline-block" onclick="openModal({{$key->id}})" class="btn btn-info btn-xs" data-toggle="modal" data-target="#update"><i class="fa fa-pencil-alt"></i> 
                        </button>
                        <form style="display: inline-block" action="/delete-pet-category" method="post">
                          @csrf
                          <input type="text" name="pet_category_id" value="{{$key->id}}" hidden> 
                          <button type="submit" class="btn btn-danger btn-xs" ><i class="fa fa-trash"></i> 
                          </button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                  </tfoot>
                </table>
            <div class="modal fade" id="update">
                        <div class="modal-dialog modal-sm">
                           <form action="/update-pet-category" method="post">
                            @csrf
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Update Pet Category</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="card card-primary">
                                <div class="card-body">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Pet Category</label>
                                    <input type="text" class="form-control" row="5" id="pet_category_id" name="pet_category_id" hidden>
                                    <input type="text" class="form-control" row="5" id="" name="category_name" placeholder="Enter Category Name.." required="required">
                                  </div>
                                </div>
                            </div>
                              <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                              </div>
                            </div>
                          </form>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <script>
          function openModal(id) {
            document.getElementById('pet_category_id').value = id
          }
        </script>