<div class="d-flex mb-2"><small class="text-danger">In other to delete this Service, you need to reassing every Category assigned to it.</small></div>

<h5>Service Categories assigned to <strong>"{{ $serviceDetails->name }}"</strong> Service</h5>
<div class="table-responsive mt-4">
    <table class="table table-hover mg-b-0" id="basicExample">
        <thead class="thead-primary">
        <tr>
            <th class="text-center">#</th>
            <th>Category Name</th>
            <th>Description</th>
            <th class="text-center">Requests</th>
            <th class="text-center">Total Votes</th>
            <th class="text-center">Rating</th>
            <th>Reassign</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($serviceDetails->categories as $serviceDetail)
            <tr>
                {{-- <td class="tx-color-03 tx-center">{{ ++$i }}</td> --}}
                <td>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1"></label>
                    </div>
                </td>
                <td class="tx-medium">{{ $serviceDetail->name }}</td>
                <td class="tx-medium">{{ $serviceDetail->description }}</td>
                <td class="tx-medium text-center">{{ $serviceDetails->requests()->count() }}</td>
                <td class="tx-medium text-center">{{ $serviceDetails->requests()->count() }}</td>
                <td class="tx-medium text-center">{{ $serviceDetails->requests()->count() }}</td>
                <td>
                    <select class="custom-select" id="services">
                        <option selected value="None">Select...</option>
                        @foreach ($services as $service)
                            @if($service->id != $serviceId)
                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                            @endif
                        @endforeach
                        
                    </select>
                </td>
            </tr>
            @endforeach
        

        </tbody>
    </table>
</div><!-- table-responsive -->