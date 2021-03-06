@extends('layouts.app')

@section('content')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <br>
                    <small>test</small>

                    <br>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="main-container container-fluid">
            <!-- heading -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                    <h1 class="text-primary mr-auto">Example list</h1>
                    </div>
                </div>
                </div>
                <!-- /heading -->
                <!-- table -->
                <table class="table table-striped table-bordered" id="myTable" cellspacing="0" width="100%">
                <thead class="thead-dark">
                    <tr>
                    <th>#</th>
                    <th> Name</th>
                    <th> Description</th>
                    <th> Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="data-row">
                    <td class="align-middle iteration">1</td>
                    <td class="align-middle name">Name 1</td>
                    <td class="align-middle word-break description">Description 1</td>
                    <td class="align-middle">
                        <button type="button" class="btn btn-success" id="edit-item" data-item-id="1">edit</button>
                    </td>
                    </tr>
                    <tr class="data-row">
                    <td class="align-middle iteration">2</td>
                    <td class="align-middle name">Name 2</td>
                    <td class="align-middle word-break description">Description 2</td>
                    <td class="align-middle">
                        <button type="button" class="btn btn-success" id="edit-item" data-item-id="2">edit</button>
                    </td>
                    </tr>
                </tbody>
                </table>
                <!-- /table -->
            </div>
            <!-- Attachment Modal -->
            <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="edit-modal-label">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body" id="attachment-body-content">
                    <form id="edit-form" class="form-horizontal" method="POST" action="">
                        <div class="card text-white bg-primary mb-0">
                        <div class="card-header">
                            <h2 class="m-0">Edit</h2>
                        </div>
                        <div class="card-body">
                            <!-- id -->
                            <div class="form-group">
                            <label class="col-form-label" for="modal-input-id">Id (just for reference not meant to be shown to the general public) </label>
                            <input type="text" name="modal-input-id" class="form-control" id="modal-input-id" required>
                            </div>
                            <!-- /id -->
                            <!-- name -->
                            <div class="form-group">
                            <label class="col-form-label" for="modal-input-name">Name</label>
                            <input type="text" name="modal-input-name" class="form-control" id="modal-input-name" required autofocus>
                            </div>
                            <!-- /name -->
                            <!-- description -->
                            <div class="form-group">
                            <label class="col-form-label" for="modal-input-description">Email</label>
                            <input type="text" name="modal-input-description" class="form-control" id="modal-input-description" required>
                            </div>
                            <!-- /description -->
                        </div>
                        </div>
                    </form>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Done</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
                </div>
            </div>
            <!-- /Attachment Modal -->
    </div>
</div>

<div class="container">
    <div class="card">
        <div class="card-header">buttons col-row</div>
        <div class="card-body">
            <div class="col-9">
                <div class="row">
                    <button class="btn btn-primary">test</button>
                    <button class="btn btn-primary">test2</button>
                    <form action="">
                        <button class="btn btn-primary">test2</button>
                    </form>
                </div>
                <div class="row">
                    <form action="">
                        <button class="btn btn-success">test</button>
                    </form>
                </div>
                <div class="row">
                    <button class="btn btn-primary">test</button>
                </div>
            </div>
            <br>
            <div class="col-12">
                <button class="btn btn-primary btn-block">test</button>

                <div class="row-2">
                    <button class="btn btn-primary btn-block">test</button>
                    <button class="btn btn-primary btn-block">test2</button>
                </div>
                <div class="row-7">
                    <button class="btn btn-primary">test</button>
                </div>

                <button class="btn btn-primary">test</button>

            </div>
        </div>
    </div>

    <br>
    <div class="card">
        <div class="card-header">buttons row-col</div>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-3">
                    <button class="btn btn-primary btn-block">test</button>
                </div>
                <div class="col-3">
                    <button class="btn btn-primary btn-block">test</button>
                </div>
                <div class="col-3">
                    <button class="btn btn-primary btn-block">test</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
    /**
    * for showing edit item popup
    */

    $(document).on('click', "#edit-item", function() {
        $(this).addClass('edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.

        var options = {
        'backdrop': 'static'
        };
        $('#edit-modal').modal(options)
    })

    // on modal show
    $('#edit-modal').on('show.bs.modal', function() {
        var el = $(".edit-item-trigger-clicked"); // See how its usefull right here? 
        var row = el.closest(".data-row");

        // get the data
        var id = el.data('item-id');
        var name = row.children(".name").text();
        var description = row.children(".description").text();

        // fill the data in the input fields
        $("#modal-input-id").val(id);
        $("#modal-input-name").val(name);
        $("#modal-input-description").val(description);

    })

    // on modal hide
    $('#edit-modal').on('hide.bs.modal', function() {
        $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
        $("#edit-form").trigger("reset");
    })
    })
</script>
@endsection
