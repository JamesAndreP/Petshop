<nav class="main-header navbar navbar-expand navbar-light navbar-success">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    
    </ul>



    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li onclick="openNotif()">
            <div class="admin_notification_container">
                <img src="{{asset('/img/admin-notification.png')}}" alt="">
                <div id="notification_count" class="notification_count">
                    {{$notification->count > 0 ? $notification->count : 0 }}
                </div>
            </div>
        </li>
      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
    <div id="notif" class="notification_box_container">
        <div id="notification_box" class="notification_box"></div>
    </div>
  </nav>
  <script>
    async function openNotif() {
        console.log('nisud diri')
        var class_name = $("#notif").attr("class");
        if(class_name) {
            $("#notif").removeClass(class_name)
            await $.ajax({
            type:'patch',
            url:"get-notifications",
            data: {
                "_token": "{{ csrf_token() }}",
                user_id : 123
            },
            success:function(data){
                $("#notification_box").html("")
                if(data.length > 0) {
                    data.forEach(element => {
                        $("#notification_box").append("<div class='notification_row'><a href='view-post?pet_id=" + element.pet_id + "'>" + element.content + "</a></div>")
                    });
                } else {
                    $("#notification_box").html("<div style='padding-left: 10px'>No Notifications</div>")
                }
            }
        });
        $("#notification_count").html('0');
        } else {
            $("#notif").addClass("notification_box_container")
        }
    }
  </script>
