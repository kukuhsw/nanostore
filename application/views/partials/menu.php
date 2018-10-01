<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="img/avatar3.png" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>Hello, Jane</p>

                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search..."/>
                    <span class="input-group-btn">
                        <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <?php
                    // data main menu
                    $main_menu = $this->db->get_where('tabel_menu_admin', array('parent_id' => 0));
                    foreach ($main_menu->result() as $main) {
                    // Query untuk mencari data sub menu
                    $sub_menu = $this->db->get_where('tabel_menu_admin', array('parent_id' => $main->menu_admin_id));
                    // periksa apakah ada sub menu
                    if ($sub_menu->num_rows() > 0) {
                    // main menu dengan sub menu
                    echo "<li class='treeview'>" . anchor($main->link, '<i class="' . $main->icon . '"></i>' . $main->nama_menu_admin .
                    '<span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>');
                    // sub menu nya disini
                    echo "<ul class='treeview-menu'>";
                    foreach ($sub_menu->result() as $sub) {
                    echo "<li>" . anchor($sub->link, '<i class="' . $sub->icon . '"></i>' . $sub->nama_menu_admin) . "</li>";
                    }
                    echo"</ul></li>";
                    } else {
                    // main menu tanpa sub menu
                    echo "<li>" . anchor($main->link, '<i class="' . $main->icon . '"></i>' . $main->nama_menu_admin) . "</li>";
                    }
                    }
                  ?>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
