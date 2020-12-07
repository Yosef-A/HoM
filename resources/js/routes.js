import Home from './pages/Home';  
import Register from './pages/Register';  
import Abc from './pages/Abc';  
import Bcd from './pages/Bcd';
import Login from './pages/Login';    




export default [
    {
        path: '/',
        component: Home,
        name: 'home'
    },

    {
        path: '/register',
        component : Register,
        name: 'register'
    },

    {
        path: '/abc',
        component: Abc,
        name: 'abc'
    },

    {
        path: '/bcd',
        component: Bcd,
        name: 'bcd'
    },

    {
        path: '/login',
        component: Login,
        name: 'login'
    }
]