import React, { useContext } from 'react'
import { Redirect, Route } from 'react-router'

import { useAuthState } from 'context/AuthContext'

const AuthorizedRoute = ({ children, ...props }) => {

    const { authenticated } = useAuthState()
    console.log(authenticated)
    return (
        <Route {...props}>
            {!authenticated ? <Redirect to="/auth" /> : children}
        </Route>
    )
}

export default AuthorizedRoute