@extends('layout')

@section('content')
    <h1 class="mb-4">Список отпусков</h1>

    @foreach ($vacations as $vacation)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $vacation->user->name }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $vacation->start_date}} - {{ $vacation->end_date }}</h6>
                @if ($vacation->approved)
                    <span class="badge bg-success">Одобрен</span>
                @else
                    <span class="badge bg-danger">Не одобрен</span>
                @endif
                <div class="float-end">
                    <form method="POST" action="{{ route('manager.toggleApproval', $vacation) }}">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-sm btn-primary">{{ $vacation->approved ? 'Отменить одобрение' : 'Одобрить' }}</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
