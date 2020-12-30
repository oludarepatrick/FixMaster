    <div class="form-group position-relative">
        <label>CSEs</label>
        <select class="custom-select @error('recipient_id') is-invalid @enderror" id="recipient_id" name="recipient_id">
            <option value="" selected>Select...</option>
            @foreach ($cses as $cse)
                <option value="{{ $cse->id }}" {{ old('recipient_id') == $cse->id ? 'selected' : ''}}>{{ $cse->fullName->name }}</option>
            @endforeach
        </select>
        @error('recipient_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>