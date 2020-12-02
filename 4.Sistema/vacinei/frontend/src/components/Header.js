import React, { useCallback, useState } from 'react'
import { Link, useHistory, useRouteMatch } from 'react-router-dom'

import styled from 'styled-components';

import {
    Navbar,
    Nav
} from 'react-bootstrap';
import { useAuthDispatch } from 'context/AuthContext';


const VacineiNavbar = styled(Navbar)`border-bottom: 1px solid lightgrey;`

const Header = () => {
    const authDispatch = useAuthDispatch()
    const history = useHistory()

    const logout = () => {
        authDispatch({})
        history.push('/auth/login')
    }

    return (
        <VacineiNavbar color="light" light expand="md" >
            <Navbar.Brand href="#">Vacinei</Navbar.Brand>
            <Navbar.Collapse className="justify-content-between">
                <Nav>
                    <Link active={useRouteMatch('/')} to="/">Agendamentos</Link>
                    <Link active={useRouteMatch('/vaccine-card')} to="/vaccine-card">Cartão de Vacinas</Link>
                    <Link active={useRouteMatch('/vaccines')} to="/vaccines">Vacinas</Link>
                </Nav>
                <Nav>
                    <Navbar.Text style={{ cursor: 'pointer' }} className="px-2" onClick={logout}>Logout</Navbar.Text>
                </Nav>
            </Navbar.Collapse>
        </VacineiNavbar>
    )

}

export default Header