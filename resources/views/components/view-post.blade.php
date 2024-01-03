<div class="container-fluid py-5">
    <div class="container">
        <div class="row g-5">
            @php
                $images = [];
                $images = json_decode($post->image);
            @endphp
            <div class="blog-item">
                <div class="row g-0 bg-light overflow-hidden">
                    <div class="col-12 col-sm-5 h-100">
                        <div style="height: 100%">
                            <div class="owl-carousel testimonial-carousel bg-white">
                                @foreach($images as $image)
                                    <div class="testimonial-item text-center">
                                        <div class="position-relative mb-4">
                                            <img class="mx-auto" style="max-width: 437px; max-height: 300px; width: auto; height: auto" src="{{asset('/img/pet avatars/'. $image)}}" alt="">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-7 h-100 d-flex flex-column">
                        <div class="p-4">
                            <div class="d-flex mb-3">
                                <h4 class="me-3"><i class="bi bi-bookmarks me-2"></i>{{$post->pet_category}}</h4>
                                <h4 class="me-3"><i class="bi bi-tags me-2"></i>{{$post->pet_type}}</h4>
                                <h4 class="me-3"><i class="bi bi-calendar me-2"></i>{{$post->created_at->diffForHumans()}}</h4>
                            </div>
                            <p>{{$post->description}}</p>
                        </div>
                    </div>
                </div>
                @if(session()->has('username'))
                    <form action="view-post-submit-comment" method="post">
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
        </div>
    </div>
</div>
{{-- {{$post}} --}}