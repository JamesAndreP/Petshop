<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Sold Pets</h3> 
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
              <th width="10%"></th>
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
                  <button type="button" onclick="openModal({{$key->id}})" class="btn btn-info btn-xs" data-toggle="modal" data-target="#update"><i class="fa fa-pencil-alt"></i> 
                  Mark as available</button>
                  {{-- <label class="switch">
                    <input onclick="clickStatus()" type="checkbox" id="pet_status" name="pet_status">
                    <span class="slider round">Available</span>
                    </label> --}}
                  {{-- <form action="delete-pet" method="post" style="display: inline-block">
                    @csrf
                    <input type="text" name="pet_id" value="{{$key->id}}" hidden>
                    <button type="submit" class="btn btn-danger btn-xs" ><i class="fa fa-trash"></i> 
                    </button>
                  </form> --}}
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
                     <form action="update-pet-available" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Confirm?</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <input type="text" hidden id="pet_id" name="pet_id">
                        <input type="text" hidden name="page_name" value="sold">
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
  </div>
  <script>
    function openModal(id) {
      document.getElementById('pet_id').value = id
    }
  </script>