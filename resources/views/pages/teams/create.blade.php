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

        <h3 class="h5 text-muted">Create new Team</h3>
        <br>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('portal.admin.teams.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="control-label col-sm2" for="tname">Team name</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="tname" name="tname" placeholder="Support Team" required>
                                    </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm2" for="tdesc">Team Description</label>
                                    <div class="col-sm-12">
                                        <textarea rows="4" cols="20" class="form-control" id="tdesc" name="tdesc" placeholder="Description here..." required></textarea>
                                    </div>
                            </div>
                            <button class="btn btn-success" type="submit" id="create_button" >
                            CREATE
                            </button>
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

                                <select required class="user_select form-select "  id="userlst" name="userlst[]" multiple="multiple">
                                    @foreach ($users as $user)
                                        <option value={{ $user->id }}>{{ $user->name }}</option>
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















