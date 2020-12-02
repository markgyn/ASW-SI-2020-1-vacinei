import React from 'react'

import { Switch, Route, useRouteMatch, Redirect } from 'react-router-dom'

import Login from 'pages/auth/login'

const AuthIndex = () => {
    const { path } = useRouteMatch()
    return (
        <Switch>
            <Route exact path={`${path}/login`}><Login /></Route>
            <Route exact path={path}><Redirect to={`${path}/login`} /></Route>
        </Switch>
    )
}

export default AuthIndex