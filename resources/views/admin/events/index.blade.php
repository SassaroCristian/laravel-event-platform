@extends('layouts.admin')

@section('content')
<div class="content">
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4 py-4">
            @if(isset($events) && count($events) > 0)
            @foreach ($events as $event)
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        {{ $event->name }}</div>

                    <div class="card-body">{{ $event->description }}
                        <br> <b>
                            {{ $event->date }}
                            <br>
                            {{ $event->location }}</b>
                        <div class="mt-3">
                            @if ($event->tags->count() > 0)
                            <p>Tags:
                                @foreach ($event->tags as $tag)
                                <span class="badge bg-primary">{{ $tag->name }}</span>
                                @endforeach
                            </p>
                            @endif

                            <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-primary">Modifica</a>
                            <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Elimina</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <p>Nessun evento trovato.</p>
            @endif
        </div>
    </div>
</div>
@endsection