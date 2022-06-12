<form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="form-group">
        <label for="facebook">Facebook</label>
        <input type="text" class="form-control" id="facebook" name="facebook" value="{{ $user->profile->facebook  }}">
        @error('facebook')
        <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="twitter">Twitter</label>
        <input type="text" class="form-control" id="twitter" name="twitter" value="{{ $user->profile->twitter }}">
        @error('twitter')
        <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="instagram">Instagram </label>
        <input type="text" class="form-control" id="instagram" name="instagram" value="{{ $user->profile->instagram }}">
        @error('instagram')
        <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="linkedin">Linkedin</label>
        <input type="text" class="form-control" id="linkedin" name="linkedin" value="{{ $user->profile->linkedin }}">
        @error('linkedin')
        <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <input type="file" name="avatar" placeholder="Choose image" id="avatar">
        @error('avatar')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-12 mb-2">
        @if($user->profile->avatar)
            <img src="{{ asset('storage/avatars/'.$user->profile->avatar) }}" alt="{{ $user->name }}" class="img-fluid" id="preview-image-before-upload">
        @else
            <img id="preview-image-before-upload" src="" alt="" style="max-height: 250px;">
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Update Profile</button>
</form>
