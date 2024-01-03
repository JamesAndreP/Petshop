<div>
    <form id="view_post" method="get" action="view-post">
        @csrf
        <input type="hidden" name="pet_id" id="pet_id" autocomplete="off">
    </form>
    <div class="notification_bell" onclick="getNotifications()">
        <div class="notification_number_bg">
            <span id="notification_count">{{$notification->count}}</span>
        </div>
        <img src="{{asset('/img/bell.png')}}" alt="">
    </div>
    {{-- <div id="notification_container"></div> --}}
</div>
<div id="notification_container" class="dropdown-menu m-0" style="overflow-y: scroll !important; max-height: 500px !important; width: 400px !important; font-weight: bold">
    {{-- <a href="price.html" class="dropdown-item">Pricing Plan</a>
    <a href="team.html" class="dropdown-item">The Team</a>
    <a href="testimonial.html" class="dropdown-item">Testimonial</a>
    <a href="blog.html" class="dropdown-item">Blog Grid</a>
    <a href="detail.html" class="dropdown-item">Blog Detail</a> --}}
    {{-- <a href="#" class="notification_items">Dolore tempor clita lorem rebum kasd eirmod dolore </a>
    <a href="#" class="notification_items">Dolore tempor clita lorem rebum kasd eirmod dolore </a>
    <a href="#" class="notification_items">Dolore tempor clita lorem rebum kasd eirmod dolore </a>
    <a href="#" class="notification_items">Dolore tempor clita lorem rebum kasd eirmod dolore </a>
    <a href="#" class="notification_items">Dolore tempor clita lorem rebum kasd eirmod dolore </a> --}}
    <a href="#" class="notification_items"></a>
</div>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    async function getNotifications() {
        await $.ajax({
            type:'patch',
            url:"get-notifications",
            data: {
                "_token": "{{ csrf_token() }}",
                user_id : 123
            },
            success:function(data){
                $("#notification_container").html("")
                if(data.length > 0) {
                    data.forEach(element => {
                        $("#notification_container").append("<a href='#' onClick='viewPost("+ element.pet_id +")' class='notification_items'>" + element.content + "</a>")
                    });
                } else {
                    $("#notification_container").html("<div style='padding-left: 10px'>No Notifications</div>")
                }
                // if(data.length > 0) {
                //     $("#notification_container").html("")
                //     data.forEach(element => {
                //         // var $new_row = $("<a/>")   // creates a div element
                //         //     .addClass("notification_items")   // add a class
                //         //     .html(element.content);
                //         // $("#notification_container").append($new_row)
                //     $("#notification_container").append("<a>No notifications</a>")
                //     });
                // } else {
                //     $("#notification_container").html("No notifications")
                // }
            }
        });
        $("#notification_count").html('0');
    }

    function viewPost(id) {
        $("#pet_id").val(id);
        $("#view_post").trigger("submit");
    }
</script>