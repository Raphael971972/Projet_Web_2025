<div class="card pb-2.5">
    <div class="card-header" id="auth_email">
        <h3 class="card-title">
            Email
        </h3>
    </div>
    <div class="card-body grid gap-5 pt-7.5">
        <div class="w-full">
            <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                <label class="form-label max-w-56">
                    Email
                </label>
                <div class="flex flex-col tems-start grow gap-7.5 w-full">
                    @method('PUT')
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" required>

                </div>
            </div>
        </div>
        <div class="flex justify-end">
            <x-forms.primary-button>Save Changes</x-forms.primary-button>
        </div>
    </div>
</div>
