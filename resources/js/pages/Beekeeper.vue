<template>
    <div class="container">
        <h1>AAAAAAAA</h1>
        <div class="card">
            <div class="card-header">
                Register
            </div>
            <div class="card-body">
                <div class="col-md-6 offset-md-3">
                    <form v-on:submit.prevent="onSubmit">
                        <div class="form-group">
                            <label>First Name</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="app.user.First_Name"
                            />
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="app.user.Last_Name"
                            />
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="app.user.Phone_Number"
                            />
                        </div>

                        <div class="form-group">
                            <label>Bio</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="app.user.Bio"
                            />
                        </div>
                        <div class="form-group">
                            <label>Location</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="app.user.Location"
                            />
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="app.user.Image"
                            />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="app.user.email"
                                disabled
                            />
                        </div>
                        <div class="form-group">
                            <label>User_Type</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="app.user.User_Type"
                                disabled
                            />
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
    name: "beeKeeper",
    props: ["app"],
    data() {
        return {
            First_Name: "",
            Last_Name: "",
            Phone_Number: "",
            Bio: "",
            Location: "",
            Image: "",
            email: "",
            User_Type: "",
            password: "",
            passwordAgain: "",
            errors: []
        };
    },
    methods: {
        onSubmit() {
            const data = {
                First_Name: this.app.user.First_Name,
                Last_Name: this.app.user.Last_Name,
                Phone_Number: this.app.user.Phone_Number,
                Bio: this.app.user.Bio,
                Location: this.app.user.Location,
                Image: this.app.user.Image,
                email: this.app.user.email,
                password: this.app.user.password,
                User_Type: this.app.user.User_Type
            };

            this.app.req
                .post("updateProfile", data)
                .then(response => {
                    this.app.user = response.data;

                    this.$router.push("/");
                })
                .catch(error => {
                    this.errors.push(error.response.data.error);
                });
        }
    }
};
</script>

<style></style>
