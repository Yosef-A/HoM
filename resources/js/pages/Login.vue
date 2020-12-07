<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Login
            </div>
            <div class="card-body">
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
                       
                        <button class="btn btn-success">Login</button>
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
                        this.$router.push("/abc");
                    }
                    if (this.app.user.User_Type==3) {
                        this.$router.push("/bcd");
                    }
                    
                }).catch(error => {
                    this.errors.push(error.response.data.error);
                })
            }
        }
    }
};
</script>

<style>

</style>