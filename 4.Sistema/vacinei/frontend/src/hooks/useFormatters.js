export default function useFormatters() {
    function percent(value, locale = 'pt-BR') {
        return new Intl.NumberFormat(locale, { style: 'percent', maximumFractionDigits: 2, signDisplay: 'always' }).format(value);
    }

    function number(value, locale = 'pt-BR') {
        return new Intl.NumberFormat(locale, { maximumFractionDigits: 2, useGrouping: false }).format(value)
    }


    function isoDate(date) {
        let isoDateString = date.toISOString()
        let tPosition = isoDateString.indexOf('T')
        return isoDateString.substring(0, tPosition);
    }

    function intToMoth(monthInteger) {
        return {
            '0': 'Jan',
            '1': 'Fev',
            '2': 'Mar',
            '3': 'Abr',
            '4': 'Mai',
            '5': 'Jun',
            '6': 'Jul',
            '7': 'Ago',
            '8': 'Set',
            '9': 'Out',
            '10': 'Nov',
            '11': 'Dez',
        }[monthInteger] || ''
    }

    return {
        percent,
        number,
        isoDate,
        intToMoth
    }
}