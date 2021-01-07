<label>CSE & Technician ({{ $serviceRequest->job_reference }})</label>
<select class="custom-select @error('recipient_id') is-invalid @enderror" id="recipient_id" name="recipient_id">
    <option value="" selected>Select...</option>
    <option value="{{ $serviceRequest->cse_id }}">{{ $serviceRequest->cse->first_name.' '.$serviceRequest->cse->last_name }} (CSE)</option>
    <option value="{{ $serviceRequest->technician_id }}">{{ $serviceRequest->technician->first_name.' '.$serviceRequest->technician->last_name }} (Technician)</option>
</select>
@error('recipient_id')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror