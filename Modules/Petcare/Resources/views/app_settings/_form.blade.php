@if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<div class="form-group">
    <label for="type" class="mb-2">Type</label>
    <select name="type" id="type" class="form-control @error('type') is-invalid @enderror"
        onchange="toggleFields()">
        <option value="banner" {{ old('type', $setting->type) === 'banner' ? 'selected' : '' }}>Banner</option>
        <option value="splash" {{ old('type', $setting->type) === 'splash' ? 'selected' : '' }}>Splash</option>
    </select>
    @error('type')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div id="bannerFields">
    {{-- Banner Image --}}
    <div class="form-group my-3">
        <label for="banner_image" class="mb-2">Banner Image</label>
        <input type="file" name="banner_image" id="banner_image"
            class="form-control @error('banner_image') is-invalid @enderror">
        @if (isset($setting) && isset($setting->image_path))
            <div class="image-container">
                <img src="{{ asset('storage/' . $setting->image_path) }}" alt="img" class="img-fit m-1 border p-1"
                    height="80" width="80">
            </div>
        @endif
        @error('banner_image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    {{-- Text --}}
    <div class="form-group my-3">
        <label for="banner_text" class="mb-2">Text</label>
        <input type="banner_text" name="banner_text" id="banner_text"
            class="form-control @error('banner_text') is-invalid @enderror"
            value="{{ old('banner_text', $setting->text) }}">
        @error('banner_text')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    {{-- Link Path --}}
    <div class="form-group my-3">
        <label for="link_path" class="mb-2">Link Path</label>
        <input type="text" name="link_path" id="link_path"
            class="form-control @error('link_path') is-invalid @enderror"
            value="{{ old('link_path', $setting->link_path) }}">
        @error('link_path')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    {{-- Link Text --}}
    <div class="form-group my-3">
        <label for="link_text" class="mb-2">Link Text</label>
        <input type="text" name="link_text" id="link_text"
            class="form-control @error('link_text') is-invalid @enderror"
            value="{{ old('link_text', $setting->link_text) }}">
        @error('link_text')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    {{-- Link Type --}}
    <div class="form-group my-3">
        <label for="link_type" class="mb-2">Link Type</label>
        <select name="link_type" id="link_type" class="form-control @error('link_type') is-invalid @enderror">
            <option value="link" {{ old('link_type', $setting->link_type) === 'link' ? 'selected' : '' }}>Link
            </option>
            <option value="custom" {{ old('link_type', $setting->link_type) === 'custom' ? 'selected' : '' }}>Custom
            </option>
        </select>
        @error('link_type')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div id="splashFields" style="display: none;">
    {{-- Splash Image --}}
    <div class="form-group my-3">
        <label for="splash_image" class="mb-2">Splash Image</label>
        <input type="file" name="splash_image" id="splash_image"
            class="form-control @error('splash_image') is-invalid @enderror">
        @if (isset($setting) && isset($setting->image_path))
            <div class="image-container">
                <img src="{{ asset('storage/' . $setting->image_path) }}" alt="img" class="img-fit m-1 border p-1"
                    height="80" width="80">
            </div>
        @endif
        @error('splash_image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    {{-- Text --}}
    <div class="form-group my-3">
        <label for="splash_text" class="mb-2">Text</label>
        <input type="splash_text" name="splash_text" id="splash_text"
            class="form-control @error('splash_text') is-invalid @enderror"
            value="{{ old('splash_text', $setting->text) }}">
        @error('splash_text')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    {{-- Description --}}
    <div class="form-group my-3">
        <label for="description" class="mb-2">Description</label>
        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
            rows="4">{{ old('description', $setting->description) }}</textarea>
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ $button_label ?? 'Create' }}</button>
</div>

@push('scripts')
    <script>
        function toggleFields() {
            const typeSelect = document.getElementById('type');
            const bannerFields = document.getElementById('bannerFields');
            const splashFields = document.getElementById('splashFields');

            if (typeSelect.value === 'banner') {
                bannerFields.style.display = 'block';
                splashFields.style.display = 'none';
            } else if (typeSelect.value === 'splash') {
                bannerFields.style.display = 'none';
                splashFields.style.display = 'block';
            }
        }
        toggleFields();
    </script>
@endpush
