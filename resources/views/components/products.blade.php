<div class="container-fluid py-5">
    <div class="container">
        <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
            <h6 class="text-primary text-uppercase">Products</h6>
            <h1 class="display-5 text-uppercase mb-0">Products For Your Best Friends</h1>
        </div>
        <div class="owl-carousel product-carousel">
            @foreach($products as $key)
                <div class="pb-5" onclick="window.location.href = '/view-product?product_id={{$key->id}}'">
                    <div style="position: relative !important;height: 300px !important" class="product-item position-relative bg-light d-flex flex-column text-center">
                        @if($key->image)
                            <img class="img-fluid mb-4" src="img/products/{{$key->image}}" alt="">
                        @else
                            <img class="img-fluid mb-4" src="img/product-1.png" alt="">
                        @endif
                        <div class="product_info">
                            <h6 class="text-uppercase" style="max-width: 100%">{{$key->name}}</h6>
                            <h5 class="text-primary mb-0">₱{{$key->price}}</h5>
                        </div>
                        {{-- <div class="btn-action d-flex justify-content-center">
                            <a class="btn btn-primary py-2 px-3" href=""><i class="bi bi-cart"></i></a>
                            <a class="btn btn-primary py-2 px-3" href=""><i class="bi bi-eye"></i></a>
                        </div> --}}
                    </div>
                </div>
            @endforeach
            {{-- <div class="pb-5">
                <div class="product-item position-relative bg-light d-flex flex-column text-center">
                    <img class="img-fluid mb-4" src="img/product-1.png" alt="">
                    <h6 class="text-uppercase">Quality Pet Foods</h6>
                    <h5 class="text-primary mb-0">$199.00</h5>
                    <div class="btn-action d-flex justify-content-center">
                        <a class="btn btn-primary py-2 px-3" href=""><i class="bi bi-cart"></i></a>
                        <a class="btn btn-primary py-2 px-3" href=""><i class="bi bi-eye"></i></a>
                    </div>
                </div>
            </div>
            <div class="pb-5">
                <div class="product-item position-relative bg-light d-flex flex-column text-center">
                    <img class="img-fluid mb-4" src="img/product-2.png" alt="">
                    <h6 class="text-uppercase">Quality Pet Foods</h6>
                    <h5 class="text-primary mb-0">$199.00</h5>
                    <div class="btn-action d-flex justify-content-center">
                        <a class="btn btn-primary py-2 px-3" href=""><i class="bi bi-cart"></i></a>
                        <a class="btn btn-primary py-2 px-3" href=""><i class="bi bi-eye"></i></a>
                    </div>
                </div>
            </div>
            <div class="pb-5">
                <div class="product-item position-relative bg-light d-flex flex-column text-center">
                    <img class="img-fluid mb-4" src="img/product-3.png" alt="">
                    <h6 class="text-uppercase">Quality Pet Foods</h6>
                    <h5 class="text-primary mb-0">$199.00</h5>
                    <div class="btn-action d-flex justify-content-center">
                        <a class="btn btn-primary py-2 px-3" href=""><i class="bi bi-cart"></i></a>
                        <a class="btn btn-primary py-2 px-3" href=""><i class="bi bi-eye"></i></a>
                    </div>
                </div>
            </div>
            <div class="pb-5">
                <div class="product-item position-relative bg-light d-flex flex-column text-center">
                    <img class="img-fluid mb-4" src="img/product-4.png" alt="">
                    <h6 class="text-uppercase">Quality Pet Foods</h6>
                    <h5 class="text-primary mb-0">$199.00</h5>
                    <div class="btn-action d-flex justify-content-center">
                        <a class="btn btn-primary py-2 px-3" href=""><i class="bi bi-cart"></i></a>
                        <a class="btn btn-primary py-2 px-3" href=""><i class="bi bi-eye"></i></a>
                    </div>
                </div>
            </div>
            <div class="pb-5">
                <div class="product-item position-relative bg-light d-flex flex-column text-center">
                    <img class="img-fluid mb-4" src="img/product-2.png" alt="">
                    <h6 class="text-uppercase">Quality Pet Foods</h6>
                    <h5 class="text-primary mb-0">$199.00</h5>
                    <div class="btn-action d-flex justify-content-center">
                        <a class="btn btn-primary py-2 px-3" href=""><i class="bi bi-cart"></i></a>
                        <a class="btn btn-primary py-2 px-3" href=""><i class="bi bi-eye"></i></a>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>