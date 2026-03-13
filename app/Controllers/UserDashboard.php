<?php
namespace App\Controllers;

class UserDashboard extends BaseController
{
    public function index()
    {
        // Load the view and pass data if needed
        return view('dashboard');
    }

    public function updateProfile()
    {
        // Logic for updating profile goes here
    }

    public function deleteAccount()
    {
        // Logic for deleting account goes here
    }
}