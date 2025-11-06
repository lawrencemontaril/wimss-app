<h4 class="mb-4 text-lg font-semibold">User Information</h4>
<div class="mb-4 grid grid-cols-1 gap-4 lg:grid-cols-2">
    <div>
        <x-text-input
            name="first_name"
            type="text"
            value="{{ old('first_name') }}"
            labelText="First Name"
        />
    </div>

    <div>
        <x-text-input
            name="last_name"
            type="text"
            value="{{ old('last_name') }}"
            labelText="Last Name"
        />
    </div>
</div>

<div class="mb-4">
    <label
        class="text-sm font-semibold"
        for="sex"
    >
        Sex
        <span class="text-red-500">*</span>
    </label>

    <select
        class="my-1 block w-full rounded-lg border border-zinc-200 bg-white p-2.5 px-3 text-sm shadow-sm outline-none transition-all duration-150 ease-in-out focus:border-sky-500 focus:ring-4 focus:ring-sky-500/50"
        id="sex"
        name="sex"
    >
        <option
            value=""
            {{ old('sex') ? '' : 'selected' }}
        >---</option>

        <option
            value="male"
            {{ old('sex') == 'male' ? 'selected' : '' }}
        >
            Male
        </option>

        <option
            value="female"
            {{ old('sex') == 'female' ? 'selected' : '' }}
        >
            Female
        </option>
    </select>
    @error('sex')
        <p class="my-1 text-xs text-red-500">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <x-text-input
        name="contact_number"
        type="text"
        value="{{ old('contact_number') }}"
        labelText="Contact Number"
    />
</div>

<div class="mb-4">
    <x-text-input
        name="username"
        type="text"
        value="{{ old('username') }}"
        labelText="Username"
    />
</div>

<div class="mb-4">
    <x-text-input
        name="password"
        type="password"
        value="{{ old('password') }}"
        labelText="Password"
    />
</div>

<div>
    <x-text-input
        name="password_confirmation"
        type="password"
        value="{{ old('password_confirmation') }}"
        labelText="Confirm Password"
    />
</div>

