<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title ?? 'dashboard'}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
      @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&family=Playwrite+DE+VA+Guides&family=Playwrite+NL+Guides&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap');
  *{
    font-family: "Rubik", sans-serif;

  }
    
:root {
  --primary-color: #508bfc;
  --primary-color-light: #7ca9fc;
  --text-color: #ffffff;
  --bg-color: #f8f9fa;
}
body {
  display: flex;
  height: 100vh;
  margin: 0;
  background-color: var(--bg-color);
}
/* Desktop Sidebar Styles */
.sidebar {
  position: fixed;
  top: 0;
  left: 0;
  height: 100vh;
  width: 250px;
  background: var(--primary-color);
  color: var(--text-color);
  transition: transform 0.3s ease, width 0.3s ease;
  z-index: 1040;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}
.sidebar.collapsed {
  width: 70px;
}
.sidebar .nav-link {
  color: var(--text-color);
  padding: 12px 20px;
  display: flex;
  align-items: center;
  white-space: nowrap;
  transition: background-color 0.3s ease, color 0.3s ease;
}
.sidebar .nav-link i {
  font-size: 1.2rem;
  margin-right: 10px;
}
.sidebar.collapsed .nav-link i {
  margin-right: 0;
}
.sidebar .nav-link:hover,
.sidebar .nav-link.active {
  background-color: var(--primary-color-light);
}
.sidebar.collapsed .nav-link span {
  display: none;
}
.sidebar .toggle-btn {
  text-align: center;
  padding: 10px 0;
  cursor: pointer;
  border-bottom: 1px solid rgba(255, 255, 255, 0.2);
}
.sidebar .toggle-btn i {
  color: var(--text-color);
}
.sidebar.collapsed .toggle-icon {
  transform: rotate(180deg);
}
.content {
  flex-grow: 1;
  padding: 20px;
  background: var(--bg-color);
  margin-left: 250px;
  width: calc(100% - 250px);
  overflow-y: auto;
  transition: margin-left 0.3s ease, width 0.3s ease;
}
.sidebar.collapsed + .content {
  margin-left: 70px;
  width: calc(100% - 70px);
}

/* Mobile Styles */
.mobile-header {
  display: none;
}

@media (max-width: 768px) {
  .sidebar{
    transform: translateX(-100%);
    width: 250px;
  }
  .sidebar.mobile-open {
    transform: translateX(0);
  }
  .content {
    margin-left: 0;
    width: 100%;
  }
  .mobile-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 15px;
    background-color: var(--primary-color);
    color: var(--text-color);
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1050;
  }
  .mobile-header .menu-toggle {
    background: none;
    border: none;
    color: var(--text-color);
    font-size: 1.5rem;
    cursor: pointer;
  }
  .content {
    margin-top: 60px;
  }
  .sidebar-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0,0,0,0.5);
    z-index: 1030;
  }
  .sidebar-overlay.show {
    display: block;
  }
}
.tooltip-inner {
  background-color: var(--primary-color);
  color: var(--text-color);
  font-size: 0.875rem;
}
</style>
</head>
<body class="m-0 vh-100">
  <!-- Mobile Header -->
  <div class="mobile-header">
        <a href="/admin/index" class="nav-link active" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard">
           <h1>Dashboard</h1>
        </a>    
        <button class="menu-toggle" aria-label="Toggle Menu">
      <i class="bi bi-list"></i>
    </button>
  </div>

  <!-- Sidebar Overlay -->
  <div class="sidebar-overlay"></div>

  <!-- Sidebar -->
  <nav class="sidebar d-flex flex-column">
    <div class="toggle-btn d-none d-md-block">
      <i class="bi bi-chevron-left toggle-icon"></i>
    </div>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a href="/admin/index" class="nav-link active" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard">
          <i class="bi bi-speedometer2"></i> <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="/admin/user" class="nav-link" data-bs-toggle="tooltip" data-bs-placement="right" title="Users">
          <i class="bi bi-people"></i> <span>Users</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="/admin/company" class="nav-link" data-bs-toggle="tooltip" data-bs-placement="right" title="Companies">
          <i class="bi bi-building"></i> <span>Companies</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="/admin/job" class="nav-link" data-bs-toggle="tooltip" data-bs-placement="right" title="Messages">
        <i class="bi bi-file-post"></i> <span>Jobs</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="/admin/subsicriptions" class="nav-link" data-bs-toggle="tooltip" data-bs-placement="right" title="Analytics">
        <i class="bi bi-currency-dollar"></i> <span>Subsicriptions</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="/admin/contact" class="nav-link" data-bs-toggle="tooltip" data-bs-placement="right" title="Analytics">
        <i class="bi bi-envelope"></i><span>Contacts</span>
        </a>
      </li>

      @if (Auth::user()->role == 'super admin')
      <li class="nav-item">
        <a href="/admin/manage" class="nav-link" data-bs-toggle="tooltip" data-bs-placement="right" title="Settings">
          <i class="bi bi-gear"></i> <span>manage admin</span>
        </a>
      </li>
      @endif
      
      <li class="nav-item d-md-none">
        <a href="/admin/logout" class="nav-link text-light bg-danger rounded-2" data-bs-toggle="tooltip" data-bs-placement="right" title="Logout">
          <i class="bi bi-box-arrow-right"></i> <span>Logout</span>
        </a>
      </li>
    </ul>
    <div class="mt-auto p-3 d-none d-md-block">
  <a href="/admin/logout" 
     class="nav-link text-light bg-danger rounded-2 d-flex align-items-center justify-content-center" 
     data-bs-toggle="tooltip" 
     data-bs-placement="right" 
     title="Logout">
    <i class="bi bi-box-arrow-right"></i>
  </a>
