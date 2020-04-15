<template>
<ul class="navbar-nav ml-auto" >
    <li class="nav-item" v-for="item in menuList">
        <router-link class="nav-link" :to="{ name: item.path }">{{ item.title }}</router-link>
    </li>
    <li class="nav-item" v-for="item in menuStatic">
        <a class="nav-link" :href="item.path">{{ item.title }}</a>
    </li>
</ul>
</template>
<script>
    export default {
        name:"menu-list",
        data() {
            return {
                menuList: [
                    { title:'Home', path: 'home' }
                ],
                menuStatic: [
                    { title:'Articles', path: '/articles'},
                    { title:'Contact', path: '/contact' }
                ]
            }
        }
    }
</script>