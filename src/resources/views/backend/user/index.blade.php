@extends('backend.layouts.app')
@section('title', 'Stand Eagle | Users Management')

@push('css')
       <!-- DataTables -->
       <link href="/backend/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
       <link href="https://cdn.datatables.net/select/1.4.0/css/select.dataTables.min.css" rel="stylesheet" type="text/css" />
   
@endpush

@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Users Management</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Users Management</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">


                <!-- Bordered Tables -->
                <table class="table table-bordered table-nowrap" id="userTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ( $users as $key=>$user)
                        <tr>
                            <th scope="row" style="width: 40px" class="text-center">{{ ++$key }}</th>
                            <td class="avatar-md text-center">
                                @if ($user->photo)
                                <div style="background-image:url({{ getAssetUrl($user->photo,'uploads/user') }});background-size:cover;background-position:center" class="rounded-circle avatar-sm shadow"></div>
                                @else
                                <div class="avatar-xs shadow">
                                    <div class="avatar-title rounded bg-soft-secondary text-secondary text-uppercase">
                                        {{ $user->name[0] }}
                                    </div>
                                </div>
                                @endif
                            </td>
                            <td class="align-middle">
                                <a target="_blank" href="">{{ $user->name }}</a>
                            </td>
                            <td class="align-middle">{{ $user->email }}</td>
                         
                         
                            <td class="align-middle">{{ $user->created_at->diffForHumans() }}</td>
                            <td class="align-middle">
                                <div class="hstack justify-content-center flex-wrap gap-3">

                                    <a target="_blank" href=""
                                        class="link-success fs-15"><i class="ri-eye-fill"></i></a>

                                        <a href="javascript:void(0)" class="link-danger fs-15"
                                            onclick="deleteRecord({{ $user->id }})"><i
                                                class="ri-delete-bin-line"></i></a>
                                        <form id="delete-form-{{ $user->id }}"
                                            action="{{ route('user.destroy', lock($user->id)) }}" method="POST"
                                            style="display: none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

       
            </div>
        </div>
    </div>
</div>

@endsection


@push('js')

<!-- Required datatable js -->
<script src="/backend/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/backend/plugins/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Buttons examples -->
<script src="/backend/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="/backend/plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="/backend/plugins/datatables/jszip.min.js"></script>
<script src="/backend/plugins/datatables/pdfmake.min.js"></script>
<script src="/backend/plugins/datatables/vfs_fonts.js"></script>
<script src="/backend/plugins/datatables/buttons.html5.min.js"></script>
<script src="/backend/plugins/datatables/buttons.print.min.js"></script>
<script src="/backend/plugins/datatables/buttons.colVis.min.js"></script>

<script>
    $(document).ready( function () {
    $('#userTable').DataTable({
            paging: false,
            ordering: false,
            dom: 'Bfrtip',
            // select: true,
            lengthChange: false,
            buttons: [{
                    extend: 'excelHtml5',
                    text: '<i class="fa fa-file-excel-o"></i> Excel',
                    titleAttr: 'Export to Excel',
                    title: 'Members of Parliament',
                    exportOptions: {
                        columns: ':not(:last-child)',
                    }
                },
                {
                    extend: 'csvHtml5',
                    text: '<i class="fa fa-file-text-o"></i> CSV',
                    titleAttr: 'CSV',
                    title: 'Members of Parliament',
                    exportOptions: {
                        columns: ':not(:last-child)',
                    }
                },
                {
                    extend: 'pdfHtml5',
                    text: '<i class="fa fa-file-pdf-o"></i> PDF',
                    titleAttr: 'PDF',
                    title: 'Members of Parliament',
                    exportOptions: {
                        columns: ':not(:last-child)',
                    },
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: ':visible'
                    },
                    customize: function(win) {
                        $(win.document.body).find('table').find('td:last-child, th:last-child').remove();
                    }
                },
            ]
        });
} );

    function deleteRecord(id) {
            Swal.fire({
                html: '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon><div class="mt-4 pt-2 fs-15 mx-5"><h4>Are you Sure ?</h4><p class="text-muted mx-4 mb-0">Are you want to delete?</p></div></div>',
                showCancelButton: !0,
                confirmButtonClass: "btn btn-primary w-xs me-2 mb-1",
                confirmButtonText: "Yes, Delete It!",
                cancelButtonClass: "btn btn-danger w-xs mb-1",
                buttonsStyling: !1,
                showCloseButton: false,
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-' + id).submit();
                }
            })
        }
</script>
@endpush


