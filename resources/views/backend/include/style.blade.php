<style>
  
:root {
  --bg:#0b1220;
  --panel:#0f1a2a;
  --muted:#a6b0c3;
  --accent:#6c63ff;
  --accent2:#4641B3;
  --glass:rgba(255,255,255,0.03);
}

body {
  margin:0;
  font-family:"Inter", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
  background:#081028;
  color:#e6eef8;
  display:flex;
  min-height:100vh;
}

a {text-decoration:none;color:inherit;}
.muted { color:var(--muted); font-size:13px; }

/* Sidebar */
.sidebar {
  width: 260px;
  position: fixed;
  top: 0; left: 0; bottom: 0;
  background: #081028;
  padding: 28px 20px;
  transition: transform 0.3s ease;
  z-index: 1100;
}

/* Desktop */
@media (min-width: 769px) {
  .sidebar { transform: translateX(0); }
  .main { margin-left: 260px; transition: margin 0.3s ease; }
  .mobile-sidebar-toggle { display: none; }
}

/* Mobile */
@media (max-width: 768px) {
  .sidebar { transform: translateX(-100%); }
  .sidebar.show { transform: translateX(0); }
  .main { margin-left: 0; padding:20px; }
  .mobile-sidebar-toggle {
    display: flex; position: fixed; top: 15px; left: 15px; z-index: 1200;
    flex-direction: column; justify-content:space-between; width:30px; height:22px; background:none; border:none; cursor:pointer;
  }
  .mobile-sidebar-toggle span { display:block; height:4px; width:100%; background:#fff; border-radius:2px; }
}

/* Overlay for mobile */
.overlay {
  display: none;
  position: fixed; top:0; left:0; width:100%; height:100%;
  background: rgba(0,0,0,0.4);
  z-index: 1000;
  transition: opacity 0.3s ease;
}
.overlay.show { display:block; }

/* Brand & Menu */
.brand { display:flex; align-items:center; gap:10px; margin-bottom:20px; }
.brand-logo { width:40px; height:40px; border-radius:50%; object-fit:cover; }
.brand h4 { margin:0; color:#fff; font-weight:700; }
.menu { list-style:none; padding:0; margin:0; display:flex; flex-direction:column; gap:6px; }
.menu a {
  display:flex; align-items:center; gap:12px;
  padding:10px 12px; border-radius:8px;
  color:rgba(255,255,255,0.6); font-weight:500;
}
.menu a.active { color:var(--accent); background:linear-gradient(90deg, rgba(108,99,255,0.12), rgba(70,65,179,0.06)); }
.menu a:hover { color:var(--accent); background:rgba(108,99,255,0.03); }
.cta-get {
  margin-top:auto; padding:10px; font-weight:600;
  border:none; border-radius:10px;
  color:#fff; background:linear-gradient(90deg,#a267ff,#6c63ff);
  box-shadow:0 6px 18px rgba(108,99,255,0.15);
  cursor:pointer;
}

/* Main content */
.main { flex:1; padding:28px; overflow:auto; }

/* Navbar */
.navbar-top {
  display:flex; justify-content:space-between; align-items:center;
  padding:12px 28px; background:#0B1739; border-bottom:1px solid rgba(255,255,255,0.05);
  position:sticky; top:0; z-index:900;
  border-radius: 10px;
}
.navbar-top h5 { margin:0;color:#fff;font-weight:600; }
.user-menu {position:relative; display:flex; align-items:center;}
.user-trigger {display:flex; align-items:center; gap:8px; cursor:pointer;}
.user-trigger img {width:36px;height:36px;border-radius:50%;object-fit:cover;}
.user-trigger span {font-size:14px;color:#ccc;}
.dropdown-menu-custom {
  position:absolute; top:100%; right:0; background:#081028; border-radius:8px; padding:8px 0; display:none; flex-direction:column; min-width:160px; z-index:999;
}
.user-menu.active .dropdown-menu-custom{display:flex;}
.dropdown-menu-custom a {padding:10px 14px; color:#ccc; font-size:14px; display:block;}
.dropdown-menu-custom a:hover {background:#0B1739;color:#fff;}

/* Footer */
.footer{ background:#0B1739; color:#a6b0c3; text-align:center; padding:12px 0; border-top:1px solid rgba(255,255,255,0.03); font-size:13px; }
#langSwitch {
  display: none;
}
 /* KPI Cards */
    .cards-row{ display:grid; grid-template-columns:repeat(4,1fr); gap:18px; margin-bottom:18px; }
    .card{
      background-color: #0B1739;
      border-radius:12px; padding:18px;
      border:1px solid rgba(255,255,255,0.03);
      box-shadow:0 6px 18px rgba(2,6,23,0.6);
    }
    .card .kpi{ font-size:22px; font-weight:700; color:#fff; }
    .kpi-sub{ font-size:13px; color:var(--muted); margin-top:6px; }
    .icon-round{
      width:34px; height:34px; border-radius:8px;
      display:inline-flex; align-items:center; justify-content:center;
      background:rgba(255,255,255,0.02);
    }
     /* Panels & Lower Grid */
    .panels{ display:grid; grid-template-columns:1fr 1.35fr; gap:18px; margin-bottom:18px; }
    .panel{ background-color:#0B1739; border-radius:12px; padding:18px; border:1px solid rgba(255,255,255,0.03); }
    .panel h5{ margin-bottom:12px; color:var(--muted); font-weight:600; }
    .lower-grid{ display:grid; grid-template-columns:repeat(2,1fr); gap:18px; margin-top:18px; }

    .products-list .product-item{ display:flex; justify-content:space-between; align-items:center; padding:10px 0; border-bottom:1px solid #1b1f33; }
    .products-list .product-item:last-child{ border:none; }
    .product-img{ width:46px; height:46px; border-radius:8px; object-fit:cover; }
     .products-list .product-item{
  display:flex;
  justify-content:space-between;
  align-items:center;
  padding:10px 0;
  border-bottom:1px solid #1b1f33;
  gap:12px; /* এখানে gap দিলেই image আর text আলাদা হবে */
}
/* Orders Table */
    .orders{ background-color:#0B1739; color:#fff; border-radius:12px; padding:18px; margin-top:18px; }
    .table thead th{ color:var(--muted); background-color:#0B1739; border-bottom:1px solid rgba(255,255,255,0.03); }
    .table tbody td{ color:#e6eef8; background-color:#0B1739; }
    .status-badge{ display:inline-block; padding:4px 10px; border-radius:6px; font-size:12px; font-weight:600; }
    .status-badge.delivered{ background:#00c27a33; color:#00c27a; }
    .status-badge.pending{ background:#ffb70033; color:#ffb700; }
    .status-badge.canceled{ background:#ff003333; color:#ff0033; }
     input[type="checkbox"] { accent-color: #CB3CFF; width: 18px; height: 18px; cursor:pointer; }
    .table tbody tr.selected-row td { background-color: #231B51 !important; transition: background-color 0.3s ease; }
    
    @media (max-width:1200px){ .cards-row{ grid-template-columns:repeat(2,1fr); } .panels{ grid-template-columns:1fr; } .lower-grid{ grid-template-columns:1fr; } }
    /* ===== Responsive Sidebar ===== */
@media (max-width:1200px){
  .cards-row{ grid-template-columns:repeat(2,1fr); }
  .panels{ grid-template-columns:1fr; }
  .lower-grid{ grid-template-columns:1fr; }
}
/* =========================
   GLOBAL RESPONSIVE FIX
========================= */
img, canvas {
  max-width: 100%;
  height: auto;
}

/* =========================
   MAIN CONTENT RESPONSIVE
========================= */
@media (max-width: 992px) {
  .main {
    padding: 20px;
  }
}

/* =========================
   KPI CARDS
========================= */
@media (max-width: 768px) {
  .cards-row {
    grid-template-columns: 1fr;
  }
}

/* =========================
   PANELS & CHARTS
========================= */
@media (max-width: 768px) {
  .panels {
    grid-template-columns: 1fr;
  }

  .donut-wrap {
    flex-direction: column;
    align-items: center;
  }

  .donut-wrap > div:first-child {
    width: 220px !important;
    margin-bottom: 15px;
  }
}

/* =========================
   LOWER GRID
========================= */
@media (max-width: 768px) {
  .lower-grid {
    grid-template-columns: 1fr;
  }
}

/* =========================
   PRODUCTS LIST
========================= */
@media (max-width: 576px) {
  .product-item {
    flex-wrap: wrap;
  }

  .product-item .ms-auto {
    width: 100%;
    text-align: left;
    margin-top: 6px;
  }
}

/* =========================
   ORDERS TABLE (IMPORTANT)
========================= */
.orders {
  overflow-x: auto;
}

.orders table {
  min-width: 900px;
}

/* =========================
   NAVBAR FIX
========================= */
@media (max-width: 576px) {
  .navbar-top {
    flex-direction: column;
    align-items: flex-start;
    gap: 10px;
  }
}

/* =========================
   SIDEBAR MOBILE SAFE
========================= */
@media (max-width: 768px) {
  .sidebar {
    width: 240px;
  }
}
/* ===== MOBILE SIDEBAR SCROLL FIX ===== */
@media (max-width: 768px) {
  .sidebar {
    height: 100vh;              /* full screen height */
    overflow-y: auto;           /* vertical scroll enable */
    -webkit-overflow-scrolling: touch; /* smooth mobile scroll */
  }
}


</style>