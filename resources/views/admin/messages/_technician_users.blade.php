    <div class="form-group position-relative">
        <label>Technicians</label>
        <select class="custom-select @error('recipient_id') is-invalid @enderror" id="recipient_id" name="recipient_id">
            <option value="" selected>Select...</option>
            @foreach ($technicians as $technician)
                <option value="{{ $technician->id }}" {{ old('recipient_id') == $technician->id ? 'selected' : ''}}>{{ $technician->fullName->name }}</option>
            @endforeach
        </select>
        @error('recipient_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>