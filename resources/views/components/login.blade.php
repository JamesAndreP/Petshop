<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="limiter">
          <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
              <img src="{{url('img/logo1.png')}}" alt="IMG">
            </div>
    
            <form class="login100-form validate-form" action="{{url('/login')}}" method="post">
              @csrf
              <span class="login100-form-title">
                Member Login
              </span>
    
              <div class="wrap-input100 validate-input" data-validate = "Username is required">
                <input class="input100" type="text" name="username" placeholder="Username" autocomplete="off">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                  <i class="fa fa-user" aria-hidden="true"></i>
                </span>
              </div>
    
              <div class="wrap-input100 validate-input" data-validate = "Password is required">
                <input class="input100" type="password" name="password" placeholder="Password" autocomplete="off">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                  <i class="fa fa-lock" aria-hidden="true"></i>
                </span>
              </div>
              
              <div class="container-login100-form-btn">
                <button class="login100-form-btn" type="submit">
                  Login
                </button>
              </div>
    
              <div class="text-center p-t-12">
                <a class="txt2" href="{{url('/register')}}" method="post">
                  Create An Account
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>