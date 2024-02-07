@extends('layouts.admin')

@section('content')
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Modifica Evento</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.events.update', $event->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input id="name" type="text" class="form-control" name="name"
                                    value="{{ old('name', $event->name) }}" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="date">Data</label>
                                <input id="date" type="date" class="form-control" name="date"
                                    value="{{ old('date', $event->date) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="location">Location</label>
                                <input id="location" type="text" class="form-control" name="location"
                                    value="{{ old('location', $event->location) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Descrizione</label>
                                <textarea id="description" class="form-control" name="description"
                                    required>{{ old('description', $event->description) }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Tags</label>
                                <!-- Contenitore per i gruppi di checkbox -->
                                <div class="checkbox-groups">
                                    <!-- Inizializza una variabile per contare il numero di tag -->
                                    @php $count = 0; @endphp
                                    <!-- Itera attraverso ogni tag -->
                                    @foreach ($tags as $tag)
                                    <!-- Se il contatore è divisibile per 5, inizia un nuovo gruppo -->
                                    @if ($count % 5 == 0)
                                    <div class="checkbox-group">
                                        @endif
                                        <div class="form-check form-check-inline">
                                            <!-- Crea una casella di controllo per il tag -->
                                            <input class="form-check-input" type="checkbox" name="tags[]"
                                                id="tag{{ $tag->id }}" value="{{ $tag->id }}" {{
                                                $event->tags->contains($tag->id) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="tag{{ $tag->id }}">
                                                {{ $tag->name }}
                                            </label>
                                        </div>
                                        <!-- Incrementa il contatore di tag -->
                                        @php $count++; @endphp
                                        <!-- Se il contatore è divisibile per 5 o siamo all'ultimo tag, chiudi il gruppo -->
                                        @if ($count % 5 == 0 || $loop->last)
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary">Salva Modifiche</button>
                                <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">Annulla</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection