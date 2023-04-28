@extends('layout')

@section('content')
    <h1>Редактировать отпуск</h1>
    <form action="{{ route('employee.update', $vacation->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="start_date" class="form-label">Дата начала отпуска</label>
            <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date', $vacation->start_date) }}" required>
        </div>
        <div class="mb-3">
            <label for="end_date" class="form-label">Дата окончания отпуска</label>
            <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date', $vacation->end_date) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection
