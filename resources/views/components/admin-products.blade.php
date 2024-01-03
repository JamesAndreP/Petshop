<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Products Data Table</h3> 
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#add" style="margin-left:74%"><i class="fa fa-plus">Add</i>
                </button>
                <div class="modal fade" id="add">
                    <div class="modal-dialog modal-md">
                        <form action="add-product" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Add Product</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="card card-primary">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Product Name</label>
                                                    <input type="text" class="form-control" name="product_name" autocomplete="off" required="required">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Product Details</label>
                                                    <textarea class="form-control" name="product_detail" rows="3" placeholder="Enter ..." autocomplete="off" required="required"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Price</label>
                                                    <input type="text" class="form-control" name="price" autocomplete="off" required="required">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Quantity</label>
                                                    <input type="text" class="form-control" name="quantity" autocomplete="off" required="required">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Product Category</label>
                                                    <select class="form-control" name="product_category">
                                                        <option value="Food">Food</option>
                                                        <option value="Treats">Treats</option>
                                                        <option value="Bowls">Bowls</option>
                                                        <option value="Beds">Beds</option>
                                                        <option value="Toys">Toys</option>
                                                        <option value="Collars">Collars</option>
                                                        <option value="Leashes">Leashes</option>
                                                        <option value="Cages">Cages</option>
                                                        <option value="Pet Grooming">Pet Grooming</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Slug</label>
                                                    <input type="text" class="form-control" name="slug" autocomplete="off" required="required">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <input type="file" name="file" autocomplete="off" class="form-control" accept="image/png, image/gif, image/jpeg, image/jpg">
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
                @if($products && count($products) > 0)
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="12%">Image</th>
                                <th>Product Name</th>
                                <th>Product Detail</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Product Category</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th width="5%"></th>
                                {{-- <th>Status</th>
                                <th>Approval Status</th>
                                <th width="7%"></th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $key)
                                <tr>
                                    {{-- <td><img src="{{url('img/pet avatars/'.$key->image)}}" alt="AdminLTE Logo" class="brand-image img-square elevation-3" style="opacity: .8; width: 70px; max-height: 100px"></td> --}}
                                    <td data-toggle="modal" data-target="#image_viewer{{$key->id}}">
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
                                                            <img src="{{url('img/products/'.$key->image)}}" alt="AdminLTE Logo" class="brand-image img-square elevation-3 image_viewer_images" >
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
                                    <img src="{{url('img/products/'.$key->image)}}" alt="AdminLTE Logo" class="brand-image img-square elevation-3" style="opacity: .8; width: 70px; max-height: 100px">
                                </td>
                                    <td>{{$key->name}}</td>
                                    <td>{{$key->details}}</td>
                                    <td>{{$key->price}}</td>
                                    <td>{{$key->quantity}}</td>
                                    <td>{{$key->product_category}}</td>
                                    <td>{{$key->slug}}</td>
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
                                        <form action="delete-product" method="post" style="display: inline-block">
                                            @csrf
                                            <input type="text" name="product_id" value="{{$key->id}}" hidden>
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
                        <form action="update-product" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Update Product</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="card card-primary">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Product Name</label>
                                                    <input type="text" class="form-control" name="product_name" id="product_name" autocomplete="off" required="required">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Product Details</label>
                                                    <textarea class="form-control" name="product_detail" id="product_detail" rows="3" placeholder="Enter ..." autocomplete="off" required="required"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Price</label>
                                                    <input type="text" class="form-control" name="price" id="price" autocomplete="off" required="required">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Quantity</label>
                                                    <input type="text" class="form-control" name="quantity" id="quantity" autocomplete="off" required="required">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Product Category</label>
                                                    <select class="form-control" name="product_category" id="product_category">
                                                        <option value="Food">Food</option>
                                                        <option value="Treats">Treats</option>
                                                        <option value="Bowls">Bowls</option>
                                                        <option value="Beds">Beds</option>
                                                        <option value="Toys">Toys</option>
                                                        <option value="Collars">Collars</option>
                                                        <option value="Leashes">Leashes</option>
                                                        <option value="Cages">Cages</option>
                                                        <option value="Pet Grooming">Pet Grooming</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Slug</label>
                                                    <input type="text" class="form-control" name="slug" id="slug" autocomplete="off" required="required">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="form-control" id="status" name="status">
                                                        <option value="active">Active</option>
                                                        <option value="inactive">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <input type="text" id="product_id" name="product_id" hidden>
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
document.getElementById('product_id').value = data.id
document.getElementById('product_name').value = data.name
document.getElementById("product_detail").value = data.details
document.getElementById("price").value = data.price
document.getElementById("quantity").value = data.quantity
document.getElementById("product_category").value = data.product_category
document.getElementById("slug").value = data.slug
document.getElementById("status").value = data.status
}
</script>