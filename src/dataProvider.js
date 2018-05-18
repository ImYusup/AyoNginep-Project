import { stringify } from 'query-string';
import {
    GET_LIST,
    GET_ONE,
    GET_MANY,
    GET_MANY_REFERENCE,
    CREATE,
    UPDATE,
    DELETE,
    fetchUtils,
} from 'react-admin';

const API_URL = 'http://192.168.100.10:8000/api';

/**
 * @param {String} type One of the constants appearing at the top if this file, e.g. 'UPDATE'
 * @param {String} resource Name of the resource to fetch, e.g. 'posts'
 * @param {Object} params The Data Provider request params, depending on the type
 * @returns {Object} { url, options } The HTTP request parameters
 */
const convertDataProviderRequestToHTTP = (type, resource, params) => {

    const token = localStorage.getItem('token');

    const options = {
        headers: new Headers({
            Accept: 'application/json'
        }),
    };

    switch (type) {
        case GET_LIST: {

            const { page, perPage } = params.pagination;
            const { field, order } = params.sort;
            const query = {
                sort: JSON.stringify([field, order]),
                range: JSON.stringify([(page - 1) * perPage, page * perPage - 1]),
                filter: JSON.stringify(params.filter),
            };

            return {
                url: `${API_URL}/${resource}`,
                options: {
                    user: {
                        authenticated: true,
                        token: `Bearer ${token}`
                    }
                }
            };
        }
        case GET_ONE:
            return {
                url: `${API_URL}/admins/${resource}/${params.id}`,
                options: {
                    user: {
                        authenticated: true,
                        token: `Bearer ${token}`
                    }
                }
            };
        case GET_MANY: {
            const query = {
                filter: JSON.stringify({ id: params.ids }),
            };
            return { url: `${API_URL}/admins/${resource}?${stringify(query)}` };
        }
        case GET_MANY_REFERENCE: {
            const { page, perPage } = params.pagination;
            const { field, order } = params.sort;
            const query = {
                sort: JSON.stringify([field, order]),
                range: JSON.stringify([(page - 1) * perPage, (page * perPage) - 1]),
                filter: JSON.stringify({ ...params.filter, [params.target]: params.id }),
            };
            return { url: `${API_URL}/${resource}?${stringify(query)}` };
        }
        case UPDATE:
    
            return {
                url: `${API_URL}/admins/${resource}/${params.id}`,
                options: {
                    method: 'PUT', body: JSON.stringify(params.data),
                    user: {
                        authenticated: true,
                        token: `Bearer ${token}`
                    }

                },
            };

        case CREATE:
            return {
                url: `${API_URL}/admins/${resource}`,
                options: { method: 'POST', body: JSON.stringify(params.data) },
            };
        case DELETE:
            return {
                url: `${API_URL}/admins/${resource}/${params.id}`,
                options: { method: 'DELETE' },
            };
        default:
            throw new Error(`Unsupported fetch action type ${type}`);
    }
};

/**
 * @param {Object} response HTTP response from fetch()
 * @param {String} type One of the constants appearing at the top if this file, e.g. 'UPDATE'
 * @param {String} resource Name of the resource to fetch, e.g. 'posts'
 * @param {Object} params The Data Provider request params, depending on the type
 * @returns {Object} Data Provider response
 */
const convertHTTPResponseToDataProvider = (response, type, resource, params) => {
    const { headers, json } = response;
    switch (type) {
        case GET_LIST:
            return {
                data: json.map(x => x),
                total: json.length,
            };

        case GET_ONE:
            return { data: json[0] };
        case CREATE:
            console.log(params.data)
            return { data: { ...params.data, id: json.id } };
        case UPDATE:
            // console.log('===========',json)
            return {data:  { ...params.data, id: Date.now() }}
        case DELETE:
            console.log('*************', json)
            return { data: { ...params.data, id: Date.now() } };
        default:
            return { data:json };
    }
};

/**
 * @param {string} type Request type, e.g GET_LIST
 * @param {string} resource Resource name, e.g. "posts"
 * @param {Object} payload Request parameters. Depends on the request type
 * @returns {Promise} the Promise for response
 */
export default (type, resource, params) => {
    const { fetchJson } = fetchUtils;
    const { url, options } = convertDataProviderRequestToHTTP(type, resource, params);
    return fetchJson(url, options)
        .then(response => convertHTTPResponseToDataProvider(response, type, resource, params));
};