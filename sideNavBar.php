<div id="sidebar-container" class="sidebar-expanded d-none d-md-block">
    <!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->
    <!-- Bootstrap List Group -->
    <ul class="list-group">
        <!-- Separator with title -->
        <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
            <small>MAIN MENU</small>
        </li>
        <!-- /END Separator -->
        <!-- Menu with submenu -->
        <a href="#submenu1" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="fa fa-user fa-fw mr-3"></span>
                <span class="menu-collapsed">Dashboard</span>
                <span class="submenu-icon ml-auto"></span>
            </div>
        </a>
        <!-- Submenu content -->
        <div id='submenu1' class="collapse sidebar-submenu">
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white" id="navDocs">
                <span class="menu-collapsed">Documents</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                <span class="menu-collapsed">Reports</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                <span class="menu-collapsed">Tables</span>
            </a>
        </div>
        <a href="#submenu2" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="fa fa-user fa-fw mr-3"></span>
                <span class="menu-collapsed">Profile</span>
                <span class="submenu-icon ml-auto"></span>
            </div>
        </a>
        <!-- Submenu content -->
        <div id='submenu2' class="collapse sidebar-submenu">
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                <span class="menu-collapsed">Settings</span>
            </a>
            <a href="#" id="getTry" isHeader="1" class="list-group-item list-group-item-action bg-dark text-white">
                <span class="menu-collapsed" >Password</span>
            </a>
        </div>
            <a id="sNavTraining" href="#" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center" >
                    <span class="fa fa-tasks fa-fw mr-3"></span>
                    <span class="menu-collapsed">Training</span>
                </div>
            </a>
        <!-- Separator with title -->
        <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
            <small>OPTIONS</small>
        </li>
        <!-- /END Separator -->
        <a  id="sNavCalendar" href="#" class="bg-dark list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="fa fa-calendar fa-fw mr-3"></span>
                <span class="menu-collapsed">Calendar</span>
            </div>
        </a>
        <a href="#" class="bg-dark list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="fa fa-envelope fa-fw mr-3"></span>
                <span class="menu-collapsed">Messages <span class="badge badge-pill badge-primary ml-2">5</span></span>
            </div>
        </a>
        <a id="sDocUpload" href="#" class="bg-dark list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="fa fa-envelope fa-fw mr-3"></span>
                <span class="menu-collapsed">Apply Now!</span>
            </div>
        </a>
        <!-- Separator without title -->
        <li class="list-group-item sidebar-separator menu-collapsed"></li>
        <!-- /END Separator -->
        <a href="#" class="bg-dark list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="fa fa-question fa-fw mr-3"></span>
                <span class="menu-collapsed">Help</span>
            </div>
        </a>
        <a  data-toggle="sidebar-collapse" class="bg-dark list-group-item list-group-item-action d-flex align-items-center">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span id="collapse-icon" class="fa fa-angle-double-left mr-3"></span>
                <span id="collapse-text" class="menu-collapsed">Collapse</span>
            </div>
        </a>
    </ul><!-- List Group END-->
</div>