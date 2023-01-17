@extends('template')

@section('title', 'Transactions')

@section('content')

    <div class="transaction-content">
        <div class="categories-add-btn">
            <h5>Categories</h5>
            <a type="button" class="btn btn-outline-primary">&#43;&nbsp;Add Category</a>
        </div>
        <div class="category-selection-overall">
            <div class="category-selection">
                <div class="cover">
                    <button class="left" onclick="leftScrollGenres()">
                        <i class="fas fa-angle-double-left"></i>
                    </button>
                    <div class="scroll-categories">
                        {{-- @foreach ($genres as $g)
                            <a href="/filterGenre/{{ $g->id }}">
                                <p>{{ $g->name }}</p>
                            </a>
                        @endforeach --}}
                        <a href="">
                            <p>test</p>
                        </a>                    <a href="">
                            <p>test</p>
                        </a>                    <a href="">
                            <p>test</p>
                        </a>                    <a href="">
                            <p>test</p>
                        </a>                    <a href="">
                            <p>test</p>
                        </a>                    <a href="">
                            <p>test</p>
                        </a>                    <a href="">
                            <p>test</p>
                        </a>                    <a href="">
                            <p>test</p>
                        </a>                    <a href="">
                            <p>test</p>
                        </a>                    <a href="">
                            <p>test</p>
                        </a>                    <a href="">
                            <p>test</p>
                        </a>                    <a href="">
                            <p>test</p>
                        </a>                    <a href="">
                            <p>test</p>
                        </a>                    <a href="">
                            <p>test</p>
                        </a>
                    </div>
                    <button class="right" onclick="rightScrollGenres()">
                        <i class="fas fa-angle-double-right"></i>
                    </button>
                </div>
            </div>
        </div>
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
                <a href="" type="button" class="btn btn-outline-primary">&#43;&nbsp;Add Transaction</a>
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
                        <a href="" style="position: absolute; right:20px; color:red;">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
        function leftScrollGenres() {
            const left = document.querySelector(".scroll-categories");
            left.scrollBy(-1505, 0);
        }

        function rightScrollGenres() {
            const right = document.querySelector(".scroll-categories");
            right.scrollBy(1505, 0);
        }
    </script>

@endsection
