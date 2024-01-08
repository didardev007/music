@extends('client.layouts.app')

@section('main')

    <h2>Результаты поиска для "{{ $query }}"</h2>

    @if($results->isEmpty())
        <p>Ничего не найдено.</p>
    @else
        <ul>
            @foreach($results as $result)
                <li>{{ $result->name }}</li>
            @endforeach
        </ul>
    @endif
@endsection
