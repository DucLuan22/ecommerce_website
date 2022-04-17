<nav class="navbar navbar-light navbar-expand-md" style="background-color: gray">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Admin Panel</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1">
            <span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav">
                <li class="nav-item dropdown" id="manage">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Manage
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="category.php">Category</a>
                        <a class="dropdown-item" href="brand.php">Brand</a>
                        <a class="dropdown-item" href="product.php">Product</a>
                    </div>
                </li>
                <li class="nav-item dropdown" id="manage">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        User
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="customer.php">Customer</a>
                        <a class="dropdown-item" href="#">Admin</a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Hello, Luan
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">Logout</a></li>
                <li><a class="dropdown-item" href="#">Profiles</a></li>
            </ul>
        </div>
    </div>
</nav>