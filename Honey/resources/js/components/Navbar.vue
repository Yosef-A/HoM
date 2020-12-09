<template>
   <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark">
  <a class="navbar-brand" href="#">Yene Mare</a>
  <button
   class="navbar-toggler" 
   type="button"
   data-toggle="collapse" 
   data-target="#navbarSupportedContent">
    <span class="navbar-toggler-icon"></span>
  </button>
  
<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item" v-if="!app.user">
        <router-link to="/" class="nav-link">
          Home
        </router-link>
      </li>
      <li v-if="!app.user">
          <router-link to="/contact" class="nav-link">
          Contact Us
        </router-link>
      </li>
      <li v-if="!app.user">
          <router-link to="/about" class="nav-link">
          About Us
        </router-link>
    
      </li>
      
    </ul>  
    <ul class="navbar-nav ml-auto">
      <ul v-if="app.user">

       <li class="nav-item" v-if="app.user.userType=='Admin'">
            <router-link to="/admin" class="nav-link">Add Beekeeper</router-link>
        </li>

        <li class="nav-item" v-if="app.user.userType=='Invester'">
            <router-link to="/invester" class="nav-link">Invester</router-link>
        </li>
        <li class="nav-item" v-if="app.user.userType=='Beekeeper'">
            <router-link to="/beekeeper" class="nav-link">Beekeeper</router-link>
        </li>
        </ul>

       <li class="nav-item dropdown">
        <a 
        class="nav-link dropdown-toggle" 
         href="#"
         id="navbarDropdown" 
         role="button"
         data-toggle="dropdown" 
         aria-haspopup="true"
         aria-expanded="false">
       {{ app.user? app.user.name : 'Account'}}
                            </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <div v-if="!app.user">
              <router-link to="login"  class="dropdown-item">Login</router-link>
              <router-link to="register"  class="dropdown-item">Register</router-link>
          </div>
              <a v-else @click="logout" href="javascript:;" class="dropdown-item">Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>

   </div>

   
</template>
<script>
export default {
  name:'navbar',
    props:['app'],
    data(){
       return{

       }
    },
    methods: {
        logout()
        {
            this.app.req.post('auth/logout').then(() => {
                  this.app.user = null;
                  this.$router.push('/login');
            });
        }
    }
}
</script>
<style scoped>
 header{
  /*  background-color: blue;*/
    height: 118px;
    text-align: center;
}
.container{
    margin-left: auto;
    margin-right: auto;
    width: 1024px;
}
nav{
    background-color: rgb(0,0,0,0.338);
   /* height:40px;*/
    text-align: center;
    padding-top: 14px;
    padding-bottom: 14px;
}
nav router-link{
   position:absolute;
    top:50%;
    right:0;
    transform: translate(-50%,-50%);
}
</style>