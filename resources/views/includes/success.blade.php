@if(session()->has('message'))

<div class="alert alert-success">
  {{ session()->get('message') }}
</div>
@endif
@if(session()->has('success_message'))
<div class="alert alert-success">
  {{ session()->get('success_message') }}
</div>
@endif
