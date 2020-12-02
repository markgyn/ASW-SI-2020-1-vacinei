import React from 'react'
import { Switch, Route, NavLink, Redirect, useLocation, useRouteMatch, Router } from 'react-router-dom';

import AuthorizedRoute from 'components/auth/AuthorizedRoute'

import AuthIndex from 'pages/auth'
import Schedules from 'pages/schedules/schedules';
import VaccineCard from 'pages/vaccine-card';
import Vaccines from 'pages/vaccines/vaccines';

const Index = () => {

    return (
        <Switch>
            <Route path="/auth">
                <AuthIndex />
            </Route>
            <AuthorizedRoute exact path="/">
                <Schedules />
            </AuthorizedRoute>
            <AuthorizedRoute exact path="/vaccines">
                <Vaccines />
            </AuthorizedRoute>
            <AuthorizedRoute exact path="/vaccine-card">
                <VaccineCard />
            </AuthorizedRoute>
            <AuthorizedRoute exact path="*">
                <Redirect to="/" />
            </AuthorizedRoute>
        </Switch>
    )
}

export default Index