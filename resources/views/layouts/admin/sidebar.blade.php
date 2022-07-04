<div class="sidebar" data-image="../assets/img/sidebar-5.jpg">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text">
                Creative Tim
            </a>
        </div>
        <ul class="nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{route("admin.dashboard")}}">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{route("admin.Users")}}">
                    <i class="nc-icon nc-circle-09"></i>
                    <p>show users</p>
                </a>
            </li>
        </ul>
    </div>
    @include("layouts.client.footer")
</div>
