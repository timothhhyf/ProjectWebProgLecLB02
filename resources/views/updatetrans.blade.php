@extends('template')

@section('title', 'Update Transaction')

@section('content')

    <div class="create-update0">
        <h1>Update Transaction</h1>
        <form action="">
            {{ csrf_field() }}
            <div class="form-group create-update1">
                <div class="form-floating category-select">
                    <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example">
                        <option selected>Select any category</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <label for="floatingSelectGrid">Category</label>
                </div>
                <div class="form-floating input-expenses">
                    <input type="expenses" class="form-control" id="floatingexpenses" placeholder="Expenses">
                    <label for="floatingexpenses">Expenses</label>
                  </div>
                <div class="form-floating input-date-and-time">
                    <input type="date" class="form-control" placeholder="Date">
                    <label for="floatingDate">Date or Time</label>
                </div>
                <div class="form-floating input-description">
                    <textarea class="form-control" placeholder="Add description" id="floatingTextarea" style="height: 100px"></textarea>
                    <label for="floatingTextarea">Description</label>
                </div>
            </div>
            <button type="button" class="btn btn-primary" style="width: 100%; margin-top: 15px;">Update Transaction</button>        </form>
    </div>


@endsection
