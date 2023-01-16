@extends('navbar')

@section('content')
<div style="width: 100vw; height: 94vh" class="d-flex justify-content-center align-items-center">
    <form action="/store" method="POST">
        <div class="mb-3" style="width:500px">
            <label for="description" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="description">
        </div>
        <button class="btn btn-primary">Add</button>
    </form>
</div>

@endsection