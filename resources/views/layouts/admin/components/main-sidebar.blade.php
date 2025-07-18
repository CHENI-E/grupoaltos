
            <aside class="app-sidebar sticky" id="sidebar">

                <!-- Start::main-sidebar-header -->
                <div class="main-sidebar-header">
                    <a href="index.php" class="header-logo">
                        <img src="{{ asset('admin/assets/images/brand-logos/desktop-logo.png') }}" alt="logo" class="desktop-logo">
                        <img src="{{ asset('admin/assets/images/brand-logos/toggle-dark.png') }}" alt="logo" class="toggle-dark">
                        <img src="{{ asset('admin/assets/images/brand-logos/desktop-dark.png') }}" alt="logo" class="desktop-dark">
                        <img src="{{ asset('admin/assets/images/brand-logos/toggle-logo.png') }}" alt="logo" class="toggle-logo">
                        <img src="{{ asset('admin/assets/images/brand-logos/toggle-white.png') }}" alt="logo" class="toggle-white">
                        <img src="{{ asset('admin/assets/images/brand-logos/desktop-white.png') }}" alt="logo" class="desktop-white">
                    </a>
                </div>
                <!-- End::main-sidebar-header -->

                <!-- Start::main-sidebar -->
                <div class="main-sidebar" id="sidebar-scroll">

                    <!-- Start::nav -->
                    <nav class="main-menu-container nav nav-pills flex-column sub-open">
                        <div class="slide-left" id="slide-left">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path> </svg>
                        </div>
                        <ul class="main-menu">

                            <!-- Start::slide__category -->
                            <li class="slide__category"><span class="category-name">General</span></li>
                            <!-- End::slide__category -->

                            <!-- Start::slide -->
                            <li class="slide">
                                <a href="{{ route('admin.usuario.index') }}" class="side-menu__item">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6 side-menu__icon bi bi-people" viewBox="0 0 16 16">
                                        <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
                                    </svg>
                                    <span class="side-menu__label">Usuario</span>
                                </a>
                            </li>
                            <!-- End::slide -->

                            <!-- Start::slide__category -->
                            <li class="slide__category"><span class="category-name">Web</span></li>
                            <!-- End::slide__category -->

                            <!-- Start::slide -->
                            <li class="slide has-sub">
                                <a href="javascript:void(0);" class="side-menu__item">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-card-image w-6 h-6 side-menu__icon" viewBox="0 0 16 16">
                                        <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
                                        <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54L1 12.5v-9a.5.5 0 0 1 .5-.5z"/>
                                    </svg>
                                    <span class="side-menu__label">Banners</span>
                                    <i class="ri-arrow-right-s-line side-menu__angle"></i>
                                </a>
                                <ul class="slide-menu child1">
                                    <li class="slide side-menu__label1">
                                        <a href="javascript:void(0)">Banners</a>
                                    </li>
                                    <li class="slide">
                                        <a href="{{ route('admin.bannerinicio.index') }}" class="side-menu__item">Banners Inicio</a>
                                    </li>
                                    <li class="slide">
                                        <a href="form-select2.php" class="side-menu__item">Banners Nosotros</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- End::slide -->

                            <!-- Start::slide -->
                            <li class="slide has-sub">
                                <a href="javascript:void(0);" class="side-menu__item">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.098 19.902a3.75 3.75 0 0 0 5.304 0l6.401-6.402M6.75 21A3.75 3.75 0 0 1 3 17.25V4.125C3 3.504 3.504 3 4.125 3h5.25c.621 0 1.125.504 1.125 1.125v4.072M6.75 21a3.75 3.75 0 0 0 3.75-3.75V8.197M6.75 21h13.125c.621 0 1.125-.504 1.125-1.125v-5.25c0-.621-.504-1.125-1.125-1.125h-4.072M10.5 8.197l2.88-2.88c.438-.439 1.15-.439 1.59 0l3.712 3.713c.44.44.44 1.152 0 1.59l-2.879 2.88M6.75 17.25h.008v.008H6.75v-.008Z" />
                                    </svg>
                                    <span class="side-menu__label">Secciones</span>
                                    <i class="ri-arrow-right-s-line side-menu__angle"></i>
                                </a>
                                <ul class="slide-menu child1">
                                    <li class="slide side-menu__label1">
                                        <a href="javascript:void(0)">Secciones</a>
                                    </li>
                                    <li class="slide">
                                        <a href="{{ route('admin.seccion.inicio') }}" class="side-menu__item">Inicio</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- End::slide -->

                            <!-- Start::slide -->
                            <li class="slide has-sub">
                                <a href="javascript:void(0);" class="side-menu__item">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                                    </svg>
                                    <span class="side-menu__label">Ui Elements</span>
                                    <i class="ri-arrow-right-s-line side-menu__angle"></i>
                                </a>
                                <ul class="slide-menu child1 mega-menu">
                                    <li class="slide side-menu__label1">
                                        <a href="javascript:void(0)">Ui Elements</a>
                                    </li>
                                    <li class="slide">
                                        <a href="alerts.php" class="side-menu__item">Alerts</a>
                                    </li>
                                    <li class="slide">
                                        <a href="badge.php" class="side-menu__item">Badge</a>
                                    </li>
                                    <li class="slide">
                                        <a href="breadcrumb.php" class="side-menu__item">Breadcrumb</a>
                                    </li>
                                    <li class="slide">
                                        <a href="buttons.php" class="side-menu__item">Buttons</a>
                                    </li>
                                    <li class="slide">
                                        <a href="buttongroup.php" class="side-menu__item">Button Group</a>
                                    </li>
                                    <li class="slide">
                                        <a href="cards.php" class="side-menu__item">Cards</a>
                                    </li>
                                    <li class="slide">
                                        <a href="dropdowns.php" class="side-menu__item">Dropdowns</a>
                                    </li>
                                    <li class="slide">
                                        <a href="images-figures.php" class="side-menu__item">Images & Figures</a>
                                    </li>
                                    <li class="slide">
                                        <a href="links-interactions.php" class="side-menu__item">Links & Interactions</a>
                                    </li>
                                    <li class="slide">
                                        <a href="listgroup.php" class="side-menu__item">List Group</a>
                                    </li>
                                    <li class="slide">
                                        <a href="navs-tabs.php" class="side-menu__item">Navs & Tabs</a>
                                    </li>
                                    <li class="slide">
                                        <a href="object-fit.php" class="side-menu__item">Object Fit</a>
                                    </li>
                                    <li class="slide">
                                        <a href="pagination.php" class="side-menu__item">Pagination</a>
                                    </li>
                                    <li class="slide">
                                        <a href="popovers.php" class="side-menu__item">Popovers</a>
                                    </li>
                                    <li class="slide">
                                        <a href="progress.php" class="side-menu__item">Progress</a>
                                    </li>
                                    <li class="slide">
                                        <a href="spinners.php" class="side-menu__item">Spinners</a>
                                    </li>
                                    <li class="slide">
                                        <a href="toasts.php" class="side-menu__item">Toasts</a>
                                    </li>
                                    <li class="slide">
                                        <a href="tooltips.php" class="side-menu__item">Tooltips</a>
                                    </li>
                                    <li class="slide">
                                        <a href="typography.php" class="side-menu__item">Typography</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- End::slide -->

                            <!-- Start::slide -->
                            <li class="slide has-sub">
                                <a href="javascript:void(0);" class="side-menu__item">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H6.911a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661Z" />
                                    </svg>
                                    <span class="side-menu__label">Utilities</span>
                                    <i class="ri-arrow-right-s-line side-menu__angle"></i>
                                </a>
                                <ul class="slide-menu child1">
                                    <li class="slide side-menu__label1">
                                        <a href="javascript:void(0)">Utilities</a>
                                    </li>
                                    <li class="slide">
                                        <a href="avatars.php" class="side-menu__item">Avatars</a>
                                    </li>
                                    <li class="slide">
                                        <a href="borders.php" class="side-menu__item">Borders</a>
                                    </li>
                                    <li class="slide">
                                        <a href="breakpoints.php" class="side-menu__item">Breakpoints</a>
                                    </li>
                                    <li class="slide">
                                        <a href="colors.php" class="side-menu__item">Colors</a>
                                    </li>
                                    <li class="slide">
                                        <a href="columns.php" class="side-menu__item">Columns</a>
                                    </li>
                                    <li class="slide">
                                        <a href="css-grid.php" class="side-menu__item">Css Grid</a>
                                    </li>
                                    <li class="slide">
                                        <a href="flex.php" class="side-menu__item">Flex</a>
                                    </li>
                                    <li class="slide">
                                        <a href="gutters.php" class="side-menu__item">Gutters</a>
                                    </li>
                                    <li class="slide">
                                        <a href="helpers.php" class="side-menu__item">Helpers</a>
                                    </li>
                                    <li class="slide">
                                        <a href="position.php" class="side-menu__item">Position</a>
                                    </li>
                                    <li class="slide">
                                        <a href="more.php" class="side-menu__item">Additional Content</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- End::slide -->

                        </ul>
                        <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path> </svg></div>
                    </nav>
                    <!-- End::nav -->

                </div>

            </aside>