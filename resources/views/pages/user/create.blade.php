@extends('layouts.app')

@section('pagetitle')
@endsection

@section('css')
    <link rel="stylesheet"
        href="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/css/soft-design-system-pro.min.css?v=1.0.0"
        type="text/css">
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
@endsection

@section('js')
    <script src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/js/plugins/choices.min.js"
        type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
    <script>
        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginFileValidateType,
            FilePondPluginFileValidateSize,
        );
        const inputElement = document.querySelector('input[id="logo"]');
        const pond = FilePond.create(inputElement, {
            labelIdle: `Drag & Drop your picture or <span class="filepond--label-action">Browse</span>`,
            imagePreviewHeight: 200,
            imageCropAspectRatio: '3:2',
            imageResizeTargetWidth: 300,
            imageResizeTargetHeight: 200,
            stylePanelLayout: 'compact',
            styleLoadIndicatorPosition: 'center bottom',
            styleProgressIndicatorPosition: 'right bottom',
            styleButtonRemoveItemPosition: 'left bottom',
            styleButtonProcessItemPosition: 'right bottom',
            acceptedFileTypes: ['image/png', 'image/jpeg'],
            labelFileTypeNotAllowed: '.JPG or .PNG files only',
            maxFileSize: '5MB',
        });
        FilePond.setOptions({
            server: {
                url: '/portal/upload-logo',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }
        });
    </script>
    <script type="text/javascript">
        if (document.getElementById('choices-button')) {
            var element = document.getElementById('choices-button');
            const example = new Choices(element, {});
        }
        var choicesTags = document.getElementById('choices-tags');
        var color = choicesTags.dataset.color;
        if (choicesTags) {
            const example = new Choices(choicesTags, {
                delimiter: ',',
                editItems: true,
                maxItemCount: 3,
                removeItemButton: true,
                addItems: true,
                classNames: {
                    item: 'badge rounded-pill choices-' + color + 'me-2'
                }
            });
        }
    </script>
    <script>
        function change_create_button_text() {
            var send_email_checkbox = document.getElementById('send_email_checkbox');
            var create_button = document.getElementById('create_button');
            if (send_email_checkbox.checked) {
                create_button.innerHTML = '<i class="fa fa-save"></i> CREATE & SEND WELCOME EMAIL';
            } else {
                create_button.innerHTML = '<i class="fa fa-save"></i> CREATE';
            }
        }

        function loadingButton() {
            var create_button = document.getElementById('create_button');
            create_button.innerHTML = '<i class=\'fa fa-spinner fa-spin\'></i> Please wait';
        }
    </script>
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

                        <div class="alert bg-info text-sm text-white" role="alert">
                            <strong>INFO</strong> You can only create a temporary account, the
                            user will be mailed with an activation link to activate their account.
                        </div>

                        <form action="{{ route('portal.admin.users.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label class="control-label col-sm2" for="name">Name</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="John Doe"
                                        required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm2" for="email">E-mail</label>
                                <div class="col-sm-12">
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="john.deo@icrewsystems.com" required />
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-sm2" for="organization">Organization</label>
                                <select class="form-control" name="organization" id="choices-button">
                                    <option value="Icrewsystems Software Engineering LLP" selected disabled>icrewsystems SE
                                        LLP</option>
                                    @foreach ($organisations as $organisation)
                                        <option
                                            value="{{ $organisation->business_name }} {{ $organisation->brand_name }}">
                                            {{ $organisation->business_name }} {{ $organisation->brand_name }}</option>
                                    @endforeach
                                </select>
                                <div class="form-group d-flex justify-content-end">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" id="create_button"
                                        data-bs-target="#createModal"><i class="fa fa-save"></i>&nbsp;&nbsp;Create New
                                        Organization
                                    </button>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm2" for="phone">Phone</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="phone" placeholder="9090909090"
                                        required />
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="control-label col-sm2 text-danger" for="role">Role</label>
                                <div class="col-sm-12">
                                    <select class="form-control text-danger" name="role" required>
                                        @forelse ($roles as $role)
                                            <option value="{{ $role->name }}">
                                                {{ $role->name }}
                                            </option>
                                        @empty
                                            <option disabled selected value="null">No roles found</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>

                            <button class="btn btn-success" type="submit" id="create_button" onclick="loadingButton();">
                                <i class="fa fa-save"></i> CREATE
                            </button>
                            <a href="{{ route('portal.admin.users.index') }}" class="btn btn-warning">
                                <i class="fa fa-arrow-left"></i> Back
                            </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">

                        <div class="form-check">
                            <input class="form-check-input" onchange="change_create_button_text();" type="checkbox" value=""
                                id="send_email_checkbox" name="send_welcome_email" checked="">
                            <label class="custom-control-label" for="customCheck1">Send Welcome E-mail to this user</label>
                        </div>

                    </div>
                </div>
            </div>

            </form>

            {{-- Modal to create a new business --}}
            <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-" role="document">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-left">
                                    <h3 class="font-weight-bolder text-success text-gradient">Details</h3>
                                    <p class="mb-0">
                                        Add New Carbon-Neutral Business
                                    </p>
                                </div>
                                <div class="card-body pb-3">
                                    <form role="form text-left" class='login-form'
                                        action="{{ route('portal.admin.users.store') }}" enctype="multipart/form-data"
                                        name="add_business" id="add_business" method="POST">
                                        @csrf
                                        {{ method_field('POST') }}
                                        <input type="hidden" name="users_page" value="true">
                                        <div class="form-group">
                                            <label class="control-label col-sm2" for="business_name">Business Name</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="business_name"
                                                    placeholder="icrewsystems Software Engineering LLP" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm2" for="business_owner">Business Owner</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="business_owner"
                                                    placeholder="John Appleseed" required />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm2" for="brand_name">Brand Name</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="brand_name"
                                                    placeholder="icrewsystems" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm2" for="business_about">Business
                                                Description</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="business_about"
                                                    placeholder="Reimagining the way web works." />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm2" for="location">Location</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="location"
                                                    placeholder="Chennai, Tamil Nadu, India" required />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm2" for="business_founding_date">Employee
                                                Count</label>
                                            <div class="col-sm-12">
                                                <input type="number" name="employee_count" value=0 class="p-2">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm2" for="business_founding_date">Business
                                                Founding Date</label>
                                            <div class="col-sm-12">
                                                <input type="date" class="form-control" name="business_founding_date" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Business Logo</label>
                                            <div>
                                                <input type="file" id="logo" name="logo" />
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <input type="submit" value="SUBMIT"
                                                class="btn btn-success btn-lg btn-rounded w-100 mt-4 mb-4"
                                                onclick="this.innerHTML = 'Please wait...'">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
