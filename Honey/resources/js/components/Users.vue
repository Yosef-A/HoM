<template>
   
   <div>
        <h2>users</h2>
        <a href="/users/create" class="btn btn-success pull-right">Add New User</a>
        <table class="table table-boarderd">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in users" :key="user">
                <td>{{user.id}}</td>
                <td>{{user.name}}</td>
                <td>{{user.email}}</td>
                <td> <a href="" class="btn btn-primary">Edit</a> ||
                     <a href="" class="btn btn-danger">Delete</a></td>
                </tr>
            </tbody>
        </table>
   </div>
</template>
<script>
export default {
    data(){
        return {
            users: [],
            user: {
                id:0,
                name:'',
                email:''
            }
        }
    },
    mounted(){
         this.getUsers()
    },
    methods:{
        getUsers(){
            axios.get('/api/user').then(response=>{
                console.log(response)
                 this.users = response.data
            })
        }
    }
}
</script>
<style>

</style>