<div class="container-fluid py-5">
    <div class="container">
        <div class="row g-5">
            <div class="blog-item">
                <div class="row g-0 bg-light overflow-hidden">
                    <div class="col-12 col-sm-5 h-100">
                        <div style="height: 100%">
                            <div class="owl-carousel testimonial-carousel bg-white">
                                <div class="testimonial-item text-center">
                                    <div class="position-relative mb-4">
                                        <img class="mx-auto" style="max-width: 437px; max-height: 300px; width: auto; height: auto" src="{{asset('/img/products/'. $product->image)}}" alt="xxx">
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-7 h-100 d-flex flex-column">
                        <div class="p-4">
                            <div class="d-flex mb-3">
                                <h4 class="me-3"><i class="bi bi-cart4 me-2"></i>{{$product->name}}</h4>
                                <h4 class="me-3"><i class="bi bi-tags me-2"></i>{{$product->product_category}}</h4>
                                <h4 class="me-3"><i class="bi bi-cash me-2"></i>₱{{$product->price}}</h4>
                            </div>
                            <p>{{$product->details}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>