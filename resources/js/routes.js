import Orders from './components/Orders'
import Logistics from './components/Logistics'
import Products from './components/Products'

export default {
    mode: 'history',
    routes: [
        {
            path: '/',
            component: Logistics
        },
        {
            path: '/orders',
            component: Orders
        },
        {
            path: '/products',
            component: Products
        }
    ]
}
