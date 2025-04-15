<x-app-layout>
    <x-slot name="header">
        <h1 class="flex items-center gap-1 text-sm font-normal">
            <span class="text-gray-700">
                {{ __('Dashboard Enseignant') }}
            </span>
        </h1>
    </x-slot>

    <!-- begin: grid -->
    <div class="grid lg:grid-cols-3 gap-5 lg:gap-7.5 items-stretch">
        <!-- Bloc des promotions liées à l'enseignant -->
        <div class="lg:col-span-2">
            <div class="card card-grid h-full min-w-full">
                <div class="card-header">
                    <h3 class="card-title">
                        Mes Promotions ({{ now()->year }})
                    </h3>
                </div>
                <div class="card-body flex flex-col gap-5">
                    @forelse($cohorts as $cohort)
                        <div class="p-4 border rounded shadow-sm bg-white hover:bg-gray-100 transition">
                            <h4 class="font-semibold text-lg">{{ $cohort->name }}</h4>
                            <p class="text-sm text-gray-600">
                                Du {{ \Carbon\Carbon::parse($cohort->start_date)->format('d/m/Y') }}
                                au {{ \Carbon\Carbon::parse($cohort->end_date)->format('d/m/Y') }}
                            </p>
                        </div>
                    @empty
                        <p class="text-gray-600">Aucune promotion assignée pour l’instant.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Bloc latéral vide pour équilibrer la mise en page comme le dashboard étudiant -->
        <div class="lg:col-span-1">
            <div class="card card-grid h-full min-w-full">
                <div class="card-header">
                    <h3 class="card-title">
                        Informations
                    </h3>
                </div>
                <div class="card-body flex flex-col gap-5">
                    <p class="text-sm text-gray-600">Bienvenue sur votre tableau de bord enseignant. Ici vous pouvez visualiser les promotions auxquelles vous êtes associé.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end: grid -->
</x-app-layout>
