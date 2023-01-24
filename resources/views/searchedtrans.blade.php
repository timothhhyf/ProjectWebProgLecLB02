@extends('template')

@section('title', 'Search')

@section('content')

    <div style="margin: 10px 20px 10px 40px; display:flex; justify-content:flex-start;">
        <button type="button" class="btn btn-outline-light" onclick="goBack()">&#8249;&nbsp;Back</button>
    </div>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>

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

@endsection
