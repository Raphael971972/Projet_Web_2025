<x-app-layout>
    <x-slot name="header">
        <h1 class="flex items-center gap-1 text-sm font-normal">
            <span class="text-gray-700">
                {{ __('Dashboard') }}
            </span>
        </h1>
    </x-slot>

    <!-- begin: grid -->
    <div class="grid lg:grid-cols-3 gap-5 lg:gap-7.5 items-stretch">
        <!-- Tableau de gauche - ligne 1 -->
        <a href="{{ route('cohort.index') }}" class="table-link" style="text-decoration: none; color: inherit;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                <tr style="background-color: #2d3748; text-align: center;">
                    <th colspan="6" style="color: white;">Promotions</th>
                </tr>
                <tr style="background-color: #a0ff00; text-align: center;">
                    <!-- Vous pouvez ajouter d'autres liens de titre si nécessaire -->
                </tr>
                </thead>
                <tbody>
                <tr style="text-align: center;">
                    <td>{{$nbCohort}}</td>
                </tr>

                </tr>
                </tbody>
            </table>
        </a>

        <!-- Tableau de droite - ligne 1 -->
        <a href="{{ route('student.index') }}" class="table-link" style="text-decoration: none; color: inherit;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                <tr style="background-color: #2d3748; text-align: center;">
                    <th colspan="6" style="color: white;">Nombre d'étudiants</th>
                </tr>
                <tr style="background-color: #a0ff00; text-align: center;">
                    <!-- Vous pouvez ajouter d'autres liens de titre si nécessaire -->
                </tr>
                </thead>
                <tbody>
                <tr style="text-align: center;">
                    <td>{{$nbStudent}}</td>
                </tr>
                </tbody>
            </table>
        </a>
    </div>

    <!-- Deuxième ligne de tableaux -->
    <div class="grid lg:grid-cols-3 gap-5 lg:gap-7.5 items-stretch mt-5">
        <!-- Tableau de gauche - ligne 2 -->
        <a href="{{ route('teacher.index') }}" class="table-link" style="text-decoration: none; color: inherit;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                <tr style="background-color: #2d3748; text-align: center;">
                    <th colspan="6" style="color: white;">Nombre d'enseignants</th>
                </tr>
                <tr style="background-color: #a0ff00; text-align: center;">
                    <!-- Vous pouvez ajouter d'autres liens de titre si nécessaire -->
                </tr>
                </thead>
                <tbody>
                <tr style="text-align: center;">
                    <td>{{$nbTeacher}}</td>
                </tr>
                </tbody>
            </table>
        </a>

        <!-- Tableau de droite - ligne 2 -->
        <a href="{{ route('group.index') }}" class="table-link" style="text-decoration: none; color: inherit;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                <tr style="background-color: #2d3748; text-align: center;">
                    <th colspan="6" style="color: white;">Nombre de groupes</th>
                </tr>
                <tr style="background-color: #a0ff00; text-align: center;">
                    <!-- Vous pouvez ajouter d'autres liens de titre si nécessaire -->
                </tr>
                </thead>
                <tbody>
                <tr style="text-align: center;">
                    <td>0</td>
                </tr>
                </tbody>
            </table>
        </a>
    </div>
    <!-- end: grid -->

    <!-- Style pour l'effet hover -->
    <style>
        .table-link:hover table {
            transform: scale(1.02);  /* Agrandissement léger */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);  /* Ombre pour l'effet */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .table-link:hover {
            cursor: pointer;  /* Curseur pointeur pour indiquer que c'est cliquable */
        }
    </style>
</x-app-layout>

