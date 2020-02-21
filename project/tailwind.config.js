module.exports = {
    theme   : {
        gradients: theme => ({
            'blues' : [theme('colors.blue.700'), theme('colors.blue.400')],
            'greens': [theme('colors.green.700'), theme('colors.green.400')],
            'reds': [theme('colors.red.700'), theme('colors.red.400')],
            'oranges': [theme('colors.orange.700'), theme('colors.orange.400')],
        })
    },
    variants: {
        gradients: ['responsive', 'hover'],
    },
    plugins : [
        require('./plugins/gradients')
    ],
}
