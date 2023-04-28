@extends('layout')

@section('content')
    <h1>Добавить отпуск</h1>
    <form action="{{ route('employee.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="start_date">Начало отпуска</label>
            <input type="date" class="form-control" id="start_date" name="start_date" required>
        </div>
        <div class="form-group">
            <label for="end_date">Конец отпуска</label>
            <input type="date" class="form-control" id="end_date" name="end_date" required>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
        <a href="{{ route('employee.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@endsection
