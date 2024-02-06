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