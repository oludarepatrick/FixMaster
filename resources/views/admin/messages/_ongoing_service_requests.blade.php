    <div class="form-group position-relative">
        <label>Ongoing Service Requests</label>
        <select class="custom-select @error('ongoing_requests') is-invalid @enderror" id="ongoing_requests" name="ongoing_requests">
            <option value="" selected>Select...</option>
            @foreach ($ongoingServiceRequests as $ongoingServiceRequest)
                <option value="{{ $ongoingServiceRequest->id }}" {{ old('ongoing_requests') == $ongoingServiceRequest->id ? 'selected' : ''}} data-url="{{ route('service_details', $ongoingServiceRequest->id) }}">{{ $ongoingServiceRequest->job_reference }}</option>
            @endforeach
        </select>
        @error('ongoing_requests')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>