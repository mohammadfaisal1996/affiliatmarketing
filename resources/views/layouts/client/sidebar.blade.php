<div class="sidebar" data-image="../assets/img/sidebar-5.jpg">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text">
                Creative Tim
            </a>
        </div>
        <ul class="nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{route("clients.dashboard")}}">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{route("clients.Referral_Link.index")}}">
                    <i class="nc-icon nc-circle-09"></i>
                    <p>Referral Link</p>
                </a>
            </li>
        </ul>
    </div>
    @include("layouts.client.footer")
</div>
