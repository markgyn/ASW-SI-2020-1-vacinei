import React from 'react'

import Header from 'components/Header'
import { Container, Row } from 'react-bootstrap'

const Layout = ({ children }) => {
    return (
        <>
            <Header />
            <Container>
                <Row style={{ paddingTop: '7rem' }}>
                    {children}
                </Row>
            </Container>
        </>
    )
}

export default Layout