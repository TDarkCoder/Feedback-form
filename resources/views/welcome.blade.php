@extends('layout.app')

@section('content')

    <section class="storage-list my-4">
        <ul class="list-group list-group-horizontal justify-content-center">
            <li class="list-group-item"><a href="{{ route('feedback.index', ['storage' => 'database']) }}">База данных</a></li>
            <li class="list-group-item"><a href="{{ route('feedback.index', ['storage' => 'text']) }}">Текстовый файл</a></li>
        </ul>
    </section>
    <blank></blank>

@endsection
