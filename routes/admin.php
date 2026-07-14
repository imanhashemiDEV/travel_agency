<?php


use Illuminate\Support\Facades\Route;

Route::livewire('/', 'admin::panel.index')->name('admin.panel.index');
Route::livewire('/users', 'admin::users.list')->middleware('role:مدیر کل|مدیر کاربران')->name('admin.users.list');
Route::livewire('/user_create', 'admin::users.create')->name('admin.users.create');
Route::livewire('/user_edit/{user}', 'admin::users.edit')->name('admin.users.edit');
Route::livewire('/roles', 'admin::roles.list')->name('admin.roles.list');
Route::livewire('/user_roles/{user}', 'admin::users.user_roles')->name('admin.users.user_roles');
