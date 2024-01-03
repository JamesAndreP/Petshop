@if($message = Session::get('fail'))
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong>{{ $message }}</strong>
</div>
@elseif($message = Session::get('success'))
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong>{{ $message }}</strong>
</div>
@endif
