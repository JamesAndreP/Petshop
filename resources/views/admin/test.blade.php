<form action="{{url('/admin/test')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" id="file" />
    <button type="submit">123123123</button>
</form>