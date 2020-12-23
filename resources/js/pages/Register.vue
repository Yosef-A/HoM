<template>
    <div class="container">
        <div class="box">
            <div class="register">
                Register
            </div>
            <div>
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
                            <label>First Name</label>
                            <input type="text" class="form-control" v-model="First_Name">
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" v-model="Last_Name">
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" class="form-control" v-model="Phone_Number">
                        </div>
                        <div class="form-group">
                            <label>User Type</label>
                            <input type="text" class="form-control" v-model="User_Type">
                        </div>
                        <div class="form-group">
                            <label>Bio</label>
                            <input type="text" class="form-control" v-model="Bio">
                        </div>
                        <div class="form-group">
                            <label>Location</label>
                            <input type="text" class="form-control" v-model="Location">
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="text" class="form-control" v-model="Image">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" v-model="email">
                        </div>
                        
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" v-model="password">
                        </div>
                        <div class="form-group">
                            <label>Password Again</label>
                            <input type="password" class="form-control" v-model="passwordAgain">
                        </div>
                        <button class="btn">Register</button>
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
    data() {
        return {
            First_Name: '',
            Last_Name: '',
            Phone_Number: '',
            Bio: '',
            Location: '',
            Image: '',
            email: '',
            User_Type: '',
            password: '',
            passwordAgain: '',
            errors:[]
        }
    },
    methods: {
        onSubmit()
        {
            this.errors = [];

            if (!this.First_Name)
            {
                this.errors.push('Name is requires');
            }
            if (!this.email)
            {
                this.errors.push('Email is requires');
            }
            if (!this.password)
            {
                this.errors.push('password is requires');
            }
            if (!this.passwordAgain)
            {
                this.errors.push('password confirmation is requires');
            }
            if (this.password != this.passwordAgain)
            {
                this.errors.push('passwords do not match');
            }
            if (!this.errors.length)
            {
                const data = {
                    First_Name: this.First_Name,
                    email: this.email,
                    password: this.password,
                    Last_Name: this.Last_Name,
                    Phone_Number: this.Phone_Number,
                    Bio: this.Bio,
                    Location: this.Location,
                    Image: this.Image,
                    User_Type: this.User_Type
                }

                this.app.req.post('auth/register', data).then(response => {
                    this.app.user = response.data;
                    if (this.User_Type==1) {
                        this.$router.push("/");
                    }
                    if (this.User_Type==2) {
                        this.$router.push("/abc");
                    }
                    if (this.User_Type==3) {
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
.box{
    background-color:rgba(0, 0, 0, 0.728);
    padding-top: 50px;
    padding-bottom: 50px;
}

label{
      color: rgb(198,198,198);
}
.register{
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
    border-radius: 5px;
    margin-left: 70px;
}
</style>