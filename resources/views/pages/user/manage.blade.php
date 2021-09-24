@extends('layouts.app')

@section('pagetitle')
@endsection

@section('css')
@endsection

@section('js')
@endsection

@section('content')
    <div class="container-fluid py-4">

        <h5 class="text-muted mb-3">
            Users Management
        </h5>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">

                        @if($user->email_verified_at != null)
                        <span class="badge bg-success mb-3">
                            <i class="fa fa-check-circle"></i> Account Verified
                        </span>
                        @else
                        <span class="badge bg-danger mb-3">
                            <i class="fa fa-exclamation-circle"></i> Unverified Account
                        </span>
                        @endif

                        <form action="{{ route('portal.admin.users.update', $user->id) }}" method="POST">

                            @csrf
                            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="PUT"> --}}

                            <div class="form-group">
                                <label class="control-label col-sm2" for="name">Name</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="{{ $user->name }}" value="{{ $user->name }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm2" for="email">Email</label>
                                        <div class="col-sm-12">
                                            <input type="email" class="form-control" name="email" placeholder="{{ $user->email }}" value="{{ $user->email }}">
                                        </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm2" for="email">Organization</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="organization" placeholder="{{ $user->organization }}" value="{{ $user->organization }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm2" for="phone">Phone</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="phone" placeholder="{{ $user->phone }}" value="{{ $user->phone }}">
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label class="control-label col-sm2 text-danger" for="role">Role</label>
                                    <div class="col-sm-12">
                                        <select class="form-control text-danger" name="role">
                                            @forelse ($roles as $role)
                                                <option value="{{ $role->name }}" @if($user->hasRole($role->name)) selected @endif>
                                                    {{ $role->name }}
                                                </option>
                                            @empty
                                                <option disabled selected value="null">No roles found</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>


                             <button type="submit" class="btn btn-success" data-dismiss="modal">
                                 <span id="footer_action_button" class=""><i class="fa fa-save"></i> UPDATE</span>
                             </button>


                            <a href="{{ route('portal.admin.users.index') }}" class="btn btn-warning">
                                <i class="fa fa-arrow-left"></i> Back
                            </a>

                            </form>

                    </div>
                </div>
            </div>

            <div class="col-md-6">

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="card">
                          <div class="card-body p-3">
                            <div class="row">
                              <div class="col-8">
                                <div class="numbers">
                                  <p class="text-sm mb-0 text-capitalize font-weight-bold">JOINED</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $user->created_at->diffForHumans() }}
                                    </h5>
                                    <small class="text-muted text-xs">
                                        ({{ $user->created_at->format('d/m/Y') }})
                                    </small>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6 mb-4">
                        <div class="card">
                          <div class="card-body p-3">
                            <div class="row">
                              <div class="col-8">
                                <div class="numbers">
                                  <p class="text-sm mb-0 text-capitalize font-weight-bold">LAST UPDATED</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $user->updated_at->diffForHumans() }}
                                    </h5>
                                    <small class="text-muted text-xs">
                                        ({{ $user->updated_at->format('d/m/Y') }})
                                    </small>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                </div>

                <div class="card">
                    <div class="card-body">
                        <a href="#" class="btn btn-sm block btn-info">
                            View Contributions
                        </a>

                        <a href="#" class="btn btn-sm block btn-success">
                            View Linked Trees
                        </a>

                        <a href="#" class="btn btn-sm block btn-info">
                            E-mail user
                        </a>

                        <a data-bs-toggle="modal" data-bs-target="#deleteUserModal" class="btn btn-danger block btn-sm">
                            Delete user
                        </a>


                        <!-- Modal -->
                        <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            Are you sure?
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        You are about to delete the account of {{ $user->name }}. Deleting this user will be irrevokable. Do this only if you are sure.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <form action="{{ route('portal.admin.users.delete', $user->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-success">Yes, delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection















