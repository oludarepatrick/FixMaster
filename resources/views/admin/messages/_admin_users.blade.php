    <div class="form-group position-relative">
        <label>Administrators</label>
        <select class="custom-select @error('recipient_id') is-invalid @enderror" id="recipient_id" name="recipient_id">
            <option value="" selected>Select...</option>
            @foreach ($administrators as $admin)
                <option value="{{ $admin->id }}" {{ old('recipient_id') == $admin->id ? 'selected' : ''}}>{{ $admin->fullName->name }}</option>
            @endforeach
        </select>
        @error('recipient_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>