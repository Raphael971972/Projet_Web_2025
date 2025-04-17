<div id="cohort-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
    <div class="bg-white rounded-lg w-[500px] p-6">
        <h2 class="text-lg font-semibold mb-4">Modifier la promotion</h2>

        <form id="edit-cohort-form" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" id="edit-id" name="id">

            <label for="edit-name">Nom</label>
            <input type="text" id="edit-name" name="name" class="w-full border rounded p-2 mb-3" required>

            <label for="edit-description">Description</label>
            <textarea id="edit-description" name="description" class="w-full border rounded p-2 mb-3"></textarea>

            <label for="edit-start">Début</label>
            <input type="date" id="edit-start" name="start_year" class="w-full border rounded p-2 mb-3" required>

            <label for="edit-end">Fin</label>
            <input type="date" id="edit-end" name="end_year" class="w-full border rounded p-2 mb-3" required>

            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeModal()" class="bg-gray-300 px-4 py-2 rounded">Annuler</button>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-800">Modifier</button>
            </div>
        </form>
    </div>
</div>
<script>
    function openEditModal(id) {
        fetch(`/cohorts/${id}/edit`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('edit-id').value = id;
                document.getElementById('edit-name').value = data.name;
                document.getElementById('edit-description').value = data.description;
                document.getElementById('edit-start').value = data.start_date;
                document.getElementById('edit-end').value = data.end_date;

                document.getElementById('edit-cohort-form').action = `/cohorts/${id}`;
                document.getElementById('cohort-modal').classList.remove('hidden');
            });
    }

    function closeModal() {
        document.getElementById('cohort-modal').classList.add('hidden');
    }
</script>
