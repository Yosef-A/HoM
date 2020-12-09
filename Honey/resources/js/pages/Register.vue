<template>
    <div class="container">
        <div class="cont">
            <div class="log">
                Register
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
                            <label>Name</label>
                            <input type="text"
                                   v-model="name"
                                   class="form-control"
                                   placeholder="Name...">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text"
                                   v-model="username"
                                   class="form-control"
                                   placeholder="Username...">
                        </div>
                        <div class="form-group">
                            <label>UserType</label>
                            <input type="text"
                                   v-model="userType"
                                   class="form-control"
                                   placeholder="Usertype">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input v-model="password"
                                   type="password"
                                   class="form-control"
                                   placeholder="Password...">
                        </div>
                        <div class="form-group">
                            <label>Password Again</label>
                            <input v-model="passwordAgain"
                                   type="password"
                                   class="form-control"
                                   placeholder="Password Again...">
                        </div>
                        <br>
                        <button class="btn btn-secondary">Register</button>
                    </form>
                </div>
            </div>

        </div>

    </div>

</template>

<script>
    export default {
        name: 'register',
        props: ['app'],
        data()
        {
            return {
                name:'',
                username:'',
                userType:'',
                password:'',
                passwordAgain:'',
               


                errors: []
            }
        },

        methods: {
            onSubmit()
            {
                this.errors = [];
                

                if (!this.name)
                {
                    this.errors.push('Name is required');
                }
                
                if (!this.username)
                {
                    this.errors.push('Username is required');
                }
                if (!this.userType)
                {
                    this.errors.push('UserType is required');
                }

                
                if (!this.password)
                {
                    this.errors.push('Password is required');
                }

                if (!this.passwordAgain)
                {
                    this.errors.push('Password confirmation is required');
                }
                 if (this.password != this.passwordAgain)
                {
                    this.errors.push('Passwords do not match');
                }

               if (!this.errors.length)
                {

                   const data = {
                        name: this.name,
                        username: this.username,
                        userType: this.userType,
                        password: this.password
                    }

                    this.app.req.post('auth/register', data).then(response => {
                        this.app.user = response.data;
                       // this.$router.push("/");
                        if (this.userType== 'Admin') {
                        this.$router.push("/admin");
                    }
                    if (this.userType== 'Invester') {
                        this.$router.push("/invester");
                    }
                    if (this.userType== 'Beekeeper') {
                        this.$router.push("/beekeeper");
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
.cont{
    background-color:rgba(0, 0, 0, 0.728);
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
    width: 600px;
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