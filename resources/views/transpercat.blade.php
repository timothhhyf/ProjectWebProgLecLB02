@extends('template')

@section('title', 'Nama Category')

@section('content')

    <h1 class="selected-category-name">Category Name</h1>
    <div class="transactions-sorter">
        <div class="transactions-sort-by">
            <h5 style="font-size:medium;">Sort By:</h5>
            <a href="">Newest</a>
            <a href="">Latest</a>
        </div>
        <div class="transactions-search-and-add">
            <form class="d-flex">
                {{ csrf_field() }}
                <input class="form-control me-sm-2 transactions-search-bar" type="search" placeholder="Search transaction">
                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </div>
    </div>

    <div class="trans-table">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Category</th>
                    <th scope="col">Expenses</th>
                    <th scope="col">Date and Time</th>
                    <th scope="col">Description</th>
                </tr>
            </thead>
            <tbody>
                {{-- foreach --}}
                <tr class="table-info">
                    <th scope="row">Info</th>
                    <td>Column content</td>
                    <td>Column content</td>
                    <td style="position: relative;">Column content
                    {{-- ini jgn didelete, masukin ke loop --}}
                        <a class="edit-btn" href="">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <a class="remove-btn" href="">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection
