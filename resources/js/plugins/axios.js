import axios from 'axios'

export const baseURL = import.meta.env.VITE_HOST_URL


const instance = axios.create({
    baseURL: baseURL + "api",
    timeout: 100000,
    headers: {
        "common": {
            "X-Requested-With": "XMLHttpRequest",
            "Access-Control-Allow-Origin": "*",
        },
        "Accept": "application/json",

    }
});



export default instance