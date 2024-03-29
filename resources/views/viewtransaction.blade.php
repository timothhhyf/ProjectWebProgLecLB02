@extends('template')

@section('title', 'Transactions')

@section('content')

    @if ($expense >= (Auth::user()->maxExpense - 2000000) && $expense < (Auth::user()->maxExpense))
        <div class="alert alert-dismissible alert-warning">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>You are about to reach your max expense this month!</strong> Don't forget to save some!
        </div>

        <div class="exp-stat-bar">
            {{-- expense + max expense --}}
            Your <strong>expense</strong> this month: {{ "Rp. " . number_format($expense) }}
            <br>
            Your <strong>max expense</strong> this month: {{ "Rp. " . number_format(Auth::user()->maxExpense) }}

            <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" aria-valuenow="{{ $expense }}" aria-valuemin="0" aria-valuemax="{{ Auth::user()->maxExpense }}" style="width: calc({{ $expense }}/{{ Auth::user()->maxExpense }}*100%); ">
                </div>
            </div>
            <span class="badge bg-dark" style="position: absolute; top:0; right:0;"><small>You can always change your max expenses in profile setting</small></span>
        </div>

    @elseif ($expense >= (Auth::user()->maxExpense))
        <div class="alert alert-dismissible alert-danger">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>You are at your max expense or more this month!</strong> Go save some now!
        </div>

        <div class="exp-stat-bar">
            {{-- expense + max expense --}}
            Your <strong>expense</strong> this month: {{ "Rp. " . number_format($expense) }}
            <br>
            Your <strong>max expense</strong> this month: {{ "Rp. " . number_format(Auth::user()->maxExpense) }}

            <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="{{ $expense }}" aria-valuemin="0" aria-valuemax="{{ Auth::user()->maxExpense }}" style="width: calc({{ $expense }}/{{ Auth::user()->maxExpense }}*100%);">
                </div>
            </div>
            <span class="badge bg-dark" style="position: absolute; top:0; right:0;"><small>You can always change your max expenses in profile setting</small></span>
        </div>

    @else
        <div class="alert alert-dismissible alert-success">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            You are still far from your max expense this month, but don't forget to save :)
        </div>

        <div class="exp-stat-bar">
            {{-- expense + max expense --}}
            Your <strong>expense</strong> this month: {{ "Rp. " . number_format($expense) }}
            <br>
            Your <strong>max expense</strong> this month: {{ "Rp. " . number_format(Auth::user()->maxExpense) }}

            <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="{{ $expense }}" aria-valuemin="0" aria-valuemax="{{ Auth::user()->maxExpense }}" style="width: calc({{ $expense }}/{{ Auth::user()->maxExpense }}*100%)">
                </div>
            </div>
            <span class="badge bg-dark" style="position: absolute; top:0; right:0;"><small>You can always change your max expenses in profile setting</small></span>

        </div>
    @endif

    <div class="transaction-content">

        <div class="categories-add-btn">
            <h5>Categories</h5>
            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                <button type="button" class="btn btn-outline-primary" disabled>&#43;&nbsp;Add</button>
                <div class="btn-group" role="group">
                  <button id="btnGroupDrop1" type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                  <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <a class="dropdown-item" href="/category">Add Category</a>
                    <a class="dropdown-item" href="/transaction/add">Add Transaction</a>
                  </div>
                </div>
              </div>
        </div>
        <div class="category-selection-overall">
            <div class="category-selection">
                <div class="cover">
                    <button class="left" onclick="leftScrollGenres()">
                        <i class="fas fa-angle-double-left"></i>
                    </button>
                    <div class="scroll-categories">
                        @foreach ($categories as $c)
                            <a href="/transaction/{{ $c->id }}">
                                <p>{{ $c->description }}</p>
                            </a>
                        @endforeach
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
                <a href="/transactions/latest">Latest</a>
                <a href="/transactions/oldest">Oldest</a>
            </div>
            <div class="transactions-search-and-add">
                <form class="d-flex" action="/transaction/search" method="POST">
                    {{ csrf_field() }}
                    <input name="description" class="form-control me-sm-2 transactions-search-bar" type="search" placeholder="Search transaction">
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
                @if ($transactions->isEmpty())
                    <tr class="table-info">
                        No Transaction Data Available
                    </tr>
                @else
                    @foreach ($transactions as $t)
                        <tr class="table-info">
                            <th scope="row">{{ $t->category->description }}</th>
                            <td>{{ "Rp. ".number_format($t->price) }}</td>
                            <td>{{ $t->date }}</td>
                            <td style="position: relative;">{{ $t->description }}
                            {{-- ini jgn didelete, masukin ke loop --}}
                                <a class="edit-btn" href="/transaction/{{$t->id}}/edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a class="remove-btn" href="/transaction/{{$t->id}}/delete">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
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
