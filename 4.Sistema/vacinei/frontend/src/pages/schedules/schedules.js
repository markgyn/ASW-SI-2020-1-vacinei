import React, { useCallback, useEffect, useState } from 'react'

import { Col, Table, Button } from 'react-bootstrap'
import Layout from 'components/Layout'
import ScheduleModal from 'components/business/Schedule/ScheduleModal'

import useAxios from 'hooks/useAxios'
import useFormatters from 'hooks/useFormatters'

import { SCHEDULE } from 'api/constants/routes'

const Schedules = () => {

    const [schedules, setSchedules] = useState([])
    const [history, setHistory] = useState([])

    const [show, setShow] = useState(false);

    const handleClose = () => setShow(false);
    const handleShow = () => setShow(true);

    const axios = useAxios()
    const { isoDate, intToMoth } = useFormatters()

    const scheduleDataToObject = useCallback(schedule => {
        const date = new Date(schedule.scheduleDate)
        return {
            id: schedule.id,
            vaccineName: schedule.vaccineName,
            month: intToMoth(date.getMonth()),
            year: date.getFullYear(),
            location: schedule.location
        }
    }, [])

    const fetchSchedules = useCallback(() => {
        axios.get(SCHEDULE)
            .then(res => {
                const future = []
                const past = []

                res.data.forEach(schedule => {
                    const scheduleDate = new Date(schedule.scheduleDate)
                    const now = new Date()
                    if (now >= scheduleDate) {
                        past.push(scheduleDataToObject(schedule))
                    } else {
                        future.push(scheduleDataToObject(schedule))
                    }
                })

                setSchedules(future)
                setHistory(past)
            })
    }, [axios, scheduleDataToObject])

    const scheduleVaccine = useCallback(({ vaccine, month, year, location }) => {
        axios.post(SCHEDULE, {
            vaccineId: vaccine,
            scheduleDate: isoDate(new Date(year, month, 15)),
            location
        })
            .then(res => {
                const date = new Date(res.data.scheduleDate)
                const newSchedule = scheduleDataToObject(res.data)
                if (new Date() >= date) {
                    setHistory([newSchedule, ...history])
                } else {
                    setSchedules([newSchedule, ...schedules])
                }
            })
            .finally(() => handleClose())
    }, [axios, schedules, history, scheduleDataToObject])

    useEffect(() => {
        fetchSchedules()
    }, [])

    return <Layout>
        <Col>
            <Button onClick={handleShow}>Agendar Vacina</Button>
            <h2>Pendentes</h2>
            <Table hover>
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Vacina</th>
                        <th>Local</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    {schedules.map(schedule =>
                        <tr key={schedule.id}>
                            <td>{schedule.month}/{schedule.year}</td>
                            <td>{schedule.vaccineName}</td>
                            <td>{schedule.location}</td>
                            <td><a href="#">Editar</a> <a href="#">Apagar</a></td>
                        </tr>
                    )}
                </tbody>
            </Table>
        </Col>
        <Col xs={{ span: 4 }}>
            <h2>Histórico</h2>
            <Table hover>
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Vacina</th>
                        <th>Local</th>
                    </tr>
                </thead>
                <tbody>
                    {history.map(schedule =>
                        <tr key={schedule.id}>
                            <td>{schedule.month}/{schedule.year}</td>
                            <td>{schedule.vaccineName}</td>
                            <td>{schedule.location}</td>
                        </tr>
                    )}
                </tbody>
            </Table>
        </Col>
        <ScheduleModal isOpen={show} onSubmit={scheduleVaccine} onCancel={() => handleClose()} />
    </Layout>
}

export default Schedules