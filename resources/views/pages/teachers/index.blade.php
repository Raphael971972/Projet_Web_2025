<x-app-layout>
    <x-slot name="header">
        <h1 class="flex items-center gap-1 text-sm font-normal">
            <span class="text-gray-700">
                {{ __('Enseignants') }}
            </span>
        </h1>
    </x-slot>

    <!-- begin: grid -->
    <div class="grid lg:grid-cols-3 gap-5 lg:gap-7.5 items-stretch">
        <div class="lg:col-span-2">
            <div class="grid">
                <div class="card card-grid h-full min-w-full">
                    <div class="card-header">
                        <h3 class="card-title">Liste des enseignants</h3>
                        <div class="input input-sm max-w-48">
                            <i class="ki-filled ki-magnifier"></i>
                            <input placeholder="Rechercher un enseignants" type="text"/>
                        </div>
                    </div>
                    <div class="card-body">
                        <div data-datatable="true" data-datatable-page-size="5">
                            <div class="scrollable-x-auto">
                                <table class="table table-border" data-datatable-table="true">
                                    <thead>
                                    <tr>
                                        <th class="min-w-[135px]">
                                            <span class="sort asc">
                                                 <span class="sort-label">Nom</span>
                                                 <span class="sort-icon"></span>
                                            </span>
                                        </th>
                                        <th class="min-w-[135px]">
                                            <span class="sort">
                                                <span class="sort-label">Prénom</span>
                                                <span class="sort-icon"></span>
                                            </span>
                                        </th>
                                        <th class="w-[70px]"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($teachers as $teacher)
                                        @if($teachers_role && $teachers_role->contains('user_id',$teacher->id))
                                            <tr>
                                                <td>{{ $teacher->last_name }}</td>
                                                <td>{{ $teacher->first_name }}</td>
                                                <td>
                                                    <div class="flex items-center justify-between">
                                                        <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="text-red-500 hover:text-red-700">
                                                                <i class="ki-filled ki-trash"></i>
                                                            </button>
                                                        </form>
                                                        <a class="hover:text-primary cursor-pointer" href="{{ route('users.edit', $teacher->id) }}" data-modal-toggle="#teacher-modal">
                                                            <i class="ki-filled ki-cursor"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer justify-center md:justify-between flex-col md:flex-row gap-5 text-gray-600 text-2sm font-medium">
                                <div class="flex items-center gap-2 order-2 md:order-1">
                                    Show
                                    <select class="select select-sm w-16" data-datatable-size="true" name="perpage"></select>
                                    per page
                                </div>
                                <div class="flex items-center gap-4 order-1 md:order-2">
                                    <span data-datatable-info="true"></span>
                                    <div class="pagination" data-datatable-pagination="true"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="lg:col-span-1">
            <div class="card h-full">
                <div class="card-header">
                    <h3 class="card-title">
                        Ajouter un enseignant
                    </h3>
                </div>
                <div class="card-body flex flex-col gap-5">
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            margin: 40px;
                        }
                        .form-container {
                            max-width: 400px;
                            margin: auto;
                            padding: 20px;
                            border-radius: 8px;
                            box-shadow: 0 0 10px rgba(0,0,0,0.1);
                            background-color: #f9f9f9;
                        }
                        label {
                            display: block;
                            margin-bottom: 8px;
                            font-weight: bold;
                        }
                        input[type="text"],
                        input[type="email"] {
                            width: 100%;
                            padding: 8px;
                            margin-bottom: 16px;
                            border: 1px solid #ccc;
                            border-radius: 4px;
                        }
                        button {
                            background-color: #007bff;
                            color: white;
                            padding: 10px 15px;
                            border: none;
                            border-radius: 4px;
                            cursor: pointer;
                        }
                        button:hover {
                            background-color: #0056b3;
                        }
                    </style>
                    <div class="form-container">

                        <form action="{{ route('teachers.store') }}"id="TeacherID" method="POST">
                            @csrf
                            <label for="lastname">Nom</label>
                            <input type="text" id="lastname" name="lastname" required>

                            <label for="firstname">Prénom</label>
                            <input type="text" id="firstname" name="firstname" required>

                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" required>

                            <button type="submit">Confirmer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- end: grid -->
</x-app-layout>

@include('pages.teachers.teacher-modal')
