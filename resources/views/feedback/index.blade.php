@extends('layout.app')

@section('content')

    <section class="feedback-list row m-0 justify-content-center">
        <div class="col-md-6 bg-white my-5 border rounded">
            <div class="w-100 text-left m-2">
                <a class="btn btn-primary" href="/">Назад</a>
            </div>
            <h4 class="my-3 text-center">Список заявок</h4>
            @if($feedback->count() < 1)
                <div>
                    <h5 class="my-5 text-center">Список пуст</h5>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tr>
                            <th>Имя</th>
                            <th>Номер телефона</th>
                            <th>Сообщение</th>
                        </tr>
                        @foreach($feedback as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->message }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            @endif
        </div>
    </section>

@endsection
