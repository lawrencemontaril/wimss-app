const sidebarMenu = document.getElementById('sidebar-menu');
const sidebarMenuIcon = document.querySelector('#sidebar-menu-icon path');
const sidebarMenuBtn = document.getElementById('sidebar-menu-btn');
const profileDropdownMenu = document.getElementById('profile-dropdown-menu');
const overlay = document.getElementById('overlay');
const body = document.body;

sidebarMenuBtn.addEventListener('click', () => {
  body.classList.toggle('overflow-hidden');
  sidebarMenu.classList.toggle('hidden');
  profileDropdownMenu.classList.add('hidden');

  if (!sidebarMenu.classList.contains('hidden')) {
    // On sidebar open
    body.classList.add('overflow-hidden');
    overlay.classList.remove('hidden');
    sidebarMenuIcon.setAttribute('d', 'M6 18 18 6M6 6l12 12');
  } else {
    // On sidebar close
    body.classList.remove('overflow-hidden');
    overlay.classList.add('hidden');
    sidebarMenuIcon.setAttribute(
      'd',
      'M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5',
    );
  }
});

function sidebarOnResize() {
  const width = window.innerWidth;

  if (width >= 768) {
    body.classList.remove('overflow-hidden');
    sidebarMenu.classList.remove('hidden');
    overlay.classList.add('hidden');
    sidebarMenuIcon.setAttribute(
      'd',
      'M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5',
    );
  } else {
    if (!sidebarMenu.classList.contains('hidden')) {
      sidebarMenu.classList.remove('hidden');
      body.classList.add('overflow-hidden');
      overlay.classList.remove('hidden');
      sidebarMenuIcon.setAttribute('d', 'M6 18 18 6M6 6l12 12');
    }
  }
}

window.addEventListener('resize', sidebarOnResize);

document.addEventListener('click', function (e) {
  if (e.target.id !== 'sidebar-menu' && e.target.id !== 'sidebar-menu-btn') {
    if (e.target.offsetParent && e.target.offsetParent.id !== 'sidebar-menu') {
      sidebarMenu.classList.add('hidden');
      overlay.classList.add('hidden');
      sidebarMenuIcon.setAttribute(
        'd',
        'M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5',
      );
    }
  }
});
