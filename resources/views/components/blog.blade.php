<div class="container-fluid py-5">
    <div class="container">
        {{-- <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
            <h6 class="text-primary text-uppercase">Latest Blog</h6>
            <h1 class="display-5 text-uppercase mb-0">Latest Articles From Our Blog Post</h1>
        </div> --}}

        <!-- test post -->
        @if(session()->has('username'))
            <div class="post_container">
                <h5 class="post_header post_padding">Write a Post</h5>
                <form action="add-pet" method="post" enctype="multipart/form-data">
                    @csrf
                    <textarea 
                        name="description" 
                        class="form-control" 
                        style="resize: none; margin-left: 0; text-align: left" 
                        autocomplete="off" 
                        cols="76" 
                        rows="10" 
                        placeholder="Write Something..." 
                        required="required"></textarea>
                    <input type="file" name="file[]" autocomplete="off" class="form-control" multiple accept="image/png, image/gif, image/jpeg, image/jpg" style="margin-top: 10px" />
                    <div class="post_padding selection">
                        <select name="pet_type" class="form-control post_select_type">
                            <option value="ADOPTION">Adoption</option>
                            <option value="SELLING">Selling</option>
                        </select>
                        @if($category && count($category) > 0)
                            <select name="pet_category" class="form-control post_select_category">
                                @foreach ($category as $pet_category)
                                    <option value="{{$pet_category->category_name}}">{{$pet_category->category_name}}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                    <button type="submit" class="btn post_submit">Post</button>
                </form>
            </div>
        @endif
        <br><br>
        <div class="row g-5">
            @foreach($posts as $post)
                @php
                    $images = [];
                    $images = json_decode($post->image);
                @endphp
                <div class="blog-item">
                    <div class="row g-0 bg-light overflow-hidden">
                        <div class="col-12 col-sm-5 h-100">
                            <div style="height: 100%">
                                <div class="owl-carousel testimonial-carousel bg-white"">
                                    @foreach($images as $image)
                                        <div class="testimonial-item text-center">
                                            <div class="position-relative mb-4">
                                                <img 
                                                    class="mx-auto" 
                                                    style="max-width: 437px; max-height: 300px; width: auto; height: auto" 
                                                    src="{{asset('/img/pet avatars/'. $image)}}" 
                                                    alt=""  
                                                    onclick="window.location.href = '/view-post?pet_id={{$post->id}}'"
                                                >
                                                {{-- <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white" style="width: 45px; height: 45px;">
                                                    <i class="bi bi-chat-square-quote text-primary"></i>
                                                </div> --}}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-7 h-100 d-flex flex-column">
                            <div class="p-4">
                                <div class="d-flex mb-3" style="font-size: 30px"><b>{{$post->fullname}}</b></div>
                                <div class="d-flex mb-3">
                                    <h4 class="me-3"><i class="bi bi-bookmarks me-2"></i>{{$post->pet_category}}</h4>
                                    <h4 class="me-3"><i class="bi bi-tags me-2"></i>{{$post->pet_type}}</h4>
                                    <h4 class="me-3"><i class="bi bi-calendar me-2"></i>{{$post->created_at->diffForHumans()}}</h4>
                                </div>
                                {{-- <h5 class="text-uppercase mb-3">Dolor sit magna rebum clita rebum dolor</h5> --}}
                                <p>{{$post->description}}</p>
                                {{-- <a class="text-primary text-uppercase" href="">Read More<i class="bi bi-chevron-right"></i></a> --}}
                            </div>
                        </div>
                    </div>
                    @if(session()->has('username'))
                        <form action="{{Request::path() === '/' ? 'submit-comment' : 'view-posts-submit-comment'}}" method="post">
                            @csrf
                            <div class="comment_container">
                                <input type="text" class="form-control comment_input" name="comment" required="required" autocomplete="off" placeholder="Write a comment">
                                <input type="text" value="{{$post->id}}" name="pet_id" hidden>
                                <button type="submit" class="btn comment_button">Comment</button>
                            </div> 
                        </form>
                    @endif
                    <div class="comments">
                        @foreach ($post->comments as $comment)
                        <div class="comment_section">
                            <figure>
                                <img src="{{asset('/img/avatars/'. $comment->avatar)}}" alt="xxx">
                            </figure>
                            <div class="comment_content">
                                <div class="comment_bubble">
                                    <div class="comment_name">{{$comment->name}}</div>
                                    <div class="comment_message">{{$comment->comment}}</div>
                                </div>
                                <h6>{{$comment->created_at->diffForHumans()}}</h6>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>