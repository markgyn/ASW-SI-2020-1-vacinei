import React, { useCallback, useState } from 'react'

import { Row, Col, Form, Button, } from 'react-bootstrap'

const VaccineForm = ({ onSubmit }) => {

    const [name, setName] = useState('')
    const [month, setMonth] = useState('')
    const [year, setYear] = useState('')

    const handleSubmit = useCallback(event => {
        event.preventDefault()
        onSubmit({ name, month, year })
    }, [name, month, year, onSubmit])

    return (
        <Form onSubmit={handleSubmit}>
            <Form.Group>
                <Form.Control
                    placeholder="Nome"
                    value={name}
                    onChange={event => setName(event.target.value)}
                />
            </Form.Group>
            <Form.Group>
                <Form.Label>Disponibilidade</Form.Label>
                <Row>
                    <Col>
                        <Form.Control
                            as="select"
                            defaultValue="Mês"
                            onChange={event => setMonth(event.target.value)}
                        >
                            <option hidden>Mês</option>
                            <option value="0">Janeiro</option>
                            <option value="1">Fevereiro</option>
                            <option value="2">Março</option>
                            <option value="3">Abril</option>
                            <option value="4">Maio</option>
                            <option value="5">Jun</option>
                            <option value="6">Julho</option>
                            <option value="7">Agosto</option>
                            <option value="8">Setembro</option>
                            <option value="9">Outubro</option>
                            <option value="10">Novembro</option>
                            <option value="11">Dezembro</option>
                        </Form.Control>
                    </Col>
                    <Col>
                        <Form.Control
                            as="select"
                            defaultValue="Ano"
                            onChange={event => setYear(event.target.value)}
                        >
                            <option hidden>Ano</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                        </Form.Control>
                    </Col>
                </Row>
            </Form.Group>
            <Form.Group>
            </Form.Group>
            <div className="d-flex justify-content-end">
                <Button type="submit" outline>Cadastrar</Button>
            </div>
        </Form>
    )
}

export default VaccineForm