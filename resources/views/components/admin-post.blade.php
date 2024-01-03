<div class="post_container">
    <div class="post_wrapper">
        <div class="post_box">
            <div>
                <table>
                    <tr>
                        <td>
                            <h4>Type</h4>
                        </td>
                        <td>
                            <h4 style="font-weight: bold">: {{$post->pet_type}}</h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Category</h4>
                        </td>
                        <td>
                            <h4 style="font-weight: bold">: {{$post->pet_category}}</h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4 style="font-weight: bold">{{$post->created_at->diffForHumans()}}</h4>
                        </td>
                    </tr>
                </table>
            </div>  
            <div class="comments">
                @if(count($post->comments) > 0)
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
                @else
                    <div class="comment_section">
                        <div class="comment_content">
                            <div>No Comments</div>                                
                        </div>
                    </div> 
                @endif
            </div>
        </div>
    </div>
</div>