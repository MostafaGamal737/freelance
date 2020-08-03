@foreach($errors->all() as $error)
  <h5 class="alert alert-danger" >{{$error}}</h5>
@endforeach
<div class="alert alert-danger">
  {{ session()->get('message') }}
</div>
