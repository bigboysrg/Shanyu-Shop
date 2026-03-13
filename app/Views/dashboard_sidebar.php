<div class="sidebar-nav">
    <a href="<?= base_url('dashboard') ?>">
        <div class="nav-item <?= ($active_menu ?? '') === 'dashboard' ? 'active' : '' ?>">
            <i class="fas fa-home"></i> Dashboard
        </div>
    </a>
    
    <a href="<?= base_url('dashboard/account') ?>">
        <div class="nav-item <?= ($active_menu ?? '') === 'account' ? 'active' : '' ?>">
            <i class="fas fa-user-cog"></i> Account & Settings
        </div>
    </a>
    
    <div class="nav-item submenu">
        <i class="fas fa-shield-alt"></i> Privacy
    </div>
    
    <a href="<?= base_url('logout') ?>">
        <div class="nav-item">
            <i class="fas fa-sign-out-alt"></i> Logout
        </div>
    </a>
</div>