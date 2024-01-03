<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add Admin</h3> 
            </div>
            <div class="card-body">
                <div class="register_container">
                    <form action="add-admin" method="post" enctype="multipart/form-data">
                        @csrf
                        <div style="text-align: center">
                            <div>Username</div>
                            <input type="text" name="username" class="form-control" required="required" autocomplete="off">
                        </div>
                        <div style="text-align: center">
                            <div>Password</div>
                            <input type="password" name="password" class="form-control" required="required" autocomplete="off">
                        </div>
                        <div style="text-align: center">
                            <div>Confirm Password</div>
                            <input type="password" name="confirm_password" class="form-control" required="required" autocomplete="off">
                        </div>
                        <div style="text-align: center">
                            <div>Fullname</div>
                            <input type="text" name="fullname" class="form-control" required="required" autocomplete="off">
                        </div>
                        <div style="text-align: center">
                            <div>Email</div>
                            <input type="email" name="email" class="form-control" required="required" autocomplete="off">
                        </div>
                        <div style="text-align: center">
                            <div>Contact</div>
                            <input type="text" name="contact" class="form-control" required="required" autocomplete="off">
                        </div>
                        <div style="text-align: center">
                            <div>Avatar</div>
                            <input style="border: 1px solid black; border-radius: 5px; padding: 5px; width: 100%" 
                                type="file" 
                                name="avatar" 
                                required="required" 
                                multiple accept="image/png, image/gif, image/jpeg, image/jpg" 
                            />
                        </div>
                        <div>
                            @if ($errors->any())
                                <div class="error_box">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <div style="padding-top: 20px">
                            <button 
                                type="submit" 
                                class="btn btn-success btn-sm" 
                                style="width: 100%; height: 40px"
                            >
                                <i class="fa fa-plus">Add Admin</i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>