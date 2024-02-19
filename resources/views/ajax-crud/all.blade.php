@extends('ajax-crud.layout')

@section('content')
    <a class="btn btn-info" href="javascript:void(0)" id="createNewTeam" style="margin-bottom:6px;"> Add New Team</a>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>name</th>
                <th>Member</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    <div class="modal fade" id="ajaxModelexa" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"></h4>
                </div>
                <div class="modal-body">
                    <form id="postForm" name="postForm" class="form-horizontal">
                       <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Name" value="" required>
                            </div>
                        </div>
         
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-12">
                                <textarea id="description" name="description" required placeholder="Enter Description" class="form-control"></textarea>
                            </div>
                        </div>
          
                        <div class="col-sm-offset-2 col-sm-10">
                         <button type="submit" class="btn btn-primary" id="savedata" value="create">Save Post
                         </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('team.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'team_member',
                        name: 'team_member'
                    },
                    {
                        data: 'Action',
                        name: 'Action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            $('#createNewTeam').click(function() {
                $('#savedata').val("create-post");
                $('#id').val('');
                $('#postForm').trigger("reset");
                $('#modelHeading').html("Create New Team");
                $('#ajaxModelexa').modal('show');
            });

            $('body').on('click', '.editPost', function() {
                var id = $(this).data('id');
                $.get("{{ route('team.index') }}" + '/' + id + '/edit', function(data) {
                    $('#modelHeading').html("Edit Team");
                    $('#savedata').val("edit-user");
                    $('#ajaxModelexa').modal('show');
                    $('#id').val(data.id);
                    $('#title').val(data.name);
                    $('#description').val(data.team_member);
                })
            });

            $('#savedata').click(function(e) {
                e.preventDefault();
                $(this).html('Sending..');

                $.ajax({
                    data: $('#postForm').serialize(),
                    url: "{{ route('team.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {
                        $('#postForm').trigger("reset");
                        $('#ajaxModelexa').modal('hide');
                        table.draw();
                    },
                    error: function(data) {
                        console.log('Error:', data);
                        $('#savedata').html('Save Changes');
                    }
                });
            });

            $('body').on('click', '.deletePost', function() {
                var id = $(this).data("id");
                confirm("Are You sure want to delete this Post!");
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('team.store') }}" + '/' + id,
                    success: function(data) {
                        table.draw();
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            });

        });
    </script>
@endpush
