import Home from './pages/Home';
import Register from './pages/Register';
import login from './pages/Login';
import Contact from './pages/Contact';
import About from './pages/About';
import Beekeeper from './Beekeeper/beekeeper';
import Admin from './Admin/admin';
import Invester from './Invester/invester';
import VueRouter from 'vue-router';

export default[
    
    {
        path:'/register',
        component:Register,
        name:'register'

    },
    {
        path:'/login',
        component:login,
        name:'login'

    },
    {
        path:'/',
        component:Home,
        name:'home'

    },
    {
        path:'/contact',
        component:Contact,
        name:'contact'

    },
    {
        path:'/about',
        component:About,
        name:'about'

    },
    {  
        path: '/invester',
        component: Invester,
        name: 'invester' 
     },

     {  
        path: '/admin',
        component: Admin,
        name: 'admin' 
     },
     {  
        path: '/beekeeper',
        component: Beekeeper,
        name: 'beekeeper' 
     }
];

