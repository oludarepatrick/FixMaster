<div class="d-md-block float-right">
    <a href="{{ route('admin.edit_category', $category->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
    @if($category->is_active == 0)
        <a href="{{ route('admin.reinstate_category', $category->id) }}" class="btn btn-success"><i class="fas fa-undo"></i> Reinstate</a>
    @endif
    <a href="{{ route('admin.delete_category', $category->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
</div>

<h5>{{ $category->name }} Category</h5>

@if(empty($category->image))
    <img src="{{ asset('assets/images/no-image-available.png') }}" class="wd-sm-200 rounded" alt="No image found">
@else
    <img src="{{ asset('assets/category-images/'.$category->image) }}" class="wd-sm-200 rounded" alt="{{ $category->name }}">
@endif
<div class="table-responsive mt-4">
    <table class="table table-striped table-sm mg-b-0">
    <tbody>
        <tr>
        <td class="tx-medium" width="25%">Name</td>
        <td class="tx-color-03" width="75%">{{ $category->name }}</td>
        </tr>
        <tr>
        <td class="tx-medium" width="25%">Service</td>
        <td class="tx-color-03" width="75%">{{ $category->service->name }}</td>
        </tr>
        <tr>
        <td class="tx-medium" width="25%">Status</td>
        @if($category->is_active == '1') 
            <td class="tx-color-03" width="75%">Active</td>
        @else
            <td class="tx-color-03" width="75%">Inactive</td>
        @endif
        </tr>
        <tr>
        <td class="tx-medium" width="25%">Standard Fee</td>
        <td class="tx-color-03" width="75%">₦{{ $category->standard_fee }}</td>
        </tr>
        <tr>
        <td class="tx-medium" width="25%">Urgent Fee</td>
        <td class="tx-color-03" width="75%">₦{{ $category->urgent_fee }}</td>
        </tr>
        <tr>
        <td class="tx-medium" width="30%">OOH(Out of Hours) Fee</td>
        <td class="tx-color-03" width="70%">₦{{ $category->ooh_fee }}</td>
        </tr>
        <tr>
        <td class="tx-medium" width="25%">Description</td>
        <td class="tx-color-03" width="75%">{{ $category->description }}</td>
        </tr>
        <tr>
        <td class="tx-medium" width="25%">Requests</td>
        <td class="tx-color-03" width="75%">{{ $category->requests()->count() }}</td>
        </tr>
        <tr>
        <td class="tx-medium" width="25%">CSE's</td>
        <td class="tx-color-0 width="75%"3">2</td>
        </tr>
        <tr>
        <td class="tx-medium" width="25%">Technicians</td>
        <td class="tx-color-0 width="75%"3">3</td>
        </tr>
    </tbody>
    </table>
</div>