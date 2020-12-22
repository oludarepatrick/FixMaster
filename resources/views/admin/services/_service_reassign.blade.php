{{-- <div class="d-flex mb-2"><small class="text-danger">In other to delete this Service, you need to reassing every Category assigned to it.</small></div> --}}
<div id="spinner-icon-4"></div>

<h5>Service Categories assigned to <strong>"{{ $serviceDetails->name }}"</strong> Service</h5>
<div class="table-responsive mt-4">
    <table class="table table-hover mg-b-0" id="basicExample">
        <thead class="thead-primary">
        <tr>
            <th width="5%" class="text-center">#</th>
            <th width="20%">Category Name</th>
            <th width="65%">Description</th>
            <th wwidth="5%" class="text-center">Requests</th>
            {{-- <th class="text-center">Total Votes</th> --}}
            {{-- <th class="text-center">Rating</th> --}}
            <th width="20%">Reassign</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($serviceDetails->categories as $serviceDetail)
            <tr>
                <td class="tx-color-03 tx-center">{{ ++$i }}</td>
                {{-- <td>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1"></label>
                    </div>
                </td> --}}
                <td class="tx-medium">{{ $serviceDetail->name }}</td>
                <td class="tx-medium">{{ $serviceDetail->description }}</td>
                <td class="tx-medium text-center">{{ $serviceDetails->requests()->count() }}</td>
                {{-- <td class="tx-medium text-center">{{ $serviceDetails->requests()->count() }}</td> --}}
                {{-- <td class="tx-medium text-center">{{ $serviceDetails->requests()->count() }}</td> --}}
                <td>
                    <select class="custom-select" id="assign-service">
                        <option selected value="None">Select...</option>
                        @foreach ($services as $service)
                            @if($service->id != $serviceId)
                                <option value="{{ $service->id }}" data-service-name="{{ $service->name }}" data-service-id="{{ $service->id }}" data-category-id="{{ $serviceDetail->id }}" data-category-name="{{ $serviceDetail->name }}">{{ $service->name }}</option>
                            @endif
                        @endforeach
                        
                    </select>
                </td>
            </tr>
            @endforeach
        

        </tbody>
    </table>
</div><!-- table-responsive -->

@push('scripts')
<script>
  $(document).ready(function() {
    $('#assign-service').change(function(){
      alert();
       let serviceId = $(this).children("option:selected").data('service-id');
       let serviceName = $(this).children("option:selected").data('service-name');
       let categoryId = $(this).children("option:selected").data('category-id');
       let categoryName = $(this).children("option:selected").data('category-name');

       $.ajaxSetup({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $.ajax({
        url: "{{ route('admin.reassign_service_category') }}",
        method: "POST",
        // dataType: "JSON",
        data: {'serviceId':serviceId, 'serviceName, ':serviceName, 'categoryId':categoryId, 'categoryName, ':categoryName},
        beforeSend : function(){
            $("#spinner-icon-4").html('<div class="d-flex justify-content-center mt-4 mb-4"><span class="loadingspinner"></span></div>'); 
        },
        success: function (data){
            if(data == 'success'){
              var message = categoryName+' Category was successfully reassgined to '+ serviceName +' service';
              var type = 'success';
              displayMessage(message, type);

              $(this).closest("tr").remove();

            }else{
              var message = 'Error occured while trying to reassign '+ categoryName +' category to '+ serviceName + ' service';
              var type = 'error';
              displayMessage(message, type);

            }
        }
      });

    });

  });
</script>
@endpush