@extends('layouts.modal', [
    'id'    => 'student-modal',
    'title'  => 'Modifier les informations de l\'étudiant',
])

@section('modal-content')
    <form action="{{ route('users.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="lastname">Nom</label>
        <input type="text" id="lastname" name="lastname" value="{{ old('lastname', $student->last_name) }}" required>

        <label for="firstname">Prénom</label>
        <input type="text" id="firstname" name="firstname" value="{{ old('firstname', $student->first_name) }}" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email', $student->email) }}" required>

        <label for="birth_date">Date de naissance</label>
        <input type="date" id="birth_date" name="birth_date" value="{{ old('birth_date', $student->birth_date) }}" required>


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
