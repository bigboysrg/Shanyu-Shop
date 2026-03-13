<?php
/**
 * Account Management Dashboard View
 *
 * This view implements the Account & Settings page matching Figure 9 - Account Management Screen
 *
 * Features:
 * - User profile viewing and editing (First Name, Last Name)
 * - Profile picture management with Change button
 * - Public profile toggle switch
 * - Account deletion functionality
 * - Responsive two-column layout
 * - Consistent gray color scheme
 *
 * Required Session Variables:
 * - user_name: Display name in top header
 * - user_email: User's email address
 * - first_name: Editable user first name
 * - last_name: Editable user last name
 *
 * External Dependencies:
 * - Font Awesome 6.5.1 (CDN)
 *
 * Routes Required:
 * - GET /dashboard -> UserDashboard::index
 * - POST /dashboard/update -> UserDashboard::updateProfile
 * - POST /dashboard/delete -> UserDashboard::deleteAccount
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Dashboard</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
<style>
* {
margin: 0;
padding: 0;
box-sizing: border-box;
}
:root {
--primary-gray: #a8a8a8;
--dark-gray: #4a4a4a;
--medium-gray: #7a7a7a;
--light-gray: #e8e8e8;
--bg-gray: #f0f0f0;
--white: #ffffff;
--text-dark: #333333;
--border-color: #cccccc;
--success-gray: #6b9b6e;
--danger-gray: #9b6b6b;
--shadow-sm: 0 2px 4px rgba(0, 0, 0, 0.1);
--shadow-md: 0 4px 8px rgba(0, 0, 0, 0.15);
--transition-speed: 0.3s;
}
body {
background-color: var(--bg-gray);
font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}
/* Top Header */
.top-header {
background-color: var(--primary-gray);
padding: 15px 30px;
display: flex;
justify-content: space-between;
align-items: center;
box-shadow: var(--shadow-sm);
}
.user-info {
display: flex;
align-items: center;
gap: 15px;
}
.user-avatar {
width: 50px;
height: 50px;
border-radius: 50%;
background-color: var(--light-gray);
display: flex;
align-items: center;
justify-content: center;
font-size: 1.5rem;
color: var(--dark-gray);
}
.user-name {
font-size: 1.1rem;
font-weight: 500;
color: var(--text-dark);
}
.header-icons {
display: flex;
gap: 20px;
align-items: center;
}
.header-icons i {
font-size: 1.3rem;
color: var(--text-dark);
cursor: pointer;
transition: color var(--transition-speed), transform var(--transition-speed);
}
.header-icons i:hover {
color: var(--dark-gray);
transform: scale(1.1);
}
/* Search Bar */
.search-container {
padding: 20px 30px;
background-color: var(--white);
display: flex;
justify-content: center;
}
.search-box {
width: 100%;
max-width: 600px;
position: relative;
}
.search-box input {
width: 100%;
padding: 12px 50px 12px 20px;
border: 2px solid var(--border-color);
border-radius: 25px;
font-size: 1rem;
outline: none;
transition: border-color var(--transition-speed), box-shadow var(--transition-speed);
}
.search-box input:focus {
border-color: var(--primary-gray);
box-shadow: 0 0 0 3px rgba(168, 168, 168, 0.1);
}
.search-box .search-icon {
position: absolute;
right: 15px;
top: 50%;
transform: translateY(-50%);
background-color: var(--dark-gray);
color: var(--white);
width: 35px;
height: 35px;
border-radius: 50%;
display: flex;
align-items: center;
justify-content: center;
cursor: pointer;
transition: background-color var(--transition-speed), transform var(--transition-speed);
}
.search-box .search-icon:hover {
background-color: var(--primary-gray);
transform: translateY(-50%) scale(1.05);
}
/* Main Layout */
.dashboard-container {
display: flex;
min-height: calc(100vh - 140px);
}
/* Sidebar Navigation */
.sidebar-nav {
width: 250px;
background-color: var(--light-gray);
padding: 20px 0;
}
.sidebar-nav a {
text-decoration: none;
color: inherit;
display: block;
}
.nav-item {
padding: 15px 30px;
cursor: pointer;
transition: background-color var(--transition-speed), padding-left var(--transition-speed);
font-size: 1rem;
color: var(--text-dark);
}
.nav-item:hover {
background-color: var(--primary-gray);
padding-left: 35px;
}
.nav-item.active {
background-color: var(--primary-gray);
font-weight: 600;
border-left: 4px solid var(--dark-gray);
}
.nav-item.submenu {
padding-left: 50px;
font-size: 0.95rem;
}
/* Main Content Area */
.main-content {
flex: 1;
padding: 40px;
background-color: var(--bg-gray);
}
.content-header {
margin-bottom: 30px;
}
.content-title {
font-size: 2rem;
font-weight: 600;
color: var(--text-dark);
margin-bottom: 20px;
}
/* Tabs */
.tabs {
display: flex;
gap: 30px;
border-bottom: 2px solid var(--border-color);
margin-bottom: 30px;
}
.tab {
padding: 10px 0;
cursor: pointer;
color: var(--medium-gray);
font-size: 1rem;
border-bottom: 3px solid transparent;
margin-bottom: -2px;
transition: all var(--transition-speed);
}
.tab:hover {
color: var(--dark-gray);
}
.tab.active {
color: var(--text-dark);
font-weight: 600;
border-bottom-color: var(--dark-gray);
}
/* Content Sections */
.content-section {
background-color: var(--light-gray);
padding: 30px;
margin-bottom: 20px;
border-radius: 8px;
box-shadow: var(--shadow-sm);
transition: box-shadow var(--transition-speed);
}
.content-section:hover {
box-shadow: var(--shadow-md);
}
.section-header {
margin-bottom: 25px;
}
.section-title {
font-size: 1.3rem;
font-weight: 600;
color: var(--text-dark);
margin: 0 0 20px 0;
}
/* Profile Section */
.profile-section {
display: flex;
gap: 60px;
align-items: flex-start;
}
.profile-left {
flex: 1;
}
.profile-right {
flex: 1;
}
.profile-right .section-title {
text-align: right;
}
.profile-picture {
display: flex;
align-items: center;
gap: 20px;
margin-bottom: 30px;
}
.profile-avatar {
width: 80px;
height: 80px;
border-radius: 50%;
background-color: var(--primary-gray);
display: flex;
align-items: center;
justify-content: center;
font-size: 2rem;
color: var(--white);
}
.change-btn {
padding: 8px 20px;
background-color: var(--primary-gray);
border: none;
border-radius: 5px;
cursor: pointer;
font-size: 0.95rem;
color: var(--text-dark);
transition: all var(--transition-speed);
}
.change-btn:hover {
background-color: var(--dark-gray);
color: var(--white);
transform: translateY(-2px);
box-shadow: var(--shadow-sm);
}
/* Form Fields */
.form-group {
margin-bottom: 20px;
}
.form-label {
display: block;
margin-bottom: 8px;
font-weight: 500;
color: var(--text-dark);
}
.form-control {
width: 100%;
padding: 10px 15px;
border: 2px solid transparent;
background-color: var(--white);
border-radius: 5px;
font-size: 1rem;
transition: border-color var(--transition-speed), box-shadow var(--transition-speed);
}
.form-control:focus {
outline: none;
border-color: var(--primary-gray);
box-shadow: 0 0 0 3px rgba(168, 168, 168, 0.1);
}
.form-actions {
display: flex;
gap: 10px;
margin-top: 10px;
}
.btn-save, .btn-edit {
padding: 8px 20px;
border: none;
border-radius: 5px;
cursor: pointer;
font-size: 0.95rem;
background-color: var(--primary-gray);
color: var(--text-dark);
transition: all var(--transition-speed);
}
.btn-save:hover, .btn-edit:hover {
background-color: var(--dark-gray);
color: var(--white);
transform: translateY(-2px);
box-shadow: var(--shadow-sm);
}
.btn-save:active, .btn-edit:active {
transform: translateY(0);
}
/* Toggle Switch */
.toggle-setting {
display: flex;
justify-content: space-between;
align-items: center;
margin-bottom: 15px;
}
.toggle-info h4 {
margin: 0 0 5px 0;
font-size: 1rem;
font-weight: 600;
}
.toggle-info p {
margin: 0;
font-size: 0.9rem;
color: var(--dark-gray);
}
.toggle-switch {
position: relative;
width: 50px;
height: 26px;
}
.toggle-switch input {
opacity: 0;
width: 0;
height: 0;
}
.slider {
position: absolute;
cursor: pointer;
top: 0;
left: 0;
right: 0;
bottom: 0;
background-color: var(--border-color);
transition: background-color 0.4s ease;
border-radius: 34px;
}
.slider:before {
position: absolute;
content: "";
height: 20px;
width: 20px;
left: 3px;
bottom: 3px;
background-color: var(--white);
transition: transform 0.4s ease;
border-radius: 50%;
box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}
input:checked + .slider {
background-color: var(--success-gray);
}
input:checked + .slider:before {
transform: translateX(24px);
}
.toggle-switch:hover .slider {
opacity: 0.9;
}
/* Delete Section */
.delete-warning {
text-align: center;
padding: 20px;
}
.delete-warning p {
margin-bottom: 20px;
color: var(--dark-gray);
}
.btn-delete {
padding: 10px 30px;
background-color: var(--primary-gray);
border: 2px solid transparent;
border-radius: 5px;
cursor: pointer;
font-size: 1rem;
color: var(--text-dark);
transition: all var(--transition-speed);
}
.btn-delete:hover {
background-color: var(--danger-gray);
border-color: var(--danger-gray);
color: var(--white);
transform: translateY(-2px);
box-shadow: var(--shadow-md);
}
.btn-delete:active {
transform: translateY(0);
}
/* Responsive */
@media (max-width: 768px) {
.dashboard-container {
flex-direction: column;
}
.sidebar-nav {
width: 100%;
}
.profile-section {
flex-direction: column;
}
.main-content {
padding: 20px;
}
}
</style>
</head>
<body>
<div class="top-header">
<div class="user-info">
<div class="user-avatar">
<i class="fas fa-user"></i>
</div>
<span class="user-name"><?= esc($user['name'] ?? 'User') ?></span>
</div>
<div class="header-icons">
<i class="fas fa-bell"></i>
<i class="fas fa-user-circle"></i>
</div>
</div>
<div class="search-container">
<div class="search-box">
<input type="text" placeholder="Search...">
<div class="search-icon">
<i class="fas fa-search"></i>
</div>
</div>
</div>
<div class="dashboard-container">
<?php
$active_menu = 'account';
echo view('dashboard_sidebar', ['active_menu' => $active_menu]);
?>
<div class="main-content">
<div class="content-header">
<h1 class="content-title">Account & Settings</h1>
<div class="tabs">
<div class="tab <?= ($active_tab ?? 'my_details') === 'my_details' ? 'active' : '' ?>">
My Details
</div>
<div class="tab <?= ($active_tab ?? '') === 'profile' ? 'active' : '' ?>">
Profile
</div>
<div class="tab <?= ($active_tab ?? '') === 'password' ? 'active' : '' ?>">
Password
</div>
</div>
</div>
<div class="content-section">
<div class="profile-section">
<div class="profile-left">
<h3 class="section-title">Basic Details</h3>
<div class="profile-picture">
<div class="profile-avatar">
<i class="fas fa-user"></i>
</div>
<button class="change-btn">Change</button>
</div>
<div class="form-group">
<label class="form-label">First Name</label>
<input type="text" class="form-control" value="<?= esc($user['first_name'] ?? 'Ashley Margaux') ?>" id="firstName">
<div class="form-actions">
<button class="btn-save" onclick="saveField('firstName')">Save</button>
</div>
</div>
<div class="form-group">
<label class="form-label">Last Name</label>
<input type="text" class="form-control" value="<?= esc($user['last_name'] ?? 'Value') ?>" id="lastName">
<div class="form-actions">
<button class="btn-edit" onclick="editField('lastName')">Edit</button>
</div>
</div>
</div>
<div class="profile-right">
<h3 class="section-title">Public Profile</h3>
<div class="toggle-setting">
<div class="toggle-info">
<h4>Make Contact Information Public</h4>
<p>Anyone can see your profile.</p>
</div>
<label class="toggle-switch">
<input type="checkbox" id="publicProfile">
<span class="slider"></span>
</label>
</div>
</div>
</div>
</div>
<div class="content-section">
<h3 class="section-title">Delete Profile</h3>
<div class="delete-warning">
<p>Deleting your account will remove all data. This is irreversible.</p>
<button class="btn-delete" onclick="confirmDelete()">Delete Account</button>
</div>
</div>
</div>
</div>
<script>
function saveField(fieldId) {
const value = document.getElementById(fieldId).value;
// Add AJAX call to save data
alert('Saving ' + fieldId + ': ' + value);
}
function editField(fieldId) {
const input = document.getElementById(fieldId);
input.focus();
input.select();
}
function confirmDelete() {
if (confirm('Are you sure you want to delete your account? This action cannot be undone.')) {
// Submit delete form
window.location.href = '<?= base_url('dashboard/delete') ?>';
}
}
</script>
</body>
</html>