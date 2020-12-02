import React, { useCallback, useState } from 'react'

import { Modal } from 'react-bootstrap'

import ScheduleForm from 'components/business/Schedule/ScheduleForm'

const ScheduleModal = ({ isOpen, onSubmit, onCancel }) => {
    return (
        <Modal show={isOpen} onHide={onCancel}>
            <Modal.Header closeButton>
                <Modal.Title>Agendar Vacina</Modal.Title>
            </Modal.Header>
            <Modal.Body>
                <ScheduleForm onCancel={onCancel} onSubmit={onSubmit} />
            </Modal.Body>
        </Modal>
    )
}

export default ScheduleModal