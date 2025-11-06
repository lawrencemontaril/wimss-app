const profileDropdownBtn = document.getElementById('profile-dropdown-btn');
const profileDropdownMenu = document.getElementById('profile-dropdown-menu');
const sidebarMenu = document.getElementById('sidebar-menu');
const body = document.body;

profileDropdownBtn.addEventListener('click', () => {
    profileDropdownMenu.classList.toggle('hidden');
    sidebarMenu.classList.add('hidden');

    if (!sidebarMenu.classList.contains('hidden')) {
        body.classList.add('overflow-hidden');
    } else {
        body.classList.remove('overflow-hidden');
    }
});

document.addEventListener('click', function (e) {
    if (e.target.id !== 'profile-dropdown-menu' && e.target.id !== 'profile-dropdown-btn') {
        if (e.target.offsetParent && e.target.offsetParent.id !== 'profile-dropdown-menu') profileDropdownMenu.classList.add('hidden');
    }
});
