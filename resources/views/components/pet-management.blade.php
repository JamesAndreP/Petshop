<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Pet Management Data table</h3> 
            <div class="pet_management_button_container">
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#add" style=""><i class="fa fa-plus">Add Post</i>
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#pet_category" style=""><i class="fa fa-plus">Add category</i>
            </div>
          </button>
          <div class="modal fade" id="add">
                  <div class="modal-dialog modal-md">
                     <form action="add-pet" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Add Pet</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="card card-primary">
                          <div class="card-body">
                            <div class="row">
                        <div class="col-12">
                          <div class="form-group">
                              <label>Description</label>
                              <textarea class="form-control" name="description" rows="3" placeholder="Enter ..." autocomplete="off" required="required"></textarea>
                            </div>
                          </div>
                            <div class="col-6">
                            <div class="form-group">
                            <label>Category</label>
                            @if($category && count($category) > 0)
                                <select class="form-control" name="pet_category">
                                    @foreach($category as $pet_category)
                                        <option value="{{$pet_category->category_name}}">{{$pet_category->category_name}}</option>
                                    @endforeach
                                </select>
                            @endif
                          </div>
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                            <label>Type</label>
                            <select class="form-control" name="pet_type">
                              <option value="ADOPTION">Adoption</option>
                              <option value="SELLING">Selling</option>
                            </select>
                          </div>
                          </div>
                          {{-- <div class="col-12">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Status</label>
                              <input type="text" class="form-control" row="5" id="" name="" placeholder="Enter Status Name..">
                            </div>
                          </div> --}}
                          <div class="col-12">
                            <div class="form-group">
                              <label>Avatar</label>
                              <input type="file" id="file" name="file[]" accept="image/png, image/gif, image/jpeg, image/jpg" autocomplete="off" multiple/>
                            </div>
                          </div>
                          </div>
                          </div>
                      </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                          <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>

                <!-- add pet category -->
                <div class="modal fade" id="pet_category">
                  <div class="modal-dialog modal-md">
                     <form action="submit-pet-category" method="post">
                      @csrf
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Add Pet Category</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="card card-primary">
                          <div class="card-body">
                            <div class="row">
                        <div class="col-12">
                          <div class="form-group">
                              <label>Category Name</label>
                              <input type="text" class="form-control" name="category_name" autocomplete="off" required="required">
                            </div>
                          </div>
                          </div>
                          </div>
                      </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                          <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
        </div>
        <div class="card-body">
          @if($pet && count($pet) > 0)
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th width="12%">Pet Image</th>
              <th>Pet Description</th>
              <th>Category</th>
              <th>Type</th>
              <th>Status</th>
              <th>Approval Status</th>
              <th width="7%"></th>
            </tr>
            </thead>
            <tbody>
              @foreach($pet as $key)
              <tr>
                {{-- <td><img src="{{url('img/pet avatars/'.$key->image)}}" alt="AdminLTE Logo" class="brand-image img-square elevation-3" style="opacity: .8; width: 70px; max-height: 100px"></td> --}}
                <td data-toggle="modal" data-target="#image_viewer{{$key->id}}">
                    @php
                        $images = [];
                        $images = json_decode($key->image)
                    @endphp
                    <!-- Image Viewer --->
                    <div class="modal fade" id="image_viewer{{$key->id}}">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content image_viewer_container">
                                <div class="modal-header">
                                    <h4 class="modal-title">View Image</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="card card-primary image_viewer">
                                    <div class="card-body">
                                        <div class="row">
                                            @foreach ($images as $image)
                                                <img src="{{url('img/pet avatars/'.$image)}}" alt="AdminLTE Logo" class="brand-image img-square elevation-3 image_viewer_images" >
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    {{-- <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <img src="{{url('img/pet avatars/'.$images[0])}}" alt="AdminLTE Logo" class="brand-image img-square elevation-3" style="opacity: .8; width: 70px; max-height: 100px">
                </td>
                <td>{{$key->description}}</td>
                <td>{{ucwords($key->pet_category)}}</td>
                <td>{{ucwords($key->pet_type)}}</td>
                <th>
                  @if($key->status == 'AVAILABLE')
                  <span class="right badge badge-success">{{$key->status}}</span>
                  @else
                  <span class="right badge badge-danger">{{$key->status}}</span>
                  @endif
                </th>
                <th>
                @if($key->approval_status == 'APPROVED')
                <span class="right badge badge-primary">{{$key->approval_status}}</span>
                @else
                <span class="right badge badge-warning">{{$key->approval_status}}</span>
                @endif
                </th>
                 <td>
                  <button type="button" onclick="openModal({{$key}})" style="display: inline-block" class="btn btn-info btn-xs" data-toggle="modal" data-target="#update"><i class="fa fa-pencil-alt"></i> 
                  </button>
                  <form action="delete-pet" method="post" style="display: inline-block">
                    @csrf
                    <input type="text" name="pet_id" value="{{$key->id}}" hidden>
                    <button type="submit" class="btn btn-danger btn-xs" ><i class="fa fa-trash"></i> 
                    </button>
                  </form>
                  </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          @else
          <div><b>--- No Data ---</b></div>
          @endif
      <div class="modal fade" id="update">
                  <div class="modal-dialog modal-md">
                     <form action="update-pet" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Update Pet</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="card card-primary">
                          <div class="card-body">
                            <div class="row">
                        <div class="col-12">
                          <div class="form-group">
                              <label>Description</label>
                              <textarea id="description" class="form-control" name="description" rows="3" placeholder="Enter ..." autocomplete="off" required="required"></textarea>
                            </div>
                          </div>
                            <div class="col-6">
                            <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" id="pet_category" name="pet_category">
                              <option value="DOG">Dog</option>
                              <option value="CAT">Cat</option>
                            </select>
                          </div>
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                            <label>Type</label>
                            <select class="form-control" id="pet_type" name="pet_type">
                              <option value="ADOPTION">Adoption</option>
                              <option value="SELLING">Selling</option>
                            </select>
                          </div>
                          </div>
                          {{-- <div class="col-12">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Status</label>
                              <input type="text" class="form-control" row="5" id="" name="" placeholder="Enter Status Name..">
                            </div>
                          </div> --}}
                          <input type="text" id="pet_id" name="pet_id" hidden>
                          <div class="col-12">
                            <div class="form-group">
                              <label>Avatar</label>
                              <input type="file" id="file" name="file" accept="image/png, image/gif, image/jpeg, image/jpg" autocomplete="off"/>
                            </div>
                          </div>
                          </div>
                          </div>
                      </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                          <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
      </div>
    </div>
  </div>
  <script>
    function openModal(data) {
      document.getElementById('pet_id').value = data.id
      document.getElementById('description').value = data.description
      document.getElementById("pet_type").value = data.pet_type
      document.getElementById("pet_category").value = data.pet_category
    }
  </script>