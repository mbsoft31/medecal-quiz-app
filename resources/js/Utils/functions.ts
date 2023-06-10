import React, {useState} from "react";
import ziggyRoute from "ziggy-js";

function classNames(...classes: string[]) {
    return classes.filter(Boolean).join(' ')
}

function getCookie(name :string|undefined) {
    const value: string = `; ${document.cookie}`
    const parts: string[] = value.split(`; ${name}=`)
    if (parts && parts.length === 2) {
        // @ts-ignore
        return parts ? parts.pop().split(';').shift() : undefined
    }
}

function setCookie(name: string, value: string, days: number) {
    let expires = ''
    if (days) {
        const date = new Date()
        date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000)
        expires = `; expires=${date.toUTCString()}`
    }
    document.cookie = `${name}=${value || ''}${expires}; path=/`
}

function deleteCookie(name: string) {
    document.cookie = `${name}=; Max-Age=-99999999;`
}

// @ts-ignore
const useRolePermissions = (props) => {
    let role: object = { name: '', guard_name: '' };
    type Role = typeof role;
    let permission: object = { name: '', guard_name: ''};
    type Permission = typeof permission;

    const [roles, _]: [Role[], React.Dispatch<any>] = useState(props.roles);
    const [permissions, __]: [Permission[], React.Dispatch<any>] = useState(props.permissions);

    const hasRole = (roleName: string) => {
        // @ts-ignore
        return roles.some((role) => role.name === roleName);
    };

    const hasPermission = (permissionName: string) => {
        // @ts-ignore
        return permissions.some((permission) => permission.name === permissionName);
    };

    return { hasRole, hasPermission };
};


export { classNames, useRolePermissions }
