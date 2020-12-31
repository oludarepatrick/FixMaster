    <div class="form-group position-relative">
        <label>Clients</label>
        <select class="custom-select @error('recipient_id') is-invalid @enderror" id="recipient_id" name="recipient_id">
            <option value="" selected>Select...</option>
            @foreach ($clients as $client)
                <option value="{{ $client->id }}" {{ old('recipient_id') == $client->id ? 'selected' : ''}}>{{ $client->fullName->name }}</option>
            @endforeach
        </select>
        @error('recipient_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>