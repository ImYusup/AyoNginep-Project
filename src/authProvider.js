import React from 'react';
import { AUTH_LOGIN, AUTH_LOGOUT, AUTH_ERROR, AUTH_CHECK } from 'react-admin';

export default (type, params) => {

    if (type === AUTH_LOGIN) {
        const { username, password } = params;
        //console.log('***************', params)
        const request = new Request('http://192.168.100.10:8000/oauth/token', {
            method: 'POST',
            body: JSON.stringify({
                email: username,
                password: password,
                client_id: 6,
                //client_secret: 'WtkGX4tzOvD1JfA60Bj0Bwm79DZmvXzUsrJ3lrhJ',
                client_secret: 'aOdgptR0Tn611CA2O2mHSKpcC7s23dYNomK7191W',
                grant_type: 'password',
                newProvider: 'admin'
            }),
            headers: new Headers({ 'Content-Type': 'application/json' }),
        })
        //console.log('=================', request)
        return fetch(request)
            .then(response => {
                if (response.status < 200 || response.status >= 300) {
                    throw new Error(response.statusText);
                }
                return response.json();
            })
            .then((token) => {
                //console.log('----------',token)
                localStorage.setItem('token', token.access_token);
            });
    }
    return Promise.resolve();

    if (type === AUTH_LOGOUT) {
        localStorage.removeItem('token');
        return Promise.resolve();
    }
    return Promise.resolve();

    if (type === AUTH_ERROR) {
        const status = params.status;
        if (status === 401 || status === 403) {
            localStorage.removeItem('token');
            return Promise.reject();
        }
        return Promise.resolve();
    }
    return Promise.resolve();


    if (type === AUTH_CHECK) {
        return localStorage.getItem('token') ? Promise.resolve() : Promise.reject();
    }
    return Promise.reject('Unkown method')
};
