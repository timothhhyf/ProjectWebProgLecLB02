@extends('template')

@section('title', 'Add Category')

@section('content')

    <div style="width: 100vw; margin-top:auto;" class="d-flex justify-content-center align-items-center">
        <form action="/store" method="POST">
            {{ csrf_field() }}
            <div class="mb-3" style="width:500px">
                <label for="description" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="description" name="description">
            </div>
            <button class="btn btn-primary" type="submit" >Add</button>
        </form>
    </div>

@endsection
