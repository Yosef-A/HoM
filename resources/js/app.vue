<template>

    <body :style="{'background-image':'url(storage/images/background.jpeg)'}">
       
       <div>
            <navbar :app="this" class="mb-2"></navbar>
        
        <!-- <spinner v-if="loading"></spinner>
        <div v-else-if="initiated"></div> -->
        <router-view :app="this"/>
    </div>
  </body>
</template>

<script>
import Navbar from './components/Navbar';

export default {
    name: 'app',
    components: {
        Navbar
    },
 
    data() {
        return {
            user: null,
            loading: false,
            initiated: false,
            req: axios.create({
                baseUrl: BASE_URL
            })
        }
    },
    mounted()
    {
        this.init();
    },
    methods: {
        init()
        {
            this.loading = true;

            this.req.get('auth/init').then(response => {
                this.user = response.data.user;
                this.loading = false;
                this.initiated = true;
            })
        }
    }
}
</script>

<style>
  body{
    background-color: #2f3035;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    height: 1300px;
}
</style>