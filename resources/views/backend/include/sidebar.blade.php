<style>
    .submenu{
    display:none;
    list-style:none;
    padding-left:25px;
}

.submenu li a{
    display:block;
    padding:8px 0;
    color:#a6b0c3;
    text-decoration:none;
}

.submenu li a:hover{
    color:#fff;
}

.menu-dropdown.active .submenu{
    display:block;
}
</style>
<aside class="sidebar">
    <div class="brand">
        <img src="{{ asset('backend/assets/img/Screenshot_5.png') }}" class="brand-logo" alt="Logo">
        <h4>Magpie IT</h4>
    </div>
    <ul class="menu">
        <li><a class="active" href="dashboard.html"><i class="bi bi-house-door"></i> Dashboard</a></li>
        <li><a href="{{ url('/admin/banner') }}"><i class="bi bi-book"></i> Banner</a></li>
        <li><a href="{{ url('/admin/about') }}"><i class="bi bi-person"></i>About</a></li>
        <li><a href="{{ url('/admin/team') }}"><i class="bi bi-people"></i> Team</a></li>
        <li><a href="{{ url('/admin/service') }}"><i class="bi bi-check2-square"></i> Service</a></li>
        <li><a href="{{ url('/admin/pricing') }}"><i class="bi bi-cash-stack"></i>Pricing</a></li>
        <li class="menu-dropdown">
    <a href="#" class="dropdown-btn">
        <i class="bi bi-bag"></i> Order
        <i class="bi bi-chevron-down float-end"></i>
    </a>

    <ul class="submenu">
        <li><a href="{{ url('/admin/order') }}">All Order</a></li>
        <li><a href="#">Pending Order</a></li>
        <li><a href="#">In Progress Order</a></li>
        <li><a href="#">Completed Order</a></li>
        <li><a href="#">Daliverd Order</a></li>
    </ul>
</li>
        <li><a href="profile.html"><i class="bi bi-person"></i> Profile</a></li>
        <li><a href="message.html"><i class="bi bi-telephone"></i> Message</a></li>
        <li><a href="project.html"><i class="bi bi-folder"></i> Projects</a></li>
        <li><a href="calender.html"><i class="bi bi-calendar"></i> Calendar</a></li>
        <li><a href="file.html"><i class="bi bi-file-earmark"></i> Files</a></li>
        <li><a href="analytics.html"><i class="bi bi-bar-chart"></i> Analytics</a></li>
        <li><a href="bloging.html"><i class="bi bi-journal-text"></i> Blog</a></li>
        <li><a href="chat.html"><i class="bi bi-chat-dots"></i> Live chat</a></li>
        <li><a href="setting.html"><i class="bi bi-gear"></i> Settings</a></li>
    </ul>
    <button class="cta-get mt-5">Logout</button>
</aside>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.querySelectorAll(".dropdown-btn").forEach(button => {
    button.addEventListener("click", function(e){
        e.preventDefault();
        this.parentElement.classList.toggle("active");
    });
});
</script>