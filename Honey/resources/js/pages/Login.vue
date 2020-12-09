<template>

    <div class="container">
        <div class="cont">
            <div class="log">
              Login
            </div>
            <div class="contt">
                <div class="col-md-6 offset-md-3">
                    <form v-on:submit.prevent="onSubmit">
                        <div class="alert alert-danger" v-if="errors.length">
                            <ul class="mb-0">
                                <li v-for="(error,index) in errors" :key="index">
                                    {{ error}}
                                </li>
                            </ul>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text"
                                   v-model="username"
                                   class="form-control"
                                   placeholder="Username...">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input v-model="password"
                                   type="password"
                                   class="form-control"
                                   placeholder="Password...">
                        </div>
                        <br>
                        <button  class="btn">Login</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    
</template>

<script>
    export default {
        name: 'login',
        props: ['app'],
        data()
        {
            return {
                users:null,
                username:'',
                password: '',
                errors: [],
                
            }
        },
       

        methods: {
           onSubmit()
            {
                this.errors = [];
                
                if (!this.username)
                {
                    this.errors.push('Username is required');
                }

                
                if (!this.password)
                {
                    this.errors.push('Password is required');
                }

               if (!this.errors.length)
                {

                    const data = {
                        username: this.username,
                        password: this.password
                    }

                    this.app.req.post('auth/login', data).then(response => {
                        this.app.user = response.data;
                        if(this.app.user.userType == 'Beekeeper'){
                            this.$router.push("/beekeeper");
                        }
                         if(this.app.user.userType == 'Invester'){
                            this.$router.push("/invester");
                        }
                        if(this.app.user.userType == 'Admin'){
                            this.$router.push("/admin");
                        }
                                
                    }).catch(error=> {
                        this.errors.push(error.response.data.error);
                    });
                }
            }
        }
    };
</script>

<style scoped>
:root{
    --primary-color:#e50914;
    --dark-color:#141414;
}
.cont{
    background-color:rgba(0, 0, 0, 0.728);
    /*height: 100px; */
    padding-top: 50px;
    padding-bottom: 50px;
}
label{
      color: rgb(198,198,198);
}
.log{
     text-align: center;
    font-size: 50px;
    color: rgb(198,198,198);
}
.container{
    width: 530px;
    padding-top: 90px;
}

.btn{
    display: inline-block;
    background-color:rgb(185, 102, 47);
    color: #fff;
    padding: 0.4rem 1.3rem;
    font-size:1rem;
    text-align: center;
    border: none;
    cursor: pointer;
    margin-right: 0.5rem;
    outline:none;
    box-shadow: 0 1px 0 rgba(0,0,0,0.45);
    border-radius: 2px;
    margin-left: 70px;
   
}

.btn-rounded{
    border-radius:5px;
}

</style>