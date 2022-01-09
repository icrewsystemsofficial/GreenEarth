@extends('layouts.app')

@section('pagetitle')
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $('.user_select').select2();
    });
</script>


@endsection

@section('content')
    <div class="container-fluid py-4">

        <h3 class="h5 text-muted">Manage Team</h3>
        <br>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('portal.admin.teams.update', $team->id) }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label class="control-label col-sm2" for="id">Team ID</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="id" name="id" value="{{ $team->id }}" disabled required>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-sm2" for="tname">Team Name</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="tname" name="tname"
                                        placeholder="Support Team" value="{{ $team->name }}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm2" for="tdesc">Team Description</label>
                                <div class="col-sm-12">
                                    <textarea rows="4" cols="20" class="form-control" id="tdesc" name="tdesc"
                                        placeholder="Description here..." required>{{ $team->desc }}</textarea>
                                </div>
                            </div>

                            <button onclick="return confirm('Are you sure?')" class="btn btn-success" type="submit"
                                id="create_button">
                                Update
                            </button>
                            <a onclick="return confirm('Are you sure?')"
                                href="{{ route('portal.admin.teams.delete', $team->id) }}" class="btn btn-danger">
                                Delete
                            </a>
                            <a href="{{ route('portal.admin.teams.index') }}" class="btn btn-warning">
                                <i class="fa fa-arrow-left"></i> Back
                            </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="control-label col-sm2" for="userlst">Add Members to the Team</label><br>

                                <select required class="user_select form-select " id="userlst" name="userlst[]" multiple="multiple">
                                    @foreach ($users as $user)
                                        @if(in_array($user->id, json_decode($team->userlst)))
                                            <option selected value={{ $user->id }}>{{ $user->name }}</option>
                                        @else
                                        <option value={{ $user->id }}>{{ $user->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
