import React, { useCallback, useEffect, useState } from 'react'

import { Col, Table, Card } from 'react-bootstrap'
import Layout from 'components/Layout'
import VaccineForm from 'components/business/Vaccine/VaccineForm'

import useAxios from 'hooks/useAxios'
import useVaccineRequests from 'hooks/useVaccineRequests'

import { VACCINE } from 'api/constants/routes'
import useFormatters from 'hooks/useFormatters'

const Vaccines = () => {

    const [vaccines, setVaccines] = useState([])
    const axios = useAxios()
    const { isoDate, intToMoth } = useFormatters()
    const { get } = useVaccineRequests()

    const fetchVaccines = useCallback(() => {
        get()
            .then(res => {
                setVaccines(res.data.map(vaccine => {
                    const date = new Date(vaccine.availabilityDate)
                    return {
                        name: vaccine.vaccineName,
                        month: intToMoth(date.getMonth()),
                        year: date.getFullYear()
                    }
                }))
            })
    }, [axios])

    const createVaccine = useCallback(({ name, month, year }) => {
        axios.post(VACCINE, {
            name,
            availabilityDate: isoDate(new Date(year, month, 15))
        })
            .then(res => {
                const date = new Date(res.data.availabilityDate)
                const newVaccine = {
                    name: res.data.name,
                    month: intToMoth(date.getMonth()),
                    year: date.getFullYear()
                }
                console.log(vaccines)
                const newList = [newVaccine, ...vaccines]
                setVaccines(newList)
            })
    }, [axios, vaccines])

    useEffect(() => {
        fetchVaccines()
    }, [])

    return <Layout>
        <Col>
            <h2>Vacinas</h2>
            <Table hover>
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Vacina</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    {vaccines.map(vaccine =>
                        <tr>
                            <td>{vaccine.month}/{vaccine.year}</td>
                            <td>{vaccine.name}</td>
                            <td><a href="#">Editar</a> <a href="#">Apagar</a></td>
                        </tr>
                    )}
                </tbody>
            </Table>
        </Col>
        <Col xs={{ span: 5 }}>
            <Card>
                <Card.Body>
                    <Card.Title>Cadastre uma Vacina</Card.Title>
                    <VaccineForm onSubmit={createVaccine} />
                </Card.Body>
            </Card>
        </Col>
    </Layout>
}

export default Vaccines