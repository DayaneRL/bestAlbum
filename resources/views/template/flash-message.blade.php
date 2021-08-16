@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <strong>{{ $message }}</strong>
    </div>
@endif

@if(isset($errors) && count($errors)>0)
    <div class="alert text-center mb-1 p-2 alert-danger alert-error">
        @foreach($errors->all() as $erro)
            {{$erro}}<br>
        @endforeach
    </div>
@endif
   
@if ($message = Session::get('warning') || isset($warning))
<div class="alert alert-warning alert-block">
    <strong>{{ (Session::get('warning')) ? Session::get('warning') : (($warning) ? $warning : '' ) }}</strong>
</div>
@endif
   
@if ($message = Session::get('info'))
<div class="alert alert-info alert-block">
    {{ $message }}
</div>
@endif
