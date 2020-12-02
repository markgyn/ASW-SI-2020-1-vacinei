import React, { useCallback, useEffect, useState } from 'react'

import { Button, Row, Col, Form } from 'react-bootstrap'

import useVaccineRequests from 'hooks/useVaccineRequests'

const ScheduleForm = ({ onSubmit, onCancel }) => {

    const [vaccine, setVaccine] = useState('')
    const [month, setMonth] = useState('')
    const [year, setYear] = useState('')
    const [location, setLocation] = useState('')
    const [vaccines, setVaccines] = useState([])

    const { available } = useVaccineRequests()

    const handleSubmit = useCallback(event => {
        event.preventDefault()
        onSubmit({ vaccine, month, year, location })
    }, [vaccine, month, year, location, onSubmit])

    useEffect(() => {
        available().then(res => {
            setVaccines(res.data.map(vaccine => ({
                name: vaccine.vaccineName,
                id: vaccine.id
            })))
        })
    }, [])

    return (
        <Form onSubmit={handleSubmit}>
            <Form.Group>
                <Form.Label>Vacina</Form.Label>
                <Form.Control
                    as="select"
                    defaultValue="Escolher"
                    onChange={event => setVaccine(event.target.value)}
                >
                    <option hidden>Escolher</option>
                    {vaccines.map(vaccine => <option value={vaccine.id}>{vaccine.name}</option>)}
                </Form.Control>
            </Form.Group>
            <Form.Group>
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
                <Form.Label>Local</Form.Label>
                <Form.Control
                    placeholder="Endereço"
                    onChange={event => setLocation(event.target.value)}
                />
            </Form.Group>
            <div className="d-flex justify-content-end">
                <Button
                    className="mr-2"
                    variant="secondary"
                    onClick={onCancel}
                >
                    Cancelar
                </Button>
                <Button
                    variant="primary"
                    type="submit"
                >
                    Agendar
                </Button>
            </div>
        </Form>
    )
}

export default ScheduleForm