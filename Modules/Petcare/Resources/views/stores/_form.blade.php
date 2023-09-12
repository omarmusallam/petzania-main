<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required
        value="{{ old('name', $store->name ?? '') }}">
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $store->description ?? '') }}</textarea>
    @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label for="location">Location</label>
    <input type="text" name="location" class="form-control @error('location') is-invalid @enderror"
        value="{{ old('location', $store->location ?? '') }}" required>
    @error('location')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label for="address">Address</label>
    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
        value="{{ old('address', $store->address ?? '') }}">
    @error('address')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
        value="{{ old('email', $store->email ?? '') }}" required>
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label for="phone">Phone</label>
    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
        value="{{ old('phone', $store->phone ?? '') }}" required>
    @error('phone')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label for="image">Image</label>
    <input type="file" name="image" class="form-control-file @error('image') is-invalid @enderror">
    @error('image')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    @if (isset($store->image))
        <div class="image-container">
            <img src="{{ asset('storage/' . $store->image) }}" alt="img" class="img-fit m-1 border p-1"
                height="80" width="80">
        </div>
    @endif
</div>

<div class="form-group">
    <label for="banner">Banner</label>
    <input type="file" name="banner" class="form-control-file @error('banner') is-invalid @enderror">
    @error('banner')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    @if (isset($store->banner))
        <div class="image-container">
            <img src="{{ asset('storage/' . $store->banner) }}" alt="img" class="img-fit m-1 border p-1"
                height="60">
        </div>
    @endif
</div>

<div class="form-check form-switch mb-2">
    <input type="checkbox" class="form-check-input" id="status" name="status" value="1"
        {{ old('status', $store->status ?? '1') == '1' ? 'checked' : '' }}>
    <label class="form-check-label" for="status">Status</label>
</div>

<div class="form-group">
    <button id="create_category" class="btn btn-primary update_category">{{ $button_lable ?? 'Create Store' }}</button>
</div>
