 <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fas fa-f fa-folder"></i>Business Settings</a>
                                <div id="submenu-1" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('category.index')}}">Category Setup</a>
                                        </li>
                                        
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('product.index')}}">Product Setup</a>
                                        </li>
                                         <li class="nav-item">
                                            <a class="nav-link" href="{{route('vendor.index')}}">Vendor Setup</a>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-f fa-folder"></i>Purchasing Management</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('lifting.index')}}">Product Purchasing</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('liftingRecord.index')}}">Purchasing Report </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-f fa-folder"></i>Sales Management</a>
                                <div id="submenu-3" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                         <li class="nav-item">
                                            <a class="nav-link" href="{{route('customer.index')}}">Customer Setup</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('productIssue.index')}}">Product Sales</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('salesReport.index')}}">Sales Report </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                             <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fas fa-f fa-folder"></i>Inventory Management</a>
                                <div id="submenu-4" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                         <li class="nav-item">
                                            <a class="nav-link" href="{{route('stockReport.index')}}">Stock Report</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
        </div>
</div>