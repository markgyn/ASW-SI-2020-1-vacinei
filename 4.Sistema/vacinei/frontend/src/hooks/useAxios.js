import React from 'react'
import axios from 'axios'

import { useAuthState } from 'context/AuthContext'

import { BASE_URL } from 'api/constants/routes'

export default function useAxios() {
    const { authenticated, username, password } = useAuthState()

    let Authorization
    if (authenticated) {
        Authorization = `Basic ${btoa(`${username}:${password}`)}`
    }

    return React.useMemo(() => axios.create({
        baseURL: BASE_URL,
        headers: {
            Authorization
        }
    }), [Authorization])
}