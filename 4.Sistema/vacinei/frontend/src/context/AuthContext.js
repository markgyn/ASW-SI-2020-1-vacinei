import React, { useCallback, useEffect, useState } from 'react'

const VACINEI_AUTH_LOCAL_STORAGE_KEY = 'vacinei_auth'

const AuthStateContext = React.createContext('Auth')
const AuthDispatchContext = React.createContext('Auth')



const AuthProvider = ({ children }) => {
    const [auth, setAuth] = useState(JSON.parse(localStorage.getItem(VACINEI_AUTH_LOCAL_STORAGE_KEY)) || {})

    const updateAuth = useCallback(newState => {
        localStorage.setItem(VACINEI_AUTH_LOCAL_STORAGE_KEY, JSON.stringify(newState))
        setAuth(newState)
    }, [])

    return (
        <AuthStateContext.Provider value={auth}>
            <AuthDispatchContext.Provider value={updateAuth}>
                {children}
            </AuthDispatchContext.Provider>
        </AuthStateContext.Provider>
    )
}

function useAuthState() {
    const context = React.useContext(AuthStateContext)
    if (context === undefined) {
        throw new Error('useAuthState must be used within a AuthProvider')
    }
    return context
}

function useAuthDispatch() {
    const context = React.useContext(AuthDispatchContext)
    if (context === undefined) {
        throw new Error('useAuthDispatch must be used within a AuthProvider')
    }
    return context
}

function useAuth() {
    return [useAuthState(), useAuthDispatch()]
}

export {
    AuthProvider,
    useAuthState,
    useAuthDispatch,
    useAuth
}