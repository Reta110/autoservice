@if (session('success'))
    <div class="alert alert-success alert-dismissable fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('success') }}
    </div>
@endif
@if(count($errors) > 0)
    <div class="alert alert-danger alert-dismissable fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <ul>
            @foreach($errors-> all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif