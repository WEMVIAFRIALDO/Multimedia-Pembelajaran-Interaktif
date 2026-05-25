@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6 offset-md-3">
        <h2>Pilih Mood Anda</h2>
        <p>Mood Anda akan mempengaruhi tampilan dan rekomendasi materi.</p>

        @if($currentMood)
            <div class="alert alert-info">
                Mood saat ini: <strong>{{ ucfirst($currentMood->mood) }}</strong>
            </div>
        @endif

        <form method="POST" action="{{ route('mood.store') }}">
            @csrf
            <div class="mb-3">
                <label for="mood" class="form-label">Mood</label>
                <select name="mood" id="mood" class="form-select" required>
                    <option value="">Pilih Mood</option>
                    <option value="santai" {{ old('mood') == 'santai' ? 'selected' : '' }}>Santai 😌</option>
                    <option value="fokus" {{ old('mood') == 'fokus' ? 'selected' : '' }}>Fokus 🎯</option>
                    <option value="lelah" {{ old('mood') == 'lelah' ? 'selected' : '' }}>Lelah 😴</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Mood</button>
        </form>
    </div>
</div>
@endsection