@extends('layout')

@section('content')
    <h1>Мои отпуска</h1>
    <a href="{{ route('employee.create') }}" class="btn btn-primary">Добавить отпуск</a>
    <table class="table">
        <thead>
        <tr>
            <th>Начало отпуска</th>
            <th>Конец отпуска</th>
            <th>Утверждено</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($vacations as $vacation)
            <tr>
                <td>{{ $vacation->start_date }}</td>
                <td>{{ $vacation->end_date }}</td>
                <td>{{ $vacation->approved ? 'Да' : 'Нет' }}</td>
                <td>
                    @if(!$vacation->approved)
                        <a href="{{ route('employee.edit', $vacation->id) }}" class="btn btn-sm btn-warning">Редактировать</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h2>Отпуска других сотрудников</h2>
    <table class="table">
        <thead>
        <tr>
            <th>Сотрудник</th>
            <th>Начало отпуска</th>
            <th>Конец отпуска</th>
        </tr>
        </thead>
        <tbody>
        @foreach($othersVacations as $vacation)
            <tr>
                <td>{{ $vacation->user->name }}</td>
                <td>{{ $vacation->start_date }}</td>
                <td>{{ $vacation->end_date }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
