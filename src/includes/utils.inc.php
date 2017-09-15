<?php

function hasAdminRole($role) {
    return $role == 'ADMIN';
}

function hasUserRole($role) {
    return $role == 'USER';
}

function hasSystemRole($role) {
    return $role == 'SYSTEM';
}

function hasAdminOrSystemRole($role) {
    return $role == 'ADMIN' || $role == 'SYSTEM';
}