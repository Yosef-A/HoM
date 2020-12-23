<template>
    <div class="container">
        <div class="box">
            <div class="login">
                Login
            </div>
            <div class="body">
                <div class="col-md-6 offset-md-3">
                    <form v-on:submit.prevent="onSubmit">
                        <div class="alert alert-danger" v-if="errors.length">
                            <ul class="mb-0">
                                <li v-for="(error,index) in errors" :key="index">
                                    {{ error }}
                                </li>
                            </ul>
                        </div>
                        
                       
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" v-model="email">
                        </div>
                        
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" v-model="password">
                        </div>
                       
                        <button class="btn">Login</button>
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
    data() {
        return {
            email: '',
            password: '',
            errors:[]
        }
    },
    methods: {
        onSubmit()
        {
            this.errors = [];


            if (!this.email)
            {
                this.errors.push('Email is requires');
            }
            if (!this.password)
            {
                this.errors.push('password is requires');
            }


            if (!this.errors.length)
            {
                const data = {
                    email: this.email,
                    password: this.password,
                }

                this.app.req.post('auth/login', data).then(response => {
                    this.app.user = response.data;
                    if (this.app.user.User_Type==1) {
                        this.$router.push("/");
                    }
                    if (this.app.user.User_Type==2) {
                        this.$router.push("/hive");
                    }
                    if (this.app.user.User_Type==3) {
                        this.$router.push("/hive");
                    }
                    
                }).catch(error => {
                    this.errors.push(error.response.data.error);
                })
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
.box{
    background-color:rgba(0, 0, 0, 0.728);
    padding-top: 50px;
    padding-bottom: 50px;
}
label{
      color: rgb(198,198,198);
}
.login{
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
    border-radius: 5px;
    margin-left: 70px;
   
}
</style>