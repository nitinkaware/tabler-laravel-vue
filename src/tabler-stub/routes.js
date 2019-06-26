export default [
    {
        path: '/home',
        name: 'home',
        component: () => import('./Pages/Home/Index')
    },
    
    {
        path: '/login',
        name: 'login',
        component: () => import('./Pages/Auth/Login')
    },

    {
        path: '/register',
        name: 'register',
        component: () => import('./Pages/Auth/Register')
    }
];