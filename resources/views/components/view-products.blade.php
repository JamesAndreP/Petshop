<div>
    <div class="product_wrapper">
        @foreach ($products as $product)
            {{-- <div class="product_outer_box">
                <div class="product_box">
                    <div class="product_image_wrapper">
                        <div class="product_image">
                            <img class="mx-auto" style="max-width: 99%; max-height: 99%; width: auto; height: auto" src="{{asset('/img/products/'. $product->image)}}" alt="">
                        </div>
                    </div>
                    <div class="product_content">
                        <div class="product_header">
                            <h1><b>{{$product->name}}</b></h1>
                        </div>
                        <div class="product_details">
                            <table class="table">
                                <tr>
                                    <td>Product:</td>
                                    <td>{{$product->name}}</td>
                                </tr>
                                <tr>
                                    <td>Category:</td>
                                    <td>{{$product->product_category}}</td>
                                </tr>
                                <tr>
                                    <td>Price:</td>
                                    <td>₱{{$product->price}}</td>
                                </tr>
                                <tr>
                                    <td>Description:</td>
                                    <td>{{$product->details}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>   --}}
            <div class="product_box">
                <div class="img_container">
                    <img src="{{asset('/img/products/'. $product->image)}}" alt="">
                </div>

                <div class="product_name">
                    <div class="">
                        <h2>{{$product->name}}</h2>
                    </div>
                </div>
                <div class="view_product_button">
                    <a href="/view-product?product_id={{$product->id}}">View Product</a>
                </div>
            </div>
        @endforeach
    </div>
</div>