<x-app-layout>
    <x-slot name="header">
        <h1 class="flex items-center gap-1 text-sm font-normal">
            <span class="text-gray-700">
                {{ __('Promotions') }}
            </span>
        </h1>
    </x-slot>

    @if(session('success'))
        <div class="alert alert-success text-green-600 p-2 mb-4 rounded bg-green-100 border border-green-300">
            {{ session('success') }}
        </div>
    @endif

    <!-- begin: grid -->
    <div class="grid lg:grid-cols-3 gap-5 lg:gap-7.5 items-stretch">
        <div class="lg:col-span-2">
            <div class="grid">
                <div class="card card-grid h-full min-w-full">
                    <div class="card-header">
                        <h3 class="card-title">Liste des promotions</h3>
                        <div class="input input-sm max-w-48">
                            <i class="ki-filled ki-magnifier"></i>
                            <input placeholder="Rechercher une promotion" type="text"/>
                        </div>
                    </div>
                    <div class="card-body">
                        <div data-datatable="true" data-datatable-page-size="5">
                            <div class="scrollable-x-auto">
                                <table class="table table-border" data-datatable-table="true">
                                    <thead>
                                    <tr>
                                        <th class="min-w-[135px]">Nom</th>
                                        <th class="min-w-[135px]">Début</th>
                                        <th class="min-w-[135px]">Fin</th>
                                        <th class="w-[70px]"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($cohorts as $cohort)
                                        <tr>
                                            <td>{{ $cohort->name }}</td>
                                            <td>{{ $cohort->start_date }}</td>
                                            <td>{{ $cohort->end_date }}</td>
                                            <td>
                                                <div class="flex items-center justify-between">
                                                    <form action="{{ route('cohorts.destroy', $cohort->id) }}" method="POST" onsubmit="return confirm('Supprimer cette promotion ?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-500 hover:text-red-700">
                                                            <i class="ki-filled ki-trash"></i>
                                                        </button>
                                                    </form>
                                                    <a class="hover:text-primary cursor-pointer" onclick="openEditModal({{ $cohort->id }})">


                                                    <i class="ki-filled ki-cursor"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
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

        <!-- formulaire ajout -->
        <div class="lg:col-span-1">
            <div class="card h-full">
                <div class="card-header">
                    <h3 class="card-title">Ajouter une promotion</h3>
                </div>
                <div class="card-body flex flex-col gap-5">
                    <style>
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
                        input, textarea {
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
                        <form action="{{ route('cohorts.store') }}" method="POST">
                            @csrf

                            <label for="name">Nom</label>
                            <input type="text" id="name" name="name" required>

                            <label for="description">Description</label>
                            <textarea id="description" name="description"></textarea>

                            <label for="start_year">Début de l'année</label>
                            <input type="date" id="start_year" name="start_year" required>

                            <label for="end_year">Fin de l'année</label>
                            <input type="date" id="end_year" name="end_year" required>

                            <button type="submit">Confirmer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end: grid -->
</x-app-layout>

@include('pages.cohorts.cohort-modal')

