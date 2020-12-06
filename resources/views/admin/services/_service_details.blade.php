
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
        </tr>
        </thead>
        <tbody>
            @foreach ($serviceDetails->categories as $serviceDetail)
            <tr>
                <td class="tx-color-03 tx-center">{{ ++$i }}</td>
                <td class="tx-medium">{{ $serviceDetail->name }}</td>
                <td class="tx-medium">{{ $serviceDetail->description }}</td>
                <td class="tx-medium text-center">{{ $serviceDetails->requests()->count() }}</td>
                <td class="tx-medium text-center">{{ $serviceDetails->requests()->count() }}</td>
                <td class="tx-medium text-center">{{ $serviceDetails->requests()->count() }}</td>
            </tr>
            @endforeach
        

        </tbody>
    </table>
</div><!-- table-responsive -->