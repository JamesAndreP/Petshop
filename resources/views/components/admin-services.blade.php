<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Services Data Table</h3> 
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#add" style="margin-left:74%"><i class="fa fa-plus">Add</i>
                </button>
                <div class="modal fade" id="add">
                    <div class="modal-dialog modal-md">
                        <form action="add-service" method="post">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Add Service</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="card card-primary">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Service Name</label>
                                                    <input type="text" class="form-control" name="service_name" autocomplete="off" required="required">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Service Detail</label>
                                                    <textarea class="form-control" name="service_detail" rows="3" placeholder="Enter ..." autocomplete="off" required="required"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>More Detail</label>
                                                    <textarea class="form-control" name="more_detail" rows="3" placeholder="Enter ..." autocomplete="off" required="required"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Slug</label>
                                                    <input type="text" class="form-control" name="slug" autocomplete="off" required="required">
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
                @if($service && count($service) > 0)
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                {{-- <th width="12%">Pet Image</th> --}}
                                <th>Service Name</th>
                                <th width="30%">Service Detail</th>
                                <th width="30%">More Detail</th>
                                <th>Slug</th>
                                <th>Added by</th>
                                <th>Status</th>
                                <th width="5%"></th>
                                {{-- <th>Status</th>
                                <th>Approval Status</th>
                                <th width="7%"></th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($service as $key)
                                <tr>
                                    {{-- <td><img src="{{url('img/pet avatars/'.$key->image)}}" alt="AdminLTE Logo" class="brand-image img-square elevation-3" style="opacity: .8; width: 70px; max-height: 100px"></td> --}}
                                    <td>{{$key->service_name}}</td>
                                    <td>{{$key->service_detail}}</td>
                                    <td>{{$key->read_more}}</td>
                                    <td>{{$key->slug}}</td>
                                    <td>{{$key->username}}</td>
                                    <td>{{$key->status}}</td>
                                    
                                    {{-- <td>{{ucwords($key->pet_category)}}</td>
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
                                    </th> --}}
                                    <td>
                                        <button type="button" onclick="openModal({{$key}})" style="display: inline-block" class="btn btn-info btn-xs" data-toggle="modal" data-target="#update"><i class="fa fa-pencil-alt"></i> 
                                        </button>
                                        <form action="delete-service" method="post" style="display: inline-block">
                                            @csrf
                                            <input type="text" name="service_id" value="{{$key->id}}" hidden>
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
                        <form action="update-service" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Update Service</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="card card-primary">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Service Name</label>
                                                    <input type="text" name="service_name" id="service_name" class="form-control" autocomplete="off" required="required">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Service Detail</label>
                                                    <textarea id="service_detail" class="form-control" name="service_detail" rows="3" placeholder="Enter ..." autocomplete="off" required="required"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>More Detail</label>
                                                    <textarea id="service_detail" class="form-control" name="more_detail" rows="3" placeholder="Enter ..." autocomplete="off" required="required"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Slug</label>
                                                    <input type="text" name="slug" id="slug" autocomplete="off" required="required" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="form-control" id="status" name="status">
                                                        <option value="active">Active</option>
                                                        <option value="inactive">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <input type="text" id="service_id" name="service_id" hidden>
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
</div>
<script>
function openModal(data) {
document.getElementById('service_id').value = data.id
document.getElementById('service_name').value = data.service_name
document.getElementById("service_detail").value = data.service_detail
document.getElementById("slug").value = data.slug
document.getElementById("status").value = data.status
}
</script>