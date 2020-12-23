<template>
    <div class="container">
        <div class="cont">
             <div class="log">
                    Add Hives
             </div>
              <div class="contt">
                <div class="col-md-8 offset-md-2">
                    <form v-on:submit.prevent="onSubmit" style="margin: 20px">
                       
                        <div class="form-group">
                            <label>Annual Production</label>
                            <input type="text"
                                   v-model="Annual_Production"
                                   placeholder="Annual Production"
                                   v-bind:class="{ 'is-invalid': errorAnnual_Production }"
                                   class="form-control"/>
                            <div class="invalid-feedback">
                                {{ errorAnnual_Production }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Cost</label>
                            <input type="text"
                                   v-model="Cost"
                                   placeholder="Cost"
                                   v-bind:class="{ 'is-invalid': errorCost }"
                                   class="form-control"/>
                            <div class="invalid-feedback">
                                {{ errorCost }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label>image</label>
                            <input type="text"
                                   v-model="image"
                                  placeholder="image"
                                   v-bind:class="{ 'is-invalid': errorimage }"
                                   class="form-control"/>
                            <div class="invalid-feedback">
                                {{ errorimage }}
                            </div>
                        </div>
                        

                        <br>
                        <button type="submit" class="btn btn-secondary">Submit</button>
                    </form>
                </div>
            </div>

        </div>

    </div>

</template>

<script>
    export default {
        name: "hive",
        props: ['app'],
        data()
        {
            return {
               
                Annual_Production: '',
                Cost: '',
                image: '',
                errorAnnual_Production: '',
                errorCost: '',
                errorimage: '',


                 errors: []
            }
        },
         mounted()
        {
            if (this.app.user === null)
            {
                this.app.$router.push({name:'auth.login'});
            }

        },

        methods: {
            onSubmit()
            {
                if (!this.Annual_Production)
                {
                    this.errorAnnual_Production = 'Annual Production is required';
                    return null;
                }
                if (!this.Cost)
                {
                    this.errorCost = 'Cost is required';
                    return null;
                }
                if (!this.image)
                {
                    this.errorimage = 'image is required';
                    return null;
                }
                

                let data = {
                    
                    Annual_Production: this.Annual_Production,
                    Cost: this.Cost,
                    image: this.image,
                }
                this.loading = true;
                this.app.req.post('hive', data).then((response) => {
                    this.loading = false;
                    this.app.$router.push({name:'hive.show', params: {id: response.data.id}});
                });
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
    border-radius: 5px;
     margin-left: 70px;
}
</style>