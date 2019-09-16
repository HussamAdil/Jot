import Vue from 'vue'

import VueRouter from 'vue-router'

import ExampleComponent from './components/ExampleComponent'
import ContactIndex from  "./components/contacts/index"
import ContactCreate from  "./components/contacts/create"
import ContactShow from  "./components/contacts/show"
import ContactEdit from  "./components/contacts/edit"
import BirthdayIndex from  "./components/birthdays/index"
import Logout from  "./actions/logout"
Vue.use(VueRouter)

export default new VueRouter({
    routes:[
        {path:'/' ,  component:ContactIndex, meta:{title:'Contacts'}},
        {path:'/contacts' , component:ContactIndex, meta:{title:'Contacts'}},
        {path:'/contacts/create' , component:ContactCreate, meta:{title:'Create Contact '}},
        {path:'/contacts/:id' , component:ContactShow, meta:{title:'Contacte Show'}},
        {path:'/contacts/:id/edit' , component:ContactEdit, meta:{title:'Edit Contact'}},
        {path:'/birthdays' , component:BirthdayIndex, meta:{title:'Birthday'}},
        {path:'/logout' , component:Logout},

    ],
    mode:'history'
})