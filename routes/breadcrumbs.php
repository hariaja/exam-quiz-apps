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

// levels Breadcrumbs
Breadcrumbs::for('levels.index', function (BreadcrumbTrail $trail) {
  $trail->parent('home');
  $trail->push(trans('page.levels.index'), route('levels.index'));
});

Breadcrumbs::for('levels.create', function (BreadcrumbTrail $trail) {
  $trail->parent('levels.index');
  $trail->push(trans('page.levels.create'), route('levels.create'));
});

Breadcrumbs::for('levels.edit', function (BreadcrumbTrail $trail, $level) {
  $trail->parent('levels.index');
  $trail->push(trans('page.levels.edit'), route('levels.edit', $level->uuid));
});

Breadcrumbs::for('levels.show', function (BreadcrumbTrail $trail, $level) {
  $trail->parent('levels.index');
  $trail->push(trans('page.levels.show'), route('levels.show', $level->uuid));
});

// lessons Breadcrumbs
Breadcrumbs::for('lessons.index', function (BreadcrumbTrail $trail) {
  $trail->parent('home');
  $trail->push(trans('page.lessons.index'), route('lessons.index'));
});

Breadcrumbs::for('lessons.create', function (BreadcrumbTrail $trail) {
  $trail->parent('lessons.index');
  $trail->push(trans('page.lessons.create'), route('lessons.create'));
});

Breadcrumbs::for('lessons.edit', function (BreadcrumbTrail $trail, $lesson) {
  $trail->parent('lessons.index');
  $trail->push(trans('page.lessons.edit'), route('lessons.edit', $lesson->uuid));
});

Breadcrumbs::for('lessons.show', function (BreadcrumbTrail $trail, $lesson) {
  $trail->parent('lessons.index');
  $trail->push(trans('page.lessons.show'), route('lessons.show', $lesson->uuid));
});

// categories Breadcrumbs
Breadcrumbs::for('categories.index', function (BreadcrumbTrail $trail) {
  $trail->parent('home');
  $trail->push(trans('page.categories.index'), route('categories.index'));
});

Breadcrumbs::for('categories.create', function (BreadcrumbTrail $trail) {
  $trail->parent('categories.index');
  $trail->push(trans('page.categories.create'), route('categories.create'));
});

Breadcrumbs::for('categories.edit', function (BreadcrumbTrail $trail, $category) {
  $trail->parent('categories.index');
  $trail->push(trans('page.categories.edit'), route('categories.edit', $category->uuid));
});

Breadcrumbs::for('categories.show', function (BreadcrumbTrail $trail, $category) {
  $trail->parent('categories.index');
  $trail->push(trans('page.categories.show'), route('categories.show', $category->uuid));
});

// questions Breadcrumbs
Breadcrumbs::for('questions.index', function (BreadcrumbTrail $trail) {
  $trail->parent('home');
  $trail->push(trans('page.questions.index'), route('questions.index'));
});

Breadcrumbs::for('questions.create', function (BreadcrumbTrail $trail) {
  $trail->parent('questions.index');
  $trail->push(trans('page.questions.create'), route('questions.create'));
});

Breadcrumbs::for('questions.edit', function (BreadcrumbTrail $trail, $question) {
  $trail->parent('questions.index');
  $trail->push(trans('page.questions.edit'), route('questions.edit', $question->uuid));
});

Breadcrumbs::for('questions.show', function (BreadcrumbTrail $trail, $question) {
  $trail->parent('questions.index');
  $trail->push(trans('page.questions.show'), route('questions.show', $question->uuid));
});
