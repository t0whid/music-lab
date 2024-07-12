@extends('layouts.master')

@section('styles')
    <link href="{{ asset('assets/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Users Table</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Sub Type</th>
                                        <th>Sub Exp</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ $user->subscription_type }}</td>
                                            <td>{{ $user->subscription_expiry }}</td>
                                            <td data-user-id="{{ $user->id }}" class="status-cell">
                                                @if ($user->status == 'active')
                                                    <i class="fas fa-toggle-on text-success"></i>
                                                @else
                                                    <i class="fas fa-toggle-off text-danger"></i>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                                 <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Sub Type</th>
                                        <th>Sub Exp</th>
                                        <th>Status</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/plugins/tables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Add a click event listener to the status cells
            $('.status-cell').click(function() {
                const userId = $(this).data('user-id');
                const statusCell = $(this);
    
                // Make an AJAX request to toggle the user's status
                $.ajax({
                    method: 'POST',
                    url: '/admin/users/toggle-status/' + userId,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    success: function(data) {
                        // Update the status cell based on the response
                        if (data.status === 'active') {
                            statusCell.html('<i class="fas fa-toggle-on text-success"></i>');
                        } else {
                            statusCell.html('<i class="fas fa-toggle-off text-danger"></i>');
                        }
    
                        // Show a success message with Toastr
                        if (data.status === 'active') {
                            toastr.success(data.message, 'Activated');
                        } else {
                            // Show a red-colored "deactivated" message
                            toastr.error(data.message, 'Deactivated', { "timeOut": 0, "extendedTimeOut": 0 });
                        }
                    },
                    error: function() {
                        toastr.error('An error occurred while updating the user status.');
                    }
                });
            });
        });
    </script>
    
    
@endsection
