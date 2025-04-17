@extends('layouts.modal', [
    'id'    => 'teacher-modal',
    'title'  => 'Modifier les informations de l\'enseignant',
])

@section('modal-content')
    <form action="{{ route('users.update', $teacher->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="lastname">Nom</label>
        <input type="text" id="lastname" name="lastname" value="{{ old('lastname', $teacher->last_name) }}" required>

        <label for="firstname">Prénom</label>
        <input type="text" id="firstname" name="firstname" value="{{ old('firstname', $teacher->first_name) }}" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email', $teacher->email) }}" required>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <button type="submit">Modifier</button>
    </form>


@endsection
