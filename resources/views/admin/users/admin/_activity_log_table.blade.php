
<div class="d-flex ml-4"><h4 class="text-success">{{ $message }}</h4></div>
<table class="table table-dashboard mg-b-0" id="basicExample">
    <thead>
      <tr>
        <th width="5%">#</th>
        <th width="20%">Date Created</th>
        <th width="75%">Message</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($activityLogs as $activityLog)
        <tr>
          <td class="tx-color-03">{{ ++$i }}</td>
          <td class="tx-medium">{{ Carbon\Carbon::parse($activityLog->created_at, 'UTC')->isoFormat('MMMM Do YYYY, h:mm:ssa') }}</td>
          <td class="tx-medium text-success">{{ $activityLog->message }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>