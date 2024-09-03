<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', url('home'));
});

// Home > listSurat
Breadcrumbs::for('listSurat', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('List Surat', url('surat/listSurat'));
});
// Home > petunjukAwal
Breadcrumbs::for('petunjukAwal', function (BreadcrumbTrail $trail) {
    $trail->parent('listSurat');
    $trail->push('Petunjuk Awal', url('surat/petunjukAwal?formSuratId='. request()->formSuratId));
});

// Home > user
Breadcrumbs::for('user', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('User', url('master/user'));
});

// Home > pengaturan
Breadcrumbs::for('pengaturan', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Pengaturan', url('setting/pengaturan'));
});
// Home > menu
Breadcrumbs::for('menu', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Menu', url('setting/menu'));
});
// Home > permissions
Breadcrumbs::for('permissions', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Permission', url('setting/permissions'));
});
