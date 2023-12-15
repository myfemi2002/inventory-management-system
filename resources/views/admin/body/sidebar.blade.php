@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp
@php
$id = Auth::user()->id;
$adminData = App\Models\User::find($id);
@endphp
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li>
                    <!-- User Profile-->
                    <div class="user-profile d-flex no-block dropdown mt-3">
                        <div class="user-pic">
                            <img src="{{ (!empty($adminData->profile_image))? url('upload/admin_images/'.$adminData->profile_image):url('upload/no_image.jpg') }}" alt="users" class="rounded-circle" width="40"/>
                        </div>
                        <div class="user-content hide-menu ms-2">
                            <a
                                href="#"
                                class=""
                                id="Userdd"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                                >
                                <h5 class="mb-0 user-name font-medium">
                                    {{ $adminData->name }}
                                    <i data-feather="chevron-down" class="feather-sm"></i>
                                </h5>
                                <span class="op-5 user-email">{{ $adminData->email }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Userdd">
                                <a class="dropdown-item" href="#"
                                    ><i data-feather="user" class="feather-sm text-info me-1"></i> My Profile</a
                                    >
                                <a class="dropdown-item" href="#"
                                    ><i data-feather="credit-card" class="feather-sm text-primary me-1"></i> My
                                Balance</a
                                    >
                                <a class="dropdown-item" href="#"
                                    ><i data-feather="mail" class="feather-sm text-success me-1"></i> Inbox</a
                                    >
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"
                                    ><i data-feather="settings" class="feather-sm text-warning me-1"></i>
                                Account Setting</a
                                    >
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                    ><i data-feather="log-out" class="feather-sm text-danger me-1"></i>
                                Logout</a
                                    >
                            </div>
                        </div>
                    </div>
                    <!-- End User Profile-->
                </li>
                <li class="p-3 mt-2">
                    <a
                        href="#"
                        class="btn btn-block create-btn text-white no-block d-flex align-items-center"
                        ><i data-feather="plus-square" class="feather-sm"></i>
                    <span class="hide-menu ms-1">Create New</span>
                    </a>
                </li>
                <!-- User Profile-->
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false">
                    <i data-feather="home" class="feather-icon"></i><span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                @if(Auth::user()->current_stock ==1)
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('product-current-stock.view') }}" aria-expanded="false">
                    <i data-feather="grid" class="feather-icon"></i><span class="hide-menu">Current Stock</span>
                    </a>
                </li>
                @else
                @endif

                @if(Auth::user()->unit ==1)
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('unit.view') }}" aria-expanded="false">
                    <i data-feather="sidebar" class="feather-icon"></i><span class="hide-menu">Manage Unit</span>
                    </a>
                </li>
                @else
                @endif
                @if(Auth::user()->category ==1)
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('category.view') }}" aria-expanded="false">
                    <i data-feather="file" class="feather-icon"></i><span class="hide-menu">Manage Category</span>
                    </a>
                </li>
                @else
                @endif
                @if(Auth::user()->product ==1)
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('product.view') }}" aria-expanded="false">
                    <i data-feather="check-circle" class="feather-icon"></i><span class="hide-menu">Manage Product</span>
                    </a>
                </li>
                @else
                @endif
                @if(Auth::user()->supplier ==1)
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i data-feather="layout" class="feather-icon"></i><span class="hide-menu">Manage Supplier </span></a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('supplier.view') }}" class="sidebar-link"><i class="mdi mdi-set-all"></i><span class="hide-menu"> All Suppliers </span></a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('supplier.add') }}" class="sidebar-link"><i class="mdi mdi-tab-plus"></i><span class="hide-menu"> Add supplier </span></a>
                        </li>
                    </ul>
                </li>
                @else
                @endif
                @if(Auth::user()->purchase ==1)
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i data-feather="calendar" class="feather-icon"></i><span class="hide-menu">Manage Purchase </span></a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('purchase.view') }}" class="sidebar-link"><i class="mdi mdi-set-all"></i><span class="hide-menu"> All Purchase </span></a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('pending.view') }}" class="sidebar-link"><i class="mdi mdi-tab-plus"></i><span class="hide-menu"> Purchase Approval </span></a>
                        </li>
                    </ul>
                </li>
                @else
                @endif
                @if(Auth::user()->invoice ==1)
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i data-feather="shopping-cart" class="feather-icon"></i><span class="hide-menu">Manage Invoice </span></a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('invoice.view') }}" class="sidebar-link"><i class="mdi mdi-invert-colors"></i><span class="hide-menu"> All Invoice </span></a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('invoice.pending.list') }}" class="sidebar-link"><i class="mdi mdi-cake"></i><span class="hide-menu"> Invoice Approval </span></a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('print.invoice.list') }}" class="sidebar-link"><i class="mdi mdi-file-presentation-box"></i><span class="hide-menu"> Print Invoice List </span></a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('daily.invoice.report') }}" class="sidebar-link"><i class="mdi mdi-layers"></i><span class="hide-menu"> Daily Invoice Report </span></a>
                        </li>
                    </ul>
                </li>
                @else
                @endif
                @if(Auth::user()->stock ==1)
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i data-feather="shuffle" class="feather-icon"></i><span class="hide-menu">Manage Stock </span></a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('stock.report') }}" class="sidebar-link"><i class="mdi mdi-invert-colors"></i><span class="hide-menu"> Stock Report </span></a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('stock.supplier.wise') }}" class="sidebar-link"><i class="mdi mdi-cake"></i><span class="hide-menu"> Supplier / Product Wise </span></a>
                        </li>
                    </ul>
                </li>
                @else
                @endif
                @if(Auth::user()->customer ==1)
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i data-feather="users" class="feather-icon"></i><span class="hide-menu">Manage Customer </span></a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('customer.view') }}" class="sidebar-link"><i class="mdi mdi-account-outline"></i><span class="hide-menu"> All Customer </span></a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('customer.credit') }}" class="sidebar-link"><i class="mdi mdi-account-minus"></i><span class="hide-menu"> Customer Credit Payment </span></a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('customer.paid') }}" class="sidebar-link"><i class="mdi mdi-account-plus"></i><span class="hide-menu"> Paid Customers </span></a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('customer.wise.report') }}" class="sidebar-link"><i class="mdi mdi-account-multiple-plus"></i><span class="hide-menu"> Customer Report </span></a>
                        </li>
                    </ul>
                </li>
                @else
                @endif

                @if(Auth::user()->type ==1)
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i data-feather="lock" class="feather-icon"></i><span class="hide-menu">Authentication</span></a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('role.view') }}" class="sidebar-link" ><i class="mdi mdi-account-key"></i><span class="hide-menu"> Assign User & Role </span></a>
                        </li>
                    </ul>
                </li>
                @else
                @endif
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.logout') }}" aria-expanded="false"><i data-feather="log-out" class="feather-icon"></i><span class="hide-menu">Log Out</span></a>
                </li>

                <li class="p-3 mt-2">
                    <a
                        href="{{ route('product.line') }}"
                        class="btn btn-block create-btn text-white no-block d-flex align-items-center"
                        ><i data-feather="plus-square" class="feather-sm"></i>
                    <span class="hide-menu ms-1">Create New</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
