<?php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
  $trail->push(trans('page.overview.title'), route('home'));
});

// Roles Breadcrumbs
Breadcrumbs::for('roles.index', function (BreadcrumbTrail $trail) {
  $trail->parent('home');
  $trail->push(trans('page.roles.index'), route('roles.index'));
});

Breadcrumbs::for('roles.create', function (BreadcrumbTrail $trail) {
  $trail->parent('roles.index');
  $trail->push(trans('page.roles.create'), route('roles.create'));
});

Breadcrumbs::for('roles.edit', function (BreadcrumbTrail $trail, $role) {
  $trail->parent('roles.index');
  $trail->push(trans('page.roles.edit'), route('roles.edit', $role->uuid));
});

Breadcrumbs::for('roles.show', function (BreadcrumbTrail $trail, $role) {
  $trail->parent('roles.index');
  $trail->push(trans('page.roles.show'), route('roles.show', $role->uuid));
});

// users Breadcrumbs
Breadcrumbs::for('users.index', function (BreadcrumbTrail $trail) {
  $trail->parent('home');
  $trail->push(trans('page.users.index'), route('users.index'));
});

Breadcrumbs::for('users.create', function (BreadcrumbTrail $trail) {
  $trail->parent('users.index');
  $trail->push(trans('page.users.create'), route('users.create'));
});

Breadcrumbs::for('users.edit', function (BreadcrumbTrail $trail, $user) {
  $trail->parent('users.index');
  $trail->push(trans('page.users.edit'), route('users.edit', $user->uuid));
});

Breadcrumbs::for('users.show', function (BreadcrumbTrail $trail, $user) {
  $trail->parent('users.index');
  $trail->push(trans('page.users.show'), route('users.show', $user->uuid));
});
