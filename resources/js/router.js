import Vue from 'vue'

import VueRouter from 'vue-router'

import ExampleComponent from './components/ExampleComponent'
import ContactIndex from  "./components/contacts/index"
import ContactCreate from  "./components/contacts/create"
import ContactShow from  "./components/contacts/show"
import ContactEdit from  "./components/contacts/edit"
Vue.use(VueRouter)

export default new VueRouter({
    routes:[
        {path:'/' , component:ExampleComponent},
        {path:'/contacts' , component:ContactIndex},
        {path:'/contacts/create' , component:ContactCreate},
        {path:'/contacts/:id' , component:ContactShow},
        {path:'/contacts/:id/edit' , component:ContactEdit},
    ],
    mode:'history'
})