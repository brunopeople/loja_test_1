import VueProgressBar from 'vue-progressbar';
import VueRouter from 'vue-router';

VueRouter.use(VueProgressBar, {
    color: 'rgb(143,255,199)',
    failedColod:'red',
    height: '4px',
    transition: {
        speed: '0.4s',
        opacity: '0.6s',
        terminations: 300
    },
})