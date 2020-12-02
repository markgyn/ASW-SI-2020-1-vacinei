import { useCallback } from 'react'
import useAxios from 'hooks/useAxios'

import { VACCINE, AVAILABLE_VACCINES } from 'api/constants/routes.js'

function useVaccineRequests() {
    const axios = useAxios()

    const getMemo = useCallback(
        function get() {
            return axios.get(VACCINE)
        }, [axios])

    const availableMemo = useCallback(
        function available() {
            return axios.get(AVAILABLE_VACCINES)
        }, [axios])

    return {
        get: getMemo,
        available: availableMemo
    }
}

export default useVaccineRequests