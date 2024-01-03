<div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{$pet_for_selling ? $pet_for_selling->count : 0}}</h3>

          <p>Total Pets for Selling</p>
        </div>
        <div class="icon">
          <i class="fa fa-dog"></i>
        </div>
        <a href="available-pet-selling" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-primary">
        <div class="inner">
          <h3>{{$pet_for_adoption ? $pet_for_adoption->count : 0}}</h3>

          <p>Total Pets for Adoption</p>
        </div>
        <div class="icon">
          <i class="fa fa-paw"></i>
        </div>
        <a href="available-pet-adoption" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{$users ? $users->count : 0}}<sup style="font-size: 20px"></sup></h3>

          <p>Total Users</p>
        </div>
        <div class="icon">
          <i class="fa fa-house-user"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{$services ? $services->count : 0}}</h3>

          <p>Total Services</p>
        </div>
        <div class="icon">
          <i class="fa fa-toolbox"></i>
        </div>
        <a href="services" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>{{$products ? $products->count : 0}}</h3>

          <p>Total Products</p>
        </div>
        <div class="icon">
          <i class="fa fa-bone"></i>
        </div>
        <a href="products" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    {{-- <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>44,300.00</h3>

          <p>Total Income</p>
        </div>
        <div class="icon">
          <i class="fa fa-money-bill-wave"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>44,300.00</h3>

          <p>Total Income</p>
        </div>
        <div class="icon">
          <i class="fa fa-money-bill-wave"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>44,300.00</h3>

          <p>Total Income</p>
        </div>
        <div class="icon">
          <i class="fa fa-money-bill-wave"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div> --}}
  </div>
  <div class="row">
    Main content here
</div>