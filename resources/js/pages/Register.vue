<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Register
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
                        <button class="btn btn-success">Register</button>
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