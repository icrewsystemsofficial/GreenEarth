<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main" data-color="success">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('portal.index') }}">
            <span class="ms-1 font-weight-bold ">
                GreenEarth
            </span>
        </a>
    </div>
    <hr class="horizontal dark mt-0 mb-2">


    <div class="collapse navbar-collapse  w-auto  max-height-vh-100 h-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" id="dashboard-active-tag" href="{{ route('home.index') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>shop </title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(0.000000, 148.000000)">
                                            <path class="color-background opacity-6" d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"></path>
                                            <path class="color-background" d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <div class="mx-3 mt-3 mb-3">
                <div class="card card-background shadow-none card-background-mask-success" id="sidenavCard">
                    <div class="full-background" style="background-image: url('{{ asset('img/curved-images/white-curved.jpeg') }}')"></div>
                    <div class="card-body text-start p-3 w-100">
                        <div class="docs-info">
                            <h6 class="text-white up mb-0">Need help?</h6>
                            <p class="text-xs font-weight-bold mb-2">Please check our docs</p>
                            <a href="{{ url('portal/docs') }}" target="_blank" class="btn btn-white btn-sm w-100 mb-0">Documentation</a>
                        </div>
                    </div>
                </div>
            </div>


            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Administration</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="users-active-tag" href="{{ route('portal.admin.users.index') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-users text-dark"></i>
                    </div>
                    <span class="nav-link-text ms-1">Users</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="roles-active-tag" href="{{ route('portal.admin.roles.index') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-user-tag text-dark"></i>
                    </div>
                    <span class="nav-link-text ms-1">Roles</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="forests-active-tag" href="{{ route('portal.admin.forests.index') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-tree text-dark"></i>
                    </div>
                    <span class="nav-link-text ms-1">Forests</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="trees-active-tag" href="{{ route('portal.admin.tree.index') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-seedling text-dark"></i>
                    </div>
                    <span class="nav-link-text ms-1">Trees</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="plantspecies-active-tag" href="{{ route('portal.admin.forests.trees-species.index') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-dna text-dark"></i>
                    </div>
                    <span class="nav-link-text ms-1">Plant Species</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="payments-active-tag" href="{{ route('portal.admin.payments.index') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-file-invoice-dollar text-dark"></i>
                    </div>
                    <span class="nav-link-text ms-1">Payments</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="faq-active-tag" href="{{ route('portal.admin.faq.index') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-question text-dark"></i>
                    </div>
                    <span class="nav-link-text ms-1">FAQs</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="contactreq-active-tag" href="{{ route('portal.admin.contact-requests.index') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-id-card text-dark"></i>
                    </div>
                    <span class="nav-link-text ms-1">Contact Requests</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="announcements-active-tag" href="{{ route('portal.admin.announcements.index') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-users text-dark"></i>
                    </div>
                    <span class="nav-link-text ms-1">Announcements</span>
                </a>
            </li>

            {{-- Can be used for future Expansion ( if any new modules or links needed ) --}}
            {{-- <li class="nav-item">
                <a class="nav-link " href="{{ route('portal.admin.users.index') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fas fa-users text-dark"></i>
            </div>
            <span class="nav-link-text ms-1">Badges</span>
            </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('portal.myprofile') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-users text-dark"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidenav-footer mx-3 ">
        {{-- <a class="btn bg-gradient-success mt-4 w-100" href="https://www.creative-tim.com/product/soft-ui-dashboard-pro?ref=sidebarfree" type="button">Upgrade to pro</a> --}}
    </div>
</aside>