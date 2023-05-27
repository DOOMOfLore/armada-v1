@extends('layout')

@section('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
@php
    use App\Helpers\Helpers;
@endphp

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        {{ __('Pemesanan Listing') }}
                        <button style="float: right; font-weight: 900;" class="btn btn-info btn-sm" type="button"  data-toggle="modal" data-target="#createPemesananModal">
                            Create Pemesanan
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nama Pemesanan</th>
                                    <th>Email Pemesanan</th>
                                    <th>Nomor Pemesanan</th>
                                    <th>Bukti bayar</th>
                                    <th>Armada</th>
                                    <th>Kategori</th>
                                    <th>Kota</th>
                                    <th>Agen</th>
                                    <th>status</th>
                                    <th width="150" class="text-center">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Create Armada Modal -->
<div class="modal" id="createPemesananModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Pemesanan Create</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
                    <strong>Success!</strong>Pemesanan was added successfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <input type="hidden" value="1" class="form-control" name="status" id="status">
                <div class="form-group">
                    <label for="nama_pemesanan">Nama Pemesan:</label>
                    <input type="text" class="form-control" name="nama_pemesanan" id="nama_pemesanan">
                </div>
                <div class="form-group">
                    <label for="email_pemesanan">Email Pemesan:</label>
                    <input type="email" class="form-control" name="email_pemesanan" id="email_pemesanan">
                </div>
                <div class="form-group">
                    <label for="nomor_pemesanan">Nomor Pemesan:</label>
                    <input type="text" class="form-control" name="nomor_pemesanan" id="nomor_pemesanan">
                </div>
                <div class="form-group">
                    <label for="bukti_bayar">Bukti Bayar:</label>
                    <input type="text" class="form-control" name="bukti_bayar" id="bukti_bayar">
                </div>
                <div class="form-group">
                    <label class="control-label">Armada:</label>
                    <select class="form-control" id="armada_id" name="armada_id">
                        <?= Helpers::listArmada(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Kategori:</label>
                    <select class="form-control" id="kategori_id" name="kategori_id">
                        <?= Helpers::listKategori(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Kota:</label>
                    <select class="form-control" id="kota_id" name="kota_id">
                        <?= Helpers::listKotaTujuan(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Agen:</label>
                    <select class="form-control" id="agen_id" name="agen_id">
                        <?= Helpers::listAgen(); ?>
                    </select>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="SubmitCreatePemesananForm">Create</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Armada Modal -->
<div class="modal" id="EditArmadaModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Armada Edit</h4>
                <button type="button" class="close modelClose" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
                    <strong>Success!</strong>Armada was added successfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="EditArmadaModalBody">

                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="SubmitEditArmadaForm">Update</button>
                <button type="button" class="btn btn-danger modelClose" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Armada Modal -->
<div class="modal" id="DeleteArmadaModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Armada Delete</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <h6>Are you sure want to delete this Armada?</h6>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="SubmitDeleteArmadaForm">Yes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        // init datatable.
        var dataTable = $('.datatable').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: true,
            pageLength: 10,
            // scrollX: true,
            "order": [[ 0, "asc" ]],
            ajax: '{{ route('get-pemesanan') }}',
            columns: [
                {data: 'pemesanan_id', name: 'pemesanan_id'},
                {data: 'nama_pemesanan', name: 'nama_pemesanan'},
                {data: 'email_pemesanan', name: 'email_pemesanan'},
                {data: 'nomor_pemesanan', name: 'nomor_pemesanan'},
                {data: 'bukti_bayar', name: 'bukti_bayar'},
                {data: 'armada_id', name: 'armada_id'},
                {data: 'kategori_id', name: 'kategori_id'},
                {data: 'kota_id', name: 'kota_id'},
                {data: 'agen_id', name: 'agen_id'},
                {data: 'status', name: 'status'},
                {data: 'Actions', name: 'Actions',orderable:false,serachable:false,sClass:'text-center'},
            ]
        });

        // Create article Ajax request.
        $('#SubmitCreatePemesananForm').click(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('pemesanan.store') }}",
                method: 'post',
                data: {
                    nama_pemesanan: $('#nama_pemesanan').val(),
                    email_pemesanan: $('#email_pemesanan').val(),
                    nomor_pemesanan: $('#nomor_pemesanan').val(),
                    bukti_bayar: $('#bukti_bayar').val(),
                    armada_id: $('#armada_id').val(),
                    kategori_id: $('#kategori_id').val(),
                    kota_id: $('#kota_id').val(),
                    agen_id: $('#agen_id').val(),
                    status: $('#status').val(),
                },
                success: function(result) {
                    if(result.errors) {
                        $('.alert-danger').html('');
                        $.each(result.errors, function(key, value) {
                            $('.alert-danger').show();
                            $('.alert-danger').append('<strong><li>'+value+'</li></strong>');
                        });
                    } else {
                        $('.alert-danger').hide();
                        //$('.alert-success').show();
                        swal("Good job!", "Data saved successfully!", "success");
                        $('.datatable').DataTable().ajax.reload();
                            $('#createPemesananModal').modal('hide');
                            location.reload();
                    }
                }
            });
        });

        // Get single article in EditModel
        $('.modelClose').on('click', function(){
            $('#EditArmadaModal').hide();
        });
        var id;
        $('body').on('click', '#getEditPemesanan', function(e) {
            // e.preventDefault();
            $('.alert-danger').html('');
            $('.alert-danger').hide();
            id = $(this).data('id');
            $.ajax({
                url: "pemesanan/"+id+"/edit",
                method: 'GET',
                // data: {
                //     id: id,
                // },
                success: function(result) {
                    console.log(result);
                    $('#EditArmadaModalBody').html(result.html);
                    $('#EditArmadaModal').show();
                }
            });
        });

        // Update article Ajax request.
        $('#SubmitEditArmadaForm').click(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "pemesanan/"+id,
                method: 'PUT',
                data: {
                    armada_name: $('#edit_armada_name').val(),
                    armada_desc: $('#edit_armada_desc').val(),
                    status: $('#edit_status').val(),
                    kategori_name: $('#edit_kategori_name').val(),
                },
                success: function(result) {
                    if(result.errors) {
                        $('.alert-danger').html('');
                        $.each(result.errors, function(key, value) {
                            $('.alert-danger').show();
                            $('.alert-danger').append('<strong><li>'+value+'</li></strong>');
                        });
                    } else {
                        $('.alert-danger').hide();
                        //$('.alert-success').show();
                        swal("Good job!", "Data Updated successfully!", "success");
                        $('.datatable').DataTable().ajax.reload();
                            $('#EditArmadaModal').hide();
                    }
                }
            });
        });

        // Delete article Ajax request.
        var deleteID;
        $('body').on('click', '#getDeleteId', function(){
            deleteID = $(this).data('id');
        })
        $('#SubmitDeleteArmadaForm').click(function(e) {
            e.preventDefault();
            var id = deleteID;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "pemesanan/"+id,
                method: 'DELETE',
                success: function(result) {
                    swal("Good job!", "Data deleted successfully!", "success");
                    $('.datatable').DataTable().ajax.reload(null,false);
                    $('#DeleteArmadaModal').hide();
                    location.reload();
                }
            });
        });
    });
</script>

@endsection

