import React, { useCallback, useState } from 'react'
import { useAuth } from 'context/AuthContext'
import { Link, useHistory } from 'react-router-dom'
import { Button, Card, Col, Container, Form, FormGroup, Input, Row } from 'react-bootstrap'
import useAxios from 'hooks/useAxios'
import { USER } from 'api/constants/routes'

const Login = () => {

    const history = useHistory()
    const [auth, authDispatch] = useAuth()
    const axios = useAxios()

    const [username, setUsername] = useState('')
    const [password, setPassword] = useState('')

    const login = useCallback(event => {
        event.preventDefault()
        axios.get(USER, {
            headers: {
                'Authorization': `Basic ${btoa(username + ':' + password)}`
            }
        }).then(res => {
            authDispatch({
                authenticated: true,
                username,
                password
            })
            history.push('/')
        })
    }, [username, password, authDispatch, history, axios])

    return (
        <Container className="h-100" fluid style={{ backgroundColor: '#f2f5fa' }}>
            <Row className="h-100 pb-5">
                <Col className="align-self-center mb-5" xs={{ span: 2, offset: 5 }}>
                    <Card className="text-right my-auto">
                        <Card.Body>
                            <h3 className="text-center mb-5">VACINEI</h3>
                            <Form onSubmit={e => login(e)}>
                                <Form.Group>
                                    <Form.Control
                                        placeholder="Usuário"
                                        onChange={event => setUsername(event.target.value)}
                                    />
                                </Form.Group>
                                <Form.Group>
                                    <Form.Control
                                        type="password"
                                        placeholder="Senha"
                                        onChange={event => setPassword(event.target.value)}
                                    />
                                </Form.Group>
                                <Form.Group>
                                    <Link to="/auth/recovery">Esqueci minha senha</Link>
                                </Form.Group>
                                <div className="d-flex justify-content-between mt-5">
                                    <Button outline>Cadastrar</Button>
                                    <Button variant="primary" type="submit">Entrar</Button>
                                </div>
                            </Form>
                        </Card.Body>
                    </Card>
                </Col>
            </Row>
        </Container>
    )
}

export default Login