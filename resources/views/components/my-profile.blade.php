<div class="side_box">
    <div class="whole_profile_picture">
        <div class="profile_background">
        </div>
        @if($user)
            <figure>
                <img src="{{asset('/img/avatars/'. $user->avatar)}}" alt="No Image">
            </figure>
        @endif  
        {{-- <h2>My Profile</h2> --}}
    </div>
    <div class="profile_details">
        <table>
            <tr>
                <td>Name:</td>
                <td>{{$user->fullname}}</td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>{{$user->email}}</td>
            </tr>
            <tr>
                <td>Contact:</td>
                <td>{{$user->contact}}</td>
            </tr>
        </table>
    </div>
    {{-- <div class="button_section"> --}}
        <a href="/my-posts" class="button_section">View Posts</a>
    {{-- </div> --}}
</div>