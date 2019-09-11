import Vue from 'vue'

import VueRouter from 'vue-router'

import ExampleComponent from './components/ExampleComponent'
import ContactCreate from  "./components/contacts/create"
import ContactShow from  "./components/contacts/show"
Vue.use(VueRouter)

export default new VueRouter({
    routes:[
        {path:'/' , component:ExampleComponent},
        {path:'/contacts/create' , component:ContactCreate},
        {path:'/contacts/:id' , component:ContactShow}
    ],
    mode:'history'
})