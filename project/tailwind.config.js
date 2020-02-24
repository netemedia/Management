const {colors} = require('tailwindcss/defaultTheme')

module.exports = {
    theme   : {
        colors   : {
            black  : colors.black,
            white  : colors.white,
            gray   : colors.gray,
            red    : colors.red,
            orange : colors.orange,
            yellow : colors.yellow,
            green  : colors.green,
            teal   : colors.teal,
            blue   : colors.blue,
            indigo : colors.indigo,
            purple : colors.purple,
            pink   : colors.pink,
            modalbg: 'rgba(0, 0, 0, 0.25)',
        },
        gradients: theme => ({
            'grays'  : [theme('colors.gray.600'), theme('colors.gray.400')],
            'reds'   : [theme('colors.red.600'), theme('colors.red.400')],
            'oranges': [theme('colors.orange.600'), theme('colors.orange.400')],
            'yellows': [theme('colors.yellow.600'), theme('colors.yellow.400')],
            'greens' : [theme('colors.green.600'), theme('colors.green.400')],
            'teals'  : [theme('colors.teal.600'), theme('colors.teal.400')],
            'blues'  : [theme('colors.blue.600'), theme('colors.blue.400')],
            'indigos': [theme('colors.indigo.600'), theme('colors.indigo.400')],
            'purples': [theme('colors.purple.600'), theme('colors.purple.400')],
            'pinks'  : [theme('colors.pink.600'), theme('colors.pink.400')],
        })
    },
    variants: {
        gradients: ['responsive', 'hover'],
    },
    plugins : [
        require('./plugins/gradients')
    ],
}
