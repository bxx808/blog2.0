<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Панель/
Breadcrumbs::for('admin.index', function (BreadcrumbTrail $trail) {
    $trail->push('Панель', route('admin.index'));
});
// Панель/Категории
Breadcrumbs::for('admin.category.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push('Категории', route('admin.category.index'));
});
// Панель/Категории/Корзина
Breadcrumbs::for('admin.category.trash', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.category.index');
    $trail->push('Корзина', route('admin.category.trash'));
});
