<nav class="sidebar">
    <div class="sidebar-header">
        <img src="{{ asset('') }}" class="sidebar-brand" width="40">
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item {{ request()->is('admin/dashboard') ? ' active' : '' }}">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>

            @can('account-management')
                <li
                    class="nav-item {{ request()->is('admin/mentor*', 'admin/writer*', 'admin/student*', 'admin/role*', 'admin/permission*') ? ' active' : '' }}">
                    <a class="nav-link" data-bs-toggle="collapse" href="#account-management" role="button"
                        aria-expanded="{{ request()->is('admin/mentor*', 'admin/writer*', 'admin/student*', 'admin/role*', 'admin/permission*') ? 'true' : 'false' }}">
                        <i class="link-icon" data-feather="users"></i>
                        <span class="link-title">Manajemen Akun</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse {{ request()->is('admin/mentor*', 'admin/writer*', 'admin/student*', 'admin/role*', 'admin/permission*') ? 'show' : '' }}"
                        id="account-management">
                        <ul class="nav sub-menu">

                            @can('mentor-list')
                                <li class="nav-item">
                                    <a href="{{ route('admin.mentor.index') }}"
                                        class="nav-link {{ request()->is('admin/mentor*') ? ' active' : '' }}">
                                        Mentor
                                    </a>
                                </li>
                            @endcan

                            @can('writer-list')
                                <!-- Diganti dari 'student-list' ke 'writer-list' untuk konsistensi -->
                                <li class="nav-item">
                                    <a href="{{ route('admin.writer.index') }}"
                                        class="nav-link {{ request()->is('admin/writer*') ? ' active' : '' }}">
                                        Writer
                                    </a>
                                </li>
                            @endcan

                            @can('student-list')
                                <li class="nav-item">
                                    <a href="{{ route('admin.student.index') }}"
                                        class="nav-link {{ request()->is('admin/student*') ? ' active' : '' }}">
                                        Student
                                    </a>
                                </li>
                            @endcan

                            @can('role-list')
                                <li class="nav-item">
                                    <a href="{{ route('admin.role.index') }}"
                                        class="nav-link {{ request()->is('admin/role*') ? ' active' : '' }}">
                                        Role
                                    </a>
                                </li>
                            @endcan

                            @can('permission-list')
                                <li class="nav-item">
                                    <a href="{{ route('admin.permission.index') }}"
                                        class="nav-link {{ request()->is('admin/permission*') ? ' active' : '' }}">
                                        Permission
                                    </a>
                                </li>
                            @endcan

                        </ul>
                    </div>
                </li>
            @endcan

            @can('web3-account-management')
                <li
                    class="nav-item {{ request()->is('admin/writer*',) ? ' active' : '' }}">
                    <a class="nav-link" data-bs-toggle="collapse" href="#web3-account-management" role="button"
                        aria-expanded="{{ request()->is('admin/writer*') ? 'true' : 'false' }}">
                        <i class="link-icon" data-feather="users"></i>
                        <span class="link-title">manajemen Web-3 Akun</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse {{ request()->is('admin/writer*') ? 'show' : '' }}"
                        id="web3-account-management">
                        <ul class="nav sub-menu">

                            @can('writer-list')
                                <!-- Diganti dari 'student-list' ke 'writer-list' untuk konsistensi -->
                                <li class="nav-item">
                                    <a href="{{ route('admin.writer.index') }}"
                                        class="nav-link {{ request()->is('admin/writer*') ? ' active' : '' }}">
                                        Web 3 Akun
                                    </a>
                                </li>
                            @endcan

                        </ul>
                    </div>
                </li>
            @endcan


            @can('article-management')
                <li
                    class="nav-item {{ request()->is('admin/article-category*', 'admin/article-tag*', 'admin/article*') ? ' active' : '' }}">
                    <a class="nav-link" data-bs-toggle="collapse" href="#article-management" role="button"
                        aria-expanded="{{ request()->is('admin/article-category*', 'admin/article-tag*', 'admin/article*') ? 'true' : 'false' }}">
                        <i class="link-icon" data-feather="file-text"></i>
                        <span class="link-title">Manajemen Artikel</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse {{ request()->is('admin/article-category*', 'admin/article-tag*', 'admin/article*') ? 'show' : '' }}"
                        id="article-management">
                        <ul class="nav sub-menu">

                            @can('article-category-list')
                                <li class="nav-item">
                                    <a href="{{ route('admin.article-category.index') }}"
                                        class="nav-link {{ request()->is('admin/article-category*') ? ' active' : '' }}">
                                        Kategori Artikel
                                    </a>
                                </li>
                            @endcan

                            @can('article-tag-list')
                                <li class="nav-item">
                                    <a href="{{ route('admin.article-tag.index') }}"
                                        class="nav-link {{ request()->is('admin/article-tag*') ? ' active' : '' }}">
                                        Tag Artikel
                                    </a>
                                </li>
                            @endcan

                            @can('article-list')
                                <li class="nav-item">
                                    <a href="{{ route('admin.article.index') }}"
                                        class="nav-link {{ request()->is('admin/article*') && !request()->is('admin/article-tag') && !request()->is('admin/article-category') ? ' active' : '' }}">
                                        Artikel
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endcan

            @can('product-management')
                <li
                    class="nav-item {{ request()->is('admin/product-category*', 'admin/product-tag*', 'admin/product*') ? ' active' : '' }}">
                    <a class="nav-link" data-bs-toggle="collapse" href="#product-management" role="button"
                        aria-expanded="{{ request()->is('admin/product-category*', 'admin/product-tag*', 'admin/product*') ? 'true' : 'false' }}">
                        <i class="link-icon" data-feather="shopping-bag"></i>
                        <span class="link-title" data-i18n="Product">Manajemen Produk</span>
                        <i class="link-arrow " data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse {{ request()->is('admin/product-category*', 'admin/product-tag*', 'admin/product*') ? 'show' : '' }}"
                        id="product-management">
                        <ul class="nav sub-menu">

                            @can('product-category-list')
                                <li class="nav-item">
                                    <a href="{{ route('admin.product-category.index') }}"
                                        class="nav-link {{ request()->is('admin/product-category*') ? ' active' : '' }}">
                                        Kategori Produk
                                    </a>
                                </li>
                            @endcan

                            @can('product-tag-list')
                                <li class="nav-item">
                                    <a href="{{ route('admin.product-tag.index') }}"
                                        class="nav-link {{ request()->is('admin/product-tag*') ? ' active' : '' }}">
                                        Tag Produk
                                    </a>
                                </li>
                            @endcan

                            @can('product-list')
                                <li class="nav-item">
                                    <a href="{{ route('admin.product.index') }}"
                                        class="nav-link {{ request()->is('admin/product*') && !request()->is('admin/product-tag') && !request()->is('admin/product-category') ? ' active' : '' }}">
                                        Produk
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endcan
        </ul>
    </div>
</nav>
