import { createWebHistory, createRouter } from 'vue-router'
import store from '@/store'

/* Guest Component */
const Login = () => import('@/components/Login.vue')
const Register = () => import('@/components/Register.vue')
const AllEstado = () => import('@/components/AllEstado.vue')
const CreateEstado = () => import('@/components/CreateEstado.vue')
const EditEstado = () => import('@/components/EditEstado.vue')
const AllCidade = () => import('@/components/AllCidade.vue')
const EditCidade = () => import('@/components/EditCidade.vue')
const CreateCidade = () => import('@/components/CreateCidade.vue')


/* Guest Component */

/* Layouts */
const DahboardLayout = () => import('@/components/layouts/Default.vue')
/* Layouts */

/* Authenticated Component */
const Dashboard = () => import('@/components/Dashboard.vue')
/* Authenticated Component */


const routes = [
    {
        name: "login",
        path: "/login",
        component: Login,
        meta: {
            middleware: "guest",
            title: `Login`
        }
    },
    {
        name: "register",
        path: "/register",
        component: Register,
        meta: {
            middleware: "guest",
            title: `Register`
        }
    },
    {
        path: "/",
        component: DahboardLayout,
        meta: {
            middleware: "auth"
        },
        children: [
            {
                name: "dashboard",
                path: '/',
                component: Dashboard,
                meta: {
                    title: `Dashboard`
                }
            }
        ]
    },
    {
        path: "/estado",
        component: DahboardLayout,
        meta: {
            middleware: "auth"
        },
        children: [
            {
                name: "estado",
                path: '/estado',
                component: AllEstado,
                meta: {
                    middleware: "auth",
                    title: `Estado`
                }
            }
        ]
    },
    {
        path: "/createestado",
        component: DahboardLayout,
        meta: {
            middleware: "auth"
        },
        children: [
            {
                name: "createestado",
                path: '/createestado',
                component: CreateEstado,
                meta: {
                    middleware: "auth",
                    title: `Criar Estado`
                }
            }
        ]
    },
    {
        path: "/estado/edit/:id",
        component: DahboardLayout,
        meta: {
            middleware: "auth"
        },
        children: [
            {
                name: "edit-estado",
                path: '/estado/edit/:id',
                component: EditEstado,
                meta: {
                    middleware: "auth",
                    title: `Editar Estado`
                }
            }
        ]
    },
    {
        path: "/cidade",
        component: DahboardLayout,
        meta: {
            middleware: "auth"
        },
        children: [
            {
                name: "cidade",
                path: '/cidade',
                component: AllCidade,
                meta: {
                    middleware: "auth",
                    title: `Cidade`
                }
            }
        ]
    },
    {
        path: "/cidade/edit/:id",
        component: DahboardLayout,
        meta: {
            middleware: "auth"
        },
        children: [
            {
                name: "edit-cidade",
                path: '/cidade/edit/:id',
                component: EditCidade,
                meta: {
                    middleware: "auth",
                    title: `Editar Cidade`
                }
            }
        ]
    },
    {
        path: "/createcidade",
        component: DahboardLayout,
        meta: {
            middleware: "auth"
        },
        children: [
            {
                name: "createcidade",
                path: '/createcidade',
                component: CreateCidade,
                meta: {
                    middleware: "auth",
                    title: `Criar Cidade`
                }
            }
        ]
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes, // short for `routes: routes`
})

router.beforeEach((to, from, next) => {
    document.title = to.meta.title
    if (to.meta.middleware == "guest") {
        if (store.state.auth.authenticated) {
            next({ name: "dashboard" })
        }
        next()
    } else {
        if (store.state.auth.authenticated) {
            next()
        } else {
            next({ name: "login" })
        }
    }
})

export default router