</div>

  </nav>

  <!-- Content -->
  <div class="content">
    {{$slot}}
  </div>
   
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <script>
document.addEventListener('DOMContentLoaded', () => {
  const sidebar = document.querySelector('.sidebar');
  const desktopToggleBtn = document.querySelector('.toggle-btn');
  const toggleIcon = document.querySelector('.toggle-icon');
  const mobileMenuToggle = document.querySelector('.menu-toggle');
  const sidebarOverlay = document.querySelector('.sidebar-overlay');

  // Desktop Sidebar Toggle (only on larger screens)
  if (desktopToggleBtn) {
    desktopToggleBtn.addEventListener('click', () => {
      sidebar.classList.toggle('collapsed');
      toggleIcon.classList.toggle('rotate');
    });
  }

  // Mobile Menu Toggle
  mobileMenuToggle.addEventListener('click', () => {
    sidebar.classList.toggle('mobile-open');
    sidebarOverlay.classList.toggle('show');
  });

  // Close sidebar when clicking overlay
  sidebarOverlay.addEventListener('click', () => {
    sidebar.classList.remove('mobile-open');
    sidebarOverlay.classList.remove('show');
  });

  // Enable tooltips (only on larger screens)
  if (window.innerWidth > 768) {
    const tooltips = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    tooltips.forEach(tooltipEl => {
      new bootstrap.Tooltip(tooltipEl);
    });
  }

  // Persist Active Navigation Item
  const navLinks = document.querySelectorAll('.sidebar .nav-link');
  
  // Check if there's a saved active link in localStorage
  const savedActiveLink = localStorage.getItem('activeNavLink');
  
  if (savedActiveLink) {
    const activeLink = document.querySelector(`.sidebar .nav-link[href="${savedActiveLink}"]`);
    if (activeLink) {
      navLinks.forEach(link => link.classList.remove('active'));
      activeLink.classList.add('active');
    }
  }

  navLinks.forEach(link => {
    link.addEventListener('click', function() {
      // Remove active class from all nav links
      navLinks.forEach(navLink => navLink.classList.remove('active'));
      
      // Add active class to clicked link
      this.classList.add('active');
      
      // Save the href of the active link to localStorage
      localStorage.setItem('activeNavLink', this.getAttribute('href'));
    });
  });
});
  </script>
</body>
</html>