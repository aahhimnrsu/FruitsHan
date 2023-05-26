    <aside class="left-sidebar" data-sidebarbg="skin5">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav" class="pt-4">
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link <?php if($menu == 'Dashboard'){ echo 'active';}?>" href="dashboard.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link <?php if($menu == 'Fruits'){ echo 'active';}?>" href="fruits.php" aria-expanded="false"><i class="mdi mdi-food-apple"></i><span class="hide-menu">Fruits</span></a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link <?php if($menu == 'Customer'){ echo 'active';}?>" href="customer.php" aria-expanded="false"><i class="mdi mdi-shopping"></i><span class="hide-menu">Customer</span></a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link <?php if($menu == 'Question'){ echo 'active';}?>" href="question.php" aria-expanded="false"><i class="mdi mdi-comment-question-outline"></i><span class="hide-menu">Question</span></a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title"><?= $menu ?></h4>
                    <div class="ms-auto text-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <?= $menu ?>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